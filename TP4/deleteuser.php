<?php
session_start();
unset($_SESSION['message']);

if(empty($_SESSION['user']))
{
	$_SESSION['message'] = "Error, you are not connected.";
	header('Location: formpassword.php');
	exit();
}

require_once('bdd.php');

try {
	$pdo = new PDO($SQL_DSN);
}
catch( PDOException $e ) {
    echo 'Erreur : '.$e->getMessage();
    exit;
}

$request = $pdo->prepare("DELETE FROM Users WHERE login = :log");
$request->bindValue(':log', $_SESSION['user'], PDO::PARAM_STR);

$ok = $request->execute();

if(!$ok)
{
	$_SESSION['message'] = "T'es pas censé voir ça frêre.";
	header('Location: formpassword.php');
	exit;
}

$_SESSION['message'] = "Account succesfully deleted.";
header('Location: signin.php');?>
