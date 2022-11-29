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
   
   <!-- Cart Start -->
   <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-6 table-responsive mb-5">
                <img class="w-100 h-100" src="./view/img/signin-2.jpg" alt="Image">
            </div>
            <div class="col-lg-6">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h5 class="font-weight-semi-bold m-0">THANK YOU FOR YOUR PURCHASE</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Your Name</h6>
                            <h6 class="font-weight-medium"><?=$nameuser?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Your Email</h6>
                            <h6 class="font-weight-medium"><?=$email?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Your Phone</h6>
                            <h6 class="font-weight-medium"><?=$tel?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Your Address</h6>
                            <h6 class="font-weight-medium"><?=$address?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Code Orders</h6>
                            <h6 class="font-weight-medium">TCL-<?=$idbill?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Total Orders</h6>
                            <h6 class="font-weight-medium">TCL-<?=$idbill?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Payment Mode</h6>
                            <h6 class="font-weight-medium"><?=$mode?></h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 style="color: green;" class="font-weight-bold">Your Order Placed Successfully</h5>
                        </div>
                        <a href="index.php"><button class="btn btn-block btn-primary my-3 py-3">Back Home</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
