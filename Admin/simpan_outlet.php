<?php
include '../koneksi.php';

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tlp = $_POST['tlp'];

mysqli_query($koneksi,"insert into tb_outlet values('','$nama','$alamat','$tlp')");

header("location:outlet.php?info=simpan");

?>