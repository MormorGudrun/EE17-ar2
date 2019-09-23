<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift 3.3</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Talserie</h1>
        <?php
        /* Ta emot data som skickas */
        $tal1 = $_REQUEST["tal1"];
        $tal2 = $_REQUEST["tal2"];
        
        for ($i=$tal1 + 1; $i < $tal2; $i++) { 
            echo "$i ";
        }
   
        ?>
    </div>
</body>
</html>