<?php 
include("connection.php");
if(isset($_SESSION['login'])) {
    header("location: index.php");
}
$pesan = NULL;
if(isset($_GET['pesan'])) {
    if($_GET['pesan']=="gagal"){
        $pesan = '<div class="alert alert-danger" role="alert">Login Gagal! Username atau Password Salah!</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php'); ?>
    <link rel="stylesheet" type="text/css" href="./assets/custom/signin.css">
</head>
<body class="text-center">
    <form class="form-signin" method="POST" action="login_proses.php">
        <?php echo $pesan; ?>

        <img class="mb-4" src="logooo.png" alt="" width="130" height="130">
        <h1 class="h3 mb-3 font-weight-normal">Please Login</h1>
        <label for="inputUsername" class="sr-only">Username</label>
        <input type="text" id="inputUsername" name="username" class="form-control" placeholder="username...">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="password...">
        <input type="submit" name="login" value="login" class="btn btn-lg btn-primary btn-block" placeholder="password...">
        <!-- <p class="mt-5 mb-3 text-muted">&copy; Putri Store 2021</p> -->
        <p style="font-size: 1vw;">Belum punya akun? <a href="daftar_user.php">Register</a></p>
    </form>

</body>
</html>
