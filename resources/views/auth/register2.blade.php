
<!doctype html>
<html lang="en">

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Melon - Responsive Bootstrap 5 Dashboard Template">
    <meta name="author" content="Bootstrap Gallery" />
    <link rel="canonical" href="https://www.bootstrap.gallery/">
    <meta property="og:url" content="https://www.bootstrap.gallery">
    <meta property="og:title" content="Admin Templates - Dashboard Templates | Bootstrap Gallery">
    <meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:type" content="Website">
    <meta property="og:site_name" content="Bootstrap Gallery">
    <link rel="shortcut icon" href="{{ asset('images/favicon.svg') }}">

    <!-- Title -->
    <title>Melon Admin Template - Admin Dashboard</title>

    <!-- *************
        ************ Common Css Files *************
    ************ -->

    <!-- Animated css -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }} ">

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
                    <div class="icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <span
                    class="menu-text">Sellers</span>
                    </li>
                    <li class="breadcrumb-item breadcrumb-active" aria-current="page"> Create New Seller</li>
                </ol>
            <!-- Breadcrumb end -->

            <!-- Header actions ccontainer start -->
            <div class="header-actions-container">




                <!-- Header actions start -->
                <ul class="header-actions">

                    <li class="dropdown">
                        <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                            <span class="user-name d-none d-md-block">{{ Auth::guard('admin')->user()->name }}</span>
                            <span class="avatar">
                                @auth('admin')
<img src="{{ asset('images/' . Auth::guard('admin')->user()->image_url) }}" alt="Admin Templates">
@else
<img src="{{ asset('images/' . Auth::user()->image_url) }}" alt="Admin Templates">
@endauth
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
        <!-- Page header ends -->

				<!-- Content wrapper scroll start -->
				<div class="content-wrapper-scroll">

					<!-- Content wrapper start -->
					<div class="content-wrapper">

					<!-- Login box start -->
                   <div class="login-container">
                        <div class="login-box">
                            <div class="login-form">
                                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" >
                                    @csrf

                                    <!-- Name -->

                                <div class="login-welcome">
                                    Seller, <br /> create account form.
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="first_name" required required autofocus autocomplete="name">
                                    <x-input-error :messages="$errors->get('first_name')" class="mt-2" />

                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" required>
                                    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />

                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email"  required >
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="number" class="form-control" name="phone" required>
                                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />

                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Seller Image</label>
                                    <input type="file" name="image_url" class="form-control" aria-label="file example" required>
                                    <x-input-error :messages="$errors->get('image_url')" class="mt-2" />

                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Password</label>

                                    </div>
                                    <input type="password" class="form-control" name="password" required  autocomplete="new-password" >
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Password Confirm</label>

                                    </div>
                                    <input type="password" class="form-control"  name="password_confirmation" required autocomplete="new-password">
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>

                                <div class="login-form-actions">
                                    <button type="submit" class="btn">
                                        <span class="icon"> <i class="bi bi-arrow-right-circle"></i> </span> Create
                                    </button>
                                </div>
                                  </form>
                            </div>
                        </div>
                        <!-- User signup box end -->


					</div>
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

	<!-- *************
    ************ Required JavaScript Files *************
************* -->
<!-- Required jQuery first, then Bootstrap Bundle JS -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/modernizr.js') }}"></script>
<script src="{{ asset('js/moment.js') }}"></script>

<!-- *************
    ************ Vendor Js Files *************
************* -->

<!-- Overlay Scroll JS -->
<script src="{{ asset('vendor/overlay-scroll/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('vendor/overlay-scroll/custom-scrollbar.js') }}"></script>

<!-- Main Js Required -->
<script src="{{ asset('js/main.js') }}"></script>


	</body>

</html>
