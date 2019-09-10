<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Script 2.3</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<?php
/* Ta emot data */
    $bgfärg = $_REQUEST["bgfärg"];
    

/* Ändra bakgrundsfärg */
    echo "<body style=\"background: $bgfärg\">";
?>

    <div class="kontainer">

        <h1>Bekräftelse</h1>
    </div>
</body>
</html>