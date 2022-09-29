<main class="container-checkout">
    <h1 class="heading-checkout">
      <ion-icon name="cart-outline"></ion-icon> Shopping Cart
    </h1>

    <div class="item-flex">

      <!--
       - checkout section
      -->
      <section class="checkout">
        <h2 class="section-heading">Payment Details</h2>
        <div class="payment-form">
          <div class="payment-method">
            <button class="method selected">
              <ion-icon name="card"></ion-icon>
              <span>Credit Card</span>
              <input type="checkbox" class="checkmark-checkout" checked>
            </button>
            <!-- <button class="method selected">
              <ion-icon name="logo-paypal"></ion-icon>
              <span>PayPal</span>
              <input type="checkbox" class="checkmark-checkout">
            </button> -->
            <button class="method selected">
              <ion-icon name="bag-check"></ion-icon>
              <span>Payment on delivery</span>
              <input type="checkbox" class="checkmark-checkout">
            </button>
          </div>
          <?php
          if(isset($_SESSION['user'])&&($_SESSION['user'])){
            $customer_name = $_SESSION['user']['fullname'];
            $email = $_SESSION['user']['email'];
            $phone = $_SESSION['user']['tel'];
            $iduser = $_SESSION['user']['iduser'];
            $sum = 0;
            foreach ($_SESSION['cart'] as $cart) {
              $sum += $cart[5];
            }
          } 
          ?>
          <form action="index.php?action=confirm-checkout" method="post">
            <div class="cardholder-name">
              <label for="cardholder-name" class="label-default">Customer</label>
              <input type="text" name="customer-name" class="input-default" value="<?=$customer_name?>">
            </div>
            <div class="cardholder-name">
              <label for="cardholder-name" class="label-default">Email</label>
              <input type="text" name="email" class="input-default" value="<?=$email?>">
            </div>
            <div class="cardholder-name">
              <label for="cardholder-name" class="label-default">Phone</label>
              <input type="text" name="phone" class="input-default" value="<?=$phone?>">
            </div>
            <div class="cardholder-name">
              <label for="cardholder-name" class="label-default">Address</label>
              <input type="text" name="address" class="input-default" placeholder="Enter your delivery address ">
            </div>
            <input type="hidden" name="sumtotal" value="<?=$sum?>">
            <input type="hidden" name="iduser" value="<?=$iduser?>">
            <div style="margin-top: 40px;">
              <input type="submit" name="confirm" class="btn-primary" value="Pay"></input>
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
          if(isset($_SESSION['cart'])&&($_SESSION['cart'])){
            $tong = 0;
            foreach ($_SESSION['cart'] as $cart) {
              $img = $img_path . $cart[3];
              $tong += $cart[5]; ?>      
            <div class="product-card-checkout">
              <div class="card-checkout">
                <div class="img-box">
                  <img src="<?=$img?>" alt="Green tomatoes" width="80px" class="product-img">
                </div>
                <div class="detail-checkout">
                  <h4 class="product-name"><?=$cart[1]?></h4>
                  <div class="wrapper-checkout">
                    <div class="product-qty">
                      <input type="number" value="<?=$cart[4]?>" disabled>
                    </div>
                    <div class="price">
                      $ <span><?=$cart[2]?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php
                }
              }
          ?>
          <!-- <div class="product-card-checkout">
            <div class="card-checkout">
              <div class="img-box">
                <img src="./images/green-tomatoes.jpg" alt="Green tomatoes" width="80px" class="product-img">
              </div>
              <div class="detail-checkout">
                <h4 class="product-name">Green Tomatoes 1 Kilo</h4>
                <div class="wrapper-checkout">
                  <div class="product-qty">
                    <input type="number" value="23" disabled>
                  </div>
                  <div class="price">
                    $ <span>1.25</span>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
        </div>

        <div class="wrapper-checkout">
          <div class="discount-token">
            <label for="discount-token" class="label-default">Gift card/Discount code</label>
            <div class="wrapper-flex">
              <input type="text" name="discount-token" id="discount-token" class="input-default">
              <button class="btn-outline">Apply</button>
            </div>
          </div>
          <div class="amount-checkout">
            <div class="subtotal">
              <span style="font-weight: 500;">Subtotal</span> <span>$ <?=$tong?></span>
            </div>
            <div class="shipping">
              <span style="font-weight: 500;">Shipping</span> <span>$ 0.00</span>
            </div>
            <div class="total-checkout">
              <span style="font-weight: 700;">Total</span> <span style="font-weight: 700;">$ <?=$tong?></span>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>