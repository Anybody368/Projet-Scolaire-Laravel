<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Signup</title>
	</head>
	<body>
		<h1>Signup</h1>
		<form action="adduser" method="post">
			@csrf
			<label for="login">Login</label>             <input type="text"     id="login"    name="login"    required autofocus>
			<label for="password">Password</label>       <input type="password" id="password" name="password" required>
			<label for="confirm">Confirm password</label><input type="password" id="confirm"  name="confirm"  required>
			<input type="submit" value="Signup">
		</form>
		<p>
			If you already have an account, <a href="signin">signin</a>.
		</p>
		@if( session('message'))
			<section>
				<p>{{ session('message') }}</p>
			</section>
		@endif
	</body>
</html>
