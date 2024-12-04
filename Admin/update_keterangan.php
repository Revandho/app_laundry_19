<?php

include '../koneksi.php';

$id = $_POST['id'];
$keterangan = $_POST['keterangan'];


mysqli_query($koneksi,"update tb_transaksi  set keterangan = '$keterangan' where id='$id'");

header("location:transaksi.php?info=update");

?>