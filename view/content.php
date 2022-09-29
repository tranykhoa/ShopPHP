<div class="hero">
      <div class="glide" id="glide_1">
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides">
            <li class="glide__slide">
              <div class="center">
                <div class="left">
                  <span class="">New Inspiration 2020</span>
                  <h1 class="">NEW COLLECTION!</h1>
                  <p>Trending from men's and women's  style collection</p>
                  <a href="#" class="hero-btn">SHOP NOW</a>
                </div>
                <div class="right">
                    <img class="img1" src="./images/hero-1.png" alt="">
                </div>
              </div>
            </li>
            <li class="glide__slide">
              <div class="center">
                <div class="left">
                  <span>New Inspiration 2020</span>
                  <h1>THE PERFECT MATCH!</h1>
                  <p>Trending from men's and women's  style collection</p>
                  <a href="#" class="hero-btn">SHOP NOW</a>
                </div>
                <div class="right">
                  <img class="img2" src="./images/hero-2.png" alt="">
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <section class="section category">
      <div class="cat-center">
        <div class="cat">
          <img src="./images/cat3.jpg" alt="" />
          <div>
            <p>WOMEN'S WEAR</p>
          </div>
        </div>
        <div class="cat">
          <img src="./images/cat2.jpg" alt="" />
          <div>
            <p>ACCESSORIES</p>
          </div>
        </div>
        <div class="cat">
          <img src="./images/cat1.jpg" alt="" />
          <div>
            <p>MEN'S WEAR</p>
          </div>
        </div>
      </div>
    </section>

    <!-- New Arrivals -->
    <section class="section new-arrival">
      <div class="title">
        <h1>NEW ARRIVALS</h1>
        <p>All the latest picked from designer of our store</p>
      </div>

      <div class="product-center">
        <?php
          foreach ($product_new as $product) {
            extract($product);
            $details="index.php?action=productdetails&idp=".$idp;
            $hinh = $img_path.$img;?>
            <div class="product-item">
              <form action="index.php?action=addtocart" method="POST">
              <div class="overlay">
                <a href="<?=$details?>" class="product-thumb">
                  <img src="<?=$hinh?>" alt="" />
                </a>
              </div>
              <div class="product-info">
                <a href="<?=$details?>"><?=$namep?></a>
                <h4>$<?=$price?></h4>
                <div class="number-btn">
                  <div class="btn-change dec">–</div>
                  <input type="text" name="quantity" value="1" class="input-num">
                  <div class="btn-change inc">+</div>
                </div>
              </div>
              <div class="icons">
                <button><i class="bx bx-heart"></i></button>
                <button><i class="bx bx-search"></i></button>
                <input type="hidden" name="idp" value="<?=$idp?>">
                <input type="hidden" name="namep" value="<?=$namep?>">
                <input type="hidden" name="price" value="<?=$price?>">
                <input type="hidden" name="img" value="<?=$img?>">
                <button name="add" type="submit""><i class="bx bx-cart"></i></input>
              </div>
              <!-- <div  class="add-cart">
                <input type="submit" class="btn-add-cart" name="add" value="Add To Cart">
              </div> -->
            </form>
            </div>
          <?php
          }
        ?>
      </div>
    </section>

    <!-- Promo -->

    <section class="section banner">
<div class="left">
  <span class="trend">Trend Design</span>
  <h1>New Collection 2021</h1>
  <p>New Arrival <span class="color">Sale 50% OFF</span> Limited Time Offer</p>
  <a href="#" class="btn btn-1">Discover Now</a>
</div>
<div class="right">
  <img src="./images/banner.png" alt="">
</div>
    </section>




    <!-- Featured -->
  
    <section class="section new-arrival">
      <div class="title">
        <h1>Featured</h1>
        <p>All the latest picked from designer of our store</p>
      </div>

      <div class="product-center">
        <div class="product-item">
          <div class="overlay">
            <a href="" class="product-thumb">
              <img src="./images/product-7.jpg" alt="" />
            </a>
            <span class="discount">50%</span>
          </div>
          <div class="product-info">
            <span>MEN'S CLOTHES</span>
            <a href="">Quis Nostrud Exercitation</a>
            <h4>$700</h4>
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
              <img src="./images/product-4.jpg" alt="" />
            </a>
          </div>

          <div class="product-info">
            <span>MEN'S CLOTHES</span>
            <a href="">Sonata White Men’s Shirt</a>
            <h4>$800</h4>
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
              <img src="./images/product-6.jpg" alt="" />
            </a>
          </div>
          <div class="product-info">
            <span>MEN'S CLOTHES</span>
            <a href="">Edor do eiusmod tempor</a>
            <h4>$900</h4>
          </div>
          <ul class="icons">
            <li><i class="bx bx-heart"></i></li>
            <li><i class="bx bx-search"></i></li>
            <li><i class="bx bx-cart"></i></li>
          </ul>
        </div>

    </section>
    <!-- Contact -->
    <section class="section contact">
      <div class="row">
        <div class="col">
          <h2>EXCELLENT SUPPORT</h2>
          <p>We love our customers and they can reach us any time
          of day we will be at your service 24/7</p>
          <a href="" class="btn btn-1">Contact</a>
        </div>
        <div class="col">
          <form action="">
            <div>
              <input type="email" placeholder="Email Address">
            <a href="">Send</a>
            </div>
          </form>
        </div>
      </div>
    </section>