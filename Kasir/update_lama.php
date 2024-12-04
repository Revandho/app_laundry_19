<?php

include '../koneksi.php';

$id = $_POST['id'];
$lama = $_POST['lama'];


mysqli_query($koneksi,"update tb_transaksi  set lama= '$lama' where id='$id'");

header("location:transaksi.php?info=update");

?>