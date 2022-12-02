<?php
	session_start();
  ob_start();
  include "../../model/pdo.php";
  include "../../model/user.php";
  

  include "../header.php";

  if(isset($_GET['action'])){
    $action = $_GET['action'];
    switch ($action) {
      case 'signin':
        if (isset($_POST['login']) && ($_POST['login'])) {
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
          if(is_array($admin)){
            $_SESSION['admin'] = $admin;
                // $thongbao = "Bạn đã đăng nhập thành công";
                header('location: ../category');
            }else{
                $thongbao="Sai thông tin tài khoản hoặc mật khẩu";
            }
        }
        include "loginform.php"; 
        break;
      case 'logout':
        unset($_SESSION['admin']);
        header('location: ../login');
        break;
      default:
        include "loginform.php";
        break;
    }
  }else{
    include "loginform.php";
  }

  include "../footer.php";
  ob_end_flush();

?>