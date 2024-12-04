<?php

include '../koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tlp = $_POST['tlp'];

mysqli_query($koneksi,"update tb_member  set nama= '$nama',alamat='$alamat', jenis_kelamin='$jenis_kelamin', tlp='$tlp' where id='$id'");


header("location:pelanggan.php?info=update");

?>