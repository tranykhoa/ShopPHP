<?php
  function insert_bill($iduser,$name, $email,$tel, $address,$pttt,$orderdate,$tongtien){
    $sql="insert into bill(iduser,nameuser,email,tel,address,pttt,orderdate,total) values('$iduser','$name', '$email','$tel','$address','$pttt','$orderdate','$tongtien')";
    return pdo_execute_lastInsertId($sql);
  }

  function insert_cart($iduser, $idp, $name,$img,$price,$soluong,$thanhtien,$idbill){
    $sql="insert into cart(iduser,idp,namep,img,price,quantity,thanhtien,idbill) values('$iduser', '$idp', '$name','$img','$price','$soluong','$thanhtien','$idbill')";
    pdo_execute($sql);
  }

  function loadone_bill($id){
    $sql = "select * from bill where idbill=".$id;
    $bill = pdo_query_one($sql);
    return $bill;
}

function loadall_bill($keyw,$iduser){
  $sql = "select * from bill where 1";
  if($keyw != ""){
    $sql.=" and idbill like '%".$keyw."%'";
  }
  if($iduser>0)
  {
    $sql.=" AND iduser=".$iduser;
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