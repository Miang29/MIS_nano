<?php

namespace App\Http\Controllers;

use App\ServicesVariation;
use Illuminate\Http\Request;


use DB;
use Exception;
use Log;
use Validator;

class ServiceVariationController extends Controller
{
	// -------------- INDEX OF SERVICE VARIATION --------------- //
	protected function index($id, $serviceId)
	{
		$variations = ServicesVariation::where('service_id', '=', $serviceId)->get();
		return view('admin.service_category.service.service_variation.index', [
			'variations' => $variations,
			'id' => $id,
			'serviceId' => $serviceId
		]);
	}
	
		// -------------------- SHOW VARIATION --------------------- //
	protected function show($id, $serviceId, $variationId)
	{
		$variations = ServicesVariation::find($variationId);
		return view('admin.service_category.service.service_variation.show', [
			'variation' => $variations,
			'id' => $id,
			'serviceId' => $serviceId,
			'variationId' =>$variationId
		    
		]);
	}
		// --------------- EDIT VARIATION ----------------- //
	protected function edit($id, $serviceId, $variationId)
	{
		$variation =ServicesVariation::find($variationId);
		return view('admin.service_category.service.service_variation.edit', [
			'variation' => $variation,
			'id' => $id,
			'variationId' =>$variationId,
			'serviceId' => $serviceId
		]);
	}

	// ---------------------- UPDATE VARIATION ------------------------- //
	protected function updateVar(Request $req, $id, $serviceId, $variationId){

		$var = ServicesVariation::find($variationId);
		if ($var == null) {
			return redirect()
				->back()
				->route('service_variation.index',[$id, $serviceId])
				->with('flash_error', "No such services exists");
		}

		$validator = Validator::make($req->all(), [
			'variation' => 'nullable|min:2|max:255|string',
			'price' => 'required|numeric',
			'remarks.' => 'nullable|min:2|max:255|string',
		],[
			'price' => 'The price field is required',
		]);

		if ($validator->fails())
			return redirect()
				->back()
				->withErrors($validator)
				->withInput();

		try {
				DB::beginTransaction(); 
				$var->service_id = $serviceId;
				$var->variation_name = $req->variation_name;
				$var->price = $req->price;
				$var->remarks = $req->remarks;
				$var->save();

				DB::commit();
			} catch (Exception $e) {
				DB::rollback();
				Log::error($e);
				
	
				return redirect()
					->route('service_variation.edit',[$id, $serviceId, $variationId])
					->with('flash_error', 'Something went wrong, please try again later');
			}
			return redirect()
				->route('service_variation.index',[$id, $serviceId])
				->with('flash_success', "Successfully updated variation");

	}


		// ------------------- ARCHIVE VARIATION ------------------ //
	protected function delete($id, $serviceId, $variationId) {

		$serviceVariation = ServicesVariation::find($variationId);

		if ($serviceVariation == null) {
			return redirect()
			->route('service.index',[$id])
			->with('flash_error','Service variation does not exists.');
			}

			try{
				DB::beginTransaction();
				$serviceVariation->delete();
			
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);

			return redirect()
				->route('service.index',[$id])
				->with('flash_error', 'Something went wrong, please try again later.');
		}

		return redirect()
			->route('service.index',[$id])
			->with('flash_success', "Successfully archived service variation.");
	}


	protected function archivedVariation($id, $serviceId,$variationId){

		$Servivariation = ServicesVariation::onlyTrashed()->get();
		return view ('admin.service_category.service.service_variation.archive_variation',[
			'variation' => $variation,
			'id' => $id,
			'serviceId' => $serviceId,
			'variationId' => $variationId
		]);
	}

	protected function restoreVariation($id){

		$Servivariation = ServicesVariation::withTrashed()->find($id);

		if ($Servivariation == null) {
			return redirect()
			->route('service.index',[$id])
			->with('flash_error','Service variation does not exists');
			}

			try{
				DB::beginTransaction();
				$Servivariation->restore();

			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);

			return redirect()
				->route('service.index',[$id])
				->with('flash_error', 'Something went wrong, please try again later');
		}

		return redirect()
			->route('service.index',[$id])
			->with('flash_success', "Successfully restored service variation");
	}
}
