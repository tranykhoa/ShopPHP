 <!-- Contact Start -->
 <?php
    if(isset($_SESSION['user'])){
        extract($_SESSION['user']);
    }
?>

 <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Đổi Thông Tin Cá Nhân</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form action="index.php?action=doimatkhau" method="post" enctype="multipart/form-data">
                        <div class="control-group">
                            <input type="password" class="form-control" name="pass"
                                required="required"  placeholder="Nhập mật khẩu cũ" data-validation-required-message="Please enter your name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="password" class="form-control" name="passnew" placeholder="Nhập mật khẩu mới"
                                required="required" data-validation-required-message="Please enter your email" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="password" class="form-control" name="cfpass" placeholder="Xác nhận mật khẩu"
                                required="required" data-validation-required-message="Please enter a text" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <input style="display: none;" type="hidden" name="images" value="defaul-2.jpg">
                            <input type="hidden" name="idac" value="<?=$idac?>">
                            <input class="btn btn-primary py-2 px-4" name="update" type="submit" value="Lưu"></input>
                        </div>
                    </form>
                    <?php
                            if(isset($thongbao)&&($thongbao != ""))
                              echo '<p style="color: red; font-style: italic; font-size: 16px;">'.$thongbao.'</p>';
                        ?>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
              <div>
                <img class="w-100 h-100" src="./upload/<?=$images?>" alt="Image">
              </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->