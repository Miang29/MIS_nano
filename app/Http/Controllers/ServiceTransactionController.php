<?php

namespace App\Http\Controllers;

use App\Services;
use App\ServicesCategory;
use App\ServicesVariation;
use App\PetsInformation;
use App\ServicesOrderTransaction;
use App\ConsultationTransaction;
use App\VaccinationTransaction;
use App\GroomingTransaction;
use App\BoardingTransaction;
use App\User;
use Illuminate\Http\Request;

use DB;
use Exception;
use Log;
use Validator;


class ServiceTransactionController extends Controller
{
	// SERVICES TRANSACTION 
	// INDEX 
	protected function Service()
	{
		return view('admin.transaction.services-transaction.index');
	}

	// CREATE Consultation TRANSACTION
	protected function createConsultation()
	{
		$service = Services::find(2);
		$owner = User::where('user_type_id', '=', 4)->has("petsInformations", '>', 0)->with('petsInformations')->get();
		return view('admin.transaction.services-transaction.consultation-create',[
			'services' => $service,
			'owner' => $owner,
		]);
	} 
   
	// SUBMIT-CONSULTATION
	protected function submitConsultation(Request $req)
	{
		$validator = Validator::make($req->all(), [
			'reference_no' => 'required|numeric|between:1000000000,9999999999999',
			'mode_of_payment' => 'required|max:255|string',
			'service_category_id' => 'required|array',
			'service_category_id.*'=>'required|exists:services,service_category_id|string',
			'service_category_id.*.*' => 'required|min:2|max:255|string',
			'pet_name' => 'required|array',
			'pet_name.*' => 'required|exists:pets_informations,id|string',
			'pet_name.*.*' => 'required|min:2|max:255|string',
			'weight' => 'required|array',
			'weight.*' => 'required|min:2|max:255|string',
			'temperature' => 'required|array',
			'temperature.*' => 'required|min:2|max:255|string',
			'findings' => 'required|array',
			'findings.*' => 'required|min:2|max:255|string',
			'treatment' => 'required|array',
			'treatment.*' => 'required|min:2|max:255|string',
			'price' => 'required|array',
			'price.*' => 'required|numeric',
			'additional_cost' => 'required|array',
			'additional_cost.*' => 'required|numeric',
			'total' => 'required|array',
			'total.*' => 'required|numeric',
			'total_amt' => 'required|numeric',
		]);

		$validator->after(function($validator) use ($req) {
			$transaction = ServicesOrderTransaction::where('reference_no', '=', $req->reference_no)
			->where("voided_at", "=", null)
			->first();
			if (!(empty($transaction) || $transaction == null)) {
				$validator->errors()->add("reference_no", "Duplicate reference number");
			}
		});

		if ($validator->fails()) {
			Log::debug($validator->messages());

			return redirect()
				->back()
				->withErrors($validator)
				->withInput();
		}
		try {
			DB::beginTransaction();
			$serviceTransaction = ServicesOrderTransaction::create([
				'mode_of_payment' => $req->mode_of_payment,
				'reference_no' => $req->reference_no,
			]);

			for ($i = 0; $i < count($req->service_category_id); $i++) {
				
				$ct = ConsultationTransaction::create([
					'transaction_id'=> $serviceTransaction->id,
					'service_category_id' => $req->service_category_id[$i],
					'price' =>  $req->price[$i],
					'additional_cost' => $req->additional_cost[$i],
					'total' => $req->total[$i],
					'pet_name' => $req->pet_name[$i],
					'weight' => $req->weight[$i],
					'temperature' => $req->temperature[$i],
					'findings' => $req->findings[$i],
					'treatment' => $req->treatment[$i],
				]);
			}
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);
			
			return redirect()
			->route('transaction.consultation.create')
			->with('flash_error', 'Something went wrong, please try again later');
		}

		// dd("TEST");
		return redirect()
			->route('transaction.service')
			->with('flash_success', "Transaction has been created successfully.");
	}

	   // CREATE VACCINATION TRANSACTION
	protected function createVaccination()
	{
		$services = Services::where('id', '=', 3)->has("variations", '>', 0)->with('variations')->get();
		// dd($serVar);
		$owner = User::where('user_type_id', '=', 4)->has("petsInformations", '>', 0)->with('petsInformations')->get();
		  return view('admin.transaction.services-transaction.vaccination-create',[
			'services' => $services,
			'owner' => $owner,
		  ]);
	}
	// SUBMIT-VACCINATION
		protected function submitVaccination(Request $req)
	{
		$validator = Validator::make($req->all(), [
		'reference_no' => 'required|numeric|between:1000000000,9999999999999',
		'mode_of_payment' => 'required|max:255|string',
		'variation_id' => 'required|array',
		'variation_id.*'=>'required|exists:services_variations,id|string',
		'variation_id.*.*' => 'required|min:2|max:255|string',
		'pet_name' => 'required|array',
		'pet_name.*' => 'required|exists:pets_informations,id|string',
		'pet_name.*.*' => 'required|min:2|max:255|string',
		'expired_at' => 'required|array',
		'expired_at.*' => 'required|min:2|max:255|string',
		'price' => 'required|array',
		'price.*' => 'required|numeric'

		]);

		$validator->after(function($validator) use ($req) {
			$transaction = ServicesOrderTransaction::where('reference_no', '=', $req->reference_no)
			->where("voided_at", "=", null)
			->first();
			if (!(empty($transaction) || $transaction == null)) {
				$validator->errors()->add("reference_no", "Duplicate reference number");
			}
		});

		if ($validator->fails()) {
			Log::debug($validator->messages());

			return redirect()
				->back()
				->withErrors($validator)
				->withInput();
		}
		try {
			DB::beginTransaction();
			$serviceTransaction = ServicesOrderTransaction::create([
				'mode_of_payment' => $req->mode_of_payment,
				'reference_no' => $req->reference_no,
			]);

		for ($i = 0; $i < count($req->variation_id); $i++) {
				
				$ct = VaccinationTransaction::create([
					'transaction_id'=> $serviceTransaction->id,
					'variation_id' => $req->variation_id[$i],
					'pet_name' => $req->pet_name[$i],
					'expired_at' => $req->expired_at[$i],
					'price' =>  $req->price[$i],
				]);
			}
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);
			
			return redirect()
			->route('transaction.vaccination.create')
			->with('flash_error', 'Something went wrong, please try again later');
		}

		// dd("TEST");
		return redirect()
			->route('transaction.service')
			->with('flash_success', "Transaction has been created successfully.");
	}

	   // CREATE GROOMING TRANSACTION
	protected function createGrooming()
	{
		$services = Services::where('id', '=', 4)->has("variations", '>', 0)->with('variations')->get();
		$owner = User::where('user_type_id', '=', 4)->has("petsInformations", '>', 0)->with('petsInformations')->get();
		  return view('admin.transaction.services-transaction.grooming-create',[
				'service' => $services,
				'owner' => $owner
		  ]);
	}

	// Submit-Grooming
	protected function submitGrooming(Request $req)
	{
		$validator = Validator::make($req->all(), [
			'reference_no' => 'required|numeric|between:1000000000,9999999999999',
			'mode_of_payment' => 'required|max:255|string',
			'variation_id' => 'required|array',
			'variation_id.*'=>'required|exists:services_variations,id|string',
			'variation_id.*.*' => 'required|min:2|max:255|string',
			'pet_name' => 'required|array',
			'pet_name.*' => 'required|exists:pets_informations,id|string',
			'pet_name.*.*' => 'required|min:2|max:255|string',
			'price' => 'required|array',
			'price.*' => 'required|numeric'

			]);

		$validator->after(function($validator) use ($req) {
			$transaction = ServicesOrderTransaction::where('reference_no', '=', $req->reference_no)
			->where("voided_at", "=", null)
			->first();
			if (!(empty($transaction) || $transaction == null)) {
				$validator->errors()->add("reference_no", "Duplicate reference number");
			}
		});

		if ($validator->fails()) {
			Log::debug($validator->messages());

			return redirect()
				->back()
				->withErrors($validator)
				->withInput();
		}
		try {
			DB::beginTransaction();
			$serviceTransaction = ServicesOrderTransaction::create([
				'mode_of_payment' => $req->mode_of_payment,
				'reference_no' => $req->reference_no,
			]);
			for ($i = 0; $i < count($req->variation_id); $i++) {
				
				$ct = GroomingTransaction::create([
					'transaction_id'=> $serviceTransaction->id,
					'variation_id' => $req->variation_id[$i],
					'pet_name' => $req->pet_name[$i],
					'price' =>  $req->price[$i],
				]);
			}
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);
			
			return redirect()
			->route('transaction.grooming.create')
			->with('flash_error', 'Something went wrong, please try again later');
		}

		// dd("TEST");
		return redirect()
			->route('transaction.service')
			->with('flash_success', "Transaction has been created successfully.");
	}

	   // CREATE BOARDING TRANSACTION
	protected function createBoarding()
	{
		 $services = Services::where('service_category_id', '=', 7)->has("variations", '>', 0)->with('variations')->get();
		$owner = User::where('user_type_id', '=', 4)->has("petsInformations", '>', 0)->with('petsInformations')->get();
		  return view('admin.transaction.services-transaction.boarding-create',[
			'service' => $services,
			'owner' => $owner
		  ]);
	}

	// Submit-Boarding
	protected function submitBoarding(Request $req)
	{
		$validator = Validator::make($req->all(), [
			'reference_no' => 'required|numeric|between:1000000000,9999999999999',
			'mode_of_payment' => 'required|max:255|string',
			'variation_id' => 'required|array',
			'variation_id.*'=>'required|exists:services_variations,id|string',
			'variation_id.*.*' => 'required|min:2|max:255|string',
			'pet_name' => 'required|array',
			'pet_name.*' => 'required|exists:pets_informations,id|string',
			'pet_name.*.*' => 'required|min:2|max:255|string',
			'price' => 'required|array',
			'price.*' => 'required|numeric'

			]);

		$validator->after(function($validator) use ($req) {
			$transaction = ServicesOrderTransaction::where('reference_no', '=', $req->reference_no)
			->where("voided_at", "=", null)
			->first();
			if (!(empty($transaction) || $transaction == null)) {
				$validator->errors()->add("reference_no", "Duplicate reference number");
			}
		});

		if ($validator->fails()) {
			Log::debug($validator->messages());

			return redirect()
				->back()
				->withErrors($validator)
				->withInput();
		}
		try {
			DB::beginTransaction();
			$serviceTransaction = ServicesOrderTransaction::create([
				'mode_of_payment' => $req->mode_of_payment,
				'reference_no' => $req->reference_no,
			]);
			for ($i = 0; $i < count($req->variation_id); $i++) {
				
				$ct = BoardingTransaction::create([
					'transaction_id'=> $serviceTransaction->id,
					'variation_id' => $req->variation_id[$i],
					'pet_name' => $req->pet_name[$i],
					'price' =>  $req->price[$i],
				]);
			}
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);
			
			return redirect()
			->route('transaction.boarding.create')
			->with('flash_error', 'Something went wrong, please try again later');
		}
	// dd("TEST");
		return redirect()
			->route('transaction.service')
			->with('flash_success', "Transaction has been created successfully.");
	}

	// SHOW
	protected function show($id)
	{
		$services = $this->services[$id];

		return view('admin.transaction.services-transaction.view', [
			'id' => $id,
			'services' => $services
		]);
	}
	// ARCHIVE
	protected function deleteServices($id)
	{
		return redirect()
		->route('transaction.service')
		->with('flash_success', 'Successfully removed transaction from table');
	}
}
