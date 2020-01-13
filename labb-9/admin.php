<?php
/*
* PHP version 7
* @category   
* @author     Carl-Axel Jirner <carl-axel.jirner@gmail.com>
* @license    PHP CC
*/
session_start();
/* Är användaren inte inloggad? */
include_once "./konfig-db.php";
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bloggen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="kontainer">
    <h1>Bloggen</h1>
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link" href="./lasa.php">Läsa</a></li>
                <li class="nav-item"><a class="nav-link" href="./skriva.php">Skriva</a></li>
                <?php if (!$_SESSION['login']) { ?>
                <li class="nav-item"><a class="nav-link active" href="./admin.php">Admin</a></li>
                <?php } else {  ?>
                
                <?php } ?>
            </ul>
        </nav>
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
         $sql = "SELECT * FROM blogg";
         /* Bearbeta svaret frpån databasen */
         $result = $conn->query($sql);
         /* Gick det bra? */
         if (!$result) {
             die("Något blev fel med SQL-satsen");
         } 
 
         /* 3. Ta emot svaren */
          echo "<table>";
          echo "<tr><th>Datum</th><th>Rubrik</th><th>Inlägg</th><th>Handling</th></tr>";
          while ($rad = $result->fetch_assoc()) {
             echo "<tr><td>$rad[datum]</td><td>$rad[rubrik]</td><td>$rad[inlagg]</td><td><i class=\"fa fa-edit\"></i><a href=\"./radera.php?id=$rad[id]\"><i class=\"fa fa-trash\"></i></a></td></tr>";
          }
           /* 4. Stäng ned anslutningen */
            $conn->close();
        ?>
    </div>
</body>
</html>