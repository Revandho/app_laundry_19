<?php 
include '../layouts/header.php';
include '../layouts/navbar.php';

?>
<div class="content-wrapper" style="background-color:lightsteelblue">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"></h1>
        </div>
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
          <div class="card">
            <div class="card-header" style="background-color:peachpuff">
              <h3 class="card-title"><b>Data Laporan Transaksi</b></h3>

              <div class="card-tools">
                <a href="print_laporan.php" class="btn btn-primary btn-sm" target="blank_"><i class="fas fa-print"></i> Print Laporan</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
             <?php 
             if(isset($_GET['info'])){
              if($_GET['info'] == "hapus"){ ?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-trash"></i> Sukses</h5>
                  Data berhasil di hapus
                </div>
              <?php } else if($_GET['info'] == "simpan"){ ?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Sukses</h5>
                  Data berhasil di simpan
                </div>
              <?php }else if($_GET['info'] == "update"){ ?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-edit"></i> Sukses</h5>
                  Data berhasil di update
                </div>
              <?php } } ?>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Kode Invoice</th>
                    <th>Nama Member</th>
                    <th>Jenis Paket</th>
                    <th>Nama Outlet</th>
                    <th>Berat Cucian</th>
                    <th>Biaya Tambahan</th>
                    <th>Diskon</th>
                    <th>Pajak</th>
                    <th>Total Bayar</th>
                    <th style="width: 150px">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  include "../koneksi.php";
                  $tb_transaksi    =mysqli_query($koneksi, "SELECT * FROM tb_transaksi where dibayar='dibayar'");
                  while($d_tb_transaksi = mysqli_fetch_array($tb_transaksi)){
                    $tb_outlet    =mysqli_query($koneksi, "SELECT * FROM tb_outlet where id='$d_tb_transaksi[id_outlet]'");
                    while($d_tb_outlet_d = mysqli_fetch_array($tb_outlet)){
                      $tb_member    =mysqli_query($koneksi, "SELECT * FROM tb_member where id='$d_tb_transaksi[id_member]'");
                      while($d_tb_member_d = mysqli_fetch_array($tb_member)){
                        $tb_user    =mysqli_query($koneksi, "SELECT * FROM tb_user where id='$d_tb_transaksi[id_user]'");
                        while($d_tb_user_d = mysqli_fetch_array($tb_user)){                          
                          ?>
                          <?php
                          if ($d_tb_transaksi['dibayar'] == 'dibayar') { ?>
                            <tr>
                              <td><?php echo $no++; ?></td>
                              <td><?=$d_tb_transaksi['kode_invoice']?></td>
                              <td><?=$d_tb_member_d['nama']?></td>
                              <td>
                                <?php 
                                $tb_paket    =mysqli_query($koneksi, "SELECT * FROM tb_paket where id='$d_tb_transaksi[id_paket]'");
                                while($d_tb_paket_d = mysqli_fetch_array($tb_paket)){ ?>
                                  <?=$d_tb_paket_d['nama_paket']?>                                
                                <?php } ?>
                              </td>
                              <td><?=$d_tb_outlet_d['nama']?></td>
                              <td>
                                <?=$d_tb_transaksi['qty']?> 
                                <?php 
                                $tb_paket    =mysqli_query($koneksi, "SELECT * FROM tb_paket where id='$d_tb_transaksi[id_paket]'");
                                while($d_tb_paket_d = mysqli_fetch_array($tb_paket)){ ?>
                                  <?=$d_tb_paket_d['jenis']?>                                
                                <?php } ?>
                              </td>
                              <td>Rp. <?= number_format($d_tb_transaksi['biaya_tambahan'])?></td>
                              <td><?= number_format($d_tb_transaksi['diskon'])?>%</td>
                              <td><?= number_format($d_tb_transaksi['pajak'])?>%</td>
                              <td>
                                <?php 
                                if ($d_tb_transaksi['id_paket'] == '0') { ?>

                                <?php } else { ?>
                                  <?php 
                                  $tb_paket    =mysqli_query($koneksi, "SELECT * FROM tb_paket where id='$d_tb_transaksi[id_paket]'");
                                  while($d_tb_paket_d = mysqli_fetch_array($tb_paket)){ 
                                    $a = $d_tb_paket_d['harga'];
                                  }
                                  $b = $d_tb_transaksi['qty'];
                                  $c = $d_tb_transaksi['biaya_tambahan'];
                                  $d = $d_tb_transaksi['pajak'];
                                  $e = $d_tb_transaksi['diskon'];
                                  $pajak =  ($a*$b)*($d / 100);
                                  $tdiskon = ($a*$b)*($e/100);
                                  $total = (($a*$b)+$c)-$tdiskon+$pajak;
                                  echo "Rp. $total";
                                  ?>
                                <?php } ?>
                              </td>  
                                  <td><center>
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
                                  </center></td>                           
                            </td>                  
                          <?php } ?>
                          <td>
                          <?php 
                                if ($d_tb_transaksi['keterangan']) { ?>
                                <?php echo $d_tb_transaksi['keterangan'];?>
                                <?php } else { ?>
                                  <a>tidak ada komplain</a> 
                                <?php } ?>
                          </td>                             

                          <div class="modal fade" id="modal-pilih-paket<?php echo $d_tb_transaksi['id']; ?>">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Pilih Paket</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>                         
                                <form method="post" action="update_paket_pilih.php">
                                  <div class="modal-body">
                                    <input type="text" name="id" value="<?php echo $d_tb_transaksi['id']; ?>" hidden>
                                    <div class="form-group">
                                      <label>Pilih Paket</label>
                                      <select name="id_paket" class="form-control" id="id_outlet" required>
                                        <option>--- Pilih Nama Paket ---</option>
                                        <?php
                                        include "../koneksi.php";
                                        $tb_paket    =mysqli_query($koneksi, "SELECT * FROM tb_paket where id_outlet='$d_tb_outlet_d[id]'");
                                        while($d_tb_paket_d_d = mysqli_fetch_array($tb_paket)){
                                          ?>
                                          <option value="<?=$d_tb_paket_d_d['id']?>"><?=$d_tb_paket_d_d['nama_paket']?></option>
                                        <?php } ?>
                                      </select>                                       
                                    </div>                       
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                                      <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>

                          <div class="modal fade" id="modal-status<?php echo $d_tb_transaksi['id']; ?>">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Ubah Status</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>                         
                                <form method="post" action="update_status_transaksi.php">
                                  <div class="modal-body">
                                    <input type="text" name="id" value="<?php echo $d_tb_transaksi['id']; ?>" hidden>
                                    <div class="form-group">
                                      <label>Pilih Status</label>
                                      <select class="form-control" name="status">
                                        <option>--- Pilih Status ---</option>
                                        <option value="baru" <?php if('baru' == $d_tb_transaksi['status']){ echo 'selected'; } ?>>Baru</option>
                                        <option value="proses" <?php if('proses' == $d_tb_transaksi['status']){ echo 'selected'; } ?>>Proses</option>
                                        <option value="selesai" <?php if('selesai' == $d_tb_transaksi['status']){ echo 'selected'; } ?>>Selesai</option>
                                        <option value="diambil" <?php if('diambil' == $d_tb_transaksi['status']){ echo 'selected'; } ?>>Diambil</option>
                                      </select>                     
                                    </div>                       
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                                      <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>

                          <div class="modal fade" id="modal-batalkan<?php echo $d_tb_transaksi['id']; ?>">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Batalkan Transaksi</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">                          
                                  <p>Apakah anda Belum menerima dana transaksi sebesar 
                                    <b>
                                      <?php 
                                      $tb_paket    =mysqli_query($koneksi, "SELECT * FROM tb_paket where id='$d_tb_transaksi[id_paket]'");
                                      while($d_tb_paket_d = mysqli_fetch_array($tb_paket)){ ?>
                                        <?php 
                                        $a = $d_tb_paket_d['harga'];
                                      }
                                      $b = $d_tb_transaksi['qty'];
                                      $c = $d_tb_transaksi['biaya_tambahan'];
                                      $d = $d_tb_transaksi['pajak'];
                                      $e = $d_tb_transaksi['diskon'];
                                      $pajak =  ($a*$b)*($d / 100);
                                      $tdiskon = ($a*$b)*($e/100);
                                      $total = (($a*$b)+$c)-$tdiskon+$pajak;
                                      echo "Rp. $total";
                                      ?>                              
                                    </b> 
                                    dari <b><?=$d_tb_member_d['nama']?></b>...?</p>                           
                                    <form method="post" action="update_batal_bayar_transaksi.php">
                                      <div class="modal-body">                          
                                        <div class="form-group">
                                          <input type="text" name="id" value="<?php echo $d_tb_transaksi['id']; ?>" hidden>
                                        </div>                         
                                      </div>                       
                                      <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="modal fade" id="modal-bayar<?php echo $d_tb_transaksi['id']; ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Bayar Transaksi</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">                          
                                    <p>Apakah anda sudah menerima dana transaksi sebesar <b>
                                      <?php 
                                      $tb_paket    =mysqli_query($koneksi, "SELECT * FROM tb_paket where id='$d_tb_transaksi[id_paket]'");
                                      while($d_tb_paket_d = mysqli_fetch_array($tb_paket)){ ?>
                                        <?php 
                                        $a = $d_tb_paket_d['harga'];
                                      }
                                      $b = $d_tb_transaksi['qty'];
                                      $c = $d_tb_transaksi['biaya_tambahan'];
                                      $d = $d_tb_transaksi['pajak'];
                                      $e = $d_tb_transaksi['diskon'];
                                      $pajak =  ($a*$b)*($d / 100);
                                      $tdiskon = ($a*$b)*($e/100);
                                      $total = (($a*$b)+$c)-$tdiskon+$pajak;
                                      echo "Rp. $total";
                                      ?>                              
                                    </b>  dari <b><?=$d_tb_member_d['nama']?></b>...?</p>                           
                                    <form method="post" action="update_bayar_transaksi.php">
                                      <div class="modal-body">                          
                                        <div class="form-group">
                                          <input type="text" name="id" value="<?php echo $d_tb_transaksi['id']; ?>" hidden>
                                          <input type="text" name="qty" value="<?php echo $d_tb_transaksi['qty']; ?>" hidden>
                                          <input type="text" name="id_paket" value="<?php echo $d_tb_paket_d['id']; ?>" hidden>
                                        </div>                         
                                      </div>                       
                                      <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="modal fade" id="modal-hapus<?php echo $d_tb_transaksi['id']; ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Hapus Data Transaksi</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">                          
                                    <p>Apakah anda yakin akan menghapus data <b><?php echo $d_tb_transaksi['kode_invoice']; ?></b> ini...?</p>                           
                                  </div>                        
                                  <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                                    <a href="hapus_transaksi.php?id=<?php echo $d_tb_transaksi['id']; ?>" class="btn btn-primary">Hapus</a>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="modal fade" id="modal-edit<?php echo $d_tb_transaksi['id']; ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Edit Data Transaksi</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form method="post" action="update_transaksi.php">
                                      <div class="form-group">
                                        <label>Invoice</label>
                                        <input type="text" name="id" class="form-control" value="<?php echo $d_tb_transaksi['id']; ?>" hidden>
                                        <input type="text" name="kode_invoice" class="form-control" value="<?php echo $d_tb_transaksi['kode_invoice']; ?>" readonly="">
                                      </div> 

                                      <div class="form-group">
                                        <label>Pilih Member</label>
                                        <select class="form-control" name="id_member">
                                          <option>--- Pilih Nama Member ---</option>
                                          <?php
                                          include "../koneksi.php";
                                          $tb_member    =mysqli_query($koneksi, "SELECT * FROM tb_member");
                                          while($d_tb_member = mysqli_fetch_array($tb_member)){
                                            ?>
                                            <option value="<?=$d_tb_member['id']?>" <?php if($d_tb_member['id'] == $d_tb_transaksi['id_member']){ echo 'selected'; } ?>><?=$d_tb_member['nama']?></option>
                                          <?php } ?>
                                        </select>
                                      </div>

                                      <div class="form-group">
                                        <label>Pilih Outlet</label>
                                        <select name="id_outlet" class="form-control" required>
                                          <option>--- Pilih Nama Outlet ---</option>
                                          <?php
                                          include "../koneksi.php";
                                          $tb_user    =mysqli_query($koneksi, "SELECT * FROM tb_user where username='$_SESSION[username]'");
                                          while($d_tb_user = mysqli_fetch_array($tb_user)){
                                            $tb_outlet    =mysqli_query($koneksi, "SELECT * FROM tb_outlet where id='$d_tb_user[id_outlet]'");
                                            while($d_tb_outlet_d_d = mysqli_fetch_array($tb_outlet)){
                                              ?>
                                              <option value="<?=$d_tb_outlet_d_d['id']?>" <?php if($d_tb_outlet_d_d['id'] == $d_tb_transaksi['id_outlet']){ echo 'selected'; } ?>><?=$d_tb_outlet_d_d['nama']?></option>
                                            <?php } } ?>
                                          </select>
                                        </div>

                                        <div class="form-group">
                                          <label>Berat</label>
                                          <input type="text" name="qty" value="<?php echo $d_tb_transaksi['qty']; ?>" class="form-control" placeholder="Masukan Berat">
                                        </div>  
                                        <div class="form-group">
                                          <label>Biaya Tambahan</label>
                                          <input type="text" name="biaya_tambahan" value="<?php echo $d_tb_transaksi['biaya_tambahan']; ?>" class="form-control" placeholder="Masukan Biaya Tambahan">
                                        </div>
                                        <div class="form-group">
                                          <label>Diskon</label>
                                          <input type="text" name="diskon" value="<?php echo $d_tb_transaksi['biaya_tambahan']; ?>" class="form-control" placeholder="Masukan Jumlah Diskon">
                                        </div>
                                        <div class="form-group">
                                          <label>pajak</label>
                                          <input type="text" name="pajak" value="<?php echo $d_tb_transaksi['biaya_tambahan']; ?>" class="form-control" placeholder="Masukan Jumlah Pajak">
                                        </div>
                                        <div class="form-group">
                                          <?php
                                          include "../koneksi.php";
                                          $tb_user    =mysqli_query($koneksi, "SELECT * FROM tb_user where username='$_SESSION[username]'");
                                          while($d_tb_user = mysqli_fetch_array($tb_user)){ ?>
                                            <input type="text" name="id_user" value="<?php echo $d_tb_transaksi['id_user']; ?>" class="form-control" hidden>
                                          <?php } ?>
                                        </div>                     
                                        <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                                          <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>


                            <?php } } } }  ?>


                            <div class="modal fade" id="modal-tambah">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header" style="background-color:lightcoral">
                                    <h4 class="modal-title">Tambah Data Transaksi</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form method="post" action="simpan_transaksi.php">
                                      <div class="form-group">
                                        <label>Invoice</label>
                                        <input type="text" name="kode_invoice" class="form-control" value="INV<?php echo date('dmYHis'); ?>" readonly="">
                                      </div> 

                                      <div class="form-group">
                                        <label>Pilih Member</label>
                                        <select class="form-control" name="id_member">
                                          <option>--- Pilih Nama Member ---</option>
                                          <?php
                                          include "../koneksi.php";
                                          $tb_member    =mysqli_query($koneksi, "SELECT * FROM tb_member");
                                          while($d_tb_member = mysqli_fetch_array($tb_member)){
                                            ?>
                                            <option value="<?=$d_tb_member['id']?>"><?=$d_tb_member['nama']?></option>
                                          <?php } ?>
                                        </select>
                                      </div>

                                      <div class="form-group">
                                        <label>Pilih Outlet</label>
                                        <select name="id_outlet" class="form-control" id="id_outlet" required>
                                          <option>--- Pilih Nama Outlet ---</option>
                                          <?php
                                          include "../koneksi.php";
                                          $tb_user    =mysqli_query($koneksi, "SELECT * FROM tb_user where username='$_SESSION[username]'");
                                          while($d_tb_user = mysqli_fetch_array($tb_user)){
                                            $tb_outlet    =mysqli_query($koneksi, "SELECT * FROM tb_outlet where id='$d_tb_user[id_outlet]'");
                                            while($d_tb_outlet = mysqli_fetch_array($tb_outlet)){
                                              ?>
                                              <option value="<?=$d_tb_outlet['id']?>"><?=$d_tb_outlet['nama']?></option>
                                            <?php } } ?>
                                          </select>
                                        </div>

                                        <div class="form-group">
                                          <label>Berat</label>
                                          <input type="text" name="qty" class="form-control" placeholder="Masukan Berat">
                                        </div>  
                                        <div class="form-group">
                                          <label>Biaya Tambahan</label>
                                          <input type="text" name="biaya_tambahan" class="form-control" placeholder="Masukan Biaya Tambahan">
                                        </div>
                                        <div class="form-group">
                                          <label>Diskon</label>
                                          <input type="text" name="diskon" class="form-control" placeholder="Masukan Jumlah Diskon">
                                        </div>
                                        <div class="form-group">
                                          <label>Pajak</label>
                                          <input type="text" name="pajak" class="form-control" placeholder="Masukan Jumlah Pajak">
                                        </div>
                                        <div class="form-group">
                                          <?php
                                          include "../koneksi.php";
                                          $tb_user    =mysqli_query($koneksi, "SELECT * FROM tb_user where username='$_SESSION[username]'");
                                          while($d_tb_user = mysqli_fetch_array($tb_user)){ ?>
                                            <input type="text" name="id_user" value="<?php echo $d_tb_user['id']; ?>" class="form-control" hidden>
                                          <?php } ?>
                                        </div>                     
                                        <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                                          <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>

                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <!-- /.col-md-6 -->
                  </div>
                  <!-- /.row -->
                </div><!-- /.container-fluid -->
              </div>
              <!-- /.content -->

            </div>
            <?php 
            include '../layouts/footer.php';
            ?>