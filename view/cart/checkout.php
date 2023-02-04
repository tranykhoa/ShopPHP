   <!-- Checkout Start -->
   <div class="container-fluid pt-5">
    <form action="index.php?action=confirm-checkout" method="post">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                  
                    <div class="row">
                        <!-- <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" placeholder="John">
                        </div> -->
                        <div class="col-md-6 form-group">
                            <label style="font-weight: 600;">Full Name</label>
                            <input class="form-control" name="name" type="text" value="<?php if(isset($_SESSION['user'])) echo $_SESSION['user']['fullname']; ?>" placeholder="Trần Trường Sinh">
                        </div>
                        <div class="col-md-6 form-group">
                            <label style="font-weight: 600;">E-mail</label>
                            <input class="form-control" name="email" value="<?php if(isset($_SESSION['user'])) echo $_SESSION['user']['email']; ?>" type="text" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label style="font-weight: 600;">Mobile No</label>
                            <input class="form-control" name="phone" value="<?php if(isset($_SESSION['user'])) echo $_SESSION['user']['tel']; ?>" type="text" placeholder="(+84) 456 789 425">
                        </div>
                        <div class="col-md-6 form-group">
                            <label style="font-weight: 600;">Address</label>
                            <input class="form-control" name="address" type="text" placeholder="123 Street" require>
                        </div>

                    </div>                  
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Products</h5>

                        <?php
                        if(isset($_SESSION['cart'])&&($_SESSION['cart'])):
                          $tong = 0;
                          foreach ($_SESSION['cart'] as $cart):
                            $tong += $cart[5]; 
                        ?>

                        <div class="d-flex justify-content-between">
                            <p><?=$cart[1]?></p>
                            <p><?=number_format($cart[5])?> đ</p>
                        </div>

                        <?php
                          endforeach;
                        endif;
                        ?>

                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium"><?=number_format($tong)?> đ</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">10,000 đ</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold"><?=number_format($sum = ($tong + 10))?> đ</h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">App Bank</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="directcheck" name="payment" checked>
                                <label class="custom-control-label" for="directcheck">Thanh toán khi nhận hàng</label>
                            </div>
                        </div>
                        <div class="">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Thẻ Vettel</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <input type="hidden" name="sumtotal" value="<?=$sum?>">
                        <input type="hidden" name="idac" value="<?=$idac?>">
                        <input type="submit" name="confirm" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3" value="Thanh Toán"></input>
                    </div>
                </div>
            </div>
        </div>
    </form>
  </div>
    <!-- Checkout End -->