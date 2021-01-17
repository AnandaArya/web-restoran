<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('css/beranda.css') }}">



	<!-- My Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

	<!-- Font Awesome -->
	<!-- <script src="https://kit.fontawesome.com/ec96cf5f4a.js" crossorigin="anonymous"></script> -->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.2.0/css/all.css">
	<link rel="stylesheet" href="https://static.fontawesome.com/css/fontawesome-app.css">

    <title>@yield('head-title')</title>
  </head>
  <body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand py-3" href="#">Restoran Website</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">

					<!-- <ul class="navbar-nav">
						<li class="nav-item active">
							<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Features</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Pricing</a>
						</li>
						<li class="nav-item">
							<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
						</li>
					</ul> -->
				</div>
			</div>
		</nav>

	<!-- ==== TITLE ==== -->
		@yield('title')
	<!-- ==== END TITLE ==== -->

		<div class="container">
			<section class="menu">
				<div class="row">
					<!-- <div class="menu-navigasi"> -->
						<ul class="sub-menu mt-3 mx-2">
							<li class="menu-list">
								<a href="{{ url('/beranda') }}"><i class="fal fa-home d-block ml-2 mb-1"></i>Profile</a>
							</li>
						</ul>
						@if(auth()->user()->level == "admin")
						<ul class="sub-menu mt-3 mx-2">
							<li class="menu-list">
								<a href="{{ url('/penggunas') }}"><i class="fal fa-user-cog d-block ml-4 mb-1"></i>Pengguna</a>
							</li>
						</ul>
						@endif
						@if(auth()->user()->level == "admin" || auth()->user()->level == "dapur")
						<ul class="sub-menu mt-3 mx-2">
							<li class="menu-list">
								<a href="{{ url('/masakans') }}"><i class="fal fa-utensils d-block ml-2 mb-1"></i>Menu</a>
							</li>
						</ul>
						@endif
						@if(auth()->user()->level == "admin" || auth()->user()->level == "user" || auth()->user()->level == "waiter" || auth()->user()->level == "dapur")
						<ul class="sub-menu mt-3 mx-2">
							<li class="menu-list">
								<a href="{{ url('/orders') }}"><i class="fal fa-shopping-cart d-block ml-2 mb-1"></i>Order</a>
							</li>
						</ul>
						@endif
						@if(auth()->user()->level == "admin" || auth()->user()->level == "waiter")
						<ul class="sub-menu mt-3 mx-2">
							<li class="menu-list">
								<a href="{{ url('/transactions') }}"><i class="fal fa-wallet d-block ml-3 mb-1"></i>Transaksi</a>
							</li>
						</ul>
						@endif
						@if(auth()->user()->level == "admin" || auth()->user()->level == "waiter")
						<ul class="sub-menu mt-3 mx-2">
							<li class="menu-list">
								<a href="{{ url('/laporans') }}"><i class="fal fa-chart-bar d-block ml-3 mb-1"></i>Laporan</a>
							</li>
						</ul>
						@endif
						<ul class="sub-menu mt-3 mx-2">
							<li class="menu-list">
								<a href="{{ url('/logout') }}"><i class="fal fa-sign-out-alt d-block ml-2 mb-1"></i>Logout</a>
							</li>
						</ul>
					<!-- </div> -->
				</div>
			</section>

			<section class="content mt-4 p-4 position-relative">

            @yield('content')

            </section>
		</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

	@yield('myscript')
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>