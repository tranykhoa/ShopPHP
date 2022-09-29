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
							<a class="active" href="#">Product</a>
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
				<a href="index.php?action=addproduct">
					<!-- <li id="modal-btn"> -->
					<li>
						<i class='bx bxs-calendar-check' ></i>
						<span class="text">
							<p>Thêm mới</p>
						</span>
					</li>				
				</a>						
			</ul>
			<div class="choose-option">
          <form action="index.php?action=listproduct" method="post">
                <input type="text" placeholder="Nhập từ khóa tìm kiếm" class="formoption" name="keyw">
                <select name="idcg" style="border:1px #ccc solid;padding:5px;">
                    <option value="0" selected>Tất cả</option>
                    <?php
                        foreach ($listcategory as $category) {
                            extract($category);
                            echo '<option value="'.$idcg.'">'.$namecg.'</option>';
                        }
                    ?>                 
                </select>
                <input type="submit" name="choose" class="formoption filter" value="Thực hiện">
          </form>
        </div>


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
                <th>Img</th>
								<th>Price</th>
								<th>View</th>
								<th>Manipulation</th>
							</tr>
						</thead>
						<tbody>
              <?php
                foreach($listproduct as $product){
                  extract($product);

                  $editproduct = "index.php?action=editproduct&idp=".$idp;
                  $deleteproduct = "index.php?action=deleteproduct&idp=".$idp;
                  $img_path="../upload/".$img;

                  //check path
                  if(is_file($img_path)){
                    $images = "<img src='".$img_path."'>";
                  }else{
                    $images = "no photo";
                  }
                  echo '<tr>
                    <td></td> 
                    <td><p>'.$idp.'<p></td>
                    <td>'.$namep.'</td>
                    <td>'.$images.'</td>
                    <td>'.$price.'</td>
                    <td>'.$view.'</td>
                    <td>
										<a href="'.$editproduct.'"><input class="status process" type="button" value="sửa"></a>
										<a href="'.$deleteproduct.'"><input class="status pending" type="button" value="xóa"></a>
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