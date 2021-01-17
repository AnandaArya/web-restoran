<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ ('css/beranda.css') }}">

	<!-- My Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

	<!-- Font Awesome -->
	<!-- <script src="https://kit.fontawesome.com/ec96cf5f4a.js" crossorigin="anonymous"></script> -->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.2.0/css/all.css">
	<link rel="stylesheet" href="https://static.fontawesome.com/css/fontawesome-app.css">

    <title>Login Page</title>

	<style>
		body {
				background-color: rgba(0,0,0, 0.7);
				font-family: 'Poppins', sans-serif;
		}
		
		.card {
			margin-top: 200px;
			background-color: #EDF2F2;
			/* color: white; */
		}

		.btn-login {
			font-weight : bold;
			box-shadow: 1px 1px 2px black;	
		}

		.btn-daftar {
			box-shadow: 1px 1px 2px black;
		}

		@media (min-width: 768px) and (max-width: 991.98px) { 
			img {
				height : 900px;
			}
		}
	</style>
  </head>
  <body>
	<div class="container">
			<div class="row justify-content-center">
				<div class="col-10 col-lg-10">
					<div class="card">
						<div class="row">
							<div class="col-12 col-lg-6">
								<img src="{{ ('img/login-bg-1.png') }}" alt="login-bg" class="img-fluid">
							</div>
							<div class="col-12 col-lg-6 px-5">
								<h2 class="mt-4">SELAMAT DATANG</h2>
								<p>Silahkan Login terlebih dahulu</p>
								<form action="/postlogin" method="POST">
									@csrf
									<div class="form-group">
										<label for="username">USERNAME</label>
										<input type="text" class="form-control" id="email" name="email">
									</div>
									<div class="form-group">
										<label for="password">PASSWORD</label>
										<input type="password" class="form-control" id="password" name="password">
									</div>
									<div class="form-grup">
										<input type="checkbox" onclick="showPassword()"> Show Password
									</div>

									<button type="submit" name="login" class="btn btn-primary btn-login my-3 mr-3 py-2 px-3">LOGIN</button>
									<a href="{{ url('daftar') }}" name="login" class="btn btn-light btn-daftar my-3 py-2 px-3">DAFTAR</a>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script>
			function showPassword() {
				let x = document.getElementById('password');
				if (x.type === "password") {
					x.type = "text";
				} else {
					x.type = "password";
				}
			}
		</script>
  </body>

