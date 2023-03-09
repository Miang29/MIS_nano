@extends('layouts.user')

@section('title', 'Home')

@section('content')
{{-- ============================================= HOME ============================================= --}}
<div class="row mt-3 min-vh-100">
    <div class="col-12 col-lg-6 mt-5 text-center my-5">
        <img src="{{ asset('uploads/settings/banner.png') }}" id="logo" data-count="1" data-url="{{route ('login') }}" class="img img-fluid mx-auto my-2 w-25" alt="Nano machines son">
        <h3 class="mt-auto font-weight-bold mx-auto text-custom-1  ">VETERINARY CLINIC</h3>
        <p class="text-1 mx-auto">Blk. 3 Lot 3 Unit 5 Glendale Village,Brgy. Dolores, Taytay Rizal</p>

        <div class="row">
            <div class="col-6 d-flex">
                <h5 class="ml-auto text-1">Clinic Hours</h5>
            </div>
            <div class="col-6 d-flex">
                <p class="mr-auto">8:00 AM - 8:00 PM Daily</p>
            </div>
        </div>

        <div class="row">
            <div class="col-6 d-flex">
                <h5 class="ml-auto text-1">Accept Home Service</h5>
            </div>
            <div class="col-6 d-flex">
                <p class="mr-auto">8:00 AM - 8:00 PM</p>
            </div>
        </div>

        <div class="row">
            <div class="col-6 d-flex">
                <h5 class="ml-auto text-1">Grooming Hours</h5>
            </div>
            <div class="col-6 d-flex">
                <p class="mr-auto">8:00 AM - 8:00 PM</p>
            </div>
        </div><br>

        <div class="row">
            <div class="col-12 d-flex ">
                @if(Auth::check())
                <a href="{{route ('schedule-date')}}" class="btn btn-outline-custom mx-auto"><i class="fa-solid fa-arrow-right mr-2"></i>Book Appointment</a>
                @else
                <a href="{{route ('login')}}" class="btn btn-outline-custom mx-auto"><i class="fa-solid fa-arrow-right mr-2"></i>Book Appointment</a>
                @endif
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-6 position-relative d-none d-lg-block">
        <div style ="
                border-radius: 100%;
                margin-top: 1rem;
                min-width: 35rem;
                min-height: 35rem;
                background: #021f53;
                position: absolute;
                top: -1%;
                right: -13.5%;
                z-index: -5;"> </div>
        <div class="home-banner">
            <img src="{{ asset('uploads/settings/vet.jpg') }} " />
        </div>
    </div>
</div>


<div class="card-body text-center" style="height:31rem; background-color:#C2E0D8;">
    <h1 style="font-family:fantasy; font-weight:bolder;">WE VALUE YOUR PETS</h1>
    <div class="row h-75 mt-3">
        <div class="card col-lg-3 col-12 col-md-12 mx-auto border-success" style="border-radius:2.5rem;">
            <img src="{{ asset('uploads/settings/vet-img1.jpg') }}" class="card-img-top my-5">
        </div>
        <div class="card col-lg-3 col-12 col-md-12 mx-auto border-primary" style="border-radius:2.5rem;">
            <img src="{{ asset('uploads/settings/vet-img3.jpg') }}" class="card-img-top my-5">
        </div>
        <div class="card col-lg-3 col-12 col-md-12 mx-auto border-info" style="border-radius:2.5rem;">
            <img src="{{ asset('uploads/settings/vet-img.jpg') }}" class="card-img-top my-5">
        </div>
    </div>
</div>

<div class="d-flex my-2">
    <a href="{{ route('terms-of-service')}}" class="ml-auto">Terms of Service</a>
    <div class="border-right ml-2 border-dark"></div>
    <a href="{{ route('privacy-policy')}}" class="mr-auto ml-2">Privacy Policy</a>
</div>

<div class="card-footer col-lg-12 text-center cite" style="background-color:#021f53; color:white;">
    Copyright <i class="fa-solid fa-copyright"></i> Nano Vet 2015
</div>

@endsection
@section('pre-css')
<link href="{{ asset('css/user.css') }}" rel="stylesheet">
@endsection