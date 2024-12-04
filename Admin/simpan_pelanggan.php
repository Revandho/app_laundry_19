<?php
include '../koneksi.php';

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tlp = $_POST['tlp'];

mysqli_query($koneksi,"insert into tb_member values('','$nama','$alamat','$jenis_kelamin','$tlp')");

header("location:pelanggan.php?info=simpan");

?>