<div class="container-login">
  <div class="img-login">
    <img src="view/images/super.svg">
  </div>
  <div class="login-content">
    <?php
    if(isset($bill)&&(is_array($bill))){
      extract($bill);
      if($pttt == 2){
        $mode = 'Payment on delivery';
      }else{
        $mode = 'Credit Cart';
      }
    }
    ?>
    <form action="#" method="POST" enctype="multipart/form-data">
      <img src="view/images/timtim.svg">
      <h2 style="color: red;" class="title-login">Thank you for your purchase</h2>
      <p style="color: green; font-size: 20px;" class="title-login">Your Order Placed Successfully</p>
      <div>
        <p style="font-size: 17px;margin-top: 5px;">Your Name: <?=$nameuser?></p>
        <p style="font-size: 17px">Your Email: <?=$email?></p>
        <p style="font-size: 17px">Your Phone: <?=$tel?></p>
        <p style="font-size: 17px">Delivery address: <?=$address?></p>
        <p style="font-size: 17px">Code Orders: TCL-<?=$idbill?></p>
        <p style="font-size: 17px">Total Amount Paid:$ <?=$total?></p>
        <p style="font-size: 17px">Payment Mode: <?=$mode?></p>
      </div>
      <a href="index.php"><input type="button" name="adduser" class="btn-login" value="Back Home"></a>
      <?php
          if(isset($thongbao)&&($thongbao != ""))
            echo '<p style="color: red; font-style: italic; font-size: 16px;">'.$thongbao.'</p>';
      ?>
    </form>
  </div>
</div>