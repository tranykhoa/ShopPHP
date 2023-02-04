<?php
    session_start();
    ob_start();

    include "../../model/pdo.php";

    include "../../model/cart.php";
    include "../../model/chart.php";
    $listhongke = loadall_thongke();

  
    include "../header.php";
    include "../sidebar.php";

    // controller
    if(isset($_GET['action'])){
        $action = $_GET['action'];
        switch ($action) {
            case 'listthongke':
                $listhongke = loadall_thongke();
                include "list.php";
                break;
            case 'bieudo':
                $listhongke = loadall_thongke();
                include "bieudo.php";
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