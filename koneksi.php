<?php
    $koneksi = mysqli_connect("localhost","root","","db_web");

    if(mysqli_connect_errno($koneksi))
    {
        echo"koneksi Gagal". mysqli_connect_error();
    }
?>