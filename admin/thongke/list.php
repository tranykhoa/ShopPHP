
<section class="content">
	<div class="container-fluid">
		<div class="row">

			<div class="col-md-12">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Thống Kê</h3>
					</div>
					<!-- form start -->
					<table class="table">
						<thead>
							<tr>
                <th>Danh mục</th>
                <th>Số lượng</th>
                <th>Giá cao nhất</th>
                <th>Giá thấp nhất</th>
                <th>Giá trung bình</th>
							</tr>
						</thead>
						<tbody>
						<?php
               foreach($listhongke as $thongke):
                  extract($thongke);
						?>
							<tr>
                <td><?=$tendanhmuc?></td>
                <td><?=$countsp?></td>
                <td><?=number_format($maxprice)?> đ</td>
                <td><?=number_format($minprice)?> đ</td>
                <td><?=number_format($giatrungbinh)?> đ</td>
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