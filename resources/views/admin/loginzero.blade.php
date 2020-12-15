<!DOCTYPE html>
<html lang="en">
<head>
	@php
    $path =env('Asset_Path');
	@endphp
	
	<title>Login V3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset($path.'/logiinn/images/icons/favicon.ico') }}">
<!--===============================================================================================-->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset($path.'/logiinn/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset($path.'/logiinn/fonts/iconic/css/material-design-iconic-font.min.css') }}">
<!--===============================================================================================-->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset($path.'/logiinn/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset($path.'/logiinn/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('{{ url($path) }}/logiinn/images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action={{ route('login') }} method="post">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>
                      @csrf
					<span class="login100-form-title p-b-20 p-t-10">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter Your Email">
						<input class="input100" type="text" autocomplete="off" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" autocomplete="off" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-15">
						<a class="txt1" href="/login/#">
							Forgot Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="{{ url($path) }}/logiinn/js/main.js"></script>

</body>
</html>