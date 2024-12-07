<?php
    include("dbcon.php");
    if(isset($_POST['add_tp'])) {
        echo "Message Passed";

        $fj = $_POST['judul'];
        $fsj = $_POST['subjudul'];
        $ftp = $_POST['tanggalpost'];

        if ($fj == "" || empty($fj)) {
            header('location:index.php?message=you need to fill the first name');
        } else {
            $query = "INSERT INTO `tugas_pendahuluan` (`judul`, `subjudul`, `tanggalpost`) VALUES ('$fname', '$lname', '$age')";

            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("Query Failed" . mysqli_error($connection));
            } else {
                header('location:index.php?insert_msg=You Data Has Been Added');
            }
        }
    }

?>