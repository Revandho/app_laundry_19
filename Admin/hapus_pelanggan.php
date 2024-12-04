<?php 

include '../koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi,"delete from tb_member where id='$id'");

header("location:pelanggan.php?info=hapus");

?>