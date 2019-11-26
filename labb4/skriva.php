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
                <li class="nav-item"><a class="nav-link active" href="./skriva.php">Skriva</a></li>
            </ul>
        </nav>
        <form action="#" method="POST">
        <textarea name="skriva" id="" cols="30" rows="10"></textarea>
        <button type="submit">Skicka</button>
        </form>
        <?php
        $filnamn = 'blogg.txt';
        $skriva = filter_input(INPUT_POST, 'skriva', FILTER_SANITIZE_STRING);
        if ($skriva) {
            $nu = new DateTime();
            $handtag = fopen($filnamn, 'a');

            fwrite($handtag, "$skriva\n");

            fclose($handtag);
            
        }
        ?>
    </div>
</body>
</html>