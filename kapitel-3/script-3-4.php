<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift 3.4</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Talserie</h1>
        <?php
        /* Ta emot data som skickas */
        $talet = $_REQUEST["talet"];
  
        
        for ($i=$talet; $i <= 50; $i++) { 
            echo "$i " . $i * $i . " ";
          
        }
   
        ?>
    </div>
</body>
</html>