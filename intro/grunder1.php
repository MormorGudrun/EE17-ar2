<?php
/*
* PHP version 7
* @category   PHP grunder
* @author     Carl-Axel <carlaxel.jirner@gmail.com>
* @license    PHP CC
*/
?>
<?php
echo "<h1>";
echo "Hello World!"; //kjlk 1k
echo "</h1>";

/* Nu testar vi enkel fnutt */
echo "<h2>";
echo 'Hello it\'s nice to see you';
echo "</h2>";

/* Skapar några variabler */
$namn = "Carl-axel";
$mittEfternamn = "Jirner";
$ålder = 18;
$gatuAdress = "Lindaus Väg 20";

echo $namn;
echo "<br>";
echo $mittEfternamn;
echo "<br>";

/* Hur man sätter ihop text */
echo "Hej!, Mitt namn är " . $namn . ", Mitt efternamn är " .  $mittEfternamn .
"<br>";
echo "Hej!, Mitt namn är " . $namn . ", Min ålder är " .  $ålder . "<br>";

/* Hur man sätter ihop text smartast */
echo "Hej!, Mitt namn är $namn , Jag bor på  $gatuAdress<br>";
echo 'Hej!, Mitt namn är $namn , Jag bor på  $gatuAdress<br>';


