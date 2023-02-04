<?php
  session_start();
  ob_start();
  include "../../model/pdo.php";
  include "../../model/category.php";
  require_once "../Classes/PHPExcel.php";

  if(!isset($_SESSION['admin'])){
    header('location: ../login');
  }


  include "../header.php";
  include "../sidebar.php";

  if(isset($_GET['action'])){
    $action = $_GET['action'];
    switch ($action) {
      case 'listcategory':
        $listcategory = loadall_category();
        include "list.php";
        break;
      case 'addcategory':
        if(isset($_POST['add'])&&($_POST['add'])){
          $tenloai = $_POST['namecg'];
          insert_category($tenloai);
          $thongbao = "Thêm thành công";
        }
        include "add.php";
        break;
      case 'deletecg':
        $status = 0;
        if(isset($_GET['idcg'])&&($_GET['idcg']>0)){
          remove_category($_GET['idcg'],$status);// hàm xóa mềm để dễ dàng backup giữ liệu
          // delete_category($idcg);//hàm xóa cứng xóa thằng vào database
        }
        $listcategory = loadall_category();
        include "list.php";
        break;
      case 'editcg':
        if(isset($_GET['idcg'])&&($_GET['idcg']>0)){
          $category = loadone_category($_GET['idcg']);
        }
        include "update.php";
        break;
      case 'updatecategory':
          if(isset($_POST['update'])&&($_POST['update'])){
              $namecg = $_POST['namecg'];
              $idcg = $_POST['idcg'];
              update_category($idcg,$namecg);
              //$thongbao = "Cập nhật thành công";
          }
          $listcategory = loadall_category();
          include "list.php";
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