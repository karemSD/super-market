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

<style>
   .btn2 {
      padding: 10px 20px;
      color: #000;
      background-color: #e0e0e0;
      border-radius: 15px;
      border: 1px solid #fff;
      cursor: pointer;
    }
.icon img {
      height: 20px;
      margin-right: 5px;
    }


</style>
	</head>


	<body class="login-container">

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

		<!-- Login box start -->

			<div class="login-box">

				<div class="login-form">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

					<a href="" class="login-logo">
                        <img src="{{ asset('images/logo.svg') }}" alt="Melon Admin Dashboard" />
					</a>
					<div class="login-welcome">
						Welcome back, <br />Please login to your  Seller account.
					</div>
					<div class="mb-3">
						<label class="form-label">Email</label>
						<input type="email" name="email" class="form-control">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

					</div>
					<div class="mb-3">
						<div class="d-flex justify-content-between">
							<label class="form-label">Password</label>
                            @if (Route::has('password.request'))
							<a href="{{ route('password.request') }}" class="btn-link ml-auto">Forgot password?</a>
                            @endif
						</div>
						<input type="password" name="password" class="form-control" required>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
					</div>
					<div class="login-form-actions">

						<button type="submit" class="btn"> <span class="icon"> <i class="bi bi-arrow-right-circle"></i> </span>
							Login</button>
					</div>
                </form>
                <a href="{{route('google-auth')}}" class="btn2">
                    <span class="icon">
                      <img src="{{asset('images/auth/google.png')}}" alt="Google Icon">
                    </span>
                    Login With Google
                  </a>
				</div>
			</div>
		<!-- Login box end -->

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

<!-- Main Js Required -->
<script src="{{ asset('js/main.js') }}"></script>


	</body>

</html>
