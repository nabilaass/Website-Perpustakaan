<?php 

include('connection.php');
if (!$_SESSION['login']){
    header("location: index.php");
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
            <h3 class="text-center" ><b>TAMBAH BUKU</b></h3>
            <?php if(!empty($_SESSION['message'])) {
                echo $_SESSION['message'];
                $_SESSION['message'] = null;
            } ?>
        </div>
        <div class="card mt-5">
            <form method="POST" action="tambah_proses.php">
                <div class="card-body">
                    <div class="form-group">
                        <label for="judulbuku">JUDUL BUKU</label>
                        <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan judul..." required>
                    </div>
                    <div class="form-group">
                        <label for="penerbit">PENERBIT</label>
                        <input type="text" name="penerbit" id="penerbit" class="form-control" placeholder="Masukkan penerbit..." required>
                    </div>
                   
                    <div class="form-group">
                        <label for="tanggal">TANGGAL PENERBIT</label>
                        <input type="date" name="tgl" id="tgl" class="form-control" placeholder="Masukkan Tanggal..." required>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="button" class="btn btn-danger" onclick="history.back()">Batal</button>
                    <input type="submit" name="submit" class="btn btn-succes" value="SIMPAN" onclick="return confirm('Apakah anda yakin?')"/>
                </div>
            </form>
        </div>
    </div>
<!-- <?php include('js.php'); ?> -->
</body>
</html>