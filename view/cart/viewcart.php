    <!-- Cart Items -->
    <div class="container cart">
      <table>
        <tr>
          <th>Product</th>
          <th>Quantity</th>
          <th>Subtotal</th>
        </tr>
        <?php
          $tong = 0;
          $i = 0;
          foreach ($_SESSION['cart'] as $cart) {
            $hinh = $img_path . $cart[3];
            $tong += $cart[5];
            $xoasp = "index.php?action=delcart&idcart=".$i;
          ?>
            <tr>
              <td>
                <div class="cart-info">
                  <img src="<?=$hinh?>" alt="" />
                  <div>
                    <p><?=$cart[1]?></p>
                    Price: <span style="color:#bf00ff;">$<?=$cart[2]?></span> <br />
                    <a href="<?=$xoasp?>"><input style="padding: 5px 10px; width: 8rem;color:red;" type="button" value="Remove"></a>
                  </div>
                </div>
              </td>
              <td><input type="number" value="<?=$cart[4]?>" min="1" disabled/></td>
              <td>$<?=$cart[5]?></td>
            </tr>
        <?php
          $i++;
        }
        ?>

      </table>
      <div class="total-price">
        <table>
          <tr>
            <td>Total</td>
            <td>$<?=$tong?></td>
          </tr>
        </table>
        <div class="btn-cart-box">
          <a href="index.php?action=shop" class="continue-shopping btn">Continue Shopping</a>
          <a href="index.php?action=checkout" class="checkout-viewcart btn">Proceed To Checkout</a>
        </div>
        <?php
          if(isset($thongbao)&&($thongbao != ""))
            echo '<p style="color: red; font-style: italic; font-size: 16px;">'.$thongbao.'</p>';
        ?>
      </div>
    </div>
  
    <!-- Latest Products -->
    <section class="section featured">
      <div class="top container">
        <h1>Latest Products</h1>
        <a href="#" class="view-more">View more</a>
      </div>
      <div class="product-center container">
        <div class="product-item">
          <div class="overlay">
            <a href="" class="product-thumb">
              <img src="./images/product-6.jpg" alt="" />
            </a>
          </div>
          <div class="product-info">
            <span>MEN'S CLOTHES</span>
            <a href="">Concepts Solid Pink Men’s Polo</a>
            <h4>$150</h4>
          </div>
          <ul class="icons">
            <li><i class="bx bx-heart"></i></li>
            <li><i class="bx bx-search"></i></li>
            <li><i class="bx bx-cart"></i></li>
          </ul>
        </div>
        <div class="product-item">
          <div class="overlay">
            <a href="" class="product-thumb">
              <img src="./images/product-1.jpg" alt="" />
            </a>
            <span class="discount">40%</span>
          </div>
          <div class="product-info">
            <span>MEN'S CLOTHES</span>
            <a href="">Concepts Solid Pink Men’s Polo</a>
            <h4>$150</h4>
          </div>
          <ul class="icons">
            <li><i class="bx bx-heart"></i></li>
            <li><i class="bx bx-search"></i></li>
            <li><i class="bx bx-cart"></i></li>
          </ul>
        </div>
        <div class="product-item">
          <div class="overlay">
            <a href="" class="product-thumb">
              <img src="./images/product-3.jpg" alt="" />
            </a>
          </div>
          <div class="product-info">
            <span>MEN'S CLOTHES</span>
            <a href="">Concepts Solid Pink Men’s Polo</a>
            <h4>$150</h4>
          </div>
          <ul class="icons">
            <li><i class="bx bx-heart"></i></li>
            <li><i class="bx bx-search"></i></li>
            <li><i class="bx bx-cart"></i></li>
          </ul>
        </div>
        <div class="product-item">
          <div class="overlay">
            <a href="" class="product-thumb">
              <img src="./images/product-2.jpg" alt="" />
            </a>
          </div>
          <div class="product-info">
            <span>MEN'S CLOTHES</span>
            <a href="">Concepts Solid Pink Men’s Polo</a>
            <h4>$150</h4>
          </div>
          <ul class="icons">
            <li><i class="bx bx-heart"></i></li>
            <li><i class="bx bx-search"></i></li>
            <li><i class="bx bx-cart"></i></li>
          </ul>
        </div>
      </div>
    </section>