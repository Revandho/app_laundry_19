
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-dark navbar-dark">
    <div class="container">
      <a href="#" class="navbar-brand">
        <img src="../img/logo1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-9" style="opacity: .9">
        <span class="brand-text font-weight-light"><b>Aplikasi Pengelolaan Laundry</b></span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <?php if($_SESSION['role']=="admin"){  ?>
          <li class="nav-item">
            <a href="index.php" class="nav-link" style="color:lightgrey"><b>Home</b></a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle" style="color:lightgrey"><b>Data Master</b></a>
            <ul aria-labelledby="dropdownSubMenu1" style="background-color: #343a40;" class="dropdown-menu border-0 shadow">
              <li><a href="Outlet.php" class="dropdown-item" style="color:lightgrey"><b>Data Outlet</b></a></li>
              <li><a href="Paket.php" class="dropdown-item" style="color:lightgrey"><b>Data Paket</b></a></li>
              <li><a href="Pengguna.php" class="dropdown-item" style="color:lightgrey"><b>Data Pengguna</b></a></li>
               </ul>
               </li>
          
           <li class="nav-item">
            <a href="Pelanggan.php" class="nav-link" style="color:lightgrey"><b>Registrasi Pelanggan</b></a>
          </li> 
          <li class="nav-item">
            <a href="Transaksi.php" class="nav-link" style="color:lightgrey"><b>Entri Transaksi</b></a>
          </li> 
          <li class="nav-item">
            <a href="Laporan.php" class="nav-link" style="color:lightgrey"><b>Laporan</b></a>
          </li>
          <li class="nav-item">
            <a href="informasi.php" class="nav-link" style="color:lightgrey"><b>Informasi</b></a>
          </li>
          <?php } ?>

          <?php if($_SESSION['role']=="kasir"){  ?>
          <li class="nav-item">
            <a href="index.php" class="nav-link" style="color:lightgrey"><b>Home</b></a>
          </li>
           <li class="nav-item">
            <a href="Pelanggan.php" class="nav-link" style="color:lightgrey"><b>Registrasi Pelanggan</b></a>
          </li> 
          <li class="nav-item">
            <a href="Transaksi.php" class="nav-link" style="color:lightgrey"><b>Entri Transaksi</b></a>
          </li> 
          <li class="nav-item">
            <a href="Laporan.php" class="nav-link" style="color:lightgrey"><b>Laporan</b></a>
          </li>
          <li class="nav-item">
            <a href="informasi.php" class="nav-link" style="color:lightgrey"><b>Informasi</b></a>
          </li>
          <?php } ?>

          <?php if($_SESSION['role']=="owner"){  ?>
          <li class="nav-item">
            <a href="index.php" class="nav-link" style="color:lightgrey"><b>Home</b></a>
          </li>
          <li class="nav-item">
            <a href="Laporan.php" class="nav-link" style="color:lightgrey"><b>Laporan</b></a>
          </li>
          <li class="nav-item">
            <a href="informasi.php" class="nav-link" style="color:lightgrey"><b>Informasi</b></a>
          </li>
          <?php } ?>
        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item">
          <a class="nav-link" href="../logout.php">
            <i class="fas fa-user mr-1"></i><b> Logout</b>
          </a>
        </li>
      </ul>
    </div>
  </nav>
  