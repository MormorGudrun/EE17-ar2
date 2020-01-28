<<?php
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
    <title>Bloggen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                <li class="nav-item"><a class="nav-link active" href="./skriva.php">Skriva</a></li>
                <?php } else {?>
               
                <?php }?>
            </ul>
        </nav>
        

        <form action="#" method="POST">
        <label>Rubrik</label>
        <input type="text" name="rubrik" required>
        <label>Inlägg</label>
        <textarea name="inlägg" id="" cols="30" rows="10"></textarea>
        <button type="submit">Spara inlägg</button>
        </form>

        <?php
        $filnamn = 'blogg.txt';
        $inlagg = filter_input(INPUT_POST, 'inlägg', FILTER_SANITIZE_STRING);
        $rubrik = filter_input(INPUT_POST, 'rubrik', FILTER_SANITIZE_STRING);
        if ($inlagg && $rubrik) {
            /* 1. Logga in på mysql-servern och välj databas */
            $conn = new mysqli($host, $användare, $lösenord, $databas);
            /* Gick det ansluta? */
            if ($conn->connect_error) {
                    die("Kunde inte ansluta till databasen: " . $conn->connect_error);
            } else {
                    /* echo "<p>Yipee! Gick bra att ansluta.</p>"; */
            }

            /* 2. Registrera inlägget i tabellen*/
            $sql = "INSERT INTO blogg (rubrik, inlagg) VALUES ('$rubrik', '$inlagg')";
            $result = $conn->query($sql);

            /* Gick det bra? */
            if (!$result) {
                    die("Något blev fel med SQL-satsen");
            } else {
                    echo "<p>Inlägget har sparats.</p>";
            }
             /* 4. Stäng ned anslutningen */
            $conn->close();
            

}
?>
    </div>
</body>
</html>