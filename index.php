<?php
  session_start();
  include "./model/global.php";
  include "./model/pdo.php";
  include "./model/product.php";
  include "./model/category.php";
  include "./model/user.php";
  include "./model/cart.php";

  include "./view/header.php";
  include "./view/nav.php";

  if(!isset($_SESSION['cart'])) $_SESSION['cart']=[];

  $product_new =  loadall_product_home();

  if(isset($_GET['action'])&&($_GET['action']!="")){
    $action=$_GET['action'];
    switch ($action) {
      case 'shop':
        if(isset($_GET['page'])){
          $page = $_GET['page'];
        }else{
          $page = 1;
        }
        if(isset($_POST["idcg"])){
          $idcg=$_POST["idcg"];
          $listproduct = loadall_product_loadpage('',$idcg,1);
        }
        else{
          $idcg = 0;
          $listproduct = loadall_product_loadpage('',$idcg,$page);
        }
        $num = rowsCount($idcg);
        $listcategory = loadall_category();
        include "view/shop/product.php";
        break;
      case 'productdetails':
        if(isset($_GET['idp'])&&($_GET['idp']>0)){
          $idp = $_GET['idp'];
          $oneproduct = loadone_product($idp);
          extract($oneproduct);
          $similar_products = load_similar_products($idp,$idcg);
            include "view/shop/productDetails.php";
        }else{
            include "view/shop/content.php";
        }
        break;
      case 'signup':
        if (isset($_POST['adduser']) && ($_POST['adduser'])) {
          $name = $_POST['fullname'];
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $password = $_POST['password'];
          $img = $_POST['hinhanh'];
          insert_user($name, $img, $email, $password, $phone);
          $thongbao = "Đăng ký thành công";
        }
        include "view/user/signup.php";
        break;
      case 'signin':
          if (isset($_POST['login']) && ($_POST['login'])) {
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $user = check_user($email,$pass);
            if(is_array($user)){
              $_SESSION['user'] = $user;
                  // $thongbao = "Bạn đã đăng nhập thành công";
                  header('Location: index.php');
              }else{
                  $thongbao="Sai thông tin tài khoản hoặc mật khẩu";
              }
          }
          include "view/user/signin.php";
          break;
      case 'profile':
        if(isset($_SESSION['user'])){
          include "view/user/profile.php";
        }else{
          include "view/user/signin.php";
        }
        break;
      case 'logout':
        unset($_SESSION['user']);
        header('Location: index.php');
        break;
      case 'updateuser':
        if(isset($_POST['update'])&&($_POST['update'])){
          $fullname = $_POST['fullname'];
          $email = $_POST['email'];
          $phone = $_POST['tel'];
          $iduser = $_POST['iduser'];
          $pass = $_POST['pass'];

          /*upload hinh anh*/
          $loai_file = ['png', 'jpg', 'svg', 'gif', 'jpeg'];
          $file_name = $_FILES['upload']['name'];

          if(!empty($file_name)){
            $file_size = $_FILES['upload']['size'];
            $file_tmp_name = $_FILES['upload']['tmp_name'];
            $generated_file_name = time().'-'.$file_name;
            $destination_path = "upload/${generated_file_name}";
            $file_extension = explode(".", $file_name);
            $file_extension = strtolower(end($file_extension));
            if(in_array($file_extension, $loai_file)){
              if($file_size <= 10000000){
                move_uploaded_file($file_tmp_name, $destination_path);
                update_taikhoan($fullname, $email, $generated_file_name,$phone,$iduser);
                $_SESSION['user'] = check_user($email,$pass);
                header('Location: index.php?action=profile');
              }else{
                $thongbao = "file is too big";
              }
            }else{
              $thongbao = "Ivalid file type";
            }
          }else{
            update_taikhoan($fullname, $email, $file_name,$phone,$iduser);
            $_SESSION['user'] = check_user($email,$pass);
            header('Location: index.php?action=profile');
          }

        }
        include "view/user/update.php";
        break;
      case 'addtocart':
        $count = 0;
        $idp = $_POST['idp'];
        $namep = $_POST['namep'];
        $price = $_POST['price'];
        $img = $_POST['img'];
        $quantity = $_POST['quantity'];

        $thanhtien = $quantity * $price;
        $arr_product = [$idp, $namep, $price, $img, $quantity, $thanhtien];

        for ($i=0; $i < count($_SESSION['cart']); $i++) { 
          if($idp == $_SESSION['cart'][$i][0]){
            $_SESSION['cart'][$i] = $arr_product;
            $count++;
          }
        }
        if($count == 0)
          array_push($_SESSION['cart'], $arr_product);
        // include "view/cart/viewcart.php";
        header('location: index.php?action=viewcart');
        break;
      case 'delcart':
        if(isset($_GET['idcart'])) {
            $id = $_GET['idcart'];
            array_splice($_SESSION['cart'],$id,1);//mảng,vị trí cần xóa,xóa bao nhiêu cái
        } else {
            $_SESSION['cart']=[];
        }
        header('location: index.php?action=viewcart');
        break;
      case 'checkout':
        if(isset($_SESSION['user'])) {
          if(isset($_SESSION['cart'])&&($_SESSION['cart'])){
            include "view/cart/checkout.php";
          } else {
            $thongbao = "No products, Please select something";
            include "view/cart/viewcart.php";
          }
        }else{
          include "view/user/signin.php";
        }
        break;
      case 'confirm-checkout':
        if(isset($_POST['confirm'])&&($_POST['confirm'])){
          $iduser = $_POST['iduser'];
          $nameuser = $_POST['customer-name'];
          $email = $_POST['email'];
          $tel = $_POST['phone'];
          $address = $_POST['address'];
          $total = $_POST['sumtotal'];
          $pttt = 2;
          $orderdate = date('h:i:sa d/m/Y');
          $idbill = insert_bill($iduser,$nameuser, $email,$tel, $address,$pttt,$orderdate,$total);

          // insert into cart: $session['cart] & idbill

          foreach ($_SESSION['cart'] as $cart) {
            insert_cart($iduser,$cart[0],$cart[1],$cart[3],$cart[2],$cart[4],$cart[5],$idbill);
          }
          $_SESSION['cart'] = [];
        }
        $bill = loadone_bill($idbill);
        include "view/cart/confirm_checkout.php";
        break;
      case 'mybill':
        if(isset($_SESSION['user'])&&($_SESSION['user'])){
          $listbill = loadall_bill("",$_SESSION['user']['iduser']);
        }
        include "view/user/mybill.php";
        break;
      case 'viewcart':
        include "view/cart/viewcart.php";
        break;
      case 'detail_bill':
        if(isset($_POST['viewbill'])&&($_POST['viewbill'])){
          $idbill = $_POST['idbill'];
        }
        $bill = loadone_bill($idbill);
        $listcart = loadall_cart($idbill);
        include "view/user/detail_bill.php";
        break;
      default:
        include "./view/content.php";
        break;
    }
  }else{
    include "./view/content.php";
  }
  include "./view/footer.php";

  
?>