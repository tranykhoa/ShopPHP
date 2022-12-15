<?php
if(isset($onebill)){
  $idb = $onebill['idbill'];
  $dongy = "index.php?action=dongy&id=".$idb;

}
?>

<h3>Order Detail</h3> 
<br>
<form method="post">
		<!-- <input type="hidden" name="action" value="luudonhang"> -->
		<div class="form-group">
			<label class="fw-bold">Email</label>
			<input type="email" disabled value="<?php echo $one_customer['email']; ?>" class="form-control bg-white" name="txtemail" required>
		</div>
		<div class="form-group">
			<label class="fw-bold">Họ tên</label>
			<input type="text" disabled value="<?php echo $one_customer['fullname']; ?>" class="form-control bg-white" name="txthoten" required>
		</div>
		<div class="form-group">
			<label class="fw-bold">Số điện thoại</label>
			<input type="number" disabled value="<?php echo $one_customer['tel']; ?>" class="form-control bg-white" name="txtsodienthoai" required>
		</div>
</form>
<br>
<div class="col-sm-12">
	<h4>Detail</h4>
		<table class="table bg-white rounded shadow-sm  table-hover">
		<tr class="info">
		<th>Id</th>
		<th>Id Bill</th>
		<th>Id Product</th>
    <th>Name Product</th>
		<th>Price</th>
		<th>Quantity</th>
		<th>ToTal</th>
		</tr>
		<?php foreach($listcart as $cart): ?>
		<tr>
		<td><?php echo $cart["idcart"]; ?></td>
		<td><?php echo $cart["idbill"]; ?></td>
		<td><?php echo $cart["idp"]; ?></td>
		<td><?php echo $cart["namep"]; ?></td>
		<td><?php echo number_format($cart["price"]) . "đ"; ?></td>
		<td><?php echo $cart["quantity"]; ?></td>
		<td><?php echo number_format($cart["thanhtien"]) . "đ"; ?></td>
		</tr>
		<?php endforeach; ?>
		<tr>	
		</table>
	<div>
	<?php
	if($onebill['status'] == 2){
		echo ' <div style="float: right;">
    <a href="'.$dongy.'" class="btn btn-success mr-2">Xác Nhận</a>
    <a href="index.php?action=listbill" class="btn btn-danger">Quay lại</a>
  </div> ';
	}else{
		echo ' <div style="float: right;">
    <a href="index.php?action=listbill" class="btn btn-danger">Quay lại</a>
  </div> ';
	}
	?>
  
</div>
</div>


