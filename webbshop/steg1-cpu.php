<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Bygg en egen PC - steg 1</h1>
        <h2>Varukorg</h2>
        <?php
/* Visa innehållet på varukorgen = varukorg.txt*/
/* Läs in  textfilen varukor.txt i en array */
$varukorg = ("./varukorg.txt");
if (is_readable($varukorg)) {
    $rader = file($varukorg);

    /* Skriv ut rad-för-rad */
    foreach ($rader as $rad) {
        echo "<p>$rad</p>";
    }
} else {
    echo "<p>varukorgen saknas!</p>";
}

?>
        <h2>Välj CPU</h2>
        <form action="" method="post">
        <?php
/* Lista alla produkter i katalogen */
$katalog = "./shop-bilder/cpu";

$filer = scandir($katalog);
foreach ($filer as $fil) {
    $info = pathinfo("./$fil");
    if ($info['extension'] == 'jpg') {
        echo "<label>";
        echo "<input type=\"radio\" name=\"kon\" value=\"kille\">";
        echo "<img src=\"$katalog/$fil\">";
        echo "<p>$fil</p>";
        echo "</label>";
    }
}

?>
        <button>Nästa</button>
        </form>
    </div>
</body>
</html>