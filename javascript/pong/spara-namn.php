<?php
include_once "./konfig-db.php";

/* Ta emot POST-data */
$namn = filter_input(INPUT_POST, "namn", FILTER_SANITIZE_STRING);

/* Kontreollera att data finns */
if ($namn) {
    echo "Mottaget: $namn";

    /* Spara namnet i tabellen på databasen */
    $sql = "INSERT INTO pong SET namn='$namn'";
    $result = $conn->query($sql);

    if (!$result) {
        die("Något blev fel med SQL $conn->error");
    } else {
        echo "Namnet har sparats!";
    }
    
} else {
    echo "Oj något gick fel...";
}