<?php

include 'connectphp.php';

if (isset($_POST['genre'])) {
    $genre = $_POST['genre'];
}
session_start();
$userid = $_SESSION['userid'];
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
$stat = $db->prepare("INSERT INTO `tblfilm`(`genre`, `userfk`, `title`, `beschreibung`, `dauer`, `filmname`) VALUES (?, ?, ?, ?, ?, ?)");
$stat->bind_param('sissss', $genre, $userid, $title, $beschreibung, $dauer, $filmname);
$stat->execute();
$stat->close();

header("location: /film/manage.php")

?>