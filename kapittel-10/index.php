<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ladda upp</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Ladda upp filer</h1>
        <?php
        $uploadsuccess = filter_input(INPUT_GET, 'uploadsuccess', FILTER_SANITIZE_STRING);
        if ($uploadsuccess) {
            echo "<p>Filen har laddats upp</p>";
        }
        ?>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <label>Filnamn</label>
            <input type="file" name="file" required>
            <button class="primary" type="submit" name="submit">Upload</button>
        </form>
        <?php
     

        ?>
    </div>
</body>
</html>