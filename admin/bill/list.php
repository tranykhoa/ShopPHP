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
								<th>Name Customer</th>
								<th>Email</th>
								<th>Tel</th>
								<th>Address</th>
								<th>Payment</th>
								<th>OrderDate</th>
								<th>ToTal</th>
								<th>Status</th>
								<!-- <th style="width: 120px"> &nbsp;</th> -->
							</tr>
						</thead>
						<tbody>
						<?php
                foreach($listbill as $bill):
                  extract($bill);
                  $get_status = get_ttdh($status);

                  // $editbill = "index.php?action=editcg&idcg=".$idcg;
                  // $deletebill = "index.php?action=deletecg&idcg=".$idcg;
                  
						?>
							<tr>
								<td><?=$idbill?></td>
								<td><?=$nameuser?></td>
								<td><?=$email?></td>
								<td><?=$tel?></td>
								<td><?=$address?></td>
								<td><?=$pttt?></td>
								<td><?=$total?></td>
								<td><?=$orderdate?></td>
                <td><?=$get_status?></td>
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