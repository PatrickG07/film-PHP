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
if (isset($_POST['title'])) {
    $title = $_POST['title'];
}
$sql = "SELECT * FROM `tblfilm` WHERE `title` LIKE '%$title%' ORDER BY `title`";
$result = $db->query($sql);
?>
<table  border="1" cellpadding="5" cellspacing="0">
		<tr style="text-align: left;">
		<th style="width: 150px;">genrefk</th>
		<th style="width: 150px;">title</th>
		<th style="width: 200px;">beschreibung</th>
		<th style="width: 200px;">dauer</th>
		<th>Faforit</th>
		<th>Detile</th>
	</tr>
<?php
while ($row=$result->fetch_object()) {
	$id = $row->id;
	$genre = htmlentities($row->genre, ENT_QUOTES, "UTF-8");
	$userfk = htmlentities($row->userfk, ENT_QUOTES, "UTF-8");
	$title = htmlentities($row->title, ENT_QUOTES, "UTF-8");
	$beschreibung = htmlentities($row->beschreibung, ENT_QUOTES, "UTF-8");
	$dauer = htmlentities($row->dauer, ENT_QUOTES, "UTF-8");;
	?>
		<tr>
			<td><?php echo $genre; ?></td>
			<td><?php echo $title; ?></td>
			<td><?php echo $beschreibung; ?></td>
			<td><?php echo $dauer; ?></td>
			<td><a href="faforitphp.php?id=<?php echo $id; ?>">Faforisiren</a></td>
			<td><a href="/film/filmdetile.php?id=<?php echo $id; ?>">Detile</a></td>
		</tr>
	</table>
	<?php
}
header("location: /film/filmsuche.php")
?>
</table>