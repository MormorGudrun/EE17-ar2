<?php
/*
* PHP version 7
* @category   
* @author     Carl-Axel Jirner <carl-axel.jirner@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Logga in!</h1>
<form action=" <?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<input type="text" name="namn">
<input type="password" name="password">
<button>Logga in</button>
</form>
<?php
/* Läs av användar namn och lösen */
$namn = filter_input(INPUT_POST, "namn", FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

if ($namn && $password) {
    $rader = file("info.txt") or die("Kan inte öppna filen");
    foreach ($rader as $rad) {
        $delar = explode(" ", $rad);
        $nyNamn = $delar[0];
        $hash = $delar[1];

        if ($namn == $nyNamn) {

            if (password_verify($password, $hash)) {
                echo "<p class=\"alert alert-success\">Du är inloggad</p>";
                exit();
            } else {
                echo "<p>Fel inloggning</p>";
                exit();
            }
        }
    }
    echo "<p>Användarnamnet finns inte!!</p>";
}
?>
</body>
</html>