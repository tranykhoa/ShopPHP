<?php
	session_start();
  ob_start();
  include "../../model/pdo.php";
  include "../../model/bill.php";
  include "../../model/cart.php";
  include "../../model/user.php";


  
  if(!isset($_SESSION['admin'])){
    header('location: ../login');
  }


  include "../header.php";
  include "../sidebar.php";

  if(isset($_GET['action'])){
    $action = $_GET['action'];
    switch ($action) {
      case 'listuser':
        $listuser = loadall_user();
        include "list.php";
        break;
      case 'adduser':
        if (isset($_POST['add']) && ($_POST['add'])) {
          $name = $_POST['fullname'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          $tel = $_POST['tel'];

          $status = $_POST['active'];


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
        include "add.php";
        break;
      case 'deleteuser':
        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
          delete_user($_GET['id']);
        }
        $listuser = loadall_user();
        include "list.php";
        break;
      case 'edituser':
        if(isset($_GET['id'])&&($_GET['id']>0)){
          $one_user = loadone_user($_GET['id']);
        }
        $listuser = loadall_user();
        include "update.php";
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
                $destination_path = "../../upload/${generated_file_name}";
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