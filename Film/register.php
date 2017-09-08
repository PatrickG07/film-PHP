<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
		<link href="styles.css" rel="stylesheet">
        <title>Instant Update Database Project by WebinAction.co.uk</title>        
    </head>
    <body class="body1">
		<div class="body2">
			<header>
				<h1 class="center2">Hallo auf Film Verwaltung</h1>
			</header>
			<section class="center">
				<h2>Registriren</h2>
				<p>Registriren Sie sich</p>
				<form action="?register=1" method="post">
					<br>Benutername:<br>
					<input type="text" size="40" maxlength="250" name="benutzername" required><br><br>
					
					Dein Passwort:<br>
					<input type="password" size="40"  maxlength="250" name="passwort" required><br>
					
					Passwort wiederholen:<br>
					<input type="password" size="40" maxlength="250" name="passwort2" required><br><br>
					
					Email:<br>
					<input type="text" size="40" maxlength="250" name="email" required><br><br>
					
					<input type="submit" value="Abschicken">
				</form>
			</section>
			<?php 
			session_start();
			$pdo = new PDO('mysql:host=localhost;dbname=film', 'root', '');
			?>

			<?php
			$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll
			if(isset($_GET['register'])) {
				$error = false;
				$benutzername = $_POST['benutzername'];
				$passwort = $_POST['passwort'];
				$passwort2 = $_POST['passwort2'];
				$email = $_POST['email'];
				if(strlen($benutzername) == 0) {
					echo 'Bitte eine gültiger benutzername eingeben<br>';
					$error = true;
				}
				if(strlen($passwort) == 0) {
					echo 'Bitte ein Passwort angeben<br>';
					$error = true;
				}
				if($passwort != $passwort2) {
					echo 'Die Passwörter müssen übereinstimmen<br>';
					$error = true;
				}
				if(strlen($email) == 0) {
					echo 'Bitte eine gültige email eingeben<br>';
					$error = true;
				}
				//Überprüfe, dass der Benutername oder email noch nicht registriert wurde
				if(!$error) { 
					$statement = $pdo->prepare("SELECT * FROM tbluser WHERE benutzername = :benutzername");
					$result = $statement->execute(array('benutzername' => $benutzername));
					$user = $statement->fetch();
					if($user !== false) {
						echo 'Dieser Benutername ist bereits vergeben<br>';
						$error = true;
					}
				}
				if(!$error) { 
					$statement = $pdo->prepare("SELECT * FROM tbluser WHERE email = :email");
					$result = $statement->execute(array('email' => $email));
					$user = $statement->fetch();
					if($user !== false) {
					echo 'Dieser Benutername ist bereits vergeben<br>';
					$error = true;
				}
				}
				//Keine Fehler, wir können den Nutzer registrieren
				if(!$error) {
					$passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
					$statement = $pdo->prepare("INSERT INTO tbluser (benutzername, email, passwort) VALUES (:benutzername, :email, :passwort)");
					$result = $statement->execute(array('benutzername' => $benutzername, 'email' => $email, 'passwort' => $passwort_hash));
					if($result) {
						echo 'Du wurdest erfolgreich registriert. <a href="/film/login.php">Zum Login</a>';
						$showFormular = false;
					} else {
						echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
					}
				}
			}
			if($showFormular) {
			?>	
			<?php
			} //Ende von if($showFormular)
			?>
<?php
require_once 'includes/footer.php';
?>