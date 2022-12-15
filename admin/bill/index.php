<?php
	session_start();
  ob_start();
  include "../../model/pdo.php";
  include "../../model/account_customer.php";
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
      case 'listbill':
        $listbill = loadall_bill();
        include "list.php";
        break;
      case 'logout':
        unset($_SESSION['admin']);
        header('location: ../login');
        break;
      case 'xacnhan':
        if(isset($_GET['id'])){
          $id = $_GET['id'];
          $status = 2;
          update_status_bill($id,$status);
        }
        $listbill = loadall_bill();
        include "list.php";
        break;
      case 'chitietdonhang':
        if(isset($_GET['id'])){
          $id = $_GET['id'];
          $onebill = loadone_bill($id);
          $listcart = loadall_cart($id);
          $one_customer = loadone_account_customer($onebill['idac']);
        }
        include "detail.php";
        break;
      case 'dongy':
        if(isset($_GET['id'])){
          $id = $_GET['id'];
          $status = 3;
          update_status_bill($id,$status);
        }
        $listbill = loadall_bill();
        include "list.php";
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