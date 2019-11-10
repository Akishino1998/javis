<!DOCTYPE html>
<html lang="en">
<head>
	<title>Nyervisga? | Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/zebra_datepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="container-contact100">
		<div class="container-fluid">
			<div class="row">
				<div class="col-2"></div>
				<div class="col-8">
					<div class="wrap-contact100">
						<form class="contact100-form validate-form" method="POST" action="/register" onsubmit=" return Password()">
							<span class="contact100-form-title image-title">
								<a href="/home"><img src="logo/logonyervisga.png" alt="" width="200" height="200"></a>
							</span>
							<span class="contact100-form-title">
								REGISTER
							</span>

							<label class="label-input100" for="username">Username</label>
							<div class="wrap-input100 validate-input">
								<input id="username" class="input100" type="text" name="username" placeholder="Username">
								{{-- <span class="focus-input100"></span> --}}
							</div>

							<label class="label-input100" for="password">Password</label>
							<div class="wrap-input100 validate-input">
								<input id="password" class="input100" type="password" name="password" placeholder="Password">		
							</div>
							<label class="label-input100" for="password">Retype Password</label>
							<div class="label-alert">

							</div>
							<div class="wrap-input100 validate-input">
								<input id="repassword" class="input100" type="password" name="repassword" placeholder="Re-Type Password">		
							</div>
							<div class="container-contact100-form-btn">
								<button class="contact100-form-btn">
									<span>
										Register
										<i class="zmdi zmdi-arrow-right m-l-8"></i>
									</span>
								</button>
							</div>
							<div class="container-contact100-form-btn">
								<a href="/login" class="help-button">Sudah Punya Akun?</a>
							</div>
							@csrf
						</form>
					</div>
				</div>
			</div>			
		</div>
	</div>



<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/zebra_datepicker.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/sweetalert.min.js"></script>
	<script src="js/main.js"></script>

	


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-23581568-13');
</script>

<script>
	function Password(){
		$password = $('#password').val();
		$repassword = $('#repassword').val();
		if($password != $repassword){
			$('.label-alert').empty();
			$('.label-alert').append('<div class="alert alert-warning">Re-Type Password tidak sama!</div>')
			return false;
		}else{
			return true;
		}
	}
	$('#password').click(function(){
		$('.label-alert').empty();
	});
</script>
@if(Session::has('register')){
	{{-- <script>alert(12);</script> --}}
	@if(Session::get('register')){
		<script>
			swal({
				title : "Username Telah Terdaftar!",
				text : "Username yang anda gunakan telah terdaftar :(",
				icon : "error",
				button : "Ok!",
			});	
		</script>
	@endif
@endif
</body>
</html>

