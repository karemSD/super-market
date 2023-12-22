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
        <form method="POST" action="{{ route('admin.password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

			<div class="login-box">
				<div class="login-form">
					<a href="" class="login-logo">
                        <img src="{{ asset('images/logo.svg') }}" alt="Melon Admin Dashboard" />
					</a>
					<div class="login-welcome">
						Welcome back, <br />Please enter your email with your new password .
					</div>
					<div class="mb-3">
						<label class="form-label" >Admin Email</label>
						<input type="email"  name="email" class="form-control"required autofocus>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

					</div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <label class="form-label">Password</label>

                        </div>
                        <input type="password" class="form-control" name="password" required>
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
						<button type="submit" class="btn"> <span class="icon"> <i class="bi bi-arrow-right-circle"></i> </span>
							Reset Password</button>
					</div>

				</div>
			</div>
		</form>
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
