@extends('layouts.admin')

@section('title', 'Appointment')

@section('content')
<div class="container-fluid m-0">
    <h2 class="h5 h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4 "><a href="{{route('appointments.index')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Appointment</a></h2>
    <hr class="hr-thick" style="border-color: #707070;">

    <div class="col-12">

        <div class="card my-3 mx-auto">
            <h5 class="card-header text-center text-white gbg-1"> Edit Appointment</h5>

            <div class=" col-12 col-md-9 col-lg-6 mx-auto">
                <div class="card-body d-flex mt-1 ">
                    <div class="form-group mx-auto w-100">

                        <label class="h6 important" for="petowner">Pet Owner</label>
                        <input class="form-control" type="text" name="petowner" value="{{ $appointment["owner"] }}" />

                        <label class="h6 important" for="email">Email</label>
                        <input class="form-control" type="email" name="email" value="{{ $appointment["email"] }}" />

                        <label class="h6 important" for="petname">Pet Name</label>
                        <input class="form-control" type="text" name="petname" value="{{ $appointment["pet"] }}" />

                        <label class="h6 important" for="date">Date</label>
                        <input class="form-control" type="date" name="date" value="{{ $appointment["appointment_schedule"]->format("Y-m-d") }}" min="{{ Carbon\Carbon::now()->timezone('Asia/Manila')->format('Y-m-d') }}" />

                        <label class="h6 important" for="time">Time</label>
                        <input class="form-control" type="time" name="time" value="{{ $appointment["appointment_schedule"]->format("H:i") }}" />

                    </div>
                </div>
            </div>
            <div class="card-footer d-flex">
                <div class="col-4 mx-auto text-center">
                    <button class="btn btn-outline-info btn-sm w-50"><a href="#"></a>Book</button>
                    <button class="btn btn-outline-danger btn-sm w-50"><a href="#"></a>Cancel</button>
                </div>
            </div>

        </div>
    </div>

</div>



@endsection