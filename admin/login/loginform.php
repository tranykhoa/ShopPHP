<div class="login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php?action=loginform"><b>Quảng Trị Website</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Nhập tài khoản mật khẩu ở đây anh bạn à</p>

      <form action="index.php?action=signin" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
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
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input type="submit" name="login" value="sign in" class="btn btn-primary btn-block">
          </div>
          <!-- /.col -->
        </div>
      </form>
      <?php  
        if(isset($thongbao) && ($thongbao != "")) { ?>
          <p style="color: red; display: flex; align-items: center;font-style: italic; font-size: 16px;"><i style="font-size: 2rem;" class='bx bxs-error-circle'></i><?=$thongbao?></p>
          <?php }
       ?>

      <!-- /.social-auth-links -->

      <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
</div>