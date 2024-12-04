
 <!--<?php
                              if ($d_tb_transaksi['status'] == 'diambil') { ?>-->

                        <!--<?php } else { ?>-->
                          <?php }  ?>
                          
<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi Pengelolaan Laundry</title> -->

  <!-- Google Font: Source Sans Pro 
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">-->
  <!-- Font Awesome 
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css"> -->
  <!-- icheck bootstrap
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
  <!-- Theme style 
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css"> 
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../assets/index2.html"><b>Aplikasi Pengelolaan Laundry</b></a>
  </div> -->
  <!-- /.login-logo 
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"> <center><h2><b>Login</b></h2></center></p>

      <form action="cek_login.php" method="post">
        <div class="input-group mb-3">
          <input type="text"name="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
            </div>
          </div> -->
          <!-- /.col 
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div> -->
          <!-- /.col 
        </div>
      </form>

      </div>
      </div>
      </div> -->
<!-- /.login-box  -->

<!-- jQuery 
<script src="../assets/plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap 4 
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<!-- AdminLTE App 
<script src="../assets/dist/js/adminlte.min.js"></script>
</body>
</html>
 -->
 <!-- 
                    <th style="width: 150px">Status</th>

                    <td>
                                <table>
                                  <tr>
                                    <td>
                                    <?php 
                                      if ($d_tb_transaksi['status'] == 'baru') { ?>
                                        <p class="btn btn-default btn-sm">Baru</p>
                                      <?php } else if ($d_tb_transaksi['status'] == 'proses') { ?>
                                        <p class="btn btn-warning btn-sm">Proses</p>
                                      <?php } else if ($d_tb_transaksi['status'] == 'selesai') { ?>
                                        <p class="btn btn-primary btn-sm">Selesai</p>
                                      <?php } else { ?>
                                        <p class="btn btn-success btn-sm">Diambil</p>
                                      <?php } ?>
                                    </td>
                                    <td>
                                      <?php 
                                      if ($d_tb_transaksi['id_paket'] == '0') { ?>

                                      <?php } else { ?>
                                        <?php 
                                        if ($d_tb_transaksi['dibayar'] == 'dibayar') { ?> 
                                          <p class="btn btn-success btn-sm">Dibayar</p>
                                        <?php } else { ?> 
                                          <p class="btn btn-danger btn-sm">Belum Dibayar</p>
                                        <?php } ?> 
                                      <?php } ?>                                     
                                    </td>
                                  </tr>
                                </table>                            
                              </td> -->



                              <!-- CARD HOME -->
<div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
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
              <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
    <!-- /.content -->
</div>