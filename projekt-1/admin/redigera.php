<?php
/*
 * PHP version 7
 * @category
 * @author     Carl-Axel Jirner <carl-axel.jirner@gmail.com>
 * @license    PHP CC
 */
session_start();
include_once "./konfig-db.php";
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stan</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <div class="kontainer">
        <div class="header">
            <h1>Stan</h1>
            <nav>
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link" href="../lasa.php">Läsa</a></li>
                    <li class="nav-item"><a class="nav-link" href="../sok.php">Sök</a></li>
                    <li class="nav-item"><a class="nav-link" href="./admin.php">Admin</a></li>
                    <li class="nav-item"><a class="nav-link" href="./skriva.php">Skriva</a></li>
                    <li class="nav-item"><a class="nav-link active" href="./redigera.php">Redigera</a></li>
                </ul>
            </nav>
        </div>
        <?php
            /* Läsa in id och hämta inläggets rubrik samt text. */
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
            $lyrics = filter_input(INPUT_POST, 'lyrics', FILTER_SANITIZE_STRING);
            $rubrik = filter_input(INPUT_POST, 'rubrik', FILTER_SANITIZE_STRING);

            /* 1. Logga in på mysql-servern och välj databas */
            $conn = new mysqli($host, $användare, $lösenord, $databas);
            /* Gick det ansluta? */
            if ($conn->connect_error) {
                die("Kunde inte ansluta till databasen: " . $conn->connect_error);
            } else {
                /* echo "<p>Yipee! Gick bra att ansluta.</p>"; */
            }
            if ($id && !$rubrik) {
                /* 2. SQL */
                $sql = "SELECT * FROM musik WHERE id = '$id'";
                /* Bearbeta svaret frpån databasen */
                $result = $conn->query($sql);

                if (!$result) {
                    die("Något blev fel med SQL-Satsen");
                } else {
                    /* Ta emot svar */
                    $rad = $result->fetch_assoc();
                    $lyrics = nl2br($rad[lyrics]);
                    echo "<div class=\"inlagg\">";
                    echo "<form action=\"#\" method=\"POST\">";
                    echo "<label>Rubrik</label>";
                    echo "<input type=\"text\" name=\"rubrik\" value=\"$rad[rubrik]\"required>";
                    echo "<label>Lyrics</label>";
                    echo "<textarea name=\"lyrics\" cols=\"30\" rows=\"10\">$lyrics</textarea>";
                    echo "<button class=\"alert alert-primary\" role=\"alert\" type=\"submit\">Uppdatera inlägget</button>";
                    echo "</form>";
                    echo "</div>";

                }

            }
            /* Ta emot text från formuläret */
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
            if ($lyrics && $rubrik) {
                /* 2. Registrera inlägget i tabellen*/
                $sql = "UPDATE musik SET rubrik='$rubrik', lyrics='$lyrics' WHERE id = $id";
                $result = $conn->query($sql);

                /* Gick det bra? */
                if (!$result) {
                    die("Något blev fel med SQL-satsen" . $conn->error);
                } else {
                    echo "<p class=\"alert alert-success\" role=\"alert\">Lyrics har sparats.</p>";
                }
                /* 4. Stäng ned anslutningen */
                $conn->close();

            }
            ?>
    </div>
</body>
</html>