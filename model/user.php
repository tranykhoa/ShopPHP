<?php

function insert_user($name, $img, $email, $password, $phone){
  if($img != "")
    $sql="insert into user(fullname,images,email,pass,tel) values('$name', '$img' , '$email', '$password', '$phone')";
  else
    $sql="insert into user(fullname,email,pass,tel) values('$name' , '$email', '$password', '$phone')";
  pdo_execute($sql);
}

function check_user($email,$pass){
  $sql = "select * from user where email='".$email."' AND pass='".$pass."'";
  $tk = pdo_query_one($sql);
  return $tk;
}


function update_taikhoan($fullname, $email, $file_name,$phone,$iduser){
  if(empty($file_name)){
    $sql="update user set fullname='".$fullname."',email='".$email."', tel='".$phone."' where iduser=".$iduser;
  }else{
    $sql="update user set fullname='".$fullname."',  images='".$file_name."',email='".$email."', tel='".$phone."' where iduser=".$iduser;
  }
  pdo_execute($sql);
}

// crud
function delete_user($iduser){
  $sql="delete from user where iduser=".$iduser;
  pdo_execute($sql);
}

function loadall_user(){
  $sql="select * from user order by iduser desc";
  $listuser = pdo_query($sql);
  return $listuser;
}
function loadone_user($iduser){
  $sql = "select * from user where iduser=".$iduser;
  $user = pdo_query_one($sql);
  return $user;
}
?>