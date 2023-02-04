<?php
  // chi tiet hoa don
  function insert_bill($idac, $email,$tel, $address,$pttt,$orderdate,$tongtien){
    $sql="insert into bill(idac,email,tel,address,pttt,orderdate,total) values('$idac','$email','$tel','$address','$pttt','$orderdate','$tongtien')";
    return pdo_execute_lastInsertId($sql);
  }

  function insert_cart( $idp, $name,$img,$price,$soluong,$thanhtien,$idbill){
    $sql="insert into cart(idp,namep,img,price,quantity,thanhtien,idbill) values( '$idp', '$name','$img','$price','$soluong','$thanhtien','$idbill')";
    pdo_execute($sql);
  }

  function loadone_bill($id){
    $sql = "select * from bill where idbill=".$id;
    $bill = pdo_query_one($sql);
    return $bill;
}

function loadall_mybill($keyw,$idac){
  $sql = "select * from bill where 1";
  if($keyw != ""){
    $sql.=" and idbill like '%".$keyw."%'";
  }
  if($idac>0)
  {
    $sql.=" AND idac=".$idac;
  }
  $sql.=" order by idbill desc";
  $bill = pdo_query($sql);
  return $bill;
}

function loadall_cart($idbill){
  $sql = "select * from cart where idbill=".$idbill;
  $cart = pdo_query($sql);
  return $cart;
}

function loadall_cart_count($idbill){
  $sql = "select * from cart where idbill=".$idbill;
  $cart = pdo_query($sql);
  return sizeof($cart);
}

function get_ttdh($status){
  switch($status){
    case '1':
      $tt="Đơn hàng mới";
      break;
    case '2':
      $tt="Đang xử lý";
      break;
    case '3':
      $tt="Đang giao hàng";
      break;
    case '4':
      $tt="Hoàn tất";
      break;
    default:
      $tt="Đơn hàng mới";
      break;
  }

  return $tt;

}
?>