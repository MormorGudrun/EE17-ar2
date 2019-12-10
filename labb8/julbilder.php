<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Slumpa bilder</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/flatly/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
    <h1>Några slumpade bilder</h1>

    <?php
    /* Läsa in alla bilder, scandir() */
    $filer = scandir("./bilder");
    /* var_dump($filer); */ 
    /* Slumpa fram två bilder, rand() */
    $slumptal1 = rand(2, 11);
    $slumptal2 = rand(2, 11);
    /* Visa bilderna */
    /* echo $filer[$slumptal1] . "<br>" . $filer[$slumptal2]; */
   /*  echo "<img src=\"./bilder/$filer[$slumptal1]\">";
    echo "<br>";
    echo "<img src=\"./bilder/$filer[$slumptal2]\">"; */

    echo "<div id=\"carouselExampleIndicators\" class=\"carousel slide\" data-ride=\"carousel\">
  <ol class=\"carousel-indicators\">
    <li data-target=\"#carouselExampleIndicators\" data-slide-to=\"0\" class=\"active\"></li>
    <li data-target=\"#carouselExampleIndicators\" data-slide-to=\"1\"></li>
    <li data-target=\"#carouselExampleIndicators\" data-slide-to=\"2\"></li>
  </ol>
  <div class=\"carousel-inner\">
    <div class=\"carousel-item active\">
      <img class=\"d-block w-100\" src=\"./bilder/$filer[$slumptal1]\" alt=\"First slide\">
    </div>
    <div class=\"carousel-item\">
      <img class=\"d-block w-100\" src=\"./bilder/$filer[$slumptal2]\" alt=\"Second slide\">
    </div>
  </div>
  <a class=\"carousel-control-prev\" href=\"#carouselExampleIndicators\" role=\"button\" data-slide=\"prev\">
    <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>
    <span class=\"sr-only\">Previous</span>
  </a>
  <a class=\"carousel-control-next\" href=\"#carouselExampleIndicators\" role=\"button\" data-slide=\"next\">
    <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>
    <span class=\"sr-only\">Next</span>
  </a>
</div>";
    ?>
    </div>
</body>
</html>