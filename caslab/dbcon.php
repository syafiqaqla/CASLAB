<?php
    define("HOSTNAME", "localhost");
    define("USERNAME","root");
    define("PASSWORD","");
    define("DATABASE","tp_db");

    $connected = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

    if (!$connected) {
        die("Connection Failed");
    } else {
        echo ("Connection Succes");
    }
?>

