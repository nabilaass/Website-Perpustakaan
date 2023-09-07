<?php 

include("connection.php");
if(!(isset($_SESSION['login']))) {
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php') ?>
</head>
<body>
    <div class="container" style="margin-top: 100px; margin-bottom: 100px;">
        <div class="pt-5">
            <h3 class="text-center" ><b style="font-size: 3vw;" >Pinjam Buku</b></h3>
            <?php if(!empty($_SESSION['message'])) {
                echo $_SESSION['message'];
                $_SESSION['message'] = null;
            } ?>
        </div>
        <div class="card mt-5">
            <form method="POST" action="proses.php">
                <div class="card-body">
                <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Masukkan Email..." required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Anda..." required>
                    </div>
                    
                    <div class="form-group">
                        <label for="judul_buku">Judul Buku</label>
                        <input type="text" name="judul_buku" id="judul_buku" class="form-control" placeholder="Masukkan Judul Buku..." required>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="button" class="btn btn-danger" onclick="history.back()">Batal</button>
                    <input type="submit" name="submit" class="btn btn-succes" value="SIMPAN" onclick="return confirm('Apakah anda yakin?')"/>
                </div>
            </form>
        </div>
    </div>
    <!-- <?php include('footer.php');?> -->
</body>
</html>
