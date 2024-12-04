<?php

include '../koneksi.php';

$id_outlet = $_POST['id_outlet'];
$jenis = $_POST['jenis'];
$nama_paket = $_POST['nama_paket'];
$harga = $_POST['harga'];


mysqli_query($koneksi,"insert into tb_paket values('','$id_outlet','$jenis','$nama_paket','$harga')");

header("location:paket.php?info=simpan");

?>