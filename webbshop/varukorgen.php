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
        <h1>Din varukorg!</h1>
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
    /* Läs in textfilen varukorg.txt i en array */
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
       
        
    </div>
</body>
</html>