<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Script 2.4</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <?php
        /* Ta emot data */
        $temp =  $_REQUEST["temp"];
        $riktning = $_REQUEST["riktning"];

        if ($riktning == "CF") {
            $fahrenheit = 9/5 * $temp + 32;
        echo "<p>$temp&deg; Celsius är $fahrenheit&deg; Fahrenheit.</p>";
        } else {
            $celcius = ($temp - 32) * 5/9;
        echo "<p>$temp&deg; Fahrenheit är $celcius&deg; Celsius.</p>";
        }
        

        /* Skriva ut svaret F = (9/5)*C + 32 */
        
        ?>
    </div>
</body>
</html>