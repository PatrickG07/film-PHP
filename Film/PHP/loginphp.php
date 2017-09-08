<?php 
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=film', 'root', '');
 
if(isset($_GET['login'])) {
	$email = $_POST['email'];
	$passwort = $_POST['passwort'];
	$statement = $pdo->prepare("SELECT * FROM `tbluser` WHERE email = :email");
	$result = $statement->execute(array('email' => $email));
	$user = $statement->fetch();
	//Überprüfung des Passworts
	if ($user !== false && password_verify($passwort, $user['passwort'])) {
		$_SESSION['userid'] = $user['user_id'];
		die('Login erfolgreich. Weiter zu <a href="/film/user.php">internen Bereich</a>');
	} else {
		$errorMessage = "email oder Passwort war ungültig<br>";
	}
}
?>