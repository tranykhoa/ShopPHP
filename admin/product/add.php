<section class="content">
	<div class="container-fluid">
		<div class="row">
			<!-- column -->
			<div class="col-md-12">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Thêm sản phẩm</h3>
					</div>
					<!-- form start -->
					<form action="index.php?action=addproduct" method="post" enctype="multipart/form-data">
						<div class="card-body">
							<div class="form-group">
								<label>Danh mục</label>
								<select class="custom-select" name="optdanhmuc">
									<option selected>choose</option>
									<?php
										foreach ($listcategory as $category) :
											extract($category);
									?>
									<option value="<?=$idcg?>"><?=$namecg?></option>
									<?php
										endforeach;
									?>
								</select>
							</div>
							<div class="form-group">
								<label>Tên sản phẩm</label>
								<input type="text" class="form-control"placeholder="Nhập tên sản phẩm" name="namep" require>
							</div>
							<div class="form-group">
								<label>Price</label>
								<input type="number" class="form-control" name="price" placeholder="Nhập giá bán" require>
							</div>
							<div class="form-group">
								<label>Quantity</label>
								<input type="number" class="form-control" name="quantity" placeholder="Nhập số lượng" require>
							</div>
							<div class="form-group">
								<label>Images</label>
								<input type="file" class="form-control" name="image">
							</div>
							<div class="form-group">
								<label>Describe</label>
								<textarea name="info" cols="30" rows="10" class="form-control"></textarea>
							</div>
						</div>
						<!-- /.card-body -->

						<div class="card-footer">
							<input type="submit" value="Thêm mới" name="add" class="btn btn-success mr-2" style="width: 100px;">
							<a href="index.php?action=listproduct"><input type="button" value="Danh sách" name="" class="btn btn-warning" style="width: 100px;color:#fff;"></a>
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