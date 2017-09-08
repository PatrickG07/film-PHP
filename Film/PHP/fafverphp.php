<?php

include 'connectphp.php';

if (isset($_GET['fid'])) {
    $fid = $_GET['fid'];
}
$stat = $db->prepare("DELETE FROM `tblfavoriten` WHERE filmfk=?");
$stat->bind_param('i', $fid);
$stat->execute();
$stat->close();

header("location: /film/fafver.php")

?>