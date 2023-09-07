<?php 
include('connection.php');
if(!$_SESSION['login']) {
    header("location: index.php");
}
$statement = oci_parse($connection, "SELECT * FROM TB_BUKU WHERE ID_BUKU = ".$_GET['id']);
oci_execute($statement);
while($row = oci_fetch_array($statement)){
    $id_buku = $row['ID_BUKU'];
    $judul = $row['JUDUL_BUKU'];
    $penerbit = $row['PENERBIT'];
    $tgl = date('Y-m-d',strtotime($row['TGL_PENERBIT']));
    
}
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
            <h3 class="text-center" ><b>Ubah Data Buku</b></h3>
            <?php if(!empty($_SESSION['message'])) {
                echo $_SESSION['message'];
                $_SESSION['message'] = null;
            } ?>
        </div>
        <div class="card mt-5">
            <form method="POST" action="ubah_proses.php">
                <div class="card-body">
                <div class="form-group">
                        <label for="exampleInputEmail">ID BUKU</label>
                        <input type="number" name="id_buku" id="id_buku" class="form-control" placeholder="Masukkan ID..." value="<?php echo $id_buku; ?>" required>
                        <input type="hidden" name="id_buku" id="id_buku" value="<?php echo $id_buku; ?>" >
                    </div>
                    <div class="form-group">
                        <label for="judul">JUDUL BUKU</label>
                        <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan judul..." value="<?php echo $judul; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="penerbit">PENERBIT</label>
                        <input type="text" name="penerbit" id="penerbit" class="form-control" placeholder="Masukkan penerbit..." value="<?php echo $penerbit; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tgl">TANGGAL PENERBIT</label>
                        <input type="date" name="tgl" id="tgl" class="form-control" placeholder="Masukkan tanggal..." value="<?php echo $tgl; ?>" required>
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
</body>
</html>