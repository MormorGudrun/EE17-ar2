<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Filsystem</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    $katalog = "../kapitel-7";

    /* Skanna av katalogen */
    $resultat = scandir($katalog);

    /* Skriv ut resultat */
    foreach ($resultat as $objekt) {
        /* Ta inte med . och .. */
        if ($objekt != '.' && $objekt != '..') {

            /* Är det en katalog? */
            if (is_dir("$katalog/$objekt")) {
                echo "<p>Katalog: $objekt</p>";
            }
                echo "<p>Fil: $objekt</p>";
                $filinfo = pathinfo($objekt);
                $filtyp = $filinfo['extension'];
                echo "<p>Filtypen är $filtyp</p>";
        } 
        
    }
    ?>
</body>
</html>