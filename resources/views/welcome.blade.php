<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
<!-- Design Link -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
<!-- Custom Css File -->
<link rel="stylesheet" href="{{asset('asset/css/login_registration.css')}}">
<!-- Swal Cdn -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Ajax Jquery Cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="text" placeholder="Name" />
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Password" />
			<button>Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="#">
            @csrf
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>
			<input type="email" id="email" placeholder="Email" name="email"/>
			<input type="password" id="password" placeholder="Password" />
			<a href="#">Forgot your password?</a>
			<button type="button" onclick="submitLogin()">Sign In</button>
		</form>
		<p>Id - dutta@gmail.com</p>
        <p>PW - arijitdutta</p>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<!-- Js for Design & Login -->
<script> 
	var loginURL = "{{route('userlogin')}}"
	var token = "{{ csrf_token() }}"
	var dashboard = "{{ route('dashboard') }}"
</script>

<script  src="{{asset('asset/js/login_registration.js')}}"></script>
<script src="{{asset('asset/js/login_registration_functional.js')}}"></script>

</body>
</html>
