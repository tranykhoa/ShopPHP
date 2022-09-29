<div id="my-modal" class="modal-add">
					<div class="modal-content">
						<div class="modal-header">
							<span class="close">&times;</span>
							<h2 style="text-align: center;">Thêm Sản Phẩm</h2>
						</div>
						<div class="modal-body">
							<form action="index.php?action=addproduct" method="post" enctype="multipart/form-data">
								<div class="boxform">
									<table>
                    <div class="row mb10">
												<p>Category</p>
												<select name="idcg">
                          <?php
                            foreach ($listcategory as $category) {
                              extract($category);
                              echo '<option value="'.$idcg.'">'.$namecg.'</option>';
                            }
                          ?>
                        </select>
										</div>
                    <div class="row mb10">
												<p>Name product</p>
												<input type="text" class="inputaddform" name="namep">
										</div>
										<div class="row mb10">
												<p>Price</p>
												<input type="text" class="inputaddform" name="price">
										</div>
										<div class="row mb10">
												<p>Images</p>
												<input type="file" class="inputaddform" name="image">
										</div>
                    <div class="row mb10">
												<p>Describe</p>
                        <textarea name="info" cols="30" rows="10" style="width:100%;"></textarea>
										</div>
										<div class="row mb10">
											<input type="submit" name="add" value="Thêm mới">
                      <a href="index.php?action=listproduct"><input type="button" value="Danh sách"></a>
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