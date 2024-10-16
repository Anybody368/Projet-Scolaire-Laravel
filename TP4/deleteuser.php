<?php
session_start();
unset($_SESSION['message']);

if(empty($_SESSION['user']))
{
	$_SESSION['message'] = "Error, you are not connected.";
	header('Location: formpassword.php');
	exit();
}

require_once('models/User.php');

$user = new User($_SESSION['user']);

try {
	$user->delete();
} catch (Exception $e) {
	$_SESSION['message'] = $e;
	header('Location: signup.php');
	exit();
}

$_SESSION['message'] = "Account succesfully deleted.";
header('Location: signin.php');?>
