<?php
require_once 'includes/head.php';

include 'php/connectphp.php';

if(!isset($_SESSION['userid'])) {
	$userid = $_POST['userid'];
}
				
$sql = "SELECT * FROM `tblfilm` WHERE userfk=$userid";

$result = $db->query($sql);
?>
			<section action="php/managephp.php" class="center" a>
				<?php
				$userid = $_SESSION['userid'];
				echo "Hallo User: ".$userid;
				?>
				<p><b></b></p>  <!-- Display full set of results from database-->
				<br><p><b>Neuer Filme einfügen:</b></p>
				<form action="php/insertphp.php" method="post">
					<table border="1" cellpadding="5" cellspacing="0">
						<tr>
							<th style="width: 150px;">Genre</th>
							<td style="width: 150px;"><input type="text" name="genre"></td>
						</tr>
						<tr>
							<th style="width: 150px;">Title</th>
							<td style="width: 150px;"><input type="text" name="title"></td>
						</tr>
						<tr>
							<th style="width: 200px;">Beschreibung</th>
							<td style="width: 200px;"><input type="text" name="beschreibung"></td>
						</tr>
						<tr>
							<th style="width: 200px;">Dauer</th>
							<td style="width: 200px;"><input type="text" name="dauer"></td>
						</tr>
						<tr>
							<th style="width: 200px;">Filmname</th>
							<td style="width: 200px;"><input type="text" name="film"></td>
						</tr>
						<tr>
							<th>&nbsp;</th>
							<td><input type="submit" value="Einfügen"></td>
						</tr>
					</table>
					
				</form>
				<form name="uploadformular" enctype="multipart/form-data" action="php/dateiupload.php" method="post" >
						Datei in mp4 und ogg datei hochladen: <input type="file" name="uploaddatei" size="60" maxlength="255" >
						<input type="Submit" name="submit" value="Datei hochladen">
					</form>
				<br><br><p><b>Film Ändern:</b></p>
				<form action="php/updatephp.php" method="post">
					<table border="1" cellpadding="5" cellspacing="0">
						<tr>
							<th style="width: 150px;">Alter Titel</th>
							<td style="width: 150px;"><input type="text" name="atitle"></td>
						</tr>
						<tr>
							<th style="width: 150px;">Neue Genre</th>
							<td style="width: 150px;"><input type="text" name="genre"></td>
						</tr>
						<tr>
							<th style="width: 150px;">Neuer Title</th>
							<td style="width: 150px;"><input type="text" name="title"></td>
						</tr>
						<tr>
							<th style="width: 200px;">Neue Beschreibung</th>
							<td style="width: 200px;"><input type="text" name="beschreibung"></td>
						</tr>
						<tr>
							<th style="width: 200px;">Neue Dauer</th>
							<td style="width: 200px;"><input type="text" name="dauer"></td>
						</tr>
						<tr>
							<th style="width: 200px;">Neuer Filmname</th>
							<td style="width: 200px;"><input type="text" name="film"></td>
						</tr>    
						<tr>
							<th>&nbsp;</th>
							<td><input type="submit" value="Ändern"></td>
						</tr>
					</table>
				</form>
				<br><br><table border="1" cellpadding="5" cellspacing="0">
					<tr style="text-align: left;">
						<th style="width: 150px;">genre</th>
						<th style="width: 150px;">title</th>
						<th style="width: 200px;">beschreibung</th>
						<th style="width: 200px;">dauer</th>
						<th style="width: 200px;">filmname</th>
						<th>Delete</th>
					</tr>
					<?php
					while ($row = $result->fetch_object()) {
						$genre = htmlentities($row->genre, ENT_QUOTES, "UTF-8");
						$title = htmlentities($row->title, ENT_QUOTES, "UTF-8");
						$beschreibung = htmlentities($row->beschreibung, ENT_QUOTES, "UTF-8");
						$dauer = htmlentities($row->dauer, ENT_QUOTES, "UTF-8");
						$film = htmlentities($row->film, ENT_QUOTES, "UTF-8");
						?>
						<tr>
							<td><?php echo $genre; ?></td>
							<td><?php echo $title; ?></td>
							<td><?php echo $beschreibung; ?></td>
							<td><?php echo $dauer; ?></td>
							<td><?php echo $film; ?></td>
							<td><a href="php/deletephp.php?id=<?php echo $id; ?>">Delete</a></td>
						</tr>
						<?php
					}
					?>
				</table>
<?php
require_once 'includes/footer.php';
?>