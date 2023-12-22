<!doctype html>
<html lang="en">

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Vivo - Responsive Bootstrap 5 Dashboard Template">
		<meta name="author" content="Bootstrap Gallery" />
		<link rel="canonical" href="https://www.bootstrap.gallery/">
		<meta property="og:url" content="https://www.bootstrap.gallery">
		<meta property="og:title" content="Admin Templates - Dashboard Templates | Bootstrap Gallery">
		<meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
		<meta property="og:type" content="Website">
		<meta property="og:site_name" content="Bootstrap Gallery">
        <link rel="shortcut icon" href="{{ asset('images/favicon.svg') }}">


		<!-- Title -->
		<title>Vivo Admin Template - Admin Dashboard</title>


		<!-- *************
			************ Common Css Files *************
		************ -->

		<!-- Animated css -->
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

		<!-- Bootstrap font icons css -->
        <link rel="stylesheet" href="{{ asset('fonts/bootstrap/bootstrap-icons.css') }}">

		<!-- Main css -->
        <link rel="stylesheet" href="{{ asset('css/main.min.css') }}">


		<!-- *************
			************ Vendor Css Files *************
		************ -->

		<!-- Scrollbar CSS -->
        <link rel="stylesheet" href="{{ asset('vendor/overlay-scroll/OverlayScrollbars.min.css') }}">

		<!-- Date Range CSS -->
        <link rel="stylesheet" href="{{ asset('vendor/daterange/daterange.css') }}">

		<!-- Uploader CSS -->
        <link rel="stylesheet" href="{{ asset('vendor/dropzone/dropzone.min.css') }}">

	</head>

	<body>

		<!-- Loading wrapper start -->
		<!-- <div id="loading-wrapper">
			<div class="spinner">
                <div class="line1"></div>
				<div class="line2"></div>
				<div class="line3"></div>
				<div class="line4"></div>
				<div class="line5"></div>
				<div class="line6"></div>
            </div>
		</div> -->
		<!-- Loading wrapper end -->


		<!-- Page wrapper start -->
		<div class="page-wrapper">

			<!-- Sidebar wrapper start -->
			<nav class="sidebar-wrapper">

            <!-- Sidebar brand starts -->
            <div class="sidebar-brand">
                <a href="{{ url('/') }}" class="logo">
                    <img src="{{ asset('images/logo.svg') }}" alt="Melon Admin Dashboard" />
                </a>
            </div>
            <!-- Sidebar brand starts -->

				<!-- Sidebar menu starts -->
				<div class="sidebar-menu">
					<div class="sidebarMenuScroll">
						<ul>

                            <li class="">
								<a href="{{route('category.index')}}">
									<i class="bi bi-collection"></i>
									<span class="menu-text">Categories</span>
								</a>
							</li>
                            @auth('admin')
                        <li class="">
                            <a href="{{route('showSellers')}}">
                                <div class="icon">
                                    <i class="bi bi-people"></i>
                                </div>
                                <span class="menu-text">Sellers</span>
                            </a>
                        </li>
                        @endauth

						</ul>
					</div>
				</div>
				<!-- Sidebar menu ends -->

			</nav>
			<!-- Sidebar wrapper end -->

			<!-- *************
				************ Main container start *************
			************* -->
			<div class="main-container">

				<!-- Page header starts -->
				<div class="page-header">

					<div class="toggle-sidebar" id="toggle-sidebar"><i class="bi bi-list"></i></div>

					<!-- Breadcrumb start -->
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
                            <a href="account-settings.html" class="current-page">Admin Account Settings </a>
</li>
					</ol>
					<!-- Breadcrumb end -->

					<!-- Header actions ccontainer start -->
					<div class="header-actions-container">





						<!-- Header actions start -->
						<ul class="header-actions">

							<li class="dropdown">
								<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
									<span class="user-name d-none d-md-block">
                                        @auth('admin')
                                        <span class="user-name d-none d-md-block">{{ Auth::guard('admin')->user()->name }}</span>
                                       @else
                                       <span class="user-name d-none d-md-block">{{ Auth::user()->name }}</span>
                                        @endauth

                                    </span>
									<span class="avatar">
                                        <img src="{{ asset('images/' . Auth::guard('admin')->user()->image_url) }}" alt="Admin Templates">
									</span>
								</a>
								<div class="dropdown-menu dropdown-menu-end" aria-labelledby="userSettings">
									<div class="header-profile-actions">



                                        <a href="/account-settings-admin">Profile</a>



                                        <form method="POST" action="{{ route('admin.logout') }}">
                                            @csrf

                                            <x-dropdown-link :href="route('admin.logout')"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                            {{('Log Out')}}
                                            </x-dropdown-link>
                                        </form>

                                    						</div>
								</div>
							</li>
						</ul>
						<!-- Header actions end -->

					</div>
					<!-- Header actions ccontainer end -->


				</div>
				<!-- Content wrapper scroll start -->
				<div class="content-wrapper-scroll">

					<!-- Content wrapper start -->
					<div class="content-wrapper">

						<!-- Row start -->
						<div class="row">

							<div class="col-xl-12">
								<!-- Card start -->
								<div class="card">
									<div class="card-body">
										<!-- Row start -->
										<div class="row">

											<div class="col-xxl-8 col-lg-7 col-md-6 col-sm-12 col-12">
                                                <form method="POST" action="{{ route('admins.update', ['admin' =>  Auth::guard('admin')->user()->id]) }}" enctype="multipart/form-data" >
                                                    @csrf
                                                    @method('PUT')
												<div class="row">
													<div class="col-sm-6 col-12">
														<div class="d-flex flex-row">

															<img src="{{ asset('images/' .  Auth::guard('admin')->user()->image_url) }}" class="img-fluid change-img-avatar" alt="Image">

														</div>
													</div>
												</div>
                                                <div class="card">
                                                    <div class="card-body">
                                                <div class="">
                                                    <label for="First-Name" class="form-label">Choose new Image (Optional)</label>
                                                    <input type="file" name="image_url" class="form-control" aria-label="file example" >
                                                </div>
                                            </div>
                                             </div>
												<div class="row">
													<div class="col-xxl-4 col-sm-6 col-12">
														<!-- Form Field Start -->
														<div class="mb-3">
															<label for="name" class="form-label"> Name</label>
															<input type="text" class="form-control" name="name"  id="name" placeholder=" Name" value="{{ Auth::guard('admin')->user()->name }}">
														</div>
													</div>

													<div class="col-xxl-4 col-sm-6 col-12">
														<!-- Form Field Start -->
														<div class="mb-3">
															<label for="email" class="form-label">Email </label>
															<input type="email" class="form-control" id="email" name="email"  value={{Auth::guard('admin')->user()->email}} required autocomplete="email">
														</div>
													</div>

													<div class="col-xxl-4 col-sm-6 col-12">
														<!-- Form Field Start -->
														<div class="mb-3">
															<label for="enterPassword" class="form-label">New Password</label>
															<input type="password" class="form-control" id="enterPassword" name="password"
																placeholder="Enter New Password">
														</div>
													</div>
                                                    <div class="col-xxl-4 col-sm-6 col-12">
                                                    <div class="mb-3">
                                                        <div class="d-flex justify-content-between">
                                                            <label class="form-label">New Password Confirm</label>

                                                        </div>
                                                        <input type="password" class="form-control"  name="password_confirmation"  autocomplete="new-password">
                                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                                    </div>
                                                    </div>
												</div>
											</div>

                                            <div class="col-sm-12 col-12 m-1">
                                                <hr>
                                                <button class="btn btn-info" type="submit">Save Changes</button>
                                            </div>
                                            <br>
                                            </form>
                                                                                    </div>
										<!-- Row end -->

									</div>
								</div>
								<!-- Card end -->
							</div>
						</div>
						<!-- Row end -->


					</div>
					<!-- Content wrapper end -->

					<!-- App Footer start -->
					<div class="app-footer">
						<span>© Bootstrap Gallery 2023</span>
					</div>
					<!-- App footer end -->

				</div>
				<!-- Content wrapper scroll end -->

			</div>
			<!-- *************
				************ Main container end *************
			************* -->

		</div>
		<!-- Page wrapper end -->

	<!-- Required jQuery first, then Bootstrap Bundle JS -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/modernizr.js') }}"></script>
<script src="{{ asset('js/moment.js') }}"></script>

<!-- Overlay Scroll JS -->
<script src="{{ asset('vendor/overlay-scroll/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('vendor/overlay-scroll/custom-scrollbar.js') }}"></script>

<!-- Date Range JS -->
<script src="{{ asset('vendor/daterange/daterange.js') }}"></script>
<script src="{{ asset('vendor/daterange/custom-daterange.js') }}"></script>

<!-- Dropzone JS -->
<script src="{{ asset('vendor/dropzone/dropzone.min.js') }}"></script>

<!-- Main Js Required -->
<script src="{{ asset('js/main.js') }}"></script>


	</body>

</html>
