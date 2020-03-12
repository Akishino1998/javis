<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="style_login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style_login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style_login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="style_login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style_login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style_login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="style_login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style_login/css/util.css">
	<link rel="stylesheet" type="text/css" href="style_login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST" action="{{url('forgot-password-send')}}">
					<span class="login100-form-title">
						LUPA PASSWORD JAVIS
						<p style="color:black;font-size:15px">Aplikasi pemesanan jasa servis gadget antar jemput.</p>
					</span>
					<div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="email" name="email" placeholder="Email" required>
						<span class="focus-input100"></span>
					</div>

					<div class="flex-col-c p-t-13 p-b-20">

					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Send To Email
						</button>
					</div>
					@csrf
				</form>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src="style_login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="style_login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="style_login/vendor/bootstrap/js/popper.js"></script>
	<script src="style_login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="style_login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="style_login/vendor/daterangepicker/moment.min.js"></script>
	<script src="style_login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="style_login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="style_login/js/main.js"></script>
	<script src="{{ asset('js/sweetalert.min.js') }}"></script>

</body>
</html>
@if (Session::has('forgot_password'))
	<script>
	swal({
		title : "{{Session::get('forgot_password')[1]}}",
		icon : "{{Session::get('forgot_password')[0]}}",
		button : "Ok!",
	});	
	</script>
@endif