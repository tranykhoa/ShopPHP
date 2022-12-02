<?php
	session_start();

  if(isset($_SESSION['admin'])){
    header("location: category");
  }else{
    header("location: login");
  }
?>