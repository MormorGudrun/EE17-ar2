<?php
/* Har man tryckt på knappen "submit"*/
if (isset($_POST['submit'])) {
    /* Läs av filen */
    $file = $_FILES['file'];
    var_dump($file);
    /* Vad är filnamnet? */
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    /* Plocka ut filändelsen */
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    /* Vilka bildtyper tillåter vi? */
    $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    /* Testa att filtypen är tillåten */
    if (in_array($fileActualExt, $allowed)) {
        
        /* Testar om det blev nåfot fel */
        if ($fileError === 0) {

            /* Testar filstorlek */
            if ($fileSize < 1000000) {

                /* Skapa ett nytt unikt filnamn så att vi inte ersätter filer  */
                $fileNameNew = uniqid('', true) . ".$fileActualExt";
                $fileDestination = "uploads/$fileNameNew";

                /* Nu flyttar vi filen in i rätt katalog */
                move_uploaded_file($fileTmpName, $fileDestination);

                /* Vi hoppar direkt tillbaka till formuläret med ett litet medelande om att vi lyckades ladda upp bilden */
                header("Location: index.php?uploadsuccess=1");
            } else {
                echo "<p>Bilden måste vara mindre än 1000kb!</p>";
            }
        } else {
            echo "<p>Oj oj, där gick något fel</p>";
        }
    } else {
        echo "<p>Filtypen är en tillåten</p>";
    }
}