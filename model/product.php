<?php
function insert_product($namep, $price , $hinh, $info,$idcg){
    $sql="insert into product(namep,price,img,info,idcg) values('$namep', '$price' , '$hinh', '$info', '$idcg')";
    pdo_execute($sql);
}

function delete_product($idp){
    $sql="delete from product where idp=".$idp;
    pdo_execute($sql);
}

function loadall_product($keyw,$idcg){
    $sql="select * from product where 1";//where 1 tất là câu này nó đúng
    if($keyw != ""){
        $sql.=" and namep like '%".$keyw."%'";
    }
    if($idcg > 0){
        $sql.=" and idcg = '".$idcg."'";
    }
    $sql.=" order by idp desc";//nối chuổi nhớ cách khoảng
    $listproduct = pdo_query($sql);
    return $listproduct;
}


function loadall_product_loadpage($keyw,$idcg,$page){
    $numberPages = 8;
    $start_limit = ($page - 1)*$numberPages; 
    $sql="select * from product where 1";//where 1 tất là câu này nó đúng
    if($keyw != ""){
        $sql.=" and namep like '%".$keyw."%'";
    }
    if($idcg > 0){
        $sql.=" and idcg = '".$idcg."'";
    }
    $sql.=" order by idp desc limit ".$start_limit.','.$numberPages;//nối chuổi nhớ cách khoảng
    $listproduct = pdo_query($sql);
    return $listproduct;
}

function loadall_product_home(){
    $sql="select * from product where 1 order by idp desc limit 0,8";
    $listproduct = pdo_query($sql);
    return $listproduct;
}

function loadone_product($idp){
    $sql = "select * from product where idp=".$idp;
    $oneproduct = pdo_query_one($sql);
    return $oneproduct;
}

function rowsCount($idcg){
    $sql="select * from product where 1";
    if($idcg > 0){
        $sql .=" and idcg = '".$idcg."'";
    }
    $num = pdo_rowCount($sql);
    return $num;
}
function update_product($idp,$namep, $price , $img, $info ,$idcg){
    if($img!="")
        $sql="update product set namep='".$namep."', price='".$price."', img='".$img."', info='".$info."', idcg='".$idcg."' where idp=".$idp;
    else
        $sql="update product set namep='".$namep."', price='".$price."', info='".$info."', idcg='".$idcg."' where idp=".$idp;
    pdo_execute($sql);
}



function load_similar_products($idp,$idcg){
    $sql = "select * from product where idcg=".$idcg." and idp <>'".$idp."' order by idp desc limit 0,4";
    $listproduct = pdo_query($sql);
    return $listproduct;
}

?>