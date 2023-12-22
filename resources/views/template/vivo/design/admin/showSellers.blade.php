
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


                    <li class="">
                        <a href="{{route('showSellers')}}">
                            <div class="icon">
                                <i class="bi bi-people"></i>
                            </div>
                            <span class="menu-text">Sellers</span>
                        </a>
                    </li>


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
                                @endauth
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

						<!-- Row start -->
						<div class="row">
							<div class="col-sm-12 col-12">
								<div class="card">
                                    <div class="card-header">
                                        <div class="ml-auto">
											<a href="{{route('register')}}" class="btn btn-success">Add New Seller</a>
										</div>
                                        </div>
									<div class="card-body">

										<div class="table-responsive">
                                            <table class="table v-middle m-0">
                                                <thead>
                                                    <tr>
                                                        <th>User Image</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Registration Date</th>
                                                        <th>Actions</th> <!-- New column for Actions -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($sellers as $user)
                                                    <tr>
                                                        <td>
                                                            <div class="user-details">
                                                                <img src="{{ asset('images/' . $user->image_url) }}" alt="User Avatar" />
                                                            </div>
                                                        </td>
                                                        <td>{{ $user->first_name }}</td>
                                                        <td>{{ $user->last_name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->phone }}</td>
                                                        <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                                        <td>
                                                            <form action="{{ route('user.destroy', ['user' => $user->id])}}" method="POST" style="display: inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm "onclick="return confirm('Are you sure you want to delete this Seller?')">Delete</button>                                                            </form>
                                                            <!-- Add more action buttons as needed (e.g., Edit, View, etc.) -->
                                                            </form>
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

<!-- Date Range JS -->
<script src="{{ asset('vendor/daterange/daterange.js') }}"></script>
<script src="{{ asset('vendor/daterange/custom-daterange.js') }}"></script>

<!-- Main Js Required -->
<script src="{{ asset('js/main.js') }}"></script>


	</body>

</html>

