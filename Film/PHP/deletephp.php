<?php

include 'connectphp.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
session_start();
$userid = $_SESSION['userid'];
$stat = $db->prepare("DELETE FROM `tblfilm` WHERE film_id = ? && userfk=?");
$stat->bind_param('ii', $id, $userid);
$stat->execute();
$stat->close();

header("location: /film/manage.php")

?>