<?php
include_once "./konfig-db.php";

/* Ta emot POST-data */
$namn = filter_input(INPUT_POST, "namn", FILTER_SANITIZE_STRING);
$poäng = filter_input(INPUT_POST, "poäng", FILTER_SANITIZE_STRING);

/* Kontreollera att data finns */
if ($namn && $poäng) {
    echo "Mottaget: $namn $poäng";

    /* Uppdatera tabellraden med poäng */
    $sql = "UPDATE pong SET poäng='$poäng' WHERE namn='$namn'";
    $result = $conn->query($sql);

    if (!$result) {
        die("Något blev fel med SQL $conn->error");
    } else {
        echo "Poängen har sparats!";
    }

} else {
    echo "Oj något gick fel...";
}