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
        <h1>Bilder från Unsplash</h1>
        <div class="kol2">
        
            <?php
            /* Läsa in textfil */
            $textfil = 'unsplash.txt';
            $katalog = './bilder';

            /* läsa in katalogen med bilder */
            $bilder = scandir($katalog);
            //var_dump($bilder);

            $rader = file($textfil);
            /* var_dump($rader); */

            /* Ta ut rad för rad */
            foreach ($rader as $rad) {
                /*   var_dump($rad); */

                /* Få ut possitionen på första mellanslaget */
                $pos = strpos($rad, " ");
                /* Klipp ut länken från 0 till första mellanslaget */
                $lank = substr($rad, 0, $pos);
                /* Klipp ut slutet på raden till första mellanslaget */
                $bildtext = substr($rad, $pos + 1);
                /* Trimmar bort osynliga tecken */
                $bildtext = trim($bildtext);
                //var_dump($pos, $lank, $bildtext);
                /* Ta ut fotografens namn */
                $namn = substr($bildtext, 9);
                $namn = substr($namn, 0, -12);

                /* Göra om namnen till små boxstäver samt byta ut " " till - */
                $namn = strtolower($namn);
                
                $namn = str_replace(" ", "-", $namn);
                //var_dump($namn);
                
                /* Hitta bilden som innehåller namnet */
                foreach ($bilder as $bild) {
                    $pos = strpos($bild, $namn);

                    if ($pos !== false) {
                        echo "<figure>
                            <a href=\"./bild.php?bild=$bild&bildtext=$bildtext\"><img src=\"$lank\" alt=\"$bildtext\"></a>
                            <figcaption>$bildtext</figcaption>
                            </figure>";                         
                    }
                }
            }

            ?>
        </div>
    </div>
</body>
</html>