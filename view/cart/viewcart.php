
<!-- Cart Start -->
<div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Images</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                      <?php
                          $tong = 0;
                          $i = 0;

                          foreach ($_SESSION['cart'] as $cart) :
                            $tong += $cart[5];
                            $xoasp = "index.php?action=delcart&idcart=".$i;
                          ?>
                        <tr>
                            <td class="align-middle"><img src="img/product-1.jpg" alt="" style="width: 50px;"> <?=$cart[1]?></td>
                            <td class="align-middle">
                                <img width="80px" height="80px" src="./upload/<?=$cart[3]?>" alt="Image">
                            </td>
                            <td class="align-middle"><?=number_format($cart[2])?> đ</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary text-center" value="<?=$cart[4]?>">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle"><?=number_format($cart[5])?> đ</td>
                            <td class="align-middle">
                            <a href="<?=$xoasp?>"><button class="btn btn-sm btn-primary"><i class="fas fa-trash-alt"></i></button></a>
                            </td>
                        </tr>
                        <?php
                          $i++;
                         endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
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
                            <h5 class="font-weight-bold"><?=number_format(($tong + 10000))?> đ</h5>
                        </div>
                        <a href="index.php?action=checkout"><button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button></a>
                    </div>
                    <?php
                      if(isset($thongbao)&&($thongbao != ""))
                        echo '<p style="color: red; font-style: italic; font-size: 16px;">'.$thongbao.'</p>';
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
