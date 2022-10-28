<div class="d-flex flex-row dark-shadow position-absolute position-lg-relative h-100 w-100 w-lg-auto" style="overflow: hidden;">
	{{-- Navigation Bar (SIDE) --}}
	<div class="sidebar dark-shadow custom-scroll d-flex flex-column py-3 px-0 collapse-horizontal overflow-y-auto h-100 bg-white" id="sidebar" aria-labelledby="sidebar-toggler" aria-expanded="false">
		{{-- DASHBOARD --}}
		@if (\Request::is('dashboard'))
		<span class="bg-1 text-white"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</span>
		@elseif (\Request::is('dashboard/*'))
		<a class="text-decoration-none aria-link bg-col text-white" href="{{ route('dashboard') }}" aria-hidden="false" aria-label="Dashboard"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
		@else
		<a class="text-decoration-none text-dark font-weight-bold aria-link" href="{{ route('dashboard') }}" aria-hidden="false" aria-label="Dashboard"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
		@endif

		{{-- ADMIN SETTING AREA --}}
		{{-- @if (Auth::user()->isAdmin()) --}}
		<hr class="w-100 custom-hr">

		{{-- Reservation --}}
		{{-- @if (Auth::user()->isAdmin()) --}}
		@if (\Request::is('admin/reservation'))
		<span class="bg-secondary text-white"><i class="fa-solid fa-calendar mr-2"></i> Reservation</span>
		@elseif (\Request::is('admin/reservation/*'))
		<a class="text-decoration-none aria-link bg-secondary text-white" href="{{route('reservation')}}" aria-hidden="false" aria-label="Reservation"><i class="fa-solid fa-calendar mr-2"></i>Reservation</a>
		@else
		<a class="text-decoration-none text-1 font-weight-bold aria-link" href="{{route('reservation')}}" aria-hidden="false" aria-label="Reservation"><i class="fa-solid fa-calendar mr-2"></i>Reservation</a>
		@endif
		{{-- @endif --}}


		{{-- Services --}}
	
			<a class="btn text-decoration-none text-1 font-weight-bold aria-link text-left" aria-label="Services" data-toggle="collapse" href="#collapseItem" role="button" aria-expanded="false" aria-controls="collapseItem">
				<i class="fas fa-list-check mr-2"></i>Services
			</a>
		

		<div class="collapse " id="collapseItem">
			<div class="card card-body">
				<a class="dropdown-item  font-weight-bold" href="{{route('consultation')}}"><i class="fa-solid fa-stethoscope mr-1"></i>Consultation</a>
				<a class="dropdown-item font-weight-bold" href="{{route('vaccination')}}"><i class="fa-solid fa-syringe mr-1"></i>Vaccination</a>
				<a class="dropdown-item font-weight-bold" href="{{route('boarding')}}"><i class="fa-solid fa-shield-dog mr-1"></i>Pet Boarding</a>
				<a class="dropdown-item font-weight-bold" href="{{route('grooming')}}"><i class="fa-solid fa-scissors mr-1"></i>Pet Grooming</a>
			</div>
		</div>

		{{-- @endif --}}


		{{-- Transaction --}}
		{{-- @if (Auth::user()->isAdmin()) --}}
		@if (\Request::is('admin/transaction'))
		<span class="bg-secondary text-white"><i class="fa-solid fa-money-check-dollar mr-2"></i>Transaction</span>
		@elseif (\Request::is('admin/transaction/*'))
		<a class="text-decoration-none text-white bg-secondary aria-link" href="{{route('transaction')}}" aria-hidden="false" aria-label="Transaction"><i class="fa-solid fa-money-check-dollar mr-2"></i>Transaction</a>
		@else
		<a class="text-decoration-none text-1 font-weight-bold aria-link" href="{{route('transaction')}}" aria-hidden="false" aria-label="Transaction"><i class="fa-solid fa-money-check-dollar mr-2"></i>Transaction</a>
		@endif
		{{-- @endif --}}

		{{-- Inventory --}}
		{{-- @if (Auth::user()->isAdmin()) --}}
		@if (\Request::is('admin/inventory'))
		<span class="bg-secondary text-white"><i class="fa-solid fa-warehouse mr-2"></i>Inventory</span>
		@elseif (\Request::is('admin/inventory/*'))
		<a class="text-decoration-none text-white bg-secondary aria-link" href="" aria-hidden="false" aria-label="Transaction"><i class="fa-solid fa-warehouse mr-2"></i>Inventory</a>
		@else
		<a class="text-decoration-none text-1 font-weight-bold aria-link" href="" aria-hidden="false" aria-label="Transaction"><i class="fa-solid fa-warehouse mr-2"></i>Inventory</a>
		@endif
		{{-- @endif --}}

		{{-- Reports --}}
		{{-- @if (Auth::user()->isAdmin()) --}}
		@if (\Request::is('admin/reports'))
		<span class="bg-secondary text-white"><i class="fa-solid fa-chart-simple mr-2"></i>Reports</span>
		@elseif (\Request::is('admin/reports/*'))
		<a class="text-decoration-none text-white bg-secondary aria-link" href="" aria-hidden="false" aria-label="Reports"><i class="fa-solid fa-chart-simple mr-2"></i>Reports</a>
		@else
		<a class="text-decoration-none text-1 font-weight-bold aria-link" href="@{{ route('admin.users.index') }}" aria-hidden="false" aria-label="Reports"><i class="fa-solid fa-chart-simple mr-2"></i>Reports</a>
		@endif
		{{-- @endif --}}


		{{-- USERS --}}
		{{-- @if (Auth::user()->isAdmin()) --}}
		@if (\Request::is('admin/users'))
		<span class="bg-secondary text-white"><i class="fas fa-user-alt mr-2"></i>Users</span>
		@elseif (\Request::is('admin/users/*'))
		<a class="text-decoration-none text-white bg-secondary aria-link" href="@{{ route('admin.users.index') }}" aria-hidden="false" aria-label="Users"><i class="fas fa-user-alt mr-2"></i>Users</a>
		@else
		<a class="text-decoration-none text-1 font-weight-bold aria-link" href="@{{ route('admin.users.index') }}" aria-hidden="false" aria-label="Users"><i class="fas fa-user-alt mr-2"></i>Users</a>
		@endif
		{{-- @endif --}}

		{{-- SETTINGS --}}
		{{-- @if (Auth::user()->isAdmin()) --}}
		@if (\Request::is('admin/settings'))
		<span class="bg-secondary text-white"><i class="fas fa-gear mr-2"></i>Settings</span>
		@elseif (\Request::is('admin/settings/*'))
		<a class="text-decoration-none text-white bg-secondary aria-link" href="@{{ route('admin.settings.index') }}" aria-hidden="false" aria-label="Settings"><i class="fas fa-gear mr-2"></i>Settings</a>
		@else
		<a class="text-decoration-none text-1 font-weight-bold aria-link" href="@{{ route('admin.settings.index') }}" aria-hidden="false" aria-label="Settings"><i class="fas fa-gear mr-2"></i>Settings</a>
		@endif
		{{-- @endif --}}
		{{-- @endif --}}

		{{-- SIGNOUT --}}
		<hr class="w-100 custom-hr">

		<a class="text-decoration-none text-1 font-weight-bold aria-link" href="@{{ route('logout') }}" aria-hidden="false" aria-label="Logout"><i class="fas fa-sign-out-alt mr-2"></i>Sign Out</a>
	</div>
</div>