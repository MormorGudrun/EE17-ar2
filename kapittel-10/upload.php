<?php
/* Har man tryckt på knappen "submit"*/
if (isset($_POST['submit'])) {
    /* Läs av filen */
    $file = $_FILES['file'];
    var_dump($file);
    /* Vad är filnamnet? */
    $fileName = $file['file']['name'];
}