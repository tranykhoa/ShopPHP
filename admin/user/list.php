<!-- MAIN -->
<main>
	<div class="head-title">
		<div class="left">
			<h1>Quản lý Shop</h1>
			<ul class="breadcrumb">
				<li>
					<a href="#">Quản lý shop</a>
				</li>
				<li><i class='bx bx-chevron-right'></i></li>
				<li>
					<a class="active" href="#">Category</a>
				</li>
			</ul>
		</div>
		<a href="#" class="btn-download">
			<i class='bx bxs-cloud-download'></i>
			<span class="text">Download PDF</span>
		</a>
	</div>

	<ul class="box-info">
		<!-- <a href="#"> -->
		<a href="index.php?action=adduser">
			<!-- <li id="modal-btn"> -->
			<li>
				<i class='bx bxs-calendar-check'></i>
				<span class="text">
					<p>Thêm mới</p>
				</span>
			</li>

		</a>

		<!-- <div id="my-modal" class="modal">
					<div class="modal-content">
						<div class="modal-header">
							<span class="close">&times;</span>
							<h2 style="text-align: center;">Thêm Người Dùng</h2>
						</div>
						<div class="modal-body">
							<form action="index.php?action=adduser" method="post">
								<div class="boxform">
									<table>
										<div class="row mb10">
												<p>Mã loại</p>
												<input type="text" class="inputaddform" value="auto number" name="maloai" id="" disabled>
										</div>
										<div class="row mb10">
												<p>Tên loại</p>
												<input type="text" class="inputaddform" name="namecg" id="">
										</div>
										<div class="row mb10">
												<input type="submit" name="add" value="Thêm mới">
										</div>
										<?php
										if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
										?>
									</table>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<h3>Modal Footer</h3>
						</div>
					</div>
				</div> -->
	</ul>


	<div class="table-data">
		<div class="order">
			<div class="head">
				<h3>Product</h3>
				<i class='bx bx-search'></i>
				<i class='bx bx-filter'></i>
			</div>
			<table>
				<thead>
					<tr>
						<th></th>
						<th>Name</th>
						<th>Images</th>
						<th>Email</th>
						<th>Password</th>
						<th>Tel</th>
						<th>Manipulation</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($listuser as $user) {
						extract($user);
						$edituser = "index.php?action=edituser&iduser=".$iduser;
						$deleteuser = "index.php?action=deletuser&iduser=".$iduser;
						$img_path="../upload/".$images;

						//check path
						if(is_file($img_path)){
						$images = "<img src='".$img_path."'>";
						}else{
						$images = "no photo";
						}
						?>
						<tr>
							<td></td>
							<td>
								<p><?= $fullname ?></p>
							</td>
							<td><?= $images ?></td>
							<td><?=$email?></td>
							<td><?=$pass?></td>
							<td><?=$tel?></td>
							<td>
								<a href="<?=$edituser?>"><input class="status process" type="button" name="" value="sửa"></a>
								<a href="<?=$deleteuser?>"><input class="status pending" type="button" name="" value="xóa"></a>
							</td </tr>
						<?php
					}
						?>

				</tbody>
			</table>
		</div>
	</div>
</main>
<!-- MAIN -->
</section>
<!-- CONTENT -->