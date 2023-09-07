<?php

include('connection.php');
if(!$_SESSION['login']) {
    header("location: login.php");
}
$statement = oci_parse($connection, "SELECT * FROM TB_ULASAN WHERE DEL_FLAGE=0 ORDER BY ID_ULASAN");
oci_execute($statement);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php'); ?>
</head>
<body>
    <div class="container" style="margin-top: 100px; margin-bottom: 100px;">
        <div class="pt-5">
            <h3 class="text-center"><b style="font-size: 3vw;" >Review BUKU</b></h3>
            <?php if(!empty($_SESSION['message'])) {
                echo $_SESSION['message'];
                $_SESSION['message']= null;
            } ?>
        </div>
        <div class="card mt-5">
            <div class="card-body">
                <table class="table table-bordered"  >
                    <thead>
                        <tr>
                            <td >Username</td>
                            <td >Ulasan</td>
                            <td >Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        while($row = oci_fetch_array($statement)): ?>
                         <tr>
                             <td><?= $row['USERNAME']; ?></td>
                             <td><?= $row['ULASAN']; ?></td>
                             <td>
                                 <a href="hapus_ulasan.php?id=<?= $row['ID_ULASAN'];?>" class="btn btn-danger btn-block" style="font-size: 1.5vw;"onclick="return confirm('Apakah anda yakin?')">Hapus</a>
                             </td>
                         </tr>
                         <?php endwhile;?>
                   </tbody>
                </table>
            </div>
        </div>
    </div>
<!-- <?php include('footer.php');?> -->
</body>
</html>