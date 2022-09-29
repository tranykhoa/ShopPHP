<div class="container-login">
  <div class="img-login">
    <img src="view/images/login.svg">
  </div>
  <div class="login-content">
    <form action="index.php?action=signin" method="POST">
      <img src="view/images/welcome.svg">
      <h2 class="title-login">Sign In</h2>
      <div class="input-box one">
        <div class="icons-login">
          <i class="fas fa-user"></i>
        </div>
        <div class="box-login">
          <!-- <h5>Username</h5> -->
          <input type="text" placeholder="Email" name="email" class="input-text-login">
        </div>
      </div>
      <div class="input-box pass">
        <div class="icons-login">
          <i class="fas fa-lock"></i>
        </div>
        <div class="box-login">
          <!-- <h5>Password</h5> -->
          <input type="password" placeholder="Password" name="password" class="input-text-login">
        </div>
      </div>
      <div class="link-login">
        <a class="link-a-login" href="#">Forgot Password?</a>
        <a class="link-a-login" href="index.php?action=signup">Sign up?</a>
      </div>
      <input type="submit" class="btn-login" value="Login" name="login">
      <?php  
          if(isset($thongbao) && ($thongbao != "")) { ?>
             <p style="color: red; display: flex; align-items: center;font-style: italic; font-size: 16px;"><i style="font-size: 2rem;" class='bx bxs-error-circle'></i><?=$thongbao?></p>
         <?php }?>
    </form>
  </div>
</div>