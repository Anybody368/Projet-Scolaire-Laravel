<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Account</title>
	</head>
	<body>
		<p>
			Hello {{ $login }} !<br>
			Welcome on your account.
		</p>
		<p><a href="signout">Sign out</a></p>
		<p><a href="formpassword">Change password</a></p>
		<p><a href="deleteuser">Delete account</a></p>
		@if (session('message'))
		<section>
			{{ session('message')}}
		</section>
		@endif
	</body>
</html>
