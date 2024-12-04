<script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
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
    height: 440px;
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
<div class="warpper">
  <div class="form-box login">
  <h2><strong>Lupa Password</strong></h2>
    <form class="user mt-3" method="post" action="update_password.php">
      <div class="input-box">
        <span class="icon">
          <ion-icon name="person-circle-outline"></ion-icon></span>
        <input type="text" name="username" required>
        <label>username</label>
      </div>
      <div class="input-box">
        <span class="icon">
          <ion-icon name="lock-closed-outline"></ion-icon></span>
        <input type="password" minlength="5" name="password" required>
        <label>password</label>
      </div>
      <input type="submit" class="btn" value="SIMPAN">
      <br>
	  <br>
      <div class="forgot">
        <a href="index.php">Halaman Login</a>
      </div>
    </form> 
      </div>
    </form>
</div>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>