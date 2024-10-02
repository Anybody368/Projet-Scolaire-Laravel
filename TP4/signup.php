<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Signup</title>
	</head>
	<body>
		<h1>Signup</h1>
		<form action="adduser.php" method="post">
			<label for="login">Login</label>      <input type="text"     id="login"    name="login"    required autofocus>
			<label for="password">Password</label><input type="password" id="password" name="password" required>
			<label for="pass2">Confirm password</label><input type="password" id="pass2" name="pass2" required>
			<input type="submit" value="Signin">
		</form>
<?php if ( !empty($_SESSION['message']) ) { ?>
		<section>
			<p><?= $_SESSION['message'] ?></p>
		</section>
<?php } ?>
	</body>
</html>
