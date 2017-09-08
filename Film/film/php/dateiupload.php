<?php
echo "<pre>";
echo "FILES:<br />";
print_r ($_FILES );
echo "</pre>";
if ( $_FILES['uploaddatei']['name']  <> "" )
{
    // Datei wurde durch HTML-Formular hochgeladen
    // und kann nun weiterverarbeitet werden
    move_uploaded_file (
         $_FILES['uploaddatei']['tmp_name'] ,
         'C:/xampp/htdocs/film/hochgeladenes/'. $_FILES['uploaddatei']['name'] );
}
?>