<!DOCTYPE html>
<html lang="en">
<head>
  <script type="text/javascript">
  function preback() {window.history.forward();}
    setTimeout("preback()",0);
    window.onunload=function(){null};
    </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi Laundry</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- Background -->
  <link rel="stylesheet" type="text/css" href="style1.css">
 <style>
  body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-image: url("bg1.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    
    }
.warpper{
    position: relative;
    width: 400px;
    height: 480px;
    background: transparent;
    border: 2px solid rgba(255, 255, 255, .5);
    border-radius: 20px;
    backdrop-filter: blur(20px);
    box-shadow: 0 0 30px rgba(0, 0, 0, .5);
    display: flex;
    justify-content: center;
    align-items: center;
}

.warpper .form-box{
    width: 100%;
    padding: 40px;
}
.form-box h2{
    font-size: 3em;
    color: #162938;
    text-align: center;
}

.input-box {
    position: relative;
    width: 100%;
    height: 50px;
    border-bottom: 2px solid #162938;
    margin: 30px 0;
}

.input-box label {
    position: absolute;
    top: 50%;
    left: 5px;
    transform: translateY(-50%);
    font-size: 1em;
    color: #162938;
    font-weight: 500;
    pointer-events: none;
    transition: .5;
}

.input-box input:focus~label,
.input-box input:valid~label {
    top: -5px;
}

.input-box input {
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    font-size: 1em;
    color:#162938;
    font-weight: 600;
    padding: 0 35px 0 5px;
}

.input-box .icon {
    position: absolute;
    right: 8px;
    font-size: 1.2em;
    color: #162938;
    line-height: 57px;
}

.btn{
    width: 100%;
    height: 45px;
    background:#162938;
    border: none;
    outline: none;
    border-radius: 6px;
    cursor: pointer;
    color: #fff;
    font-weight: 500;
}

.forgot{
  font-size: .9em;
  color:#162938;
  font-weight: 500;
  display: flex;
  justify-content: space-between;
}

.forgot a {
  color:lightblue;
  text-decoration: none;
}

.forgot a:hover{
  text-decoration: underline;
  color:blue;
}

  </style>
</head>
<div class="fixed-top"> <?php
    if(isset($_GET['info'])){
      if($_GET['info'] == "gagal"){ ?>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-exclamation-triangle"></i> Mohon Maaf</h5>
        Login gagal! Periksa lagi username dan password anda
      </div>
  <?php 
      }else if($_GET['info'] == "logout"){ ?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="icon fas fa-check"></i> Terima Kasih</h5>
      Anda Berhasil Logout
    </div>
  <?php 

      }else if($_GET['info'] == "login"){ ?>
    <div class="alert alert-info alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="icon fas fa-info"></i> Mohon Maaf</h5>
      Anda Harus Login Terlebih Dahulu
    </div>
  <?php } } ?></div>

<div class="warpper">
  <div class="form-box login">
    
    <h2><strong>LOGIN</strong></h2>
    <form action="cek_login.php" method="post">
      <div class="input-box">
        <span class="icon">
          <ion-icon name="person-circle-outline"></ion-icon></span>
        <input type="text" name="username" required>
        <label>username</label>
      </div>
      <div class="input-box">
        <span class="icon">
          <ion-icon name="lock-closed-outline"></ion-icon></span>
        <input type="password" minlength="8" name="password" required>
        <label>password</label>
      </div>
      <form action="?" method="POST">
      <div class="g-recaptcha" data-sitekey="6Lf_6_YkAAAAAOkMIuFe102kTdD6XRCDRl0fWFoR"></div>
      <br>
      <input type="submit" id="login" value="Login" class="btn">
      <br>
      <br>
      <!--<div class="forgot">
        <a href="lupa_password.php">Lupa Password?</a>
      </div>-->
    </form> 
      </div>
    </form>
</div>
          <!-- /.col -->
<!-- /.login-box -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

<script>
  $(document).on('click','#login', function(){
    var response = grecaptcha.getResponse();
    if(response.length==0)
    {
      alert("Anda belum verifikasi reCAPTCHA");
      return false;
    }
  });
</script>