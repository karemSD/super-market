
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
    <title>Update Category</title>

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
    	<!-- Uploader CSS -->
		<link rel="stylesheet"  href="{{ asset('vendor/dropzone/dropzone.min.css') }}"/>

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
                            <i class="bi bi-collection"></i>
                            <span class="menu-text">Categories</span>
                            </li>
                            <li class="breadcrumb-item breadcrumb-active" aria-current="page">Update Category</li>
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
                                        <img src="{{ asset('images/' . Auth::guard('admin')->user()->image_url) }}" alt="Admin Templates">
									</span>
								</a>
								<div class="dropdown-menu dropdown-menu-end" aria-labelledby="userSettings">
									<div class="header-profile-actions">

										<a href="/account-settings-admin">Profile</a>
                                        @auth('admin')
                                        <form method="POST" action="{{ route('admin.logout') }}">
                                            @csrf

                                            <x-dropdown-link :href="route('admin.logout')"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                            {{('Log Out')}}
                                            </x-dropdown-link>
                                        </form>
                                        @else
										<form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-dropdown-link :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                            {{('Log Out')}}
                                            </x-dropdown-link>
                                        </form>
                                        @endauth									</div>
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

					<!-- Row start -->
<div class="row">
    <div class="col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Cateogry Information</div>
            </div>
            <div class="card-body">


                <div class="row">
                    <!-- General Information -->
                    <div class="col-sm-6 col-12">
                        <form action="{{ route('category.update', ['category' => $category->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card-border">
                                <div class="card-border-title">General Information</div>
                                <div class="card-border-body">
                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Category Name <span class="text-red">*</span></label>
                                                <input type="text" class="form-control" name="name" placeholder="Enter Category Name" value="{{ $category->name }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="mb-0">
                                                <label class="form-label">Category Description <span class="text-red">*</span></label>
                                                <textarea rows="4" class="form-control" name="description"  placeholder="Enter Category Description">{{ $category->description }}</textarea>
                                            </div>
                                        </div>
                                         <!-- Display the old image name -->
                <div class="col-sm-12 col-12">
                    <label class="form-label">Old Image Name</label>
                    <input type="text" class="form-control" readonly value="{{ $category->image_url }}">
                </div>
                <!-- Input for uploading a new image -->
                <div class="col-sm-12 col-12">
                    <label class="form-label m-1">New Category Image (Optional)</label>
                    <input type="file" class="m-2" name="image_url">
                </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>

                        <!-- Custom Buttons -->
                        <div class="col-sm-12 col-12">
                            <div class="custom-btn-group flex-end">
                                <a href="{{route('category.index')}}" class="btn btn-light">Cancel</a>
                                <button class="btn btn-info" type="submit">Update Category</button>
                            </div>
                    </div>
                </div>
            </form>

            </div>
        </div>
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

<!-- Dropzone JS -->
<script src="{{ asset('vendor/dropzone/dropzone.min.js') }}"></script>

<!-- Main Js Required -->
<script src="{{ asset('js/main.js') }}"></script>


	</body>

</html>
