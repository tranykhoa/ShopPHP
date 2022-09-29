<?php
  include "../model/pdo.php";
  include "../model/category.php";
  include "../model/product.php";
  include "../model/user.php";

  include "header.php";
  include "sidebar.php";
  include "navbar.php";

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
        // $listcategory = loadall_category();
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
                $idcg = $_POST['idcg'];
                $namep = $_POST['namep'];
                $price = $_POST['price'];
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
              insert_product($namep , $price,$hinh ,$info, $idcg);
              $thongbao = "Thêm thành công";
            }
            $listcategory = loadall_category();
            include "product/add.php";
            break;
      case 'deletep':
        if(isset($_GET['idp'])&&($_GET['idp']>0)){
          delete_product($_GET['idp']);
        }
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
              $info = $_POST['info'];
              $idcg = $_POST['idcg'];

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
                    update_product($idp,$namep, $price , $generated_file_name, $info ,$idcg);
                    header('Location: index.php?action=listproduct');
                  }else{
                    $thongbao = "file is too big";
                  }
                }else{
                  $thongbao = "Ivalid file type";
                }
              }else{
                update_product($idp,$namep, $price , $file_name, $info ,$idcg);
                header('Location: index.php?action=listproduct');
              }
          }
          $listproduct = loadall_product('',0);
          $listcategory = loadall_category();
          include "./product/update.php";
          break;

      // controller User

      case 'listuser':
        $listuser = loadall_user();
        include "./user/list.php";
        break;
      case 'adduser':
        if (isset($_POST['add']) && ($_POST['add'])) {
          $name = $_POST['name'];
          $email = $_POST['email'];
          $password = $_POST['pass'];
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
                insert_user($name, $generated_file_name, $email, $password, $phone);
                header('Location: index.php?action=listuser');
              }else{
                $thongbao = "file is too big";
              }
            }else{
              $thongbao = "Ivalid file type";
            }
          }else{
            insert_user($name, $file_name, $email, $password, $phone);
            header('Location: index.php?action=listuser');
          }
        }
        include "./user/add.php";
        break;
      case 'deletuser':
        if (isset($_GET['iduser']) && ($_GET['iduser'] > 0)) {
          delete_user($_GET['iduser']);
        }
        $listuser = loadall_user();
        include "./user/list.php";
        break;
      default:
        include "content.php";
        break;
    }
  }else{
    include "content.php";
  }

  include "footer.php";

?>