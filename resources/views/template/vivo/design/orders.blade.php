
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
								<a href="{{route('cart.index')}}">
									<i class="bi bi-handbag"></i>
									<span class="menu-text">Cart</span>
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
                            <i class="bi bi-handbag"></i>
                            <span class="menu-text"> Cart</span>
                            </li>
					</ol>
					<!-- Breadcrumb end -->

					<!-- Header actions ccontainer start -->
					<div class="header-actions-container">



						<!-- Header actions start -->
						<ul class="header-actions">
							<li class="dropdown">
								<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                                    <span class="user-name d-none d-md-block">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
									<span class="avatar">
                                        <img src="{{ asset('images/' . Auth::user()->image_url) }}" alt="Admin Templates">
									</span>
								</a>
								<div class="dropdown-menu dropdown-menu-end" aria-labelledby="userSettings">
									<div class="header-profile-actions">
										<a href="/account-settings">Prfoile</a>
										<form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-dropdown-link :href="route('logout')"
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

                        @if(session('bill'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle alert-icon"></i>
                            {{ session('bill')['message'] }}

                            <ul>
                                @foreach(session('bill')['details'] as $product)
                                    <li>
                                        Product: {{ $product['name'] }},
                                        Quantity: {{ $product['quantity'] }},
                                        Price: ${{ number_format($product['price'], 2) }} ,
                                        Amount: ${{ number_format($product['amount'], 2) }}
                                    </li>
                                @endforeach
                            </ul>

                            <p>Total Amount: ${{ number_format(session('bill')['totalAmount'], 2) }}</p>
                            <p>Buy Date: {{ session('bill')['buyDate'] }}</p>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif



                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle alert-icon"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif




                        <div id="myAlert" hidden class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-x-circle alert-icon"></i>
                            Sorry ,but select one item at least to check out
                        </div>

						<!-- Row start -->
						<div class="row m-1">
							<div class="col-sm-12 col-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Cart Order </div>
									</div>
									<div class="card-body">
                                        <div class="table-responsive">
                                            {{-- <form action="{{ route('checkout') }}" method="POST">
                                                @csrf --}}
                                                <table class="table v-middle">
                                                    <thead>
                                                        <tr>
                                                            <th>Category</th>
                                                            <th>Market</th>
                                                            <th>Product</th>
                                                            <th>Count</th>
                                                            <th>Amount</th>
                                                            <th>Actions</th>
                                                            <th>Select</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($cart->products as $product)
                                                            <tr>
                                                                    <td>
                                                                <div class="media-box">
                                                                    <img src="{{ asset('images/' . $product->company->category->image_url) }}" class="media-avatar" alt="{{ $product->company->category->name }}">
                                                                    <div class="media-box-body">

                                                                        <div class="text-truncate">{{ $product->company->category->name }}</div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="media-box">
                                                                    <img src="{{ asset('images/' . $product->company->image_url) }}" class="media-avatar" alt="{{ $product->company->name }}">
                                                                    <div class="media-box-body">
                                                                        <div class="text-truncate">{{ $product->company->name}}</div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                                <td>{{ $product->code }}</td>
                                                                <td>{{ $product->pivot->quantity }}</td>
                                                                <td class="product-amount">${{ number_format($product->price * $product->pivot->quantity, 2) }}</td>
                                                                <td>
                                                                    {{-- <a href="{{ route('cart.removeProductFromCart', ['product' => $product->id, 'quantity' => $product->pivot->quantity]) }}" class="btn btn-outline-danger btn-rounded">Remove</a> --}}
                                                                    <form action="{{ route('cart.removeProductFromCart', ['product' => $product->id, 'quantity' => $product->pivot->quantity]) }}" method="POST" style="display: inline;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-outline-danger btn-rounded" onclick="return confirm('Are you sure you want to remove this product from the cart?')">Remove</button>
                                                                    </form>
                                                                </td>
                                                                <td>
                                                                    <input id="myCheckbox" type="checkbox" name="selectedProducts[]" value="{{ $product->id }}">
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="sub-total-container">
                                                    <div class="total" style="display: inline;" id="orderTotal">Order Total: $0.00</div>
                                                <button class="btn btn-primary" id="getCheckedIndexes" >Check It Out  </button>
                                            </div>
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

<script>
    $('#getCheckedIndexes').click(function() {
 var checkedBoxes = $('input[type="checkbox"]:checked');
 var n=[]
 checkedBoxes.each(function(index) {
    console.log("Checkbox value is: " + $(this).val());
    n.push($(this).val());
 });
 if (n.length==0) {
    $('#myAlert').removeAttr('hidden');
 }
 else{
    $('#myAlert').attr('hidden', true);
 window.location.href="{{ route('checkout', ['products' => ':products']) }}"
    .replace(':products',n );
 }
});
</script>


<script>
    // Function to calculate and update the order total
    function updateOrderTotal() {
        var orderTotal = 0;

        // Get all checkboxes with name 'selectedProducts[]'
        var checkboxes = document.querySelectorAll('input[name="selectedProducts[]"]:checked');

        // Iterate through the checked checkboxes and update the order total
        checkboxes.forEach(function (checkbox) {
            // Get the corresponding product row
            var productRow = checkbox.closest('tr');

            // Extract the product price and quantity from the row
            var productPrice = parseFloat(productRow.querySelector('.product-amount').textContent.replace('$', ''));

            // Calculate the product subtotal and add it to the order total

            orderTotal += productPrice;
        });

        // Display the updated order total
        document.getElementById('orderTotal').textContent = 'Order Total: $' + orderTotal.toFixed(4);
    }

    // Attach the updateOrderTotal function to the change event of checkboxes
    var checkboxes = document.querySelectorAll('input[name="selectedProducts[]"]');
    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', updateOrderTotal);
    });

    // Call the updateOrderTotal function initially
    updateOrderTotal();


</script>





<script>
    var checkedBoxes = [];
    $('input[type="checkbox"]').change(function() {
   var checkboxValue = $(this).val();

   if($(this).is(":checked")) {
       // If the checkbox is checked, add its value to the array
       checkedBoxes.push(checkboxValue);
       console.log("Checkbox is checked!  " +checkboxValue);
// To hide the alert
$('#myAlert').attr('hidden', true);


   } else {
       // If the checkbox is unchecked, remove its value from the array
       var index = checkedBoxes.indexOf(checkboxValue);
       if(index > -1) {

           checkedBoxes.splice(index, 1);
           console.log("Checkbox is unchecked!  " +checkboxValue);

       }
   }
});
</script>

<!-- Main Js Required -->
<script src="{{ asset('js/main.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	</body>

</html>
