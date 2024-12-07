<?php include('dbcon.php'); ?>

<?php

    if(isset($_GET['judul'])) {
        $id = $_GET['judul'];
    }

    $query = "DELETE FROM 'tugas_pendahuluan' WHERE `judul` = $judul";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed".mysqli_error($connection));
    } else {
        header('location:index.php?delete_msg=You have deleted the record.');
    }

?>