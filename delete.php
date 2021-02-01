<?php
    include "koneksi.php";
    $id = $_GET['npm'];
    $ambildata = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE npm='$id'");
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/UAS_web/data_mahasiswa.php'>";
?>