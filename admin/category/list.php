<!-- MAIN -->
<main>
			<div class="head-title">
				<div class="left">
					<h1>Quản lý Shop</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Quản lý shop</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Category</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
			</div>

			<ul class="box-info">
				<!-- <a href="#"> -->
				<a href="index.php?action=addcategory">
					<!-- <li id="modal-btn"> -->
					<li>
						<i class='bx bxs-calendar-check' ></i>
						<span class="text">
							<p>Thêm mới</p>
						</span>
					</li>
					
				</a>
							
				<div id="my-modal" class="modal">
					<div class="modal-content">
						<div class="modal-header">
							<span class="close">&times;</span>
							<h2 style="text-align: center;">Thêm danh mục</h2>
						</div>
						<div class="modal-body">
							<form action="index.php?action=addcategory" method="post">
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
														if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
										?>
									</table>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<h3>Modal Footer</h3>
						</div>
					</div>
				</div>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Product</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
                <th></th>
								<th>ID</th>
								<th>Name</th>
								<th>Manipulation</th>
							</tr>
						</thead>
						<tbody>
              <?php
                foreach($listcategory as $category){
                  extract($category);

                  $editcategory = "index.php?action=editcg&idcg=".$idcg;
                  $deletecategory = "index.php?action=deletecg&idcg=".$idcg;
                  echo '<tr>
                    <td></td> 
                    <td><p>'.$idcg.'<p></td>
                    <td>'.$namecg.'</td>
                    <td>
                      <a href="'.$editcategory.'"><input class="status process" type="button" name="" value="sửa"></a>
                      <a href="'.$deletecategory.'"><input class="status pending" type="button" name="" value="xóa"></a>
                    </td
                  </tr>';
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