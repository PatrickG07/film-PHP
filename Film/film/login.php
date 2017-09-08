<?php
include 'php/loginphp.php';

?>
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
				<h2>Login</h2>
				<p>Loggen Sie sich ein</p>
				
				<?php 
				if(isset($errorMessage)) {
					echo $errorMessage;
				}
				?>
				<form action="?login=1" method="post">
					<br>Email:<br>
					<input type="email" size="40" maxlength="250" name="email" required><br><br>
					 
					Dein Passwort:<br>
					<input type="password" size="40"  maxlength="250" name="passwort" required><br>
					 
					<input type="submit" value="Abschicken"><br>
				</form>
				<form action="register.php">
					<br><input type="submit" value="Registriren"><br>
				</form>
<?php
require_once 'includes/footer.php';
?>