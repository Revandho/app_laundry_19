<?php

include '../koneksi.php';

$id = $_POST['id'];
$status = $_POST['status'];


mysqli_query($koneksi,"update tb_transaksi  set status= '$status' where id='$id'");

header("location:transaksi.php?info=update");

?>