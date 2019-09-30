<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $stad1 = "Stockholm";
    $stad2 = "Malmö";
    $stad3 = "Göteborg";
    $stad4 = "Filipstad";
    $städer = ["Stockholm", "Malmö", "Göteborg", "Filipstad"];
    $tomArray = [];
    $annanArray = array("Hej", "På", "Dig");
    //echo $städer;
    print_r($städer);
    echo $städer[2] . "<br>";
    $städer[] = "Helsingborg";
    print_r($städer);
    foreach ($städer as $stad) {
        echo "<p>Staden heter $stad.</p>";
    }
    //$språk = ["Sverige", "Norge", "England"];
    $språk['se'] = "Sverige";
    $språk['no'] = "Norge";
    $språk['en'] = "England";
    print_r($språk);
    foreach ($språk as $index => $land) {
        echo "<p>$index är landskod för $land</p>";
    }
    ?>
</body>
</html>