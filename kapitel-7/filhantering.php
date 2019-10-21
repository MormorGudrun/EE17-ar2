<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    /* Filnamn */
    $filnamn = "test.txt";

    /* Öppna filen för att skriva */
    $handtag = fopen($filnamn, 'w');

    /* Skriva i filen */
    fwrite($handtag, "Hej på dig!");
    echo "<p>En rad har skrivits i filen $filnamn.</p>";

    /* Stänga filen */
    fclose($handtag);



       /* Öppna filen för att läsa */
       $handtag = fopen($filnamn, 'r');

       /* Skriva i filen */
       $texten = fread($handtag, filesize($filnamn));
        echo "<p>$texten</p>";
       /* Stänga filen */
       fclose($handtag);

       /* Enklare sätt att läsa in en fil */
       /* 1. File_get_content */
    $filnamn = "sang.txt";
    $texten = file_get_contents($filnamn);
    echo "<p>$texten</p>";

    /* 2. file() */
    $filnamn = "sang.txt";
    $rader = file($filnamn);
    foreach ($rader as $rad) {
        echo "<p>$rad</p>";
    }
    ?>
</body> 
</html>