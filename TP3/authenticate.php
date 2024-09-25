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
	header('Location: signin.php');
	exit();
}

// 2. On vérifie que les données attendues existent
if ( empty($_POST['login']) || empty($_POST['password']) )
{
	$_SESSION['message'] = "Some POST data are missing.";
	header('Location: signin.php');
	exit();
}

// 3. On sécurise les données reçues
$login = htmlspecialchars($_POST['login']);
$password = htmlspecialchars($_POST['password']);

/******************************************************************************
 * Initialisation de l'accès à la BDD
 */

require_once('bdd.php');

/******************************************************************************
 * Authentification
 */

try {
	$pdo = new PDO($SQL_DSN);
}
catch( PDOException $e ) {
    echo 'Erreur : '.$e->getMessage();
    exit;
}

$request = $pdo->prepare("SELECT password FROM Users WHERE login = :log");
$request->bindValue(':log', $login, PDO::PARAM_STR);

$ok = $request->execute();

if(!$ok)
{
	$_SESSION['message'] = "T'es pas censé voir ça frêre.";
	header('Location: signin.php');
	exit;
}

$row = $request->fetch();
if(!$row)
{
	$_SESSION['message'] = "wrong login";
	header('Location: signin.php');
	exit;
}

if($row['Password'] !== $password)
{
	$_SESSION['message'] = "Wrong password.";
	header('Location: signin.php');
	exit();
}

$_SESSION['user'] = $login;

header('Location: account.php');
exit();

// 1. On vérifie que le login existe dans la BDD
/*if ( !array_key_exists($login, $users) )
{
	$_SESSION['message'] = "Wrong login.";
	header('Location: signin.php');
	exit();
}

// 2. On vérifie que le mot de passe associé au login est correct
if ( $users[$login] !== $password )
{
	$_SESSION['message'] = "Wrong password.";
	header('Location: signin.php');
	exit();
}

// 3. On sauvegarde le login dans la session
$_SESSION['user'] = $login;

// 4. On sollicite une redirection vers la page du compte
header('Location: account.php');
exit();*/
?>
