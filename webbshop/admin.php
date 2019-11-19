<?php
/*
 * PHP version 7
 * @category
 * @author     Carl-Axel Jirner <carl-axel.jirner@gmail.com>
 * @license    PHP CC
 */

include_once "./funktioner.inc.php";
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin.exe</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Bygg din pc</h1>
        <h2>Ladda upp en vara</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <label for="kategori">Kategori</label>
        <select name="kategori" id="kategori">
            <option value="cpu">CPU</option>
            <option value="kylare">Kylare</option>
            <option value="ram">RAM</option>
            <option value="disk">Disk</option>
            <option value="mobo">Moderkort</option>
            <option value="grafikkort">Grafikkort</option>
            <option value="psu">PSU</option>
            <option value="chassi">Chassi</option>
        </select>
        <label for="namn">Namn</label>
        <input type="text" name="namn" id="namn">
        <label for="">Pris</label>
        <input type="text" name="pris" id="pris">
        <label for="file"></label>
        <input type="file" name="file" id="file">
        <button>Ladda upp!</button>
        </form>
        <?php
/* Funkade det ladda upp? */
$kategori = filter_input(INPUT_POST, 'kategori', FILTER_SANITIZE_STRING);
$pris = filter_input(INPUT_POST, 'pris', FILTER_SANITIZE_STRING);
$namn = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_STRING);
var_dump($kategori, $namn, $pris);
if ($kategori && $namn && $pris) {
    /* Läs in filen */
    $file = $_FILES['file'];
    /* Vad är filnamnet? */
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    /* Plocka ut filändelsen */
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    /* Vilka bildtyper tillåter vi? */
    $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    /* Testa att filtypen är tillåten */
    if (in_array($fileActualExt, $allowed)) {

        /* Testar om det blev nåfot fel */
        if ($fileError === 0) {

            /* Testar filstorlek */
            if ($fileSize < 1000000) {

                /* Skapa ett filnamn: tex namn-pris.png  */
                $fileNameNew = $namn - $pris;
                $fileDestination = "$kategori/$fileNameNew";
                var_dump($fileNameNew, $fileDestination);
                /* Nu flyttar vi filen in i rätt katalog */
                //move_uploaded_file($fileTmpName, $fileDestination);

                /* Vi hoppar direkt tillbaka till formuläret med ett litet medelande om att vi lyckades ladda upp bilden */
                header("Location: admin.php?uploadsuccess=1");
            } else {
                echo "<p>Bilden måste vara mindre än 1000kb!</p>";
            }
        } else {
            echo "<p>Oj oj, där gick något fel</p>";
        }
    } else {
        echo "<p>Filtypen är en tillåten</p>";
    }

} else {

}
/* Ladda bilden med rätt namn och katalog */

?>
    </div>
</body>
</html>