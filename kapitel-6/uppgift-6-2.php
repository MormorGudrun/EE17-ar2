<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>uppgift-6-2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    $mat = "tomat och gurka";
    if (preg_match("/to/", $mat)) {
        echo "<p>Text innehåller ordet 'Det var en gång en '.</p>";
    } else {
        echo "<p>Text innehåller INTE ordet 'Det var en gång en'.</p>";
    }
    $mat = "tomat och gurka ";
    if (preg_match("/to/", $mat)) {
        echo "<p>Text innehåller ordet 'Det var en gång en '.</p>";
    } else {
        echo "<p>Text innehåller INTE ordet 'Det var en gång en'.</p>";
    }
    ?>
</body>
</html>