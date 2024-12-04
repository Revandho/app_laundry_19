<?php
include '../Layouts/header.php';
include '../Layouts/navbar.php';
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
            <div class="card">
            <div class="card-header" style="background-color:peachpuff">
                <h3 class="card-title"><b>Data Pelanggan</b></h3>

                <div class="card-tools">
                  <button class="btn btn-primary btn-sm "  data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus"></i>Tambah Data</button>
</div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php
                if(isset($_GET['info'])){
                  if($_GET['info'] =="hapus"){ ?>
                  <div class="alert alert-success alert-dismisible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-trash"></i>Sukses</h5>
                    Data Telah Berhasil Di Hapus
                  </div>
                  <?php } else if($_GET['info'] == "simpan"){ ?> 
                    <div class="alert alert-success alert-dismisible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>Sukses</h5>
                    Data Telah Berhasil Di Simpan
                    </div>
                    <?php } else if($_GET['info'] == "update"){ ?> 
                    <div class="alert alert-success alert-dismisible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-edit"></i>Sukses</h5>
                    Data Telah Berhasil Di Perbarui
                    </div>
                    <?php } } ?>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Jenis kelamin</th>
                      <th>Telephone</th>
                      <!--<th style="width: 200px">Aksi</th>-->
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    include "../koneksi.php";
                    $tb_member    =mysqli_query($koneksi, "SELECT * FROM tb_member");
                    while($d_tb_member = mysqli_fetch_array($tb_member)){

                    
                      ?>
                    <tr>
                    <td><?php echo $no++; ?></td>
                      <td><?=$d_tb_member['nama']?></td>
                      <td><?=$d_tb_member['alamat']?></td>
                      <td>
                        <?php
                        if($d_tb_member['jenis_kelamin'] == 'L' ) { ?>
                        Laki-Laki
                        <?php } else { ?>
                          Perempuan
                          <?php } ?>
                      </td>
                      <td><?=$d_tb_member['tlp']?></td>
                    <!--<td>
                      <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit<?php echo $d_tb_member['id']; ?>"><i class="fas fa-edit"></i> Ubah</button>
                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-hapus<?php echo $d_tb_member['id']; ?>"><i class="fas fa-trash"></i> Hapus</button>
                      </td>-->
                    </tr>

                    <div class="modal fade" id="modal-hapus<?php echo $d_tb_member['id']; ?>">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header" style="background-color:red">
                    <h4 class="modal-title"><b>Hapus Data Pelanggan</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">

                    <p>Yakin? apakah anda akan menghapus data <b><?php echo $d_tb_member['nama'];?></b> ...?</p>

                    </div>
                    <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                    <a href="hapus_pelanggan.php?id=<?php echo $d_tb_member['id'];?>" class="btn btn-primary">Hapus</a>

                    </div>
                    </div>

                    </div>

                    </div>

                                        <div class="modal fade" id="modal-edit<?php echo $d_tb_member['id'];?>">
                                        <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header" style="background-color:lightgoldenrodyellow">
                    <h4 class="modal-title"><b>Edit Data Pelanggan</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form method="post" action="update_pelanggan.php">
                    <div class="modal-body">

                    <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <input type="text" name="id" value="<?php echo $d_tb_member['id'];?>" hidden>
                        <input type="text"  onkeypress="return (event.charCode > 64 && 
event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" name="nama" value="<?php echo $d_tb_member['nama'];?>"class="form-control" placeholder="Masukkan Nama Pelanggan">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat"class="form-control"rows="3"><?php echo $d_tb_member['alamat'];?></textarea>
                    </div>
                    <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin">
                    <option>--- Memilih Jenis Kelamin --</option>
                    <option value="L" <?php if('L' == $d_tb_member['jenis_kelamin']){ echo 'selected'; } ?>>Laki-laki</option>
                    <option value="P" <?php if('P' == $d_tb_member['jenis_kelamin']){ echo 'selected'; } ?>>Perempuan</option>
                    </select>
                    </div>


                    <div class="form-group">
                        <label>Telephone</label>
                        <input type="text" name="tlp" onkeypress="return hanyaAngka(event)"value="<?php echo $d_tb_member['tlp']; ?>" class="form-control" placeholder="Masukan No Telephone">
                                  <script>
                                function hanyaAngka(evt) {
                               var charCode = (evt.which) ? evt.which : event.keyCode
                            if (charCode > 31 && (charCode < 48 || charCode > 57))
 
                             return false;
                               return true;
                               }
                               </script>
                    </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                    </div>

                    </div>

                    </div>


                    <?php } ?>
                                        <div class="modal fade" id="modal-tambah">
                                        <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header" style="background-color:lightblue">
                    <h4 class="modal-title"><b>Tambah Data Pelanggan</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form method="post" action="simpan_pelanggan.php">
                    <div class="modal-body">

                    <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <input type="name"  onkeypress="return (event.charCode > 64 && 
event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" name="nama" class="form-control" placeholder="Masukkan Nama Pelanggan">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat"class="form-control"rows="3"></textarea>
                    </div>
                    <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin">
                    <option>--- Memilih Jenis Kelamin --</option>
                    <option value="L">Pria</option>
                    <option value="P">Wanita</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label>Telephone</label>
                        <input type="text" name="tlp" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="Masukan No Telephone">
                                  <script>
                                function hanyaAngka(evt) {
                               var charCode = (evt.which) ? evt.which : event.keyCode
                            if (charCode > 31 && (charCode < 48 || charCode > 57))
 
                             return false;
                               return true;
                               }
                               </script>
                    </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                    </div>

                    </div>

                    </div>


                  </tbody>
                </table>
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
include '../Layouts/footer.php';


?>
  
  
