<?php
include('connection.php');

if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password= md5($_POST['password']);
    
    //menyeleksi data cust dengan username dan password yang sesuai
    $statement = oci_parse($connection, "SELECT * FROM TB_ADMIN WHERE USERNAME= '$username' and PASSWORD='$password'");
    oci_execute($statement);
    oci_fetch($statement);
    $cek = oci_num_rows($statement);
    

    $statement2 = oci_parse($connection, "SELECT * FROM TB_USER WHERE USERNAME= '$username' and PASSWORD='$password'");
    oci_execute($statement2);
    oci_fetch($statement2);
    $cek2 = oci_num_rows($statement2);

    if($cek > 0){
        $_SESSION['username'] = $username;
        $_SESSION['login'] = true;
        header("location: home_admin.php");
        //echo ("berhasil");
    } else if($cek2 > 0){
        $_SESSION['username'] = $username;
        $_SESSION['login'] = true;
        header("location: index.php");
    } else {
        header("location: login.php?pesan=gagal");
        //echo ("berhasil");
    }
    }
     else{
    die("Akses dilarang....");
}
?>