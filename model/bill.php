<?php


function loadall_bill(){
  $sql="select * from bill order by status asc";
  $listbill = pdo_query($sql);
  return $listbill;
}

function update_status_bill($id,$status){
  $sql="update bill set status='".$status."' where idbill=".$id;
  pdo_execute($sql);
}

?>