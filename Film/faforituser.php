<?php
require_once 'includes/head.php';
include 'php/connectphp.php';
?>
			<section class="center" a>
				<h2>Faforisiertes</h2>
				<p>Hier werden alles angezeigt welches die Person Faforisiert hat</p>
				<form method="post">
				<?php
					include 'php/connectphp.php';
					if (isset($_GET['uid'])) {
						$uid = $_GET['uid'];
					}
					$sql = "SELECT * FROM `tblfilm` 
					INNER JOIN (`tblfavoriten` 
					INNER JOIN `tbluser` 
					ON `tblfavoriten`.userfk = tbluser.user_id) 
					ON `tblfilm`.film_id = `tblfavoriten`.filmfk 
					WHERE user_id = $uid;";		
					$result = $db->query($sql);
				?>
				<br><br><table border="1" cellpadding="5" cellspacing="0">
					<tr style="text-align: left;">
						<th style="width: 150px;">genre</th>
						<th style="width: 150px;">title</th>
						<th style="width: 200px;">beschreibung</th>
						<th style="width: 200px;">dauer</th>
						<th>Faforisiren</th>
						<th>Detile</th>
					</tr>
					<?php
					while ($row = $result->fetch_object()) {
						$genre = htmlentities($row->genre, ENT_QUOTES, "UTF-8");
						$title = htmlentities($row->title, ENT_QUOTES, "UTF-8");
						$beschreibung = htmlentities($row->beschreibung, ENT_QUOTES, "UTF-8");
						$dauer = htmlentities($row->dauer, ENT_QUOTES, "UTF-8");
					?>
					<tr style="text-align: left;">
						<td><?php echo $genre; ?></td>
						<td><?php echo $title; ?></td>
						<td><?php echo $beschreibung; ?></td>
						<td><?php echo $dauer; ?></td>
						<td><a href="php/faforitphp.php?id=<?php echo $film_id; ?>">Faforisiren</a></td>
						<td><a href="/film/filmdetile.php?id=<?php echo $film_id; ?>">Detile</a></td>
					</tr>
					<?php
					}
					?>
					</table>
				</form>
<?php
require_once 'includes/footer.php';
?>