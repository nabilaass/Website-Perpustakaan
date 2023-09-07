<?php 

include('connection.php');
if (!$_SESSION['login']){
    header("location: index.php");
}
$statement = oci_parse($connection, "SELECT * FROM TB_BUKU WHERE ID_BUKU = ".$_GET['id']);
oci_execute($statement);
while($row = oci_fetch_array($statement)) {
    $id_buku = $row['ID_BUKU'];
    $judul = $row['JUDUL_BUKU'];
    $penerbit = $row['PENERBIT'];
    $tgl = $row['TGL_PENERBIT'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php') ?>
</head>
<body>
    <!-- <?php include('nav.php'); ?> -->
    <div class="container" style="margin-top: 100px; margin-bottom: 100px;">
        <div class="pt-5">
            <h3 class="text-center" ><b>Detail Buku</b></h3>
        </div>
        <div class="card mt-5">
            <form>
                <div class="card=body">
                    <div class="form-group">
                        <label for="exampleInputEmail">JUDUL BUKU</label>
                        <input type="text" name="judul" id="judul" class="form-control" value="<?php echo $judul; ?>"  disabled>
                    </div>
                    <div class="form-group">
                        <label for="penerbit">PENERBIT</label>
                        <input type="text" name="penerbit" id="penerbit" class="form-control" value="<?php echo $penerbit; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="tgl">TANGGAL PENERBIT</label>
                        <input type="text" name="tgl" id="tgl" class="form-control" value="<?php echo $tgl; ?>" disabled>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
<!-- <?php include('js.php'); ?> -->
</body>
</html>