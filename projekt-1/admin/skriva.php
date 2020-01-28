<?php
/*
* PHP version 7
* @category   
* @author     Carl-Axel Jirner <carl-axel.jirner@gmail.com>
* @license    PHP CC
*/
include_once "./konfig-db.php";
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stan</title>
    <link rel="stylesheet" href="../style.css">
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
                <li class="nav-item"><a class="nav-link" href="../lasa.php">Läsa</a></li>
                <li class="nav-item"><a class="nav-link" href="../sok.php">Sök</a></li>
                <li class="nav-item"><a class="nav-link" href="./admin.php">Admin</a></li>
                <li class="nav-item"><a class="nav-link active" href="./skriva.php">Skriva</a></li>
            </ul>
    </nav>
    </div>
        <div class="inlagg">
        <form action="#" method="POST">
        <label>Rubrik</label>
        <input type="text" name="rubrik" required>
        <label>Inlägg</label>
        <textarea name="lyrics" id="" cols="30" rows="10"></textarea>
        <button type="submit">Spara Lyrics</button>
        </form>
        </div>
        <?php
        $rubrik = filter_input(INPUT_POST, 'rubrik', FILTER_SANITIZE_STRING);
        $lyrics = filter_input(INPUT_POST, 'lyrics', FILTER_SANITIZE_STRING);
        if ($rubrik && $lyrics) {
             /* 1. Logga in på mysql-servern och välj databas */
             $conn = new mysqli($host, $användare, $lösenord, $databas);
             /* Gick det ansluta? */
             if ($conn->connect_error) {
                     die("Kunde inte ansluta till databasen: " . $conn->connect_error);
             } else {
                     /* echo "<p>Yipee! Gick bra att ansluta.</p>"; */
             }
 
                    /* 2. Registrera inlägget i tabellen*/
                    $sql = "INSERT INTO musik (rubrik, lyrics) VALUES ('$rubrik', '$lyrics')";
                    $result = $conn->query($sql);

                    /* Gick det bra? */
                    if (!$result) {
                        die("Något blev fel med SQL-satsen." . $conn->error);
                    } else {
                        echo "<p class=\"alert alert-success\">Inlägget har sparats!</p>";
                    }
        }
        ?>
        </div>
</body>
</html>