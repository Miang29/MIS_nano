{{-- Navigation Bar (TOP) --}}
<nav class="navbar navbar-expand-lg navbar-light bg-white position-sticky position-lg-relative dark-shadow py-0 px-3" style="z-index: 1000;">
	<div class="container-fluid">
		{{-- Branding --}}
		<a class="navbar-brand m-0 py-0 font-weight-bold text-1" href="{{route('dashboard')}}" style="height: auto;">
			<img src="{{ asset('uploads/settings/banner.png') }}" style="max-height: 2.25rem;" class="m-0 p-0" alt="MIS Nano" data-fallback-img="{{ asset('uploads/settings/default.png') }}" />
		</a>

		<div class="d-flex flex-row">
			{{-- Navbar contents --}}
			<div class="navbar-collapse" id="navbar">
				<div class="ml-auto">
					<label class='my-auto'>
						<div class="dropdown">
							<a href='#' role="button" class="nav-link dropdown-toggle text-dark my-auto" style="font-size: 1.25rem;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								{{ Auth::user()->getName() }}
							</a>

							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="{{ route('home') }}">View Page</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="{{ route('logout') }}">Sign out</a>
							</div>
						</div>
					</label>
				</div>
			</div>

			{{-- Navbar Toggler --}}
			<button class="sidebar-toggler" type="button" data-toggle="sidebar-collapse" data-target="#sidebar" aria-controls="sidebar" aria-label="Toggle Sidebar" id="sidebar-toggler">
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>
	</div>
</nav>