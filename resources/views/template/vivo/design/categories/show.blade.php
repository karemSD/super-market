

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

	</head>

	<body>

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

@auth('admin')
@else
							<li class="">
								<a href="{{route('cart.index')}}">
									<i class="bi bi-handbag"></i>
									<span class="menu-text">Cart</span>
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
                            <li class="breadcrumb-item breadcrumb-active" aria-current="page"> Category Name</li>
					</ol>
					<!-- Breadcrumb end -->

					<!-- Header actions ccontainer start -->
					<div class="header-actions-container">




						<!-- Header actions start -->
						<ul class="header-actions">

							<li class="dropdown">
								<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                                        @auth('admin')
                                        <span class="user-name d-none d-md-block">{{ Auth::guard('admin')->user()->name }}</span>
                                       @else
                                       <span class="user-name d-none d-md-block">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                                        @endauth
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
										<a href="/account-settings">Profile</a>
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
                                        <div class="card-title">Our Markets</div>
                                        @auth('admin')
                                        <div class="ml-auto">
                                            <a href="{{ route('company.create',['category' => $category->id])}}" class="btn btn-success">Add New Market</a>
                                        </div>


                                        <form action="{{ route('category.destroy', ['category' => $category->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete Category</button>
                                        </form>
                                        @endauth
										<div class="ml-auto">
											<a href="{{route('category.index')}}" class="btn btn-dark">Back to Categories</a>
										</div>


									</div>
									<div class="card-body">

										<!-- Row start -->
<div class="row">
    @foreach($category->companies as $company)
        <div class="col-xxl-6 col-sm-9 col-9">
            <div class="product-added-card">
                <img class="product-added-img" src="{{ asset('images/' . $company->image_url) }}" alt="{{ $company->name }}">
                <div class="product-added-card-body">
                    <h4>{{ $company->name }}</h4>
                    <p>Number of products: <strong style="color: blue;">{{ $company->products->count() }}</strong></p>

                    <div class="product-added-actions">
                        <a href="{{route('company.show', ['company' => $company->id])}}">
                            <button class="btn btn-info">See Products</button>
                        </a>
                    </div>
                    <br>
                    @auth('admin')
                    <div class="product-added-actions">
                        <a href="{{route('company.edit', ['company' => $company->id])}}">
                            <button class="btn btn-warning">Edit</button>
                        </a>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    @endforeach
</div>

										<!-- Row end -->

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

<!-- Vendor Js Files -->
<!-- Overlay Scroll JS -->
<script src="{{ asset('vendor/overlay-scroll/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('vendor/overlay-scroll/custom-scrollbar.js') }}"></script>

<!-- Main Js Required -->
<script src="{{ asset('js/main.js') }}"></script>

<!-- Product Js -->
<script src="{{ asset('js/product.js') }}"></script>


	</body>

</html>
