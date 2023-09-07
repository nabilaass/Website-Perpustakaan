<?php

include('connection.php');

if(isset($_POST['submit'])) {
    $id_buku = $_POST['id_buku'];
    $judul= $_POST['judul'];
    $penerbit = $_POST['penerbit'];
    $tgl = $_POST['tgl'];
    
    $updated_at = date('Y-m-d H:i:s');
    $statement = oci_parse($connection, "UPDATE TB_BUKU SET JUDUL_BUKU='$judul', PENERBIT='$penerbit', 
        TGL_PENERBIT= TO_DATE('$tgl','yyyy-mm-dd'), 
        UPDATED_AT=TO_DATE('$updated_at','yyyy-mm-dd hh24:mi:ss') WHERE ID_BUKU='$id_buku'");
    if (oci_execute($statement)) {
        $_SESSION['message'] = '<div class="alert alert-succes" role="alert">Berhasil Mengubah Data</div>';
        header("location: home_admin.php");
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Gagal Mengubah Data</div>';
        // header("location: detel.php?id=$id_buku");
    }
}
?>
