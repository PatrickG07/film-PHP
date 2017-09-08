<?php
require_once 'includes/head.php';
include 'php/connectphp.php';
?>
			<section class="center" a>
				<h2>Suchen</h2>
				<p>Hier werden alle personen angezeigt</p>
				<form method="post">
					<?php
					if(!isset($_SESSION['userid'])) {
						die('Bitte zuerst <a href="login.php">einloggen</a>');
					}
					 
					//Abfrage der Nutzer ID vom Login
					$userid = $_SESSION['userid'];
					 
					echo "Hallo User: ".$userid;
					?>
					<table border="1" cellpadding="5" cellspacing="0">
						<tr style="text-align: left;">
							<th style="width: 150px;">Benutzername</th>
							<th>&nbsp;</th>
						</tr>    
						<tr>
							<td style="width: 150px;"><input type="text" name="title"></td>
							<td><input type="submit" value="Submit"></td>
						</tr>
					</table>
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
					if (isset($_POST['benutzername'])) {
						$benutzername = $_POST['benutzername'];
					}
					$sql = "SELECT * FROM `tbluser` WHERE `benutzername` LIKE '%$benutzername%'";
					$result = $db->query($sql);
					?>
					<table  border="1" cellpadding="5" cellspacing="0">
							<tr style="text-align: left;">
							<th style="width: 150px;">Benutzername</th>
							<th style="width: 200px;">Email</th>
							<th>Faforiten</th>
							<th>Hochgeladenes</th>
						</tr>
					<?php
					while ($row=$result->fetch_object()) {
						$user_id = $row->user_id;
						$benutzername = htmlentities($row->benutzername, ENT_QUOTES, "UTF-8");
						$email = htmlentities($row->email, ENT_QUOTES, "UTF-8");
						?>
							<tr>
								<td><?php echo $benutzername; ?></td>
								<td><?php echo $email; ?></td>
								<td><a href="/film/faforituser.php?uid=<?php echo $user_id; ?>">Faforiten</a></td>
								<td><a href="/film/upload.php?uid=<?php echo $user_id; ?>">Hochgeladenes</a></td>
							</tr>
						<?php
					}
					//header("location: /film/filmsuche.php")
					?>
					</table>
					<?php

					include 'php/connectphp.php';
					//include_once 'php/filmsuchephp.php';

					$sql = "SELECT * FROM `tbluser`";

					$result = $db->query($sql);
					?>
					<br><br><table border="1" cellpadding="5" cellspacing="0">
						<tr style="text-align: left;">
							<tr style="text-align: left;">
							<th style="width: 150px;">Benutzername</th>
							<th style="width: 200px;">Email</th>
							<th>Faforiten</th>
							<th>Hochgeladenes</th>
						</tr>
						<?php
						while ($row = $result->fetch_object()) {
							$user_id = $row->user_id;
							$benutzername = htmlentities($row->benutzername, ENT_QUOTES, "UTF-8");
							$email = htmlentities($row->email, ENT_QUOTES, "UTF-8");
							?>
							<tr>
								<td><?php echo $benutzername; ?></td>
								<td><?php echo $email; ?></td>
								<td><a href="/film/faforituser.php?uid=<?php echo $user_id; ?>">Faforiten</a></td>
								<td><a href="/film/upload.php?uid=<?php echo $user_id; ?>">Hochgeladenes</a></td>
							</tr>
							<?php
						}
						?>
					</table>
				</form>
<?php
require_once 'includes/footer.php';
?>