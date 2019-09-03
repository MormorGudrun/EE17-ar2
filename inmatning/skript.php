
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Script</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="deg.css">
</head>
<body>
    <div class="kontainer">
        <?php
    // Tar emot data som skickats
    $förnamn = $_REQUEST["förnamn"];
    $efternamn = $_REQUEST["efternamn"];
    $mobil = $_REQUEST["mobil"];
    $kön = $_REQUEST["kon"];
    
    
    /* var_dump($_REQUEST); */
    // Skriv ut en snygg bekräfterlse
    
    
        echo   "<h1>Hej $förnamn  $efternamn och välkommen till ODZ kundservice </h1><br>";
        echo "<h3>Dina uppgifter är</h3><br>
        <p>Mobil nummer: $mobil<br>
        kön: $kön
        </p>";
        
                
    
    ?>
    </div>

    
</body>
</html>