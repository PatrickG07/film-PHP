<?php
require_once 'includes/head.php';

include 'php/connectphp.php';

if (isset($_GET['fid'])) {
    $fid = $_GET['fid'];
}
$sql = "SELECT * FROM `tblfilm` WHERE film_id = $fid";

$result = $db->query($sql);
?>
			<section class="center">
				<h2>Film Detiles</h2>
				<p>Hier sind die Film Detiles</p>
				<form method="post">
					<table border="1" cellpadding="5" cellspacing="0">
						<?php
						while($row = $result->fetch_object()) {
							$title = htmlentities($row->title, ENT_QUOTES, "UTF-8");
							$genre = htmlentities($row->genre, ENT_QUOTES, "UTF-8");
							$beschreibung = htmlentities($row->beschreibung, ENT_QUOTES, "UTF-8");
							$dauer = htmlentities($row->dauer, ENT_QUOTES, "UTF-8");
							$filmname = htmlentities($row->filmname, ENT_QUOTES, "UTF-8");
							?>
							<tr>
								<th style="width: 150px;">title</th>
								<td><?php echo $title; ?></td>
							</tr>
							<tr>
								<th style="width: 150px;">genre</th>
								<td><?php echo $genre; ?></td>
							</tr>
							<tr>
								<th style="width: 200px;">beschreibung</th>
								<td><?php echo $beschreibung; ?></td>
							</tr>
							<tr>
								<th style="width: 150px;">dauer</th>
								<td><?php echo $dauer; ?></td>
							</tr>
							<video class="video2" controls>
								<<source src="hochgeladenes/<?php echo "$filmname" ?>.mp4" type="video/mp4">
								<source src="hochgeladenes/<?php echo "$filmname" ?>.ogg" type="video/ogg">
								Your browser does not support the video tag.
							</video>
							<tr>
								<td><a href="php/faforitphp.php?id=<?php echo $id; ?>">Faforisiren</a></td>
							</tr>
							<?php
						}
						?>
					</table>
				</form>
<?php
require_once 'includes/footer.php';
?>