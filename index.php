<?php
  session_start();
  ob_start();
  include "./model/global.php";
  include "./model/pdo.php";
  include "./model/product.php";
  include "./model/category.php";
  include "./model/account_customer.php";
  include "./model/cart.php";
  include "./model/bill.php";
  include "./mail/sendmail.php";
  

  include "./view/includes/header.php";
  include "./view/includes/nav.php";


  if(!isset($_SESSION['cart'])) $_SESSION['cart']=[];

  $product_new =  loadall_product_home();
  $product_top_view = loadall_product_top_view();

  if(isset($_GET['action'])&&($_GET['action']!="")){
    $action=$_GET['action'];
    switch ($action) {
      case 'shop':
        if(!isset($_GET['idcg'])&&!isset($_POST['idcg'])){
          $idcategory = 0;
        }else if(isset($_GET["idcg"])){
          $idcategory = $_GET['idcg'];
        }else if(isset($_POST['idcg'])){
          $idcategory = $_POST['idcg'];
        }else{
          $idcategory = 0;
        }

        if(isset($_POST['keyw'])){
          $keyw = $_POST['keyw'];
        }else{
          $keyw = '';
        }

        if(isset($_GET['page'])){
          $page = $_GET['page'];
        }else{
          $page = 1;
        }

        $listproduct = loadall_product_loadpage($keyw,$idcategory,$page);
        $num = rowsCount($idcategory);
        $listcategory = loadall_category();
        include "./view/shop/product.php";
        break;
      case 'productdetails':
        if(isset($_GET['idp'])&&($_GET['idp']>0)){
          $idp = $_GET['idp'];
          $oneproduct = loadone_product($idp);
          extract($oneproduct);
          $product_same = load_products_same($idp);
          tangluotxem($idp);

            include "view/shop/productDetails.php";
        }else{
            include "view/shop/content.php";
        }
        break;
      case 'signup':
        if (isset($_POST['signup']) && ($_POST['signup'])) {
          $name = $_POST['name'];        
          $email = $_POST['email'];
          $password = $_POST['password'];
          $phone = $_POST['phone'];
          $length = strlen($phone);
          $img = $_POST['images'];
          $ktra = check_email_account_customer($email);
          if($length != 10){
            $thongbao = "Số điện thoại không lớn hơn 10 chữ số";
          }else if(is_array($ktra)){
            $thongbao = "Tài khoản đã tồn tại";
          }else{
            insert_account_customer($name, $img, $email, md5($password), $phone);
            $thongbao = "Đăng ký thành công";
          }
          
        }
        include "view/user/signup.php";
        break;
      case 'signin':
          if (isset($_POST['signin']) && ($_POST['signin'])) {
            $email = $_POST['email'];
            $pass = $_POST['password'];

            // $error = array();
            // if(empty($_POST['email'])){
            //   $error['email'] = "Bạn cần nhập email";
            // }
            // if(empty($_POST['password'])){
            //   $error['password'] = "B  ạn cần nhập password";
            // }

            $user = check_account_customer($email,md5($pass));
            if(is_array($user)){
              $_SESSION['user'] = $user;
                  // $thongbao = "Bạn đã đăng nhập thành công";
                  header('location: index.php');
              }else{
                  $thongbao="Sai thông tin tài khoản hoặc mật khẩu";
              }
          }
          include "./view/user/signin.php";
          break;
          
        case 'doimatkhau':
          if(isset($_POST['update'])){
            if(md5($_POST['pass']) != $_SESSION['user']['pass']){
              $thongbao = "Mật khẩu không chính xác";
            }else  if(($_POST['passnew']== $_POST['cfpass']) && (md5($_POST['pass']) == $_SESSION['user']['pass'])){
              $newpass = $_POST['passnew'];
              $idac = $_POST['idac'];
              update_password(md5($newpass),$idac);
              $thongbao = "Đổi mật khẩu thành công";
            }else{
              $thongbao = "Xác nhận mật khẩu không đúng";
            }
          }
          include "./view/user/doimatkhau.php";
          break;
        case 'logout':
          unset($_SESSION['user']);
          unset($_SESSION['cart']);
          header('location: index.php');
          break;
        case 'profile':
          if(isset($_SESSION['user'])){
            include "view/user/profile.php";
          }else{
            include "view/user/signin.php";
          }
          break;
        case 'updateuser':
          if(isset($_POST['update'])&&($_POST['update'])){
            $fullname = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $idac = $_POST['idac'];


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
                  update_taikhoan_view($fullname, $email, $generated_file_name,$phone,$idac);
                  $_SESSION['user'] = check_account_customer($email,$pass);
                  header('Location: index.php?action=profile');
                }else{
                  $thongbao = "file is too big";
                }
              }else{
                $thongbao = "Ivalid file type";
              }
            }else{
              update_taikhoan_view($fullname, $email, $file_name,$phone,$idac);
              $_SESSION['user'] = check_account_customer($email,$pass);
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
              $_SESSION['cart'][$i][4] +=  $arr_product[4];
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
            include "./view/cart/checkout.php";
          } else {
            $thongbao = "No products, Please select something";
            include "./view/cart/viewcart.php";
          }
        }else{
          include "./view/user/signin.php";
        }
        break;
      case 'confirm-checkout':
        if(isset($_POST['confirm'])&&($_POST['confirm'])){
          $idac = $_POST['idac'];
          $nameuser = $_POST['name'];
          $email = $_POST['email'];
          $tel = $_POST['phone'];
          $address = $_POST['address'];
          $total = $_POST['sumtotal'];
          $pttt = 2;
          $orderdate = date('h:i:sa d/m/Y');

          
          $mail = new Mailer();
          $noidung ="";
          $tieude = "Information Bill";

          $idbill = insert_bill($idac , $email,$tel, $address,$pttt,$orderdate,$total);

          // insert into cart: $session['cart] & idbill

          foreach ($_SESSION['cart'] as $cart) {
            insert_cart($cart[0],$cart[1],$cart[3],$cart[2],$cart[4],$cart[5],$idbill);
            $noidung = '<ul>
                          <li>Sản phẩm: '.$cart[1].'</li>
                          <li>Số lượng: '.$cart[4].'</li>
                          <li>Gía :'.$cart[2].'</li>
                        </ul><br>';
          }
          $noidung .= 'Cảm Ơn Quý Khách Đã Ủng Hộ !00';
          $mail->mailhoadon($email,$tieude,$noidung);
          $_SESSION['cart'] = [];
        }
        $bill = loadone_bill($idbill);
        // header('location: view/cart/confirm_checkout.php');
        include "view/cart/confirm_checkout.php";
        break;
      case 'mybill':
        if(isset($_SESSION['user'])&&($_SESSION['user'])){
          $listbill = loadall_mybill("",$_SESSION['user']['idac']);
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
      case 'contact':
        $email_user = "";
        if(isset($_SESSION['user'])){
        if(isset($_POST['send'])){
          
            $email_user = $_SESSION['user']['email'] . "-------->";
         
          $tieude =$email_user . $_POST['subject'];
          $noidung = $_POST['message'];
          $email = 'tykhoa_20th@student.agu.edu.vn';

          $mail = new Mailer();
          $mail->mailhoadon($email,$tieude,$noidung);
        }
        include "./view/includes/contact.php";
      }else{
        header('location: index.php?action=signin');
      }
        break;
      case 'hoantatdonhang':
        if(isset($_GET['id'])){
          $id = $_GET['id'];
          $status = 4;
          update_status_bill($id,$status);
        }
        if(isset($_SESSION['user'])&&($_SESSION['user'])){
          $listbill = loadall_mybill("",$_SESSION['user']['idac']);
        }
        include "view/user/mybill.php";
        break;
      default:
        include "./view/includes/home.php";
        break;
    }
  }else{
    include "./view/includes/home.php";
  }
  include "./view/includes/footer.php";
  ob_end_flush();
  
?>