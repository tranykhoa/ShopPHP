<?php

function insert_account_customer($name, $img, $email, $password, $phone){
    $sql="insert into account_customer(fullname,images,email,pass,tel) values('$name', '$img' , '$email','$password','$phone')";
  pdo_execute($sql);
}

function insert_account_customer_new($name,$email, $password, $phone){
  $sql="insert into account_customer(fullname,images,email,pass,tel) values('$name', 'defaul-2.jpg' , '$email','$password','$phone')";
pdo_execute($sql);
}

function check_account_customer($email,$pass){
  $sql = "select * from account_customer where email='".$email."' AND pass='".$pass."'";
  $tk = pdo_query_one($sql);
  return $tk;
}


function update_taikhoan($fullname, $email,$password, $file_name,$phone,$idac){
  if(empty($file_name)){
    $sql="update account_customer set fullname='".$fullname."',email='".$email."',pass='".$password."', tel='".$phone."' where idac=".$idac;
  }else{
    $sql="update account_customer set fullname='".$fullname."',  images='".$file_name."',email='".$email."',pass='".$password."', tel='".$phone."' where idac=".$idac;
  }
  pdo_execute($sql);
}

function update_taikhoan_view($fullname, $email, $file_name,$phone,$idac){
  if(empty($file_name)){
    $sql="update account_customer set fullname='".$fullname."',email='".$email."', tel='".$phone."' where idac=".$idac;
  }else{
    $sql="update account_customer set fullname='".$fullname."',  images='".$file_name."',email='".$email."', tel='".$phone."' where idac=".$idac;
  }
  pdo_execute($sql);
}

// crud
function delete_account_customer($idac){
  $sql="delete from account_customer where idac=".$idac;
  pdo_execute($sql);
}

function loadall_account_customer(){
  $sql="select * from account_customer where 1 and status like 1 order by idac desc";
  $listaccount_customer = pdo_query($sql);
  return $listaccount_customer;
}
function loadone_account_customer($idac){
  $sql = "select * from account_customer where idac=".$idac;
  $account_customer = pdo_query_one($sql);
  return $account_customer;
}

function check_account_customer_new($email){
  $sql = "select * from account_customer where email='".$email."'";
  $tk = pdo_query_one($sql);
  return $tk;
}

function remove_taikhoan($status,$idac){
  $sql="update account_customer set status='".$status."' where idac=".$idac;
  pdo_execute($sql);
}


?>