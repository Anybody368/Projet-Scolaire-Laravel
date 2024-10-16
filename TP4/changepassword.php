<?php
/******************************************************************************
 * Initialisation.
 */

session_start();
unset($_SESSION['message']);

/******************************************************************************
 * Traitement des données de la requête
 */

// 1. On vérifie que la méthode HTTP utilisée est bien POST
if ( $_SERVER['REQUEST_METHOD'] != 'POST' )
{
	header('Location: formpassword.php');
	exit();
}

// 2. On vérifie que les données attendues existent
if ( empty($_POST['password']) || empty($_POST['pass2']) )
{
	$_SESSION['message'] = "Some POST data are missing.";
	header('Location: formpassword.php');
	exit();
}

// Utilisateur doit être connecté

if(empty($_SESSION['user']))
{
	$_SESSION['message'] = "Error, you are not connected.";
	header('Location: formpassword.php');
	exit();
}

// 3. On sécurise les données reçues
$password = htmlspecialchars($_POST['password']);
$pass2 = htmlspecialchars($_POST['pass2']);

if($password !== $pass2)
{
    $_SESSION['message'] = "Passwords don't match.";
    header('Location: formpassword.php');
    exit();
}

/******************************************************************************
 * Initialisation de l'accès à la BDD
 */

require_once('models/User.php');

/******************************************************************************
 * Changement du mot de passe dans la BDD
 */

$user = new User($_SESSION['user'], $password);

try {
	$user->modify();
} catch (Exception $e) {
	$_SESSION['message'] = $e;
	header('Location: signup.php');
	exit();
}

$_SESSION['message'] = "Password succesfully changed.";
header('Location: account.php');?>
