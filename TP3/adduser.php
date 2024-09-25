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

if($password != $confPassword)
{
   $_SESSION['message'] = "Password doesn't match.";
	header('Location: signup.php');
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

$request = $pdo->prepare("INSERT INTO Users (login, password) VALUES (:log , :pass )");
$request->bindValue(':log', $login, PDO::PARAM_STR);
$request->bindValue(':pass', $password, PDO::PARAM_STR);

$ok = $request->execute();

if(!$ok)
{
    $_SESSION['message'] = "Login already in use.";
	header('Location: signup.php');
	exit();
}

header('Location:signin.php');
?>
