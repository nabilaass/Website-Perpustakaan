<?php
include('connection.php');

if (isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $created_at = date('Y-m-d H:i:s');
    $del_flage = 0;
    $statement = oci_parse($connection, "INSERT INTO TB_USER(NAMA,EMAIL,NO_HP,ALAMAT,USERNAME,PASSWORD,CREATED_AT,DEL_FLAGE) VALUES 
        ('$nama','$email','$no_hp','$alamat','$username','$password',to_date('$created_at','yyyy-mm-dd hh24:mi:ss'),'$del_flage')");
    if (oci_execute($statement)) {
        $_SESSION['message'] = '<div class="alert alert-succes" role="alert">Berhasil Membuat Akun</div>';
        header("location: login.php");
        
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Gagal Membuat Akun</div>';
        header("location: daftar_user.php");
    }
}
?>