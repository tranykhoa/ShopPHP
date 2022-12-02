<section class="content">
	<div class="container-fluid">
		<div class="row">
			<!-- column -->
			<div class="col-md-7 mb-3">
				<a href="index.php?action=addproduct"><button type="button" class="btn btn-warning">Thêm mới</button></a>
			</div>

			<div class="col-md-6 mb-3">
				<form action="index.php?action=listproduct" method="post">
					<input type="text" placeholder="Nhập từ khóa tìm kiếm" class="mr-2" name="keyw" style="border-radius: 5px;border:1px solid #ccc;padding: 3.5px;">
					<select name="idcg" style="border:1px #ccc solid;padding:3.5px;" class="mr-2">
						<option value="0" selected>Tất cả</option>
						<?php
						foreach ($listcategory as $category) {
							extract($category);
							echo '<option value="' . $idcg . '">' . $namecg . '</option>';
						}
						?>
					</select>
					<input type="submit" style="padding: 3px 10px;" name="choose" class="btn btn-primary mb-1" value="Thực hiện">
				</form>
			</div>
			<div class="col-md-12">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Danh Sách Sản Phẩm</h3>
					</div>
					<!-- form start -->
					<table class="table">
						<thead>
							<tr>
								<th style="width: 10px">ID</th>
								<th>Name</th>
								<th>Images</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Danh Mục</th>
								<th style="width: 120px"> &nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($listproduct as $product) :
								extract($product);

								$editproduct = "index.php?action=editproduct&idp=" . $idp;
								$deleteproduct = "index.php?action=deleteproduct&idp=" . $idp;
								$img_path = "../../upload/" . $img;

								//check path
								if (is_file($img_path)) {
									$images = "<img width='50px' height='50px' src='".$img_path."' alt='Image'>";
								} else {
									$images = "no photo";
								}
							?>
								<tr>
									<td><?= $idp ?></td>
									<td><?= $namep ?></td>
									<td><?= $images ?></td>
									<td><?= $price ?></td>
									<td><?= $quantity ?></td>
									<td>
										<?php
										foreach($listcategory as $category){
											if($product['idcg'] == $category['idcg'])
											{
												echo $category['namecg'];
												break;
											}
										}
										 ?>
									</td>
									<td>
										<a class="btn btn-primary mr-2" href="<?= $editproduct ?>"><i class="fas fa-edit"></i></a>
										<a class="btn btn-danger" href="<?= $deleteproduct ?>"><i class="fas fa-trash"></i></a>
									</td>
								</tr>
							<?php
							endforeach;
							?>
						</tbody>
					</table>
					<!-- end form -->
					<!-- start page -->

					<!-- end page -->
				</div>
				<div style="background-color: transparent;" class="card-footer clearfix">
					<ul class="pagination pagination-sm m-0 float-right">
						<li class="page-item"><a class="page-link" href="#">«</a></li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item"><a class="page-link" href="#">»</a></li>
					</ul>
				</div>
			</div>

			<!-- stary button -->

			<!-- end buttom -->
		</div>

	</div>
</section>