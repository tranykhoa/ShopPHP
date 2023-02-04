 <!-- Contact Start -->
 <?php
    if(isset($_SESSION['user'])){
        extract($_SESSION['user']);
    }
?>

 <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Thông Tin Cá Nhân</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                        <div class="control-group">
                            <input type="text" class="form-control" name="name" value="<?=$fullname?>" disabled/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" name="email" value="<?=$email?>" disabled/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">   
                            <input type="text" class="form-control" name="password" value="<?=$tel?>" disabled/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                           <a href="index.php?action=updateuser"><input class="btn btn-primary py-2 px-4" name="signup" type="submit" value="Đổi Thông Tin"></input></a>
                           <a href="index.php?action=mybill"><input class="btn btn-primary py-2 px-4" name="signup" type="submit" value="Đơn Hàng Của Tôi"></input></a>
                           <a href="index.php?action=doimatkhau"><input class="btn btn-primary py-2 px-4" name="signup" type="submit" value="Đổi Mật Khẩu"></input></a>
                           <a href="index.php?action=logout"><input class="btn btn-primary py-2 px-4" name="signup" type="submit" value="Đăng xuất"></input></a>
                        </div>
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