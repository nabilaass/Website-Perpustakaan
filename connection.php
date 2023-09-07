<?php
session_start();
$username="db_buku";
$password="db_buku";
$db="(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP) (HOST = localhost) (PORT = 1521)) (CONNECT_DATA = ( SERVER = DEDICATED)(SERVICE_NAME = XE)))";
$connection = oci_connect($username, $password, 'localhost/XE');
if(!$connection){
    $e = oci_error();
    echo htmlentities($e["messege"]);
}
?>