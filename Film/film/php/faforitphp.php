<?php
include 'connectphp.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
session_start();
$userid = $_SESSION['userid'];
$stat = $db->prepare("INSERT INTO `tblfavoriten` (filmfk, userfk) VALUES (?, ?)");
$stat->bind_param('ii', $id, $userid);
$stat->execute();
$stat->close();
header("location: /film/filmsuche.php")
?>