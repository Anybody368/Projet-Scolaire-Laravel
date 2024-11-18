<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Change password</title>
	</head>
	<body>
		<h1>Change password</h1>
		<form action="changepassword" method="post">
			@csrf
			<label for="newpassword">New password</label>        <input type="password" id="newpassword"	 name="newpassword"	 required>
			<label for="confirmpassword">Confirm password</label><input type="password" id="confirmpassword" name="confirmpassword" required>
			<input type="submit" value="Change my password">
		</form>
		<p>
			Go back to <a href="account">Home</a>.
		</p>
		@if( session('message'))
			<section>
				<p>{{ session('message') }}</p>
			</section>
		@endif
	</body>
</html>
