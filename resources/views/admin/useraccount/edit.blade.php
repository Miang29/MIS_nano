@extends('layouts.admin')

@section('title', 'User Account')

@section('content')
<div class="container-fluid m-0">
	<h2 class="text-center text-lg-left mx-0 mx-lg-5 my-4">
		<a href="{{ route('user.index') }}" class="text-decoration-none text-1"><i class="fas fa-chevron-left mr-2"></i>Users</a>
	</h2>
	<hr class="hr-thick" style="border-color: #707070;">

	<div class="col-12 my-2 mx-auto">
		<div class="card mx-auto">
			<h5 class="card-header text-center text-white gbg-1"> Edit User Account</h5>

			<div class="card-body d-flex">
				<div class="form-group mx-auto w-75 ">

					<div class="col-12">
						<div class="row">
							{{-- FIRST NAME --}}
							<div class="col-4 col-md-9 col-lg-6 mx-auto">
								<div class="form-group">
									<label class="important font-weight-bold text-1 important">First Name</label>
									<input class="form-control" type="text" name="first_name" value="{{ old('first_name') }}" />
									<small class="text-danger small">{{ $errors->first('first_name') }}</small>
								</div>
							</div>

							{{-- MIDDLE NAME --}}
							<div class="col-4 col-md-9 col-lg-6 mx-auto">
								<div class="form-group">
									<label class="font-weight-bold text-1">Middle Name</label>
									<input class="form-control" type="text" name="middle_name" value="{{ old('middle_name') }}" />
									<small class="text-danger small">{{ $errors->first('middle_name') }}</small>
								</div>
							</div>


							{{-- LAST NAME --}}
							<div class="col-4 col-md-9 col-lg-6 mx-auto">
								<div class="form-group">
									<label class="important font-weight-bold text-1 important">Last Name</label>
									<input class="form-control" type="text" name="last_name" value="{{ old('last_name') }}" />
									<small class="text-danger small">{{ $errors->first('last_name') }}</small>
								</div>
							</div>


							{{-- SUFFIX --}}
							<div class="col-4 col-md-9 col-lg-6 mx-auto">
								<div class="form-group">
									<label class="font-weight-bold text-1">Suffix</label>
									<input class="form-control" type="text" name="suffix" value="{{ old('suffix') }}" />
									<small class="text-danger small">{{ $errors->first('suffix') }}</small>
								</div>
							</div>
						</div>

							<div class="row">
								{{-- EMAIL --}}
								<div class="col-12 col-md-9 col-lg-4  form-group">
									<label class="important font-weight-bold text-1">E-mail</label>
									<input class="form-control" type="email" name="email" value="{{ old('email') }}" />
									<small class="text-danger small">{{ $errors->first('email') }}</small>
								</div>

								{{-- USER TYPE --}}
								<div class="col-12 col-md-9 col-lg-4  form-group">
									<label class="important font-weight-bold text-1">User Type</label><br>
									<select class="form-control custom-select text-1" name="user_type">
										@forelse ($types as $t)
										<option value="{{ $t->id }}" {{ old('user_type') == $t->id ? 'selected' : '' }}>{{ $t->name }}</option>
										@empty
										<option selected>-- NO OPTION --</option>
										@endforelse
									</select><br>
									<small class="text-danger small">{{ $errors->first('user_type') }}</small>
								</div>

								{{-- USERNAME --}}
								<div class="col-12 col-md-9 col-lg-4 form-group">
									<label class="important font-weight-bold text-1">Username</label>
									<input class="form-control" type="text" name="username" value="{{ old('username') }}" />
									<small class="text-danger small">{{ $errors->first('username') }}</small>
								</div>
							</div>

						<div class="row">
							{{-- PASSWORD --}}
							<div class="col-4 col-md-9 col-lg-6 mx-auto">
								<label class="important font-weight-bold text-1">Password</label>
								<div class="input-group">
									<input class="form-control" type="password" name="password" id="password" aria-label="Password" aria-describedby="toggle-show-password" value="{{ old('password') ? old('password') : $password }}" />

									<div class="input-group-append">
										<button type="button" class="btn btn-light form-border border-left-0 floating-eye-pass" id="toggle-show-password" aria-label="Show Password" data-target="#password">
											<i class="fas fa-eye d-none" id="show"></i>
											<i class="fas fa-eye-slash" id="hide"></i>
										</button>
									</div>
								</div>
								<small class="text-danger small">{{ $errors->first('password') }}</small>
							</div>

							{{-- CONFIRM PASSWORD --}}
							<div class="col-4 col-md-9 col-lg-6 ml-auto">
								<label class="important font-weight-bold text-1 my-2">Confirm Password</label>
								<div class="input-group">
									<input class="form-control" type="password" name="password_confirmation" id="password_confirmation" aria-label="Password_Confirmation" aria-describedby="toggle-show-password" value="{{ old('password') ? old('password') : $password }}" />

									<div class="input-group-append">
										<button type="button" class="btn btn-light form-border border-left-0 floating-eye-pass" id="toggle-show-password" aria-label="Show Password" data-target="#password_confirmation">
											<i class="fas fa-eye d-none" id="show"></i>
											<i class="fas fa-eye-slash" id="hide"></i>
										</button>
									</div>
								</div>
								<small class="text-danger small">{{ $errors->first('password') }}</small>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="card-footer d-flex">
	<div class="col-6 mx-auto  text-center">
		<button class="btn btn-outline-info  btn-sm  w-25 "><a href="#"></a>Save</button>
		<a href="javascript:void(0);" onclick="confirmLeave('{{ route('user.index') }}');" class="btn btn-outline-danger btn-sm w-25">Cancel</a>
	</div>
</div>
</div>
</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/login.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
@endsection