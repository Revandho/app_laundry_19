<?php

include '../koneksi.php';


$nama = $_POST['nama'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$id_outlet = $_POST['id_outlet'];
$role = $_POST['role'];


mysqli_query($koneksi,"insert into tb_user values('','$nama','$username','$password','$id_outlet','$role')");

header("location:pengguna.php?info=simpan");

?>