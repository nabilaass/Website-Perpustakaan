<?php

include('connection.php');
if(!$_SESSION['login']) {
    header("location: login.php");
}
$statement = oci_parse($connection, "SELECT * FROM TB_BUKU WHERE DEL_FLAGE=0");
oci_execute($statement);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php'); ?>
</head>
<body>
    <!-- <?php include('nav.php'); ?> -->

    <div class="container" style="margin-top: 100px; margin-bottom: 100px;">
        <div class="pt-5">
            <h3 class="text-center"><b>Daftar Buku</b></h3>
            <?php if(!empty($_SESSION['message'])) {
                echo $_SESSION['message'];
                $_SESSION['message']= null;
            } ?>
        </div>
        <div class="card mt-5">
            <div class="card-header">
                <a class="btn btn-primary float-right" href="tambah.php"><i class="fas fa-plus"></i>Tambah</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered" >
                    <thead >
                        <tr >
                            <td>No</td>
                            <td>Judul Buku</td>
                            <td>Penerbit</td>
                            <td>Tanggal Penerbit</td>
                            
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 0;
                        while($row = oci_fetch_array($statement)): ?>
                         <tr>
                             <td><?= $no++; ?></td>
                             <td><?= $row['JUDUL_BUKU']; ?></td>
                             <td><?= $row['PENERBIT']; ?></td>
                             <td><?= $row['TGL_PENERBIT']; ?></td>
                             
                             <td>
                                 <a href="ubah.php?id=<?= $row['ID_BUKU'];?>" class="btn btn-primary btn-block">Ubah</a>
                                 <a href="detel.php?id=<?= $row['ID_BUKU'];?>" class="btn btn-secondary btn-block">Detail</a>
                                 <a href="hapus.php?id=<?= $row['ID_BUKU'];?>" class="btn btn-danger btn-block" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
                             </td>
                         </tr>
                         <?php endwhile;?>
                   </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary float-right" href="ulasan.php">Lihat Ulasan</a>
            </div>
        </div>
    </div>

<!-- <?php include('js.php');?> -->
</body>
</html>