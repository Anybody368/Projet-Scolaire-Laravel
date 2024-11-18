<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Account</title>
	</head>
	<body>
		<p>
			Hello {{ session('user')->login() }} !<br>
			Welcome on your account.
		</p>
		<ul>
			<li><a href="formpassword">Change password.</a></li>
			<li><a href="deleteuser">Delete my account.</a></li>
		</ul>
		<p><a href="signout">Sign out</a></p>
		@if( session('message'))
			<section>
				<p>{{ session('message') }}</p>
			</section>
		@endif
	</body>
</html>
