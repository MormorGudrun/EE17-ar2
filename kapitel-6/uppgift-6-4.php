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
    $text = "Det var en gng en ... ";
    if (preg_match("/[Dd]et var en gång/", $text)) {
        echo "<p>Text innehåller ordet 'Det var en gång en '.</p>";
    } else {
        echo "<p>Text innehåller INTE ordet 'Det var en gång en'.</p>";
    }
    $text = "Det var en gng en ... ";
    if (preg_match("/Ddet var en gång/i", $text)) {
        echo "<p>Text innehåller ordet 'Det var en gång en '.</p>";
    } else {
        echo "<p>Text innehåller INTE ordet 'Det var en gång en'.</p>";
    }
    ?>
</body>
</html>