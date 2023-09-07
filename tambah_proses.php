<?php
include('connection.php');

if (isset($_POST['submit'])){
    $judul = $_POST['judul'];
    $penerbit = $_POST['penerbit'];
    $tgl = $_POST['tgl'];
    $created_at = date('Y-m-d H:i:s');
    $del_flage = 0;
    $statement = oci_parse($connection, "INSERT INTO TB_BUKU(JUDUL_BUKU,PENERBIT,TGL_PENERBIT,CREATED_AT,DEL_FLAGE) VALUES 
        ('$judul','$penerbit',to_date('$tgl','yyyy-mm-dd'),to_date('$created_at','yyyy-mm-dd hh24:mi:ss'),'$del_flage')");
    if (oci_execute($statement)) {
        $_SESSION['message'] = '<div class="alert alert-succes" role="alert">Berhasil Menambahkan Data</div>';
        header("location: home_admin.php");
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Gagal Menambahkan Data</div>';
        header("location: tambah.php");
    }
}
?>