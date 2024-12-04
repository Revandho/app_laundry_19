<?php

include '../koneksi.php';


$id = $_POST['id'];
$id_outlet = $_POST['id_outlet'];
$jenis = $_POST['jenis'];
$nama_paket = $_POST['nama_paket'];
$harga = $_POST['harga'];

mysqli_query($koneksi,"update tb_paket set id_outlet='$id_outlet', jenis='$jenis',nama_paket='$nama_paket', harga='$harga' where id='$id'");

header("location:paket.php?info=update");

?>