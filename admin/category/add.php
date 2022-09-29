<div id="my-modal" class="modal-add">
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
                        <a href="index.php?action=listcategory"><input type="button" value="Danh sách"></a>
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