<?php
/* Regexp = regular expression = reguljära uttryck */
/* På samma sät som strstr() */
$adress = "Craafords väg 23";
if (preg_match("/väg/", $adress)) {
    echo "<p>Text innehåller ordet 'väg'.</p>";
} else {
    echo "<p>Text innehåller INTE ordet 'väg'.</p>";
}
if (preg_match("/2/", $adress)) {
    echo "<p>Text innehåller '2'.</p>";
} else {
    echo "<p>Text innehåller INTE '2'.</p>";
}
/* Leta efter siffror */
if (preg_match("/[0-9]/", $adress)) {
    echo "<p>Text innehåller siffror.</p>";
} else {
    echo "<p>Text innehåller INTE siffror.</p>";
}
/* Leta efter små bokstäver = gemena */
if (preg_match("/[a-zåäö]/", $adress)) {
    echo "<p>Text innehåller gemena.</p>";
} else {
    echo "<p>Text innehåller INTE gemena.</p>";
}
/* Leta efter att tecken inte finns */
if (preg_match("/[^_]/", $adress)) {
    echo "<p>Texten innehåller inte _.</p>";
} else {
    echo "<p>Text innehåller _.</p>";
}
/* Leta efter en eller flera 'a' */
if (preg_match("/a+/", $adress)) {
    echo "<p>Texten innehåller en eller flera a.</p>";
} else {
    echo "<p>Text innehåller inte en eller flera a.</p>";
}
/* Leta efter en eller två 'a' */
if (preg_match("/a{1,2}/", $adress)) {
    echo "<p>Texten innehåller en eller två a.</p>";
} else {
    echo "<p>Text innehåller inte en eller två a.</p>";
}
/* Leta efter alternativa ord */
if (preg_match("/väg|gata/", $adress)) {
    echo "<p>Texten innehåller ordet väg eller gata.</p>";
} else {
    echo "<p>Text innehåller inte ordet väg eller gata.</p>";
}
?>