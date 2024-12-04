<?php

include '../koneksi.php';


$id = $_POST['id'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password =md5($_POST['password']);
$id_outlet = $_POST['id_outlet'];
$role = $_POST['role'];

mysqli_query($koneksi,"update tb_user set nama='$nama', username='$username',password='$password', id_outlet='$id_outlet', role='$role' where id='$id'");

header("location:pengguna.php?info=update");

?>