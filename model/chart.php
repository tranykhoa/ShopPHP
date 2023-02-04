<?php
  function loadall_thongke(){
    $sql = "select category.namecg as tendanhmuc, count(product.idp) as countsp, min(product.price) as minprice, max(product.price) as maxprice, avg(product.price) as giatrungbinh";
    $sql.="  from product left join category on category.idcg=product.idcg";
    $sql.=" group by category.idcg order by category.idcg desc";
    $listtk = pdo_query($sql);
    return $listtk;
  }
?>