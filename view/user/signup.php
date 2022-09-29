<div class="container-login">
  <div class="img-login">
    <img src="view/images/super.svg">
  </div>
  <div class="login-content">
    <form action="index.php?action=signup" method="POST" enctype="multipart/form-data">
      <img src="view/images/profile.svg">
      <h2 class="title-login">Sign Up</h2>
      <div class="input-box one">
        <div class="icons-login">
          <i class="fas fa-user"></i>
        </div>
        <div class="box-login">
          <!-- <h5>Name</h5> -->
          <input type="text" placeholder="Full Name" name="fullname" class="input-text-login">
        </div>
      </div>
      <div class="input-box">
        <div class="icons-login">
          <i class="fas fa-user"></i>
        </div>
        <div class="box-login">
          <!-- <h5>Email</h5> -->
          <input type="text" placeholder="Email" name="email" class="input-text-login">
        </div>
      </div>
      <div class="input-box">
        <div class="icons-login">
          <i class="fas fa-user"></i>
        </div>
        <div class="box-login">
          <!-- <h5>Email</h5> -->
          <input type="text" placeholder="Phone" name="phone" class="input-text-login">
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
      <input style="display: none;" type="hidden" name="hinhanh" value="default.svg">
      <div class="link-login">
        <a class="link-a-login" href="index.php?action=signin">Sign In?</a>
      </div>
      <input type="submit" name="adduser" class="btn-login" value="Sign in">
      <?php
          if(isset($thongbao)&&($thongbao != ""))
            echo '<p style="color: red; font-style: italic; font-size: 16px;">'.$thongbao.'</p>';
      ?>
    </form>
  </div>
</div>