
	<div class="wrapper">

		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
			</ul>
			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" data-widget="fullscreen" href="#" role="button">
						<i class="fas fa-expand-arrows-alt"></i>
					</a>
				</li>
			</ul>
		</nav>
		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="../index3.html" class="brand-link">
				<img src="../dist/img/sidebar-K2.jpg" alt="Kshop Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
				<span class="brand-text font-weight-light">SHOPPER</span>
			</a>
			<?php
				if(isset($_SESSION['admin'])){
					extract($_SESSION['admin']);
				}
			?>
			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="../../upload/<?=$img?>" class="img-circle elevation-2" alt="User Image" />
					</div>
					<div class="info">
						<a href="#" class="d-block"><?=$fullname?></a>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">

					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


						<li class="nav-item">
							<a href="index.php" class="nav-link">
								<i class="nav-icon fas fa-home"></i>
								<p> Home </p>
							</a>
						</li>
						<!-- menu danh muc -->
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-th"></i>
								<p>
									Danh mục
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="../category/index.php?action=listcategory" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Danh sách</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="../category/index.php?action=addcategory" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Thêm danh mục</p>
									</a>
								</li>
							</ul>
						</li>

						<!-- menu san pham -->
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="fas fa-box nav-icon"></i>
								<p>
									Sản Phẩm
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="../product/index.php?action=listproduct" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Danh sách</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="../product/index.php?action=addproduct" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Thêm sản phẩm</p>
									</a>
								</li>
							</ul>
						</li>

						<!-- menu khach hang -->
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="fas fa-user-tie nav-icon"></i>
								<p>
									Khách hàng
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="../customer/index.php?action=listcustomer" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Danh sách</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="../customer/index.php?action=addcustomer" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Thêm tài khoản</p>
									</a>
								</li>
							</ul>
						</li>

						<!-- menu don hang -->
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="fas fa-file-invoice-dollar nav-icon"></i>
								<p>
									Đơn hàng
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="../bill/index.php?action=listbill" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Danh sách</p>
									</a>
								</li>
							</ul>
						</li>

						<!-- menu user -->
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="fas fa-user-cog nav-icon"></i>
								<p>
									User
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="../user/index.php?action=listuser" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Danh sách</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="../user/index.php?action=adduser" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Thêm tài khoản</p>
									</a>
								</li>
							</ul>
						</li>

						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-chart-pie"></i>
								<p>
									Thống kê
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="charts/chartjs.html" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>ChartJS</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="charts/flot.html" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Flot</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="charts/inline.html" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Inline</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="charts/uplot.html" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>uPlot</p>
									</a>
								</li>
							</ul>
						</li>

						<li class="nav-item">
							<a href="index.php?action=logout" class="nav-link">
							<i class="fas fa-door-open nav-icon"></i>
								<p>
									Thoát
								</p>
							</a>
						</li>
					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>


		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
					</div>
				</div>
				<!-- /.container-fluid -->
			</section>

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">