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
<?php
    $anamn = filter_input(INPUT_POST, 'anamn', FILTER_SANITIZE_STRING);
    $lösen = filter_input(INPUT_POST, 'lösen', FILTER_SANITIZE_STRING);

    if ($anamn == "howimetyourobi" && $lösen == "123") {
        $_SESSION['login'] = true;
    }
?>
    <div class="kontainer">
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link" href="./läsa.php">Läsa</a></li>
                <li class="nav-item"><a class="nav-link" href="./skriva.php">Skriva</a></li>
                <?php if (!$_SESSION['login']) { ?>
                <li class="nav-item"><a class="nav-link active" href="./login.php">Logga in</a></li>
                <?php } else {  ?>
                <li class="nav-item"><a class="nav-link" href="./logout.php">Logga ut</a></li>
                <?php } ?>
            </ul>
        </nav>
        <?php
             /* Ta emot data som skickas */
             $fran = filter_input(INPUT_GET, 'fran', FILTER_SANITIZE_STRING);
             if ($fran == "skriva") {
                 echo "<p class=\"alert alert-info\">För att skriva ett inlägg måste du loggan in!</p>";
             } 
        ?>
        <form action="#" method="POST">
        <h2>Logga in</h2><br>
        <label>Användarnamn</label>
        <input type="text" name="anamn" placeholder="Tex erik12" required>
        <label>Lösenord</label>
        <input type="password" name="lösen" required>

        <button class="primary">Skicka</button>
        <?php
        if ($_SESSION['login']) {
            echo "<p class=\"alert alert-success\">Du är inloggad!</p>";
        } else {
            echo "<p class=\"alert alert-warning\">Du är inte inloggad</p>";
            //$_SESSION['login'] = false;
        }
        ?>
    </div>
</body>
</html>