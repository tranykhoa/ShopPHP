    <!-- Product Details -->
    <section class="section product-detail">
      <div class="details container">
        <?php
        {
          extract($oneproduct);
          $hinh = $img_path.$img;?>
        <div class="left image-container">
          <div class="main">
            <img src="<?=$hinh?>" id="zoom" alt="" />
          </div>
        </div>
        <div class="right">
          <h1><?=$namep?></h1>
          <div class="price">$<?=$price?></div>
          <form>
            <div>
              <select>
                <option value="Select Size" selected disabled>
                  Select Size
                </option>
                <option value="1">32</option>
                <option value="2">42</option>
                <option value="3">52</option>
                <option value="4">62</option>
              </select>
              <span><i class="bx bx-chevron-down"></i></span>
            </div>
          </form>
          <form class="form">
            <input type="text" placeholder="1" />
            <a href="cart.html" class="addCart">Add To Cart</a>
          </form>
          <h3>Product Detail</h3>
          <p><?=$info?></p>
        </div>
        <?php
        }
        ?>
      </div>
    </section>

    <!-- Related -->
    <section class="section featured">
      <div class="top container">
        <h1>Related Products</h1>
        <a href="#" class="view-more">View more</a>
      </div>
      <div class="product-center container">
        <?php
        foreach ($similar_products as $product) {
          extract($product);
          $hinh = $img_path.$img;?>
        <div class="product-item">
          <div class="overlay">
            <a href="" class="product-thumb">
              <img src="<?=$hinh?>" alt="" />
            </a>
          </div>
          <div class="product-info">
            <a href=""><?=$namep?></a>
            <h4>$<?=$price?></h4>
          </div>
          <ul class="icons">
            <li><i class="bx bx-heart"></i></li>
            <li><i class="bx bx-search"></i></li>
            <li><i class="bx bx-cart"></i></li>
          </ul>
        </div>
        <?php
        }    
        ?>
      </div>
    </section>