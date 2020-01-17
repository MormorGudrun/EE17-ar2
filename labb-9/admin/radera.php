<?php
/*
 * PHP version 7
 * @category
 * @author     Carl-Axel Jirner <carl-axel.jirner@gmail.com>
 * @license    PHP CC
 */
session_start();
include_once "../konfig-db.php";
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bloggen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="kontainer">
    <h1>Bloggen</h1>
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link" href="../lasa.php">Läsa</a></li>
                <?php if (!isset($_SESSION['login'])) {?>
                <li class="nav-item"><a class="nav-link" href="../sok.php">Sök</a></li>
                <li class="nav-item"><a class="nav-link" href="./admin.php">Admin</a></li>
                <li class="nav-item"><a class="nav-link" href="./skriva.php">Skriva</a></li>
                <li class="nav-item"><a class="nav-link active" href="./radera.php">Radera</a></li>
                <?php } else {?>

                <?php }?>
            </ul>
        </nav>
        <main>
        <?php
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
$radera = filter_input(INPUT_POST, 'radera', FILTER_SANITIZE_STRING);

/* 1. Logga in på mysql-servern och välj databas */
$conn = new mysqli($host, $användare, $lösenord, $databas);
/* Gick det ansluta? */
if ($conn->connect_error) {
    die("Kunde inte ansluta till databasen: " . $conn->connect_error);
} else {
    /* echo "<p>Yipee! Gick bra att ansluta.</p>"; */
}

if ($id && !$radera) {
    /* 2. SQL */
    $sql = "SELECT * FROM blogg WHERE id = '$id'";
    /* Bearbeta svaret frpån databasen */
    $result = $conn->query($sql);
    /* Gick det bra? */
    
    if (!$result) {
        die("Något blev fel med SQL-satsen");
    } else {
        /* 3. ta emot svaren */
        $rad = $result->fetch_assoc();
        echo "<form action=\"#\" method=\"POST\">";
        echo "<div class=\"inlagg\">";
        echo "<h4>inlägg $id</h4>";
        echo "<p>$rad[datum]</p>";
        echo "<h4>$rad[rubrik]</h4>";
        echo "<p>$rad[inlagg]</p>";
        echo "</div>";
        echo "<button class=\"btn btn-danger\" name=\"radera\" value=\"1\">Radera inlägg</button>";
        echo "</form>";
    }

}
        if ($id && $radera) {

            /* Kör en sql fråga */
            $sql = "DELETE FROM blogg WHERE id = $id";
            $result = $conn->query($sql);

            /* Gick det bra? */
            if (!$result) {
                die("Något gick fel med SQL-Satsen.");
            } else {
                echo "<p class=\"alert alert-info\">Inlägg $id har raderats!</p>";
            }
        }
        /* 4. Stäng ned anslutningen */
        $conn->close();
        ?>
        </main>
    </div>
</body>
</html>