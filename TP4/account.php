<?php
	session_start();
	if ( empty($_SESSION['user']) )
	{
		header('Location: signin.php');
		exit();
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Account</title>
	</head>
	<body>
		<p>
			Hello <?= $_SESSION['user'] ?> !<br>
			Welcome on your account.
		</p>
		<p><a href="signout.php">Sign out</a></p>
		<p><a href="formpassword.php">Change password</a></p>
<?php if ( !empty($_SESSION['message']) ) { ?>
		<section>
			<p><?= $_SESSION['message'] ?></p>
		</section>
<?php } ?>
	</body>
</html>
