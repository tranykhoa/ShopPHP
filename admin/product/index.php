<?php
	session_start();
  ob_start();
  include "../../model/pdo.php";
  include "../../model/category.php";
  include "../../model/product.php";

  
  if(!isset($_SESSION['admin'])){
    header('location: ../login');
  }

  include "../header.php";
  include "../sidebar.php";

  if(isset($_GET['action'])){
    $action = $_GET['action'];
    switch ($action) {
      case 'listproduct':
          $tong_product = count_product();
          $soluong = 15;
          $sotrang = ceil($tong_product/$soluong);
          if(!isset($_GET['page'])){
            $page = 1;

          }else{
              $page = $_GET['page'];
          }
          if($page >$sotrang){
              $page = $sotrang;
          }else if($page<1){
              $page = 1;
          }
          $start = ($page - 1)*$soluong;

          if(isset($_POST['choose'])&&($_POST['choose'])){
              $keyw = $_POST['keyw'];
              $idcg = $_POST['idcg'];
          }else{
              $keyw = '';
              $idcg = 0;
          }
              $listcategory = loadall_category();
              $listproduct = loadall_product($keyw,$idcg,$start,$soluong);
              include "list.php";
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
                $target_dir = "../../upload/";
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
            include "add.php";
            break;
      case 'deleteproduct':
        $status = 0;
        if(isset($_GET['idp'])&&($_GET['idp']>0)){
          $idp = $_GET['idp'];
          remove_product($idp,$status);
        }

        $tong_product = count_product();
        $soluong = 20;
        $sotrang = ceil($tong_product/$soluong);
        if(!isset($_GET['page'])){
          $page = 1;

        }else{
            $page = $_GET['page'];
        }
        if($page >$sotrang){
            $page = $sotrang;
        }else if($page<1){
            $page = 1;
        }
        $start = ($page - 1)*$soluong;
        $listcategory = loadall_category();
        $listproduct = loadall_product("",0,$start,$soluong);
        include "list.php";
        break;
      case 'editproduct':
        if(isset($_GET['idp'])&&($_GET['idp']>0)){
            $product = loadone_product($_GET['idp']);
        }
        $listcategory = loadall_category();
        include "update.php";
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
                $destination_path = "../../upload/${generated_file_name}";
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
          $listproduct = loadall_product('',0,1,20);
          $listcategory = loadall_category();
          include "update.php";
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