<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Exception;
use Log;
use Mail;

class ClientController extends Controller
{
	// TEMP VAR
	private $clients = [
		[
			"id" => 1,
			"name" => "Joseph Polio",
			"email" => "joseph.polio@gmail.com",
			"telephone" => "678-4421",
			"mobile" => "09267789945",
			"address" => "11 Maharlika St. San Francisco Village Muzon Taytay Rizal",
			"type" => "new"
		]
	];

	private $pets = [
		"1" =>	[
			[
				"id" => 1,
				"img" => "aspin_brown.jpg",
				"name" => "Brownie",
				"breed" => "Aspin",
				"species" => "Dog",
				"colors" => ["goldenrod"],
				"birthday" => "2022/05/06",
				"gender" => "Male",
				"type" => "tamed"
			],
			[
				"id" => 2,
				"img" => "aspin_mocha.webp",
				"name" => "Siomai",
				"breed" => "Aspin",
				"species" => "Dog",
				"colors" => ["white", "chocolate"],
				"birthday" => "2021/09/25",
				"gender" => "Female",
				"type" => "tamed"
			],
			[
				"id" => 3,
				"img" => "labrador.jpg",
				"name" => "Siopao",
				"breed" => "Labrador",
				"species" => "Dog",
				"colors" => ["moccasin"],
				"birthday" => "2022/06/17",
				"gender" => "Male",
				"type" => "tamed"
			],
			[
				"id" => 4,
				"img" => "golden_retriever.jpg",
				"name" => "Voodoo",
				"breed" => "Golden Retriever",
				"species" => "Dog",
				"colors" => ["gold"],
				"birthday" => "2020/03/11",
				"gender" => "Female",
				"type" => "tamed"
			],
			[
				"id" => 5,
				"img" => "tabby.jpg",
				"name" => "Oreo",
				"breed" => "Tabby",
				"species" => "Cat",
				"colors" => ["gray", "dimgray", "white"],
				"birthday" => "2021/11/15",
				"gender" => "Male",
				"type" => "tamed"
			],
			[
				"id" => 6,
				"img" => "bombay.jpg",
				"name" => "Kisses",
				"breed" => "Bombay",
				"species" => "Cat",
				"colors" => ["black"],
				"birthday" => "2021/12/15",
				"gender" => "Female",
				"type" => "tamed"

			]
		]
	];

	// CLIENT-PROFILE
	protected function index() {
		return view('admin.clientprofile.index', [
			'clients' => $this->clients,
			'pets' => $this->pets
		]);
	}

	protected function create() {
		return view('admin.clientprofile.create');
	}

	protected function edit() {
		return view('admin.clientprofile.client.edit');
	}

	protected function viewClientProfile($id) {
		$client = $this->clients[$id-1];
		
		return view('admin.clientprofile.client.view', [
			'id' => $id,
			'client' => $client
		]);

		
	}

	protected function showPets($id) {
		return view('admin.clientprofile.pet.index', [
			'id' => $id,
			'pets' => $this->pets["{$id}"]
		]);
	}

	protected function notifyClient(Request $req) {
		try {
			DB::beginTransaction();

			// MAILING STUFFS
			if (random_int(0, 100) <= 50)
				throw new Exception();

			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);

			return response()
				->json([
					'success' => false,
					'title' => 'Something went wrong',
					'message' => '<p class="m-0 text-center">Something went wrong, please try again later</p>'
				]);
		}

		return response()
			->json([
				'success' => true,
				'title' => 'Success',
				'message' => '<p class="m-0 text-center">Successfully notified all subscribed clients</p>'
			]);
	}
}
