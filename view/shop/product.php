    <!-- All Products -->
    <section class="section all-products" id="products">
      <div class="top container">
        <h1>All Products</h1>
        <form action="index.php?action=shop" method="post">
          <select name="idcg" onchange="this.form.submit()">
            <option value="0">-- Category --</option>
            <!-- <option value="0" selected style="display=none";>Tất cả</option> -->
            <option value="0">Tất cả</option>
            <?php
            foreach ($listcategory as $category) {
              extract($category);
              // $getid = "index.php?action=shop&id=".$idcg;
              echo '<option value="' . $idcg . '">' . $namecg . '</option>';
            }
            ?>
          </select>
          <span><i class="bx bx-chevron-down"></i></span>
        </form>
      </div>
      <div class="product-center container">
        <?php
        foreach ($listproduct as $product) {
          extract($product);
          $details = "index.php?action=productdetails&idp=" . $idp;
          $hinh = $img_path . $img; ?>
          <div class="product-item">
            <form action="index.php?action=addtocart" method="POST">
              <div class="overlay">
                <a href="<?= $details ?>" class="product-thumb">
                  <img src="<?= $hinh ?>" alt="" />
                </a>
                <!-- <span class="discount">40%</span> -->
              </div>
              <div class="product-info">
                <a href="<?= $details ?>"><?= $namep ?></a>
                <h4 style="color: #0080ff" ;>$<?= $price ?></h4>
                <div class="number-btn">
                  <div class="btn-change dec">–</div>
                  <input type="text" name="quantity" value="1" class="input-num">
                  <div class="btn-change inc">+</div>
                </div>
              </div>
              <ul class="icons">
                <button><i class="bx bx-heart"></i></button>
                <button><i class="bx bx-search"></i></button>
                <input type="hidden" name="idp" value="<?= $idp ?>">
                <input type="hidden" name="namep" value="<?= $namep ?>">
                <input type="hidden" name="price" value="<?= $price ?>">
                <input type="hidden" name="img" value="<?= $img ?>">
                <button name="add" type="submit""><i class=" bx bx-cart"></i></input>
              </ul>
              <!-- <div  class="add-cart">
                <input type="submit" class="btn-add-cart" name="addtocart" value="Add To Cart">
            </div> -->
            </form>
          </div>
        <?php
        }
        ?>
      </div>
    </section>
    <section class="pagination">
      <div class="container">
        <?php
        $numberPages = 8;
        $totalPages = ceil($num / $numberPages);
        // echo $totalPages;
        for ($i = 1; $i <= $totalPages; $i++) {
          echo '<a href="index.php?action=shop&page=' . $i . '"><span>' . $i . '</span></a> ';
        }
        ?>
        <!-- <span>1</span> <span>2</span> <span>3</span> <span>4</span> -->
        <span><i class="bx bx-right-arrow-alt"></i></span>
      </div>
    </section>