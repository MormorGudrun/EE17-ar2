<?php
    //Hämta dagens datum
    $titel = "Dagens lunch: " . date('l.\vW ');

    //skapa en array av bågra resturanger
    $matStälleLista =["Taco Bar", "Subway", "La Grande", "Falafelkungen", "Kebabkungen", "Mamma Mia", "Fafas"];

    var_dump($matStälleLista);

    //Hur många resturanger finns det i listan?
    $antal = count($matStälleLista);
    var_dump($antal);

    //Slumpa fram ett tal mellan 0-6
    $slumpTal = rand(0, $antal - 1);

    //Plocka ut framslumpad resturang 
    $matStälle = $matStälleLista[$slumpTal];

    $betyg = "Grymt gott varige dag";
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $titel ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
    <h1>Bästa matstället</h1>
    <div class="mat">
    <h2><?php echo $matStälle;?></h2>
    <p><?php echo $betyg;?></p>
    </div>
    </div>
</body>
</html>