<?php 

include '../koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi,"delete from tb_paket where id='$id'");

header("location:paket.php?info=hapus");

?>
