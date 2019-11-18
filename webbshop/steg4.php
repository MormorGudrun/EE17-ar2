<?php
/*
* PHP version 7
* @category   
* @author     Carl-Axel Jirner <carl-axel.jirner@gmail.com>
* @license    PHP CC
*/

include_once "./funktioner.inc.php";
?>
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
        <h1>Bygg en egen PC - steg 4</h1>
        
        <h2>Välj Disk</h2>
        <form action="./steg5.php" method="post">
        <?php
/* Lista alla produkter i katalogen */
$katalog = "./shop-bilder/disk";

$filer = scandir($katalog);
foreach ($filer as $fil) {
    $info = pathinfo("./$fil");
    if ($info['extension'] == 'png') {
        echo "<label>";
        echo "<input type=\"radio\" name=\"vara\" value=\"$fil\" required>";
        echo "<img src=\"$katalog/$fil\">";
        $vara = vara($fil);
        $pris = pris($fil);
        echo "$vara $pris:-";
        echo "</label>";
    }
}

?>
        <button>Nästa</button>
        </form>
        <h2>Varukorg</h2>
        <?php
/* Visa innehållet på varukorgen = varukorg.txt*/
/* Läs in  textfilen varukor.txt i en array */
$varukorg = ("./varukorg.txt");

/* Ta emot data */
$vara = filter_input(INPUT_POST, 'vara', FILTER_SANITIZE_STRING);


/* Spara ner i textfilen varukorg.txt */
if ($vara) {
    $handtag = fopen($varukorg, 'a');
    fwrite($handtag, "$vara\n");
    fclose($handtag);
}

if (is_readable($varukorg)) {
    $rader = file($varukorg);
    $total = 0;

    /* Skriv ut som tabell */
    echo "<table>";
    echo "<thead>";
    echo "<tr><th>Vara</th><th>Pris</th></tr>";
    echo "</thead>";
    echo "<tbody>";
    foreach ($rader as $rad) {
        $vara = vara($rad);
        $pris = pris($rad);
        $total = $total + $pris;

        echo "<tr><td>$vara</td><td>$pris:-</td></tr>";
    }
    echo "</tbody>";
    echo "<tfoot>";
    echo "<tr><td>Totalt</td><td>$total:-</td></tr>";
    echo "</tfoot>";
    echo "</table>";
} else {
    echo "<p>varukorgen saknas!</p>";
}

?>
        
    </div>
</body>
</html>