<?php
echo "<h1>Vad är datatyper?</h1>";
?>
<p>Vilka datatyper finns i PHP?</p>
<?php
    $namn = "Carl-Axel"; // String
    $ålder = 18; // Int
    $telefon = "+46709580598"; //String
    $pi = 3.14; // Float/Decimal
    $harKörkort = true; // True
    $harHus = false; // Faslse
    $ee17 = ["Erik", "Markus", "Gene", "Emil", "Albin", "Carl-Axel", "Pontus"];

    echo "<p>$namn telefon är $telefon</p>";
    echo "<p>Jag kan pi = $pi</p>";
    echo "<p>harKörkort = $harKörkort</p>";
    echo "<p>harHus = $harHus</p>";
    print_r ($ee17);
    echo $ee17[5];
?>