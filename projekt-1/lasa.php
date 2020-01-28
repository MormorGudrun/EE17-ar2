<?php
/*
* PHP version 7
* @category   
* @author     Carl-Axel Jirner <carl-axel.jirner@gmail.com>
* @license    PHP CC
*/
session_start();
include_once "./admin/konfig-db.php";
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stan</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="kontainer">
    <div class="header">
    <h1>Stan</h1>
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" href="./lasa.php">Läsa</a></li>
                <li class="nav-item"><a class="nav-link" href="./sok.php">Sök</a></li>
                <li class="nav-item"><a class="nav-link" href="./admin/admin.php">Admin</a></li>
            </ul>
        </nav>
        </div>
        <main>
       
        <?php
        /* 1. Logga in på mysql-servern och välj databas */
        $conn = new mysqli($host, $användare, $lösenord, $databas);
        /* Gick det ansluta? */
        if ($conn->connect_error) {
                die("Kunde inte ansluta till databasen: " . $conn->connect_error);
        } else {
                /* echo "<p>Yipee! Gick bra att ansluta.</p>"; */
        }

        /* 2. SQL */
        $sql = "SELECT * FROM musik ORDER BY id DESC";
        /* Bearbeta svaret frpån databasen */
        $result = $conn->query($sql);
        /* Gick det bra? */
        if (!$result) {
            die("Något blev fel med SQL-satsen");
        } 

        /* 3. Ta emot svaren */
        while ($rad = $result->fetch_assoc()) {
            $lyrics = nl2br($rad[lyrics]);
            echo "<div class=\"lyrics\">";
            echo "<p>$rad[rubrik]</p>";
            echo "<h4>$lyrics</h4>";
            echo "<p>Betyg $rad[betyg] stjärnor</p>";
            echo "</div>";
        }
        
        /* 4. Stäng ned anslutningen */
        $conn->close();
        ?>
        
        
        </main>
    </div>
</body>
</html>