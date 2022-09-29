<main class="container-checkout">
  <h1 class="heading-checkout">
    <ion-icon name="cart-outline"></ion-icon> Shopping Cart
  </h1>

  <div class="item-flex">

    <!--
       - checkout section
      -->
    <section class="checkout">
      <h2 class="section-heading">CHI TIẾT ĐƠN HÀNG</h2>
      <div class="payment-form">
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
        <form action="index.php?action=confirm-checkout" method="post">
          <div class="cardholder-name">
            <label for="cardholder-name" class="label-default">Code Orders</label>
            <input type="text" name="customer-name" class="input-default" value="TCL-<?=$idbill?>" disabled>
          </div>
          <div class="cardholder-name">
            <label for="cardholder-name" class="label-default">Delivery address</label>
            <input type="text" name="email" class="input-default" value="<?= $address ?>" disabled>
          </div>
          <div class="cardholder-name">
            <label for="cardholder-name" class="label-default">Total Amount Paid</label>
            <input type="text" name="phone" class="input-default" value="$ <?= $total ?>" disabled>
          </div>
          <div class="cardholder-name">
            <label for="cardholder-name" class="label-default">Payment Mode</label>
            <input type="text" name="address" class="input-default" value="<?=$mode?>" disabled>
          </div>
          <div class="cardholder-name">
            <label for="cardholder-name" class="label-default">Status</label>
            <input type="text" name="address" class="input-default" value="<?=$get_status?>" disabled>
          </div>

        </form>
      </div>


    </section>

    <!--
        - cart section
      -->
    <section class="cart-checkout">
      <div class="cart-item-box">
        <h2 class="section-heading">Order Summery</h2>

        <?php
          foreach ($listcart as $cart) {
            extract($cart);
            $images = $img_path . $img; ?>
            <div class="product-card-checkout">
              <div class="card-checkout">
                <div class="img-box">
                  <img src="<?= $images ?>" alt="Green tomatoes" width="80px" class="product-img">
                </div>
                <div class="detail-checkout">
                  <h4 class="product-name"><?= $namep ?></h4>
                  <div class="wrapper-checkout">
                    <div class="product-qty">
                      <input type="number" value="<?= $quantity ?>" disabled>
                    </div>
                    <div class="price">
                      $ <span><?= $price ?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <?php
          }
        ?>

      </div>

    </section>
  </div>
</main>