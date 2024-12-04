<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$sql=mysqli_query($koneksi, "UPDATE tb_user SET password='$password' WHERE username='$username' ");

if ($sql) 
{
	?>
	<script>
		window.location='index.php';
	</script>
	<?php
}
header("location:index.php")
?>