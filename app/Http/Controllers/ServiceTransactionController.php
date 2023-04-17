<?php

namespace App\Http\Controllers;

use App\Services;
use App\ServicesCategory;
use App\ServicesVariation;
use App\PetsInformation;
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
        $pets = PetsInformation::get();
        return view('admin.transaction.services-transaction.consultation-create',[
            'services' => $service,
            'pet' => $pets,
        ]);
    }

       // CREATE VACCINATION TRANSACTION
    protected function createVaccination()
    {
        $services = Services::where('id', '=', 14)->has("variations", '>', 0)->with('variations')->get();
        // dd($serVar);
        $pets = PetsInformation::get();
          return view('admin.transaction.services-transaction.vaccination-create',[
            'services' => $services,
            'pet' => $pets,

          ]);

    }

       // CREATE GROOMING TRANSACTION
    protected function createGrooming()
    {
          return view('admin.transaction.services-transaction.grooming-create');
    }

       // CREATE BOARDING TRANSACTION
    protected function createBoarding()
    {
          return view('admin.transaction.services-transaction.boarding-create');
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
