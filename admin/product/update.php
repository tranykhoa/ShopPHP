
<?php
  if(isset($product) && (is_array($product))){
    extract($product);
  }

  $img_path="../upload/".$img;
  if (is_file($img_path)) {
    $images = "<img width='50px' height='50px' src='".$img_path."' alt='Image'>";
  } else {
    $images = "no photo";
  }
?>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<!-- column -->
			<div class="col-md-12">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Sửa Sản Phẩm</h3>
					</div>
					<!-- form start -->
					<form action="index.php?action=updateproduct" method="post" enctype="multipart/form-data">
						<div class="card-body">
							<div class="form-group">
								<label>Danh mục</label>
								<select class="custom-select" name="optdanhmuc">
									<option selected>choose</option>
									<?php
										foreach ($listcategory as $category) :
											extract($category);
                      if ($category['idcg'] == $product['idcg'])
                        echo ' <option value="' .$category['idcg']. '" selected>' .$category['namecg']. '</option> ';
                      else {
                        echo ' <option value="' .$category['idcg']. '">' .$category['namecg']. '</option> ';
                      }
										endforeach;
									?>
								</select>
							</div>
							<div class="form-group">
								<label>Tên sản phẩm</label>
								<input type="text" class="form-control"placeholder="Nhập tên sản phẩm" name="namep" value="<?=$namep?>" require>
							</div>
							<div class="form-group">
								<label>Price</label>
								<input type="number" class="form-control" name="price" value="<?=$price?>" placeholder="Nhập giá bán" require>
							</div>
							<div class="form-group">
								<label>Quantity</label>
								<input type="number" class="form-control" name="quantity" value="<?=$quantity?>" placeholder="Nhập số lượng" require>
							</div>
							<div class="form-group">
								<label>Images</label>
								<input type="file" class="form-control mb-2" name="upload">
                <?=$images?>
							</div>
							<div class="form-group">
								<label>Describe</label>
								<textarea name="info" cols="30" rows="10" class="form-control"><?=$info?></textarea>
							</div>
						</div>
						<!-- /.card-body -->

						<div class="card-footer">
              <input type="hidden" name="idp" value="<?=$idp?>">
							<input type="submit" value="Lưu" name="update" class="btn btn-success mr-2" style="width: 100px;">
							<a href="index.php?action=listproduct"><input type="button" value="Cancel" name="" class="btn btn-warning" style="width: 100px;color:#fff;"></a>
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