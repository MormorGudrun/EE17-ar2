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
    <title>Spara</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Registrera</h1>
<form action=" <?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<input type="text" name="namn">
<input type="password" name="password">
<button>Skicka</button>
</form>
<?php
/* läsa in  */
$namn = filter_input(INPUT_POST, "namn", FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

if ($namn && $password) {
    /* Ta bort mellanslag och omvandla till småbokstäver */
    $nyNamn = trim($namn);
    $lösenord = trim($password);
    $användarnamn = strtolower($nyNamn);

    /* Krypera lösen */
    $hash = password_hash($lösenord, PASSWORD_DEFAULT);
    $info = "info.txt";

    /* Öppna text filen och skriv i den */
    $handtag = fopen($info, "a") or die("Kan inte öppna filen!");
    fwrite($handtag, "$användarnamn $hash \n");
    fclose($handtag);
    header("Location: ./loggain.php");
}


?> 
</body>
</html>