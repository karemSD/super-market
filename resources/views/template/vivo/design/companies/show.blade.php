
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
                            @auth
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
                            <li class="breadcrumb-item breadcrumb-active" aria-current="page"> {{$company->name}}</li>
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

                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle alert-icon"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif


                                        @if(session('failure'))
										<div class="alert alert-danger alert-dismissible fade show" role="alert">
											<i class="bi bi-x-circle alert-icon"></i>
                                            {{ session('failure') }}
											<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
										</div>
                                        @endif
						<!-- Row start -->
						<div class="row">
							<div class="col-sm-12 col-12">

								<div class="card">
                                    <div class="card-header">
										<div class="card-title">Products List</div>
                                        @auth('admin')
										<div class="ml-auto">
											<a href="{{ route('product.createWithParameter', ['parameter' => $company->id]) }}" class="btn btn-success">Add Product</a>
										</div>
                                        @endauth
									</div>
									<div class="card-body">
										<div class="table-responsive">
                                            <table class="table m-0">
                                                <thead>
                                                    <tr>
                                                        <th>Product Code</th>
                                                        <th>Product Name</th>
                                                        <th>Quantity</th>
                                                        <th>Production Date</th>
                                                        <th>Expiry Date</th>
                                                        <th>Buy Date</th>
                                                        <th>Price</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach($company->products as $product)
                                                    <tr>
                                                        <td>#{{ $product->code }}</td>
                                                        <td>{{ $product->name }}</td>
                                                        <td>{{ $product->quantity }}</td>
                                                        <td>{{ $product->production_date }}</td>
                                                        <td>{{ $product->expiry_date }}</td>
                                                        <td>{{ $product->created_at->format('m/d/Y') }}</td>
                                                        <td>${{ number_format($product->price, 2) }}</td>
                                                        <td>
                                                            @auth('admin')
                                                            <a href="{{ route('product.edit', ['product' => $product->id]) }}" class="btn btn-outline-warning btn-rounded">Edit</a>
                                                            <form action="{{ route('product.destroy', ['product' => $product->id]) }}" method="POST" style="display: inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-outline-danger btn-rounded" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                                            </form>
                                                            @else
                                                            @if($product->quantity==0)
                                                            <span class="badge shade-red min-90">All items in cart process</span>
                                                            @else
                                                            <button  class="btn btn-outline-info btn-rounded" onclick="addToCart({{ json_encode($product) }})">Add to cart</button>
                                                            @endif



                                                            {{-- <a href="/orders" class="btn btn-outline-info btn-rounded" onclick="return confirm('Enter the quantity you want to add to your cart:?')">Add to cart</a> --}}
                                                            @endauth
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

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
<script>
    function addToCart(product) {
      var quantity = prompt('Enter the quantity you want to add to your cart:' , '1' );

      if (quantity !== null) {
        // User clicked "OK"
        // Perform the action with the entered quantity
        console.log('Adding ' + quantity + ' items to the cart.');
        window.location.href = "{{ route('cart.addToCart', ['product' => ':product', 'quantity' => ':quantity']) }}"
    .replace(':product', product.id)
    .replace(':quantity', quantity);
         //window.location.href = "/orders?quantity=" + quantity;
        // window.location.href = "/orders?quantity=1&product=" + encodeURIComponent(JSON.stringify(product));
        // You can add further logic here if needed
      } else {
        // User clicked "Cancel" or closed the dialog
        console.log('Add to cart canceled.');
        return false; // Prevent navigation
      }
    }
  </script>
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
