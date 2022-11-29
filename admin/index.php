<?php
  session_start();
  ob_start();
  include "../model/pdo.php";
  include "../model/category.php";
  include "../model/product.php";
  include "../model/account_customer.php";
  include "../model/bill.php";
  include "../model/cart.php";
  include "../model/user.php";
  

  include "header.php";
  include "sidebar.php";

  if(isset($_GET['action'])){
    $action = $_GET['action'];
    switch ($action) {
      case 'listcategory':
        $listcategory = loadall_category();
        include "./category/list.php";
        break;
      case 'addcategory':
        if(isset($_POST['add'])&&($_POST['add'])){
          $tenloai = $_POST['namecg'];
          insert_category($tenloai);
          $thongbao = "Thêm thành công";
        }
        include "./category/add.php";
        break;
      case 'deletecg':
        if(isset($_GET['idcg'])&&($_GET['idcg']>0)){
          delete_category($_GET['idcg']);
        }
        $listcategory = loadall_category();
        include "./category/list.php";
        break;
      case 'editcg':
        if(isset($_GET['idcg'])&&($_GET['idcg']>0)){
          $category = loadone_category($_GET['idcg']);
        }
        include "category/update.php";
        break;
      case 'updatecategory':
          if(isset($_POST['update'])&&($_POST['update'])){
              $namecg = $_POST['namecg'];
              $idcg = $_POST['idcg'];
              update_category($idcg,$namecg);
              //$thongbao = "Cập nhật thành công";
          }
          $listcategory = loadall_category();
          include "./category/list.php";
          break;
      
      /*Controller Product */
      case 'listproduct':
          if(isset($_POST['choose'])&&($_POST['choose'])){
              $keyw = $_POST['keyw'];
              $idcg = $_POST['idcg'];
          }else{
              $keyw = '';
              $idcg = 0;
          }
              $listcategory = loadall_category();
              $listproduct = loadall_product($keyw,$idcg);
              include "./product/list.php";
              break;
      case 'addproduct':
                //kiem tra người dùng có click vào nút add hay không
            if(isset($_POST['add'])&&($_POST['add'])){
                $idcg = $_POST['optdanhmuc'];
                $namep = $_POST['namep'];
                $price = $_POST['price'];
                $quantity = $_POST['quantity'];
                $info = $_POST['info'];
                $hinh = $_FILES['image']['name'];
                /* up load file len thu muc*/
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
              } else {
                    echo "Sorry, there was an error uploading your file.";
              }
              insert_product($namep , $price,$quantity,$hinh ,$info, $idcg);
              $thongbao = "Thêm thành công";
            }
            $listcategory = loadall_category();
            include "product/add.php";
            break;
      case 'deleteproduct':
        if(isset($_GET['idp'])&&($_GET['idp']>0)){
          delete_product($_GET['idp']);
        }
        $listcategory = loadall_category();
        $listproduct = loadall_product("",0);
        include "./product/list.php";
        break;
      case 'editproduct':
        if(isset($_GET['idp'])&&($_GET['idp']>0)){
            $product = loadone_product($_GET['idp']);
        }
        $listcategory = loadall_category();
        include "product/update.php";
        break;
      case 'updateproduct':
          if(isset($_POST['update'])&&($_POST['update'])){
              $idp = $_POST['idp'];
              $namep = $_POST['namep'];
              $price = $_POST['price'];
              $quantity = $_POST['quantity'];
              $info = $_POST['info'];
              $idcg = $_POST['optdanhmuc'];

                /*upload hinh anh*/
              $loai_file = ['png', 'jpg', 'svg', 'gif', 'jpeg'];
              $file_name = $_FILES['upload']['name'];
              
              if(!empty($file_name)){
                $file_size = $_FILES['upload']['size'];
                $file_tmp_name = $_FILES['upload']['tmp_name'];
                $generated_file_name = time().'-'.$file_name;
                $destination_path = "../upload/${generated_file_name}";
                $file_extension = explode(".", $file_name);
                $file_extension = strtolower(end($file_extension));
                if(in_array($file_extension, $loai_file)){
                  if($file_size <= 1000000000){
                    move_uploaded_file($file_tmp_name, $destination_path);
                    update_product($idp,$namep, $price ,$quantity, $generated_file_name, $info ,$idcg);
                    header('Location: index.php?action=listproduct');
                  }else{
                    $thongbao = "file is too big";
                  }
                }else{
                  $thongbao = "Ivalid file type";
                }
              }else{
                update_product($idp,$namep, $price ,$quantity, $file_name, $info ,$idcg);
                header('Location: index.php?action=listproduct');
              }
          }
          $listproduct = loadall_product('',0);
          $listcategory = loadall_category();
          include "./product/update.php";
          break;

      // controller User
      case 'listcustomer':
        $listcustomer = loadall_account_customer();
        include "./customer/list.php";
        break;
      case 'addcustomer':
        if (isset($_POST['add']) && ($_POST['add'])) {
          $name = $_POST['fullname'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          $phone = $_POST['tel'];


          $loai_file = ['png', 'jpg', 'svg', 'gif', 'jpeg'];
          $file_name = $_FILES['upload']['name'];
          
          if(!empty($file_name)){
            $file_size = $_FILES['upload']['size'];
            $file_tmp_name = $_FILES['upload']['tmp_name'];
            $generated_file_name = time().'-'.$file_name;
            $destination_path = "../upload/${generated_file_name}";
            $file_extension = explode(".", $file_name);
            $file_extension = strtolower(end($file_extension));
            if(in_array($file_extension, $loai_file)){
              if($file_size <= 1000000000){
                move_uploaded_file($file_tmp_name, $destination_path);
                insert_account_customer($name, $generated_file_name, $email, $password, $phone);
                header('Location: index.php?action=listcustomer');
              }else{
                $thongbao = "file is too big";
              }
            }else{
              $thongbao = "Ivalid file type";
            }
          }else{
            insert_account_customer($name, $file_name, $email, $password, $phone);
            header('Location: index.php?action=listcustomer');
          }
        }
        include "./customer/add.php";
        break;
      case 'deletecustomer':
        if (isset($_GET['idac']) && ($_GET['idac'] > 0)) {
          delete_account_customer($_GET['idac']);
        }
        $listcustomer = loadall_account_customer();
        include "./customer/list.php";
        break;
      case 'editcustomer':
        if(isset($_GET['idac'])&&($_GET['idac']>0)){
          $one_customer = loadone_account_customer($_GET['idac']);
        }
        $listcustomer = loadall_account_customer();
        include "customer/update.php";
        break;
      case 'updatecustomer':
          if(isset($_POST['update'])&&($_POST['update'])){
              $idac = $_POST['idac'];
              $name = $_POST['fullname'];
              $email = $_POST['email'];
              $password = $_POST['password'];
              $tel = $_POST['tel'];


                /*upload hinh anh*/
              $loai_file = ['png', 'jpg', 'svg', 'gif', 'jpeg'];
              $file_name = $_FILES['upload']['name'];
              
              if(!empty($file_name)){
                $file_size = $_FILES['upload']['size'];
                $file_tmp_name = $_FILES['upload']['tmp_name'];
                $generated_file_name = time().'-'.$file_name;
                $destination_path = "../upload/${generated_file_name}";
                $file_extension = explode(".", $file_name);
                $file_extension = strtolower(end($file_extension));
                if(in_array($file_extension, $loai_file)){
                  if($file_size <= 1000000000){
                    move_uploaded_file($file_tmp_name, $destination_path);
                    update_taikhoan($name, $email,$password, $generated_file_name,$tel,$idac);
                    header('Location: index.php?action=listcustomer');
                  }else{
                    $thongbao = "file is too big";
                  }
                }else{
                  $thongbao = "Ivalid file type";
                }
              }else{
                update_taikhoan($name, $email,$password, $file_name,$tel,$idac);
                header('Location: index.php?action=listcustomer');
              }
          }
          $listcustomer = loadall_account_customer();
          include "./customer/update.php";
          break;
      case 'listbill':
        $listbill = loadall_bill();
        include "./bill/list.php";
        break;

      // controller user
      case 'listuser':
        $listuser = loadall_user();
        include "./user/list.php";
        break;
      case 'adduser':
        if (isset($_POST['add']) && ($_POST['add'])) {
          $name = $_POST['fullname'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          $phone = $_POST['tel'];

          $status = $_POST['active'];


          $loai_file = ['png', 'jpg', 'svg', 'gif', 'jpeg'];
          $file_name = $_FILES['upload']['name'];
          
          if(!empty($file_name)){
            $file_size = $_FILES['upload']['size'];
            $file_tmp_name = $_FILES['upload']['tmp_name'];
            $generated_file_name = time().'-'.$file_name;
            $destination_path = "../upload/${generated_file_name}";
            $file_extension = explode(".", $file_name);
            $file_extension = strtolower(end($file_extension));
            if(in_array($file_extension, $loai_file)){
              if($file_size <= 1000000000){
                move_uploaded_file($file_tmp_name, $destination_path);
                insert_user($name, $generated_file_name, $email, $password, $tel,$status);
                header('Location: index.php?action=listuser');
              }else{
                $thongbao = "file is too big";
              }
            }else{
              $thongbao = "Ivalid file type";
            }
          }else{
            insert_user($name, $file_name, $email, $password, $tel,$status);
            header('Location: index.php?action=listuser');
          }
        }
        include "./user/add.php";
        break;
      case 'deleteuser':
        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
          delete_user($_GET['id']);
        }
        $listuser = loadall_user();
        include "./user/list.php";
        break;
      case 'edituser':
        if(isset($_GET['id'])&&($_GET['id']>0)){
          $one_user = loadone_user($_GET['id']);
        }
        $listuser = loadall_user();
        include "user/update.php";
        break;
      case 'updateuser':
          if(isset($_POST['update'])&&($_POST['update'])){
              $id = $_POST['id'];
              $name = $_POST['fullname'];
              $email = $_POST['email'];
              $password = $_POST['password'];
              $tel = $_POST['tel'];
              $status = $_POST['active'];


                /*upload hinh anh*/
              $loai_file = ['png', 'jpg', 'svg', 'gif', 'jpeg'];
              $file_name = $_FILES['upload']['name'];
              
              if(!empty($file_name)){
                $file_size = $_FILES['upload']['size'];
                $file_tmp_name = $_FILES['upload']['tmp_name'];
                $generated_file_name = time().'-'.$file_name;
                $destination_path = "../upload/${generated_file_name}";
                $file_extension = explode(".", $file_name);
                $file_extension = strtolower(end($file_extension));
                if(in_array($file_extension, $loai_file)){
                  if($file_size <= 1000000000){
                    move_uploaded_file($file_tmp_name, $destination_path);
                    update_taikhoan_user($name, $email,$password, $generated_file_name,$status,$tel,$id);
                    header('Location: index.php?action=listuser');
                  }else{
                    $thongbao = "file is too big";
                  }
                }else{
                  $thongbao = "Ivalid file type";
                }
              }else{
                update_taikhoan_user($name, $email,$password, $file_name,$status,$tel,$id);
                header('Location: index.php?action=listuser');
              }
          }
          $listuser = loadall_user();
          include "./user/update.php";
          break;

        // controler Dang nhap
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

          $admin = check_user($email,$pass);
          if(is_array($user)){
            $_SESSION['admin'] = $admin;
                // $thongbao = "Bạn đã đăng nhập thành công";
                header('location: index.php');
            }else{
                $thongbao="Sai thông tin tài khoản hoặc mật khẩu";
            }
        }
        header('location: login.php');
        
        break;
      default:
        include "content.php";
        break;
    }
  }else{
    include "content.php";
  }

  include "footer.php";
  ob_end_flush();

?>