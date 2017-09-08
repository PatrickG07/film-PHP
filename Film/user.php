<?php
$dbConnect = array(
    'server' => 'localhost',
    'user' => 'root',
    'pass' => '',
    'name' => 'film'
);

$db = new mysqli(
    $dbConnect['server'],
    $dbConnect['user'],
    $dbConnect['pass'],
    $dbConnect['name']
);
?>
<?php
require_once 'includes/head.php';
?>
			<section class="center">
				<?php
				if(!isset($_SESSION['userid'])) {
					die('Bitte zuerst <a href="login.php">einloggen</a>');
				}
				 
				//Abfrage der Nutzer ID vom Login
				$userid = $_SESSION['userid'];
				 
				echo "Hallo User: ".$userid;
				?>
				<h2>Hi</h2>
				<p></p>
				<ul class="loeschen">
				</ul>
<?php
require_once 'includes/footer.php';
?>