<?php
	session_start();
    if(empty($_SESSION['user']))
    {
        $_SESSION['message'] = "Please sign in first.";
        header('Location: signin.php');
    }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Change password</title>
	</head>
	<body>
		<h1>Change password</h1>
		<form action="changepassword.php" method="post">
			<label for="password">New password</label><input type="password" id="password" name="password" required>
			<label for="pass2">Confirm password</label><input type="password" id="pass2" name="pass2" required>
			<input type="submit" value="Submit">
		</form>
		<p><a href="account.php">Go to account</a></p>
<?php if ( !empty($_SESSION['message']) ) { ?>
		<section>
			<p><?= $_SESSION['message'] ?></p>
		</section>
<?php } ?>
	</body>
</html>
