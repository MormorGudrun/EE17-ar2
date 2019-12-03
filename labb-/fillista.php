<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FIllista</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="kontainer">
        <h1>Katalog</h1>
        <?php
    $katalog = ".";
    $resultat = scandir($katalog);

    echo "<table>";
    foreach ($resultat as $objekt) {
        if ($objekt != '.' && $objekt != '..') {
            if (is_dir($objekt)) {
                echo "<tr><td><i class=\"fa fa-folder\"></i></td><td>$objekt</td></tr>";
            } else {
                $bildinfo = pathinfo($objekt);
                $filtyp = $bildinfo['extension'];
                if ($filtyp == "jpg") {
                    echo "<tr><td><img src=\"$objekt\"></td><td>$objekt</td></tr>";
                } else {
                    echo "<tr><td><i class=\"fa fa-file\"></i></td><td>$objekt</td></tr>";
                }  
            }
        }
    }
    echo "</table>";
    ?>
    </div>
</body>
</html>