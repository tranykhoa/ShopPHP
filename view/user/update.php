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
                    <form action="index.php?action=updateuser" method="post" enctype="multipart/form-data">
                        <div class="control-group">
                            <input type="text" class="form-control" name="name"
                                required="required" value="<?=$fullname?>" placeholder="Nhập tên của bạn" data-validation-required-message="Please enter your name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control" name="email" placeholder="Nhập email của bạn"
                                required="required" value="<?=$email?>" data-validation-required-message="Please enter your email" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">   
                            <input type="file" class="form-control" name="upload" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" name="phone" placeholder="Nhập SĐT của bạn"
                                required="required" value="<?=$tel?>" data-validation-required-message="Please enter a number" />
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