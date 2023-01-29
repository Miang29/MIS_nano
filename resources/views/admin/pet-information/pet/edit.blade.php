@extends('layouts.admin')

@section('title', 'Pet Profile')

@section('content')
<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
<h3 class="mt-3"><a href="{{route('pet-information.pet.show', [1] )}}
" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Pet List</a></h3>
    <hr class="hr-thick" style="border-color: #707070;">
    <div class="col-12 my-2 mx-auto">
        <div class="card mx-auto">
            <h5 class="card-header text-center text-white bg-1"> Edit Pet Information</h5>

            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-6 d-flex">
                        <div class="form-group text-center text-lg-left mx-auto image-input-group">
                            <label class="h2  text-1  ml-5" for="image">Pet Image</label><br>
                            <img src="{{ asset('images/UI/placeholder.jpg') }}" class="img-fluid cursor-pointer border" style="border-width: 0.25rem!important; max-height: 16.25rem;" alt="Pet Image">
                            <br><br>
                            <input type="file" name="image[]" class="hidden" accept=".jpg,.jpeg,.png"><br>
                            <small class="text-muted"><b>FORMATS ALLOWED:</b> JPEG, JPG, PNG</small>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="form-group ">
                            <div class="col-12 col-md-9 col-lg-12 mx-auto">
                                <label class="important text-1" for="petname">Pet Name</label>
                                <input class="form-control" type="text" name="petname[]" />
                            </div>

                            <div class="col-12 col-md-9 col-lg-12 mx-auto">
                                <label class="important text-1" for="breed">Breed</label>
                                <input class="form-control" type="text" name="breed[]" />
                            </div>

                            <div class="row d-flex justify-content-center">
                                <div class="col-md-9 col-lg-11 col-12 my-3 mx-auto">
                                    <label class="h6 font-weight-bold text-1 important" for="colors">Colors</label>
                                    <select name="colors[]" id="choices-multiple-remove-button" placeholder="Select Pet color" multiple>
                                        <option value="#FFFff">White</option>
                                        <option value="#00000">Black</option>
                                        <option value="#C1C1C1">Ash Gray</option>
                                        <option value="#FFFDD0">Cream</option>
                                        <option value="#D2691E">Cinnamon</option>
                                        <option value="#E5AA70">Fawn</option>
                                        <option value="#964B00">Brown</option>
                                    </select>
                                </div>
                                <small class="text-danger small">{{ $errors->first('colors') }}</small>
                            </div>

                            <div class="col-12 col-md-9 col-lg-12 mx-auto">
                                <label class="important text-1 my-2" for="bday">Birthdate</label>
                                <input class="form-control " type="date" name="bday[]" />
                            </div>

                            <div class="col-12 col-md-9 col-lg-12 mx-auto">
                                <label class="important text-1 my-2" for="species">Species</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select  text-1" id="inputGroupSelect01">
                                        <option selected name="species"></option>
                                        <option value="1">Cat</option>
                                        <option value="2">Dog</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-9 col-lg-12 mx-auto">
                                <label class="important text-1 " for="species">Gender</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select  text-1" id="inputGroupSelect01">
                                        <option selected name="gender[]"></option>
                                        <option value="1">Female</option>
                                        <option value="2">Male</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-9 col-lg-12 mx-auto">
                                <label class="important text-1" for="species">Type</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select  text-1" id="inputGroupSelect01">
                                        <option selected name="types"></option>
                                        <option value="1">Tame</option>
                                        <option value="2">Wild</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/select.js') }}"></script>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/util/admin.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/util/image-input.css') }}" />
@endsection