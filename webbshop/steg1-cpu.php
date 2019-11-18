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
        <h1>Bygg en egen PC - steg 1</h1>
        <h2>Välj CPU</h2>
        <form action="./steg2.php" method="post">
        <?php
/* Lista alla produkter i katalogen */
$katalog = "./shop-bilder/cpu";

$filer = scandir($katalog);
foreach ($filer as $fil) {
    $info = pathinfo("./$fil");
    if ($info['extension'] == 'jpg') {
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
        <button>nästa</button>
        </form>
    </div>
</body>
</html>