<section class="content">
	<div class="container-fluid">
		<div class="row">
			<!-- column -->
			<div class="col-md-7 mb-3">
				<a href="index.php?action=addcustomer"><button type="button" class="btn btn-warning">Thêm mới</button></a>
			</div>
			<div class="col-md-12">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Danh Sách Account Customer</h3>
					</div>
					<!-- form start -->
					<table class="table">
						<thead>
							<tr>
								<th style="width: 10px">ID</th>
								<th>Name</th>
								<th>Images</th>
								<th>Email</th>
								<th>Pass</th>
								<th>Tel</th>
								<th style="width: 120px"> &nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($listcustomer as $customer) :
								extract($customer);

								$editcustomer = "index.php?action=editcustomer&idac=" . $idac;
								$deletecustomer = "index.php?action=deletecustomer&idac=" . $idac;
								$img_path = "../upload/" . $images;

								//check path
								if (is_file($img_path)) {
									$img = "<img width='50px' height='50px' src='".$img_path."' alt='Image'>";
								} else {
									$img = "no photo";
								}
							?>
								<tr>
									<td><?= $idac ?></td>
									<td><?= $fullname ?></td>
									<td><?= $img ?></td>
									<td><?= $email ?></td>
									<td><?= $pass ?></td>
									<td><?= $tel ?></td>
									<td>
										<a class="btn btn-primary mr-2" href="<?= $editcustomer ?>"><i class="fas fa-edit"></i></a>
										<a class="btn btn-danger" href="<?= $deletecustomer ?>"><i class="fas fa-trash"></i></a>
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