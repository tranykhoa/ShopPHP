<?php
	extract($_SESSION['user']);
	$hinh = $img_path.$images;
?>
<h1 style="text-align: center;margin-top: 2rem;">Thông tin cá nhân</h1>
<div class="container-login">
		<div class="img-login">
			<img src="<?=$hinh?>">
		</div>
		<div class="login-content">
			<form action="#">
				<!-- <img src="img/1.jpg"> -->
				<p style="font-size: 3rem; color: chartreuse; margin-bottom: 2rem;" class="title-login"><?=$fullname?></p>
				<div class="input-box one">
					<div class="icons-login">
						<i class="fas fa-user"></i>
					</div>
					<div class="box-login">
						<p><?=$email?></p>
					</div>
				</div>
				<div class="input-box pass">
					<div class="icons-login">
						<i class="fas fa-lock"></i>
					</div>
					<div class="box-login">
						<p>(84+) <?=$tel?></p>
					</div>
				</div>
				<div class="box-btn-profile">
					<a href="index.php?action=logout"><div class="btn-active-profile"><input type="button" style="width:100%;" class="log-profile" value="Log out"></div></a>
					<a href="index.php?action=updateuser"><div class="btn-active-profile"><input type="button" style="width:100%;" class="up-profile" value="Update"></div></a>
					<a href="index.php?action=mybill"><div class="btn-active-profile"><input type="button" style="width:100%;" class="up-profile" value="My Bill"></div></a>
					<?php
						if (isset($thongbao) && ($thongbao != "")) echo '<h5 style="color:blue;">'.$thongbao.'</h5>';
						?>
				</div>
			</form>
		</div>
	</div>
