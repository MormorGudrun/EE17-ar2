<?php
/*
* Gör ett formulär där användaren ska fylla i ett domännamn.
1. Kontrollera sedan att domännamnet slutar på .com, .net eller .org.
2. Du ska också kontrollera att de övriga tecknen endast består av bokstäver a-z, siffror 0-9 eller bindestreck (-).
3. Första tecknet måste vara en bokstav.
4. Domännamnet ska vara minst sex tecken och högst 200 tecken långt.
*
* PHP version 7
* @category   Kontrollera inmatning
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift 6.1</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Domännamn kontroll</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label>Domän</label>
            <input type="text" name="domain" required>
            <button class="primary">Skicka</button>
        </form>
        <?php
        /* Ta emot data som skickas */
        $domain = filter_input(INPUT_POST, 'domain', FILTER_SANITIZE_STRING);
        if ($domain) {
            /* Kontrollera att domännamnet slutar på .com, .net eller .org */
            if (preg_match("/.com|.net|.org$/", $domain)) {
                echo "<p>Domännamnet slutar på .com, .net eller .org.</p>";
            } else {
                echo "<p>Domännamnet slutar INTE på .com, .net eller .org.</p>";
            }
            /* Du ska också kontrollera att de övriga tecknen endast består av bokstäver a-z, siffror 0-9 eller bindestreck (-). */
            if (preg_match("/[a-z0-9\-]+.(com|net|org)$/", $domain)) {
                echo "<p>Domännamnet innehåller bara bokstäver...</p>";
            } else {
                echo "<p>Domännamnet innehåller INTE bara bokstäver...</p>";
            }
            /* Första tecknet måste vara en bokstav. */
            if (preg_match("/^[a-z][a-z0-9\-]+.(com|net|org)$/", $domain)) {
                echo "<p>Domännamnet innehåller bara bokstäver...</p>";
            } else {
                echo "<p>Domännamnet innehåller INTE bara bokstäver...</p>";
            }
            /* Domännamnet ska vara minst sex tecken och högst 200 tecken långt. */
            if (preg_match("/^[a-z][a-z0-9\-]{3,195}.(com|net|org)$/", $domain)) {
                echo "<p>Domännamnet innehåller bara bokstäver...</p>";
            } else {
                echo "<p>Domännamnet innehåller INTE bara bokstäver...</p>";
            }
        }
        ?>
    </div>
</body>
</html>