<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Script 2.2</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <?php
        /* Tar emot data */
        $namn = $_REQUEST["namn"];
        $email = $_REQUEST["epost"];
        $kontaktad = $_REQUEST["kontaktad"];
        /* Resultatet */
        echo "<p>Namn: $namn.</p>";
        echo "<p>Epost: $email.</p>";
    
        //var_dump($kontaktad);//
        echo "<p>Vi kommer att kontakta dig inom snarast per $kontaktad.</p>";
        ?>
    </div>
</body>
</html>