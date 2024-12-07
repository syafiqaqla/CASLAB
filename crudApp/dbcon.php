<?php
    define("HOSTNAME", "localhost");
    define("USERNAME","root");
    define("PASSWORD","");
    define("DATABASE","tp_db");

    $connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

    if (!$connection) {
        die("Connection Failed");
    } else {
        echo ("Connection Succes");
    }
?>

