
<!-- Cart Start -->
<div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                      <tr>
                        <th>Code</th>
                        <th>Order Date</th>
                        <th>Quantity Product</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody class="align-middle">
                      <?php
                        foreach ($listbill as $bill) :
                          extract($bill);
                          $count = loadall_cart_count($idbill);
                          $get_status = get_ttdh($status);
                      ?>
                        <tr>
                            <td class="align-middle"><img src="img/product-1.jpg" alt="" style="width: 50px;"> <?=$idbill?></td>
                            <td class="align-middle">
                               <?=$orderdate?>
                            </td>
                            <td class="align-middle">
                               <?=$count?>
                            </td>
                            <td class="align-middle">$ <?=$total?></td>
                            <td><?=$get_status?></td>
                            <td class="align-middle">
                              <form action="index.php?action=detail_bill" method="post">
                                <input type="hidden" value="<?=$idbill?>" name="idbill">
                                <i class="fas fa-eye text-primary mr-1"></i><input type="submit" style="background-color: transparent;outline: none;border: none;" name = "viewbill" value="view">
                              </form>
                            </td>
                            <?php
                                if(isset($thongbao)&&($thongbao != ""))
                                  echo '<p style="color: red; font-style: italic; font-size: 16px;">'.$thongbao.'</p>';
                            ?>
                        </tr>
                        <?php
                         endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Cart End -->
