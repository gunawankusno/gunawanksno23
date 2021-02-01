<?php
    error_reporting(0);
    include 'koneksi.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Mahasiswa</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.4.1.min.js"></script>
</head>
<body>
    
    <div class="container col-md-10">
        <div class="card">
            <div class="card header bg-danger text-white">
                <center>Table Data Mahasiswa</center>
            </div>
            
            <div class="card-body">
                <a href="index.php" class="btn btn-primary">Tambah Data</a>
                
                <form action="" method="POST">
                <input type="text" name="query" placeholder="Cari Data Mahasiswa"/>
                <input type="submit" name="cari" value="search"/>
                </form>
               <table class="table table-bordered">
                    <tr>
                        <th style="text-align:center;">No</th>
                        <th style="text-align:center;">NPM</th>
                        <th style="text-align:center;">Nama</th>
                        <th style="text-align:center;">Tempat Lahir</th>
                        <th style="text-align:center;">Tanggal Lahir</th>
                        <th style="text-align:center;">Jenis Kelamin</th>
                        <th style="text-align:center;">Alamat</th>
                        <th style="text-align:enter;">kodepos</th>
                        <th style="text-align:center;">Aksi</th>
                    </tr>
                    <?php
                            include "koneksi.php";
                            $no = 1;
                            $query = $_POST['query'];
                            if($query != ''){
                                $select = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE npm LIKE '%".$query."%' OR 
                                nama LIKE '%".$query."%'");
                            }else{
                                $select = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
                            }
                            if(mysqli_num_rows($select)){
                            while($data=mysqli_fetch_array($select))
                            { 
                    ?>
                    <tr>
                        <td> <?php echo $no++ ?></td>
                        <td> <?php echo $data['npm']; ?></td>
                        <td> <?php echo $data['nama']; ?></td>
                        <td> <?php echo $data['tempat_lahir']; ?></td>
                        <td> <?php echo $data['tanggal_lahir']; ?></td>
                        <td> <?php echo $data['jenis_kelamin']; ?></td>
                        <td> <?php echo $data['alamat']; ?></td>
                        <td> <?php echo $data['kode_pos']; ?></td>
                        <td>
                                <a href="edit_mahasiswa.php?npm=<?php echo $data['npm']; ?>" class= "btn btn-sm btn-warning">Edit</a>
                                <a href="delete.php?npm=<?php echo $data['npm']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                    
                            <?php }} else{
                                echo '<tr><td colspan="7">Tidak ada Data Mahasiswa</td></tr>';
                            } ?>
               </table>

            </div>
        </div>
    </div>
</body>
</html>