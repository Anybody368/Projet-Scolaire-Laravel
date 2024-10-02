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

if($password != $pass2)
{
    $_SESSION['message'] = "Passwords don't match.";
    header('Location: formpassword.php');
    exit();
}

$password = password_hash($password, PASSWORD_DEFAULT);

/******************************************************************************
 * Initialisation de l'accès à la BDD
 */

require_once('bdd.php');

/******************************************************************************
 * Changement du mot de passe dans la BDD
 */

try {
	$pdo = new PDO($SQL_DSN);
}
catch( PDOException $e ) {
    echo 'Erreur : '.$e->getMessage();
    exit;
}

$request = $pdo->prepare("UPDATE Users SET password = :pass WHERE login = :log");
$request->bindValue(':log', $_SESSION['user'], PDO::PARAM_STR);
$request->bindvalue(':pass', $password, PDO::PARAM_STR);

$ok = $request->execute();

if(!$ok)
{
	$_SESSION['message'] = "T'es pas censé voir ça frêre.";
	header('Location: formpassword.php');
	exit;
}

$_SESSION['message'] = "Password succesfully changed.";
header('Location: account.php');?>
