 <!-- Contact Start -->
 <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Register Now</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form action="index.php?action=signup" method="post" enctype="multipart/form-data">
                        <div class="control-group">
                            <input type="text" class="form-control" name="name" placeholder="Your Name"
                                required="required" data-validation-required-message="Please enter your name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control" name="email" placeholder="Your Email"
                                required="required" data-validation-required-message="Please enter your email" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">   
                            <input type="password" class="form-control" name="password" placeholder="Your Password"
                                required="required" data-validation-required-message="Please enter a password" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" name="phone" placeholder="Your Phone"
                                required="required" data-validation-required-message="Please enter a number" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <input style="display: none;" type="hidden" name="images" value="defaul-2.jpg">
                            <input class="btn btn-primary py-2 px-4" name="signup" type="submit" value="Sign Up"></input>
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
                <img class="w-100 h-100" src="view/img/signup-3.jpg" alt="Image">
              </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->