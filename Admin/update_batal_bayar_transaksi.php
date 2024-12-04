<?php

include '../koneksi.php';


$id = $_POST['id'];

mysqli_query($koneksi,"update tb_transaksi set dibayar='belum_dibayar' where id='$id'");
mysqli_query($koneksi,"delete from tb_detail_transaksi where id_transaksi ='$id'");

header("location:transaksi.php?info=update");

?>