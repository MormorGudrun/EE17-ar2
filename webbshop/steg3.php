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
        <h1>Bygg en egen PC - steg 3</h1>
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

   /* Skriv ut som tabell */
   echo "<table>";
   echo "<tr><th>Vara</th><th>Pris</th></tr>";
   foreach ($rader as $rad) {
       $vara = vara($rad);
       $pris = pris($rad);


       echo "<tr><td>$vara</td><td>$pris</td></tr>";
   }
   echo "</table>";
} else {
    echo "<p>varukorgen saknas!</p>";
}

?>
        <h2>Välj Ram</h2>
        <form action="./steg4.php" method="post">
        <?php
/* Lista alla produkter i katalogen */
$katalog = "./shop-bilder/ram";

$filer = scandir($katalog);
foreach ($filer as $fil) {
    $info = pathinfo("./$fil");
    if ($info['extension'] == 'jpg') {
        echo "<label>";
        echo "<input type=\"radio\" name=\"vara\" value=\"$fil\">";
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
    </div>
</body>
</html>