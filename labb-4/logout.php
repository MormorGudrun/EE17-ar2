<?php
/*
* PHP version 7
* @category   
* @author     Carl-Axel Jirner <carl-axel.jirner@gmail.com>
* @license    PHP CC
*/
session_start();
/* Är användaren inte inloggad? */
if (!$_SESSION['login']) {
    /* Nej, gå till loginsidan */
    $_SESSION['login'] = false;
}
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bloggen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link" href="./läsa.php">Läsa</a></li>
                <li class="nav-item"><a class="nav-link" href="./skriva.php">Skriva</a></li>
                <li class="nav-item"><a class="nav-link" href="./login.php">Logga in</a></li>
                <li class="nav-item"><a class="nav-link " href="./logout.php">Logga ut</a></li>
                
            </ul>
        </nav>
        <?php
          session_destroy();
          echo "<p class=\"alert alert-success\">Du är nu utloggad!</p>";
        ?>
        
    </div>
</body>
</html>