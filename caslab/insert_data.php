<?php
    include("dbcon.php");
    if(isset($_POST['add_tp'])) {
        echo "Message Passed";

        $fj = $_POST['judul'];
        $fsj = $_POST['subjudul'];
        $fk = $_POST['kategori'];
        $ftp = $_POST['tanggalpost'];
        $fd = $_POST['deadline'];
        $fds = $_POST['deskripsi'];

        if ($fj == "" || empty($fj)) {
            header('location:index.php?message=you need to fill judul');
        } else {
            $query = "INSERT INTO `tugas_pendahuluan` (`judul`, `subjudul`, `kategori`, `tanggalpost`, `deadline`, `deskripsi`) VALUES ('$fj', '$fsj', '$fk', `$ftp`, `$fd`, `$fds`)";

            $result = mysqli_query($connected, $query);

            if (!$result) {
                die("Query Failed" . mysqli_error($connected));
            } else {
                header('location:index.php?insert_msg=Your Data Has Been Added');
            }
        }
    }

?>