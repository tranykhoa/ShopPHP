<section class="content">
	<div class="container-fluid">
		<div class="row">
			<!-- column -->	
			<div class="col-md-12">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Danh Sách Đơn Hàng</h3>
					</div>
					<!-- form start -->
					<table class="table">
						<thead>
							<tr>
								<th style="width: 10px">ID</th>
								<th>Email</th>
								<th>Tel</th>
								<th>Address</th>
								<th>ToTal</th>
								<th>OrderDate</th>
								<th>ToTal</th>
								<th>Status</th>
								<th>&nbsp;</th>
								<!-- <th style="width: 120px"> &nbsp;</th> -->
							</tr>
						</thead>
						<tbody>
						<?php
                foreach($listbill as $bill):
                  extract($bill);
                  $get_status = get_ttdh($status);

                  $xacnhan = "index.php?action=xacnhan&id=".$idbill;
                  $chitiet = "index.php?action=chitietdonhang&id=".$idbill;
                  
						?>
							<tr>
								<td><?=$idbill?></td>
								<td><?=$email?></td>
								<td><?=$tel?></td>
								<td><?=$address?></td>
								<td><?=number_format($total)?> đ</td>
								<td><?=$orderdate?></td>
                <td><?=$get_status?></td>
								<td>
									<?php 
										if($status != 1) {
												echo '  <a  class="btn btn-primary" href="'.$chitiet.'"><i class="fa-solid fa-eye"></i></a> ';
										}else{
												echo ' <a href="'.$xacnhan.'" class="btn btn-primary"><i class="fa-solid fa-check"></i></a>
												';
										}
       
                	?>
								</td>
								<!-- <td>
									<a class="btn btn-primary mr-2" href="#"><i class="fas fa-edit"></i></a>
                	<a class="btn btn-danger" href="#"><i class="fas fa-trash"></i></a>
								</td> -->
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