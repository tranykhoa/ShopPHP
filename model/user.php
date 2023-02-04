<?php

function insert_user($name, $img, $email, $password, $tel,$status){
    $sql="insert into user(fullname,img,email,pass,tel,status) values('$name', '$img' , '$email','$password','$tel','$status')";
  pdo_execute($sql);
}

function check_user($email,$pass){
  $sql = "select * from user where email='".$email."' AND pass='".$pass."' AND status = 1 ";
  $tk = pdo_query_one($sql);
  return $tk;
}


function update_taikhoan_user($fullname, $email,$password, $file_name,$status,$tel,$id){
  if(empty($file_name)){
    $sql="update user set fullname='".$fullname."',email='".$email."',pass='".$password."',status='".$status."', tel='".$tel."' where id=".$id;
  }else{
    $sql="update user set fullname='".$fullname."',  img='".$file_name."',email='".$email."',pass='".$password."',status='".$status."', tel='".$tel."' where id=".$id;
  }
  pdo_execute($sql);
}


// hàm xóa cứng, xóa thẳng vào database
function delete_user($id){
  $sql="delete from user where id=".$id;
  pdo_execute($sql);
}

function loadall_user(){
  $sql="select * from user order by id desc";
  $listuser = pdo_query($sql);
  return $listuser;
}
function loadone_user($id){
  $sql = "select * from user where id=".$id;
  $user = pdo_query_one($sql);
  return $user;
}

function get_status_user($status){
  switch($status){
    case '1':
      $tt = "kích hoạt";
      break;
    default:
      $tt = "Chưa kích hoạt";
      break;
  }

  return $tt;

}

?>