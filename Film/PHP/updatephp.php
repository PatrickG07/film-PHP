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

if (isset($_POST['atitle'])) {
    $atitle = $_POST['atitle'];
}
if (isset($_POST['genre'])) {
    $genre = $_POST['genre'];
}
if (isset($_POST['title'])) {
    $title = $_POST['title'];
}
if (isset($_POST['beschreibung'])) {
    $beschreibung = $_POST['beschreibung'];
}
if (isset($_POST['dauer'])) {
    $dauer = $_POST['dauer'];
}
if (isset($_POST['filmname'])) {
    $filmname = $_POST['filmname'];
}
session_start();
$userid = $_SESSION['userid'];
$stat = $db->prepare("UPDATE `tblfilm` SET genre=?, title=?, beschreibung=?,dauer=?, filmname=? WHERE title=? && userfk=?");
$stat->bind_param('ssssssi', $genre, $title, $beschreibung, $dauer, $atitle, $filmname, $userid);
$stat->execute();
$stat->close();

header("location: /film/manage.php")

?>