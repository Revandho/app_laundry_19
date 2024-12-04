<?php
include '../Layouts/header.php';
include '../Layouts/navbar.php';
include '../koneksi.php';

//jumlah transaksi
$get1 = mysqli_query($koneksi,"select * from tb_transaksi");
$count1 = mysqli_num_rows($get1);

//jumlah Outlet
$get2 = mysqli_query($koneksi,"select * from tb_outlet");
$count2 = mysqli_num_rows($get2);

//jumlah barang yang diambil
$get3 = mysqli_query($koneksi,"select * from tb_detail_transaksi");
$count3 = mysqli_num_rows($get3);

?>
  <div class="content-wrapper" style="background-color:lightsteelblue">
    
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
         
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col-lg-12">

              <!--<div class="card-header">
                <h5 class="card-title m-0">Featured</h5>
              </div>-->

              <div class="card card-card card-dark">
                <div class="card-header">
                  <div class="row justify-content-center">
                <h6 class="card-title"><b>Halo,Selamat Datang Admin</b></h6>
              </div>
            </div>

          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container -->
    </div>

  <div class="container-fluid">
    <div class="row justify-content-center">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><b><?php echo $count2; ?></b></h3>

                <p>Jumlah Outlet</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="outlet.php" class="small-box-footer">Cek Outlet<i class="fas fa-arrow-circle-right ml-1"></i></a>
            </div>
          </div>
    <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><b><?php echo $count1; ?></b></h3>

                <p>Jumlah Transaksi</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="transaksi.php" class="small-box-footer">Cek Transaksi<i class="fas fa-arrow-circle-right ml-1"></i></a>
            </div>
          </div>
      <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                <h3><?php echo $count3; ?></h3>

                <p>Jumlah Laporan</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="laporan.php" class="small-box-footer">Cek Laporan<i class="fas fa-arrow-circle-right ml-1"></i></a>
            </div>
          </div>
        </div>
  </div>

  </body>
    <!-- /.content -->
</div>
<?php
include '../Layouts/footer.php';


?>
  
  
