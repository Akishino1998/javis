<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Register</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- LINEARICONS -->
		<link rel="stylesheet" href="style_register/fonts/linearicons/style.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="style_register/cssregister/style.css">
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<img src="style_register/images/image-1.png" alt="" class="image-1">
				<form action="/register" method="POST" onsubmit=" return Password()" class="validate-form">
					<center><img src="javis-logo.png" alt="" width="200"></center>
					<h3>Buat Akun</h3>
					<div class="form-holder">
						<span class="lnr lnr-user"></span>
						<input name="username" type="text" class="form-control" placeholder="Username">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input id="password" name="password" type="password" class="form-control" placeholder="Password">
					</div>
					<div class="label-alert form-holder">

					</div>
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input id="repassword" name="repassword" type="password" class="form-control" placeholder="Confirm Password">
					</div>
					<button>
						<span>Register</span>
					</button>
					@csrf
				</form>
				<img src="style_register/images/image-2.png" alt="" class="image-2">
			</div>
			
		</div>
		
		<script src="style_register/js/jquery-3.3.1.min.js"></script>
		<script src="style_register/js/main.js"></script>
		<script src="{{ asset('js/sweetalert.min.js') }}"></script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
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
@if(Session::has('alert')){
	{{-- <script>alert(12);</script> --}}
	@if(Session::get('alert') == 1){
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