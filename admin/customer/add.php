<section class="content">
	<div class="container-fluid">
		<div class="row">
			<!-- column -->
			<div class="col-md-12">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Thêm Tài Khoản Khách Hàng</h3>
					</div>
					<!-- form start -->
					<form action="index.php?action=addcustomer" method="post" enctype="multipart/form-data">
						<div class="card-body">
							<div class="form-group">
								<label>Họ và Tên</label>
								<input type="text" class="form-control"placeholder="Your Name" name="fullname" require>
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control" name="email" placeholder="Your Email" require>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" name="password" placeholder="Your Password" require>
							</div>
							<div class="form-group">
								<label>Images</label>
								<input type="file" class="form-control" name="upload">
							</div>
							<div class="form-group">
								<label>Tel</label>
								<input type="text" class="form-control" name="tel" placeholder="Your Phone">
							</div>
						</div>
						<!-- /.card-body -->

						<div class="card-footer">
							<input type="submit" value="Thêm mới" name="add" class="btn btn-success mr-2" style="width: 100px;">
							<a href="index.php?action=listcustomer"><input type="button" value="Danh sách" name="" class="btn btn-warning" style="width: 100px;color:#fff;"></a>
						</div>
					</form>
					<!-- end form -->
				</div>
			</div>
			<?php
				if(isset($thongbao)&&($thongbao!="")) echo '<p class="text-danger">'.$thongbao.'</p>';
			?>
			<!-- stary button -->

			<!-- end buttom -->
		</div>

	</div>
</section>