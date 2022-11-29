<?php


function loadall_bill(){
  $sql="select * from bill order by idbill desc";
  $listbill = pdo_query($sql);
  return $listbill;
}

?>