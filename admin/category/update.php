<?php
    if(isset($category)&&is_array($category)){
        extract($category);
    }
?>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<!-- column -->
			<div class="col-md-12">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Sửa Danh Mục</h3>
					</div>
					<!-- form start -->
					<form action="index.php?action=updatecategory" method="post">
						<div class="card-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Mã danh mục</label>
								<input type="email" class="form-control" value="<?=$idcg?>" disabled>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Tên danh mục</label>
								<input type="text" class="form-control" name="namecg" value="<?=$namecg?>" placeholder="Nhập tên danh mục">
							</div>
						</div>
						<!-- /.card-body -->

						<div class="card-footer">
							<input type="hidden" name="idcg" value="<?=$idcg?>">
							<input type="submit" value="Lưu" name="update" class="btn btn-success mr-2" style="width: 100px;">
							<a href="index.php?action=listcategory"><input type="button" value="Danh sách" name="" class="btn btn-warning" style="width: 100px;color:#fff;"></a>
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