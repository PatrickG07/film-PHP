<?php
session_start();
session_destroy();
 
die('Logout erfolgreich. Weiter zu <a href="/film/index.php">Haubtseite</a>');


?>