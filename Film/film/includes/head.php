<?php

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
			<nav class="right">
				<div>
					<h2>Navigation <br>und user</h2>
				</div>
				<ul class="loeschen">
					<li><a href="filmsuche.php">Filmsuchen</a></li>
					<li><a href="php/logoutphp.php">Logout</a></li>
				</ul>
				<ul class="loeschen">
					<li><a href="user.php">user</a></li>
					<li><a href="usersuche.php">usersuche</a></li>
					<li><a href="fafver.php">Faforiten verwalten</a></li>
				</ul>
				<ul class="loeschen">
					<li><a href="manage.php">Einfügen/Update/Löschen Filme</a></li>
				</ul>
			</nav>
			<nav class="left">
				<h2>Favorites</h2>
				<ul class="loeschen">
				<?php
				include 'php/connectphp.php';
				//include_once 'php/filmsuchephp.php';
				
				session_start();
				$userid = $_SESSION['userid'];
				$sql = "SELECT * FROM `tblfilm` 
				INNER JOIN (`tblfavoriten` 
				INNER JOIN `tbluser` 
				ON `tblfavoriten`.userfk = tbluser.user_id) 
				ON `tblfilm`.film_id = `tblfavoriten`.filmfk 
				WHERE user_id = $userid;";
				$result = $db->query($sql);
				?>
					<?php
					while ($row = $result->fetch_object()) {
						$film_id = $row->film_id;
						$title = htmlentities($row->title, ENT_QUOTES, "UTF-8");
						?>
						<tr>
							<li><a href="/film/filmdetile.php?fid=<?php echo $film_id; ?>"><?php echo $title ?></a></li>
						</tr>
						<?php
					}
					?>
				</ul>
			</nav>