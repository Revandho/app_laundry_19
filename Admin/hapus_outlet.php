<?php 

include '../koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi,"delete from tb_outlet where id='$id'");

header("location:outlet.php?info=hapus");

?>