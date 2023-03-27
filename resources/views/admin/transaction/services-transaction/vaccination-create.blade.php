@extends('layouts.admin')

@section('title', 'Vaccination Transaction')

@section('content')
{{-- VACCINATION --}}
<div class="container-fluid m-0">
	<h3 class="mt-3"><a href="{{route('transaction.service')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Service Transaction List</a></h3>
	<hr class="hr-thick" style="border-color: #707070;">
	<div class="card mx-auto">
		<h3 class="card-header text-white gbg-1"><i class="fa-solid fa-square-plus mr-2 fa-lg"></i>Vaccination Transaction</h3>

		<div class="col-lg-12 col-md-12 col-12 mt-3 row">
			{{-- REFERENCE NO --}}
			<div class="form-group col-6 col-lg-6 col-md-4 ml-auto">
				<label class="important font-weight-bold text-1" for="ref_no">Reference No</label>
				<input class="form-control" type="text" name="ref_no" value="{{old('ref_no')}} " />
			</div>

			{{-- MODE OF PAYMENT --}}
			<div class="form-group col-6 col-lg-6 col-md-4 mr-auto">
				<label class="important font-weight-bold text-1" for="select">Mode of Payment</label>
				<select id="select" class="form-control" name="mop">
					<option>Select mode of payment</option>
					<option>Cash</option>
					<option>Paymaya</option>
					<option>Gcash</option>
				</select>
			</div>
		</div>

		<div class="card-body col-lg-12 col-12 col-md-12 mx-auto" id="form-area-vaccination">
			<div class="row position-relative border border-secondary mb-3" id="orig-vaccine">

				{{-- PET NAME  --}}
				<div class="col-lg-4 col-md-6 col-6 mt-3">
					<label class="important font-weight-bold text-1" for="pet_name">Pet Name</label>
					<div class="input-group mb-3">
						<select class="custom-select text-1" id="inputGroupSelect01">
							<option selected name="pet_name" value="{{old('pet_name')}}"></option>
						</select>
					</div>
				</div>

				{{-- Vaccine Type --}}
				<div class="col-lg-4 col-md-6 col-6 mt-3">
					<label class="important font-weight-bold text-1" for="vaccine_type">Vaccine Type</label>
					<div class="input-group mb-3">
						<select class="custom-select text-1" name="vaccine_type" id="inputGroupSelect01">
							<optgroup label="">
								<option data-price="" value=""></option>
							</optgroup>
						</select>
					</div>
				</div>

				{{-- Expiration Date  --}}
				<div class="col-lg-2 col-md-6 col-6 mt-3">
					<label class="important font-weight-bold text-1" for="expire_date">Expiration Date</label>
					<input type="date" class="form-control" name="expire_date" aria-label="date" aria-describedby="basic-addon1">
				</div>

				{{-- Price --}}
				<div class="col-lg-2 col-md-6 col-6 mt-3">
					<label class="important font-weight-bold text-1" for="price">Price</label>
					<input type="number" class="form-control" name="price" aria-label="currency" aria-describedby="basic-addon1" readonly>
				</div>
			</div>
		</div>

		{{-- TOTAL AMOUNT --}}
		<div class="col-12 col-lg-4 col-md-4 ml-auto mb-5">
			<label class="important  font-weight-bold text-1" for="total_amt">Total Amount</label>
			<div class="input-group flex-nowrap">
				<div class="input-group-prepend">
					<span class="input-group-text">₱</span>
				</div>
				<div class="input-group-append flex-fill">
					<div class="input-group">
						<input type="number" data-type="currency" name="total_amt" class="form-control" readonly>
					</div>
				</div>
			</div>
		</div>

		{{-- FOOTER --}}
		<div class="card-footer d-flex flex-column">
			<div class="form-group col-6 mx-auto">
				<button class="card mx-auto w-100 h-100 d-flex" type="button" style="border-style: dashed; border-width: .25rem;" id="addVacc">
					<span class="m-auto  font-weight-bold text-1"><i class="fa-solid fa-circle-plus mr-2"></i>Add Vaccination</span>
				</button>
			</div>

			<div class="col-4 my-2 mx-auto text-center">
				<button class="btn btn-outline-info btn-sm w-25"><a href="#"></a>Save</button>
				<a href="#" class="btn btn-outline-danger btn-sm w-25">Cancel</a>
			</div>
		</div>
	</div>
</div>
{{-- VACCINATION ENDS HERE --}}
@endsection
@section('scripts')
<script type="text/javascript">
	$(document).ready(() => {
		// Adding and Removing Variations
		$(document).on('click', '#addVacc', (e) => {
			let obj = $(e.currentTarget);
			let form = $("#orig-vaccine");
			let container = $("#form-area-vaccination");
			let formCopy = form.clone();

			let remove = $(`
				<span class="position-absolute cursor-pointer" onclick="$(this).parent().remove();" style="top: -1rem; right: -1.125rem;">
				<i class="fas fa-circle-xmark fa-lg p-2 text-custom-1"></i>
				</span>
				`);

			formCopy.append(remove);
			formCopy.removeAttr("id");
			formCopy.find("textarea, input").val("");
			container.append(formCopy);
		});
	});
</script>

@endsection