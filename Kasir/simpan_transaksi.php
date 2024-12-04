<?php 
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$kode_invoice = $_POST['kode_invoice'];
$id_member = $_POST['id_member'];
$id_outlet = $_POST['id_outlet'];
$qty = $_POST['qty'];
$biaya_tambahan = $_POST['biaya_tambahan'];
$diskon = $_POST['diskon'];
$pajak = $_POST['pajak'];
$id_user = $_POST['id_user'];
$tgl = date('Y-m-d');
$batas_waktu = date('Y-m-d', strtotime('+6 days'));

// menginput data ke database
mysqli_query($koneksi,"insert into tb_transaksi values('','$id_outlet','','$kode_invoice','$id_member','$tgl','$batas_waktu','','$biaya_tambahan','$diskon','$pajak','baru','belum_dibayar','$qty','','$id_user','')");

// mengalihkan halaman kembali ke index.php
header("location:transaksi.php?info=simpan");

?>