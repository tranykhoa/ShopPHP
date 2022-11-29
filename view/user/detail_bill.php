      <?php
        if (isset($bill) && (is_array($bill))) {
          extract($bill);
          $get_status = get_ttdh($status);
          if ($pttt == 2) {
            $mode = 'Payment on delivery';
          } else {
            $mode = 'Credit Cart';
          }
        }
        ?>
  <!-- Checkout Start -->
   <div class="container-fluid pt-5">
    <form action="index.php?action=confirm-checkout" method="post">
        <div class="row px-xl-5">
            <div class="col-lg-7">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Chi tiết Đơn Hàng</h4>
                  
                    <div class="row">
                        <!-- <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" placeholder="John">
                        </div> -->
                        <div class="col-md-6 form-group">
                            <label>Code Orders</label>
                            <input class="form-control" name="name" type="text" value="TCL-<?=$idbill?> disabled">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" name="email" type="text" value="<?= $email ?> disabled">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" name="phone" type="text" value="<?= $tel ?> disabled">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Delivery Address</label>
                            <input class="form-control" name="address" type="text" value="<?= $address ?> disabled">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Payment Mode</label>
                            <input class="form-control" name="code" type="text" value="<?=$mode?> disabled">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Status</label>
                            <input class="form-control" name="code" type="text" value="<?=$get_status?>"disabled>
                        </div>
   
                    </div>
                    
                </div>
     
            </div>
            <div class="col-lg-5">
                <div class="card border-secondary mb-5">
                  <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Detail Product</h4>
                  </div>
                  <table class="table table-bordered mb-0">
                    <thead class="bg-secondary text-dark">
                      <tr>
                        <th>Name</th>
                        <th>Images</th>
                        <th>Quantity</th>
                        <th>Price</th>
                      </tr>
                      <?php
                      foreach ($listcart as $cart):
                        extract($cart);
                      ?>
                      <tr>
                          <td><?= $namep ?></td>
                          <td>
                            <img width="80px" height="80px" src="./upload/<?=$img?>" alt="Image">
                          </td>
                          <td><?= $quantity ?></td>
                          <td>$ <?= $price ?></td>
                      </tr>
                      <?php
                        endforeach;
                      ?>
                    </thead>
                  </table>
                  <div style="background-color: #C5837C;" class="card-footer border-secondary">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">$ <?= $total ?></h5>
                        </div>
                  </div>
                </div>
            </div>
        </div>
    </form>
  </div>
    <!-- Checkout End -->