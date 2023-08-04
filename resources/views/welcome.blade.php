<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Style css -->
     <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" type="text/css" media="all" />
    <title>Document</title>
</head>

<body>
<div class="container" id="container">

	<div class="form-container sign-in-container">
		<form id="formId" method="POST" action="{{route("login")}}">
            @csrf
			<h1>Sign in</h1>
			<input type="text" name="phoneNum" id="number" placeholder="Enter your number" required oninput="this.value = this.value.replace(/[^0-9\+]/g, '').replace(/(\..*)\./g, '$1');"/>
            <div id="recaptcha-container"></div>
			<button type="submit" id="myButton" class="button">Sign In</button>
		</form>


	</div>


	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				    <button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello</h1>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, doloribus temporibus numquam adipisci natus sapiente ullam, aliquam exercitationem animi esse voluptates placeat deserunt ad. Totam consequatur quam labore numquam ad?</p>

			</div>
		</div>
	</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
    <script src ="{{asset('assets/js/js.js')}}"  ></script>
</body>
</html>
