<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift 2.2</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Bekräftelse</h1>
        <?php
        /* Ta emot data som skickas */
        $anamn = $_REQUEST["anamn"];
        $lösen = $_REQUEST["lösen"];
        /* Skriv svaret */
        if ($anamn == "karim" && $lösen == "123") {
            echo "<p>Du är inloggad!</p>";
        } else {
            header("Location: uppgift-3-2.php?fel=ja");
        }
        ?>
    </div>
</body>
</html>