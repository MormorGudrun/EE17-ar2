
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Allsvenskan</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" type="text/css" href="/_/asset/no.seeds.app.sef:1572704276/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/_/asset/no.seeds.app.sef:1572704276/css/allsvenskan.min.css">
    <link rel="stylesheet" type="text/css" href="/_/asset/no.seeds.app.sef:1572704276/css/main-redesign.css">
</head>
<body>
    <div class="kontainer">
        <?php
        $veckonr = date('W');
        echo "<h1>Allsvenskans Lag v$veckonr</h1>";
        
       
            $sidan = file_get_contents("https://www.allsvenskan.se/");
    
            /* Sök början av horoskoptexten */
            $start = strpos($sidan, "<div class=\"show__desktop\">") + 28;
            if ($start !== false) { 
    
                     /* Sök slutet av horoskoptexten */
            $slut = strpos($sidan, "</div>", $start) + 6;
            if ($slut !== false) {
    
                 /* Plocka ut horoskoptexten */
                $horoskop = substr($sidan, $start, $slut - $start);
              
                echo $horoskop;
           } else {
                echo "<p>Hittade inte var horoskopet slutade!</p>";
           }
           } else {
                echo "<p>Hittade inte var horoskopet började!</p>";
           }
        
        ?>
    </div>
</body>
</html>