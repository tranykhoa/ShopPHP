<?php
  session_start();
  ob_start();
  include "../../model/pdo.php";
  include "../../model/category.php";
  include "../../model/product.php";
  include "../../model/account_customer.php";
  include "../../model/bill.php";
  include "../../model/cart.php";

  
  if(!isset($_SESSION['admin'])){
    header('location: ../login');
  }

  include "../header.php";
  include "../sidebar.php";

  if(isset($_GET['action'])){
    $action = $_GET['action'];
    switch ($action) {
      case 'listcustomer':
        $listcustomer = loadall_account_customer();
        include "list.php";
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
            $destination_path = "../../upload/${generated_file_name}";
            $file_extension = explode(".", $file_name);
            $file_extension = strtolower(end($file_extension));
            if(in_array($file_extension, $loai_file)){
              if($file_size <= 1000000000){
                move_uploaded_file($file_tmp_name, $destination_path);
                insert_account_customer($name, $generated_file_name, $email, md5($password), $phone);
                header('Location: index.php?action=listcustomer');
              }else{
                $thongbao = "file is too big";
              }
            }else{
              $thongbao = "Ivalid file type";
            }
          }else{
            insert_account_customer($name, $file_name, $email, md5($password), $phone);
            header('Location: index.php?action=listcustomer');
          }
        }
        include "add.php";
        break;
      case 'deletecustomer':
        $status = 0;
        if (isset($_GET['idac']) && ($_GET['idac'] > 0)) {
          remove_taikhoan($status,$_GET['idac']);
        }
        $listcustomer = loadall_account_customer();
        include "list.php";
        break;
      case 'editcustomer':
        if(isset($_GET['idac'])&&($_GET['idac']>0)){
          $one_customer = loadone_account_customer($_GET['idac']);
        }
        $listcustomer = loadall_account_customer();
        include "update.php";
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
                $destination_path = "../../upload/${generated_file_name}";
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
          include "update.php";
          break;
      case 'logout':
        unset($_SESSION['admin']);
        header('location: ../login');
        break;
      default:
        include "../content.php";
        break;
    }
  }else{
    include "../content.php";
  }

  include "../footer.php";
  ob_end_flush();



?>