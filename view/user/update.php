<?php
extract($_SESSION['user']);

$imgpath="upload/".$images;
if(is_file($imgpath)){
    $img = "<img src='".$imgpath."' height='80'>";
}else{
    $img = "no photo";
}
?>

<div class="container-login">
  <div class="img-login">
    <img src="view/images/update-profile.svg">
  </div>
  <div class="login-content">
    <form action="index.php?action=updateuser" method="POST" enctype="multipart/form-data">
      <!-- <img src="img/1.jpg"> -->
      <h2 class="title-login">Thay đổi thông tin</h2>
      <div class="input-box one">
        <div class="icons-login">
          <i class="fas fa-user"></i>
        </div>
        <div class="box-login">
          <!-- <h5>Name</h5> -->
          <input type="text" value="<?=$fullname?>" name="fullname" class="input-text-login">
        </div>
      </div>
      <div class="input-box one">
        <div class="icons-login">
          <i class="fas fa-user"></i>
        </div>
        <div class="box-login">
          <!-- <h5>Name</h5> -->
          <input type="text" value="<?=$email?>" name="email" class="input-text-login">
        </div>
      </div>
      <div class="input-box one">
        <div class="icons-login">
          <i class="fas fa-user"></i>
        </div>
        <div class="box-login">
          <!-- <h5>Name</h5> -->
          <input type="text" value="<?=$tel?>" name="tel" class="input-text-login">
        </div>
      </div>
      <div style="margin: 20px;">
      <input type="file" name="upload"><?=$img?>
      </div>
      <div class="box-btn-profile">
        <a href="index.php?action=profile">
          <div class="btn-active-profile"><input type="button" style="width:100%;" class="log-profile" value="Back"></div>
        </a>
          <input type="hidden" name="iduser" value="<?=$iduser?>">
          <input type="hidden" name="pass" value="<?=$pass?>">
        <a href="index.php?action=updateuser">
          <div class="btn-active-profile"><input type="submit" style="width:100%;" name="update" class="up-profile" value="Update"></div>
        </a>
      </div>
      <?php  
          if(isset($thongbao) && ($thongbao != "")) { ?>
             <p style="color: red; display: flex; align-items: center;font-style: italic; font-size: 16px;"><i style="font-size: 2rem;" class='bx bxs-error-circle'></i><?=$thongbao?></p>
         <?php }?>
    </form>
  </div>
</div>