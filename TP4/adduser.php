<?php session_start();
unset($_SESSION['message']);

if ( $_SERVER['REQUEST_METHOD'] != 'POST' )
{
	header('Location: signup.php');
	exit();
}

if ( empty($_POST['login']) || empty($_POST['password']) || empty($_POST['pass2']))
{
	$_SESSION['message'] = "Some POST data are missing.";
	header('Location: signup.php');
	exit();
}

$login = htmlspecialchars($_POST['login']);
$password = htmlspecialchars($_POST['password']);
$confPassword = htmlspecialchars($_POST['pass2']);

if($password !== $confPassword)
{
   $_SESSION['message'] = "Password doesn't match.";
	header('Location: signup.php');
	exit();
} 

require_once('models/User.php');

$user = new User($login, $password);

try {
	$user->create();
} catch (Exception $e) {
	$_SESSION['message'] = $e;
	header('Location: signup.php');
	exit();
}

$_SESSION['message'] = "Account succesfully created, please connect.";
header('Location:signin.php');
?>
