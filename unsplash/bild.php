<?php
/*
 * PHP version 7
 * @category
 * @author     Carl-Axel Jirner <carl-axel.jirner@gmail.com>
 * @license    PHP CC
 */
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bildgalleri</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
       <?php
         $bild = filter_input(INPUT_GET, 'bild', FILTER_DEFAULT);
         $bildtext = filter_input(INPUT_GET, 'bildtext', FILTER_DEFAULT);
        if ($bild && $bildtext) {
            echo "<figure>
            <img src=\"./bilder/$bild\" alt=\"$bildtext\">
            <figcaption>$bildtext</figcaption>
            </figure>";
        }
           
       ?> 
       <a href="./galleri.php">Tillbaka</a>
    </div>
</body>
</html>