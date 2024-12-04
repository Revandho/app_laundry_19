<?php

include '../koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tlp = $_POST['tlp'];

mysqli_query($koneksi,"update tb_outlet  set nama= '$nama',alamat='$alamat',tlp='$tlp' where id='$id'");

header("location:outlet.php?info=update");

?>