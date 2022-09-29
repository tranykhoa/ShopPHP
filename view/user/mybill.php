    <!-- Cart Items -->
    <div class="container cart">
      <h1 style="text-align: center;margin-bottom: 30px;color: #4747d1;">Đơn Hàng Của Tôi</h1>
      <table>
        <tr>
          <th>Code</th>
          <th>Order Date</th>
          <th>Quantity Product</th>
          <th>Total</th>
          <th>Status</th>
          <th></th>
        </tr>
        <?php
          foreach ($listbill as $bill) {
            extract($bill);
            $count = loadall_cart_count($idbill);
            $get_status = get_ttdh($status);
          ?>
            <tr>
              <td><?=$idbill?></td>
              <td><?=$orderdate?></td>
              <td><input type="number" value="<?=$count?>" min="1" disabled/></td>
              <td>$ <?=$total?></td>
              <td><?=$get_status?></td>
              <td>
                <form action="index.php?action=detail_bill" method="POST">
                  <input type="hidden" value="<?=$idbill?>" name="idbill">
                  <input style="padding: 5px 10px; width: 8rem;color:green;" type="submit" name="viewbill" value="View">
                </form>
              </td>
              <?php
                if(isset($thongbao)&&($thongbao != ""))
                  echo '<p style="color: red; font-style: italic; font-size: 16px;">'.$thongbao.'</p>';
             ?>
            </tr>
        <?php
        }
        ?>

      </table>
    </div>
  