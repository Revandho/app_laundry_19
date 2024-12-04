<?php

include '../koneksi.php';

$id = $_POST['id'];
$id_paket = $_POST['id_paket'];
$qty = $_POST['qty'];

mysqli_query($koneksi,"insert into tb_detail_transaksi values('','$id','$id_paket','$qty','done')");
mysqli_query($koneksi,"update tb_transaksi  set dibayar= 'dibayar' where id='$id'", );


header("location:transaksi.php?info=update");

?>  