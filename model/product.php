<?php
function insert_product($namep, $price ,$quantity, $hinh, $info,$idcg){
    if($hinh == ""){
        $hinh = "no photo";
    }
    $sql="insert into product(namep,price,quantity,img,info,idcg) values('$namep', '$price', '$quantity' , '$hinh', '$info', '$idcg')";
    pdo_execute($sql);
}



// function loadall_product($keyw,$idcg){
//     $sql="select * from product where 1";//where 1 tất là câu này nó đúng
//     $sql.=" and status like 1";
//     if($keyw != ""){
//         $sql.=" and namep like '%".$keyw."%'";
//     }
//     if($idcg > 0){
//         $sql.=" and idcg = '".$idcg."'";
//     }
//     $sql.=" order by idp desc";//nối chuổi nhớ cách khoảng
//     $listproduct = pdo_query($sql);
//     return $listproduct;
// }

function loadall_product($keyw,$idcg,$start,$soluong){
    $sql="select * from product where 1";//where 1 tất là câu này nó đúng
    $sql.=" and status like 1";
    if($keyw != ""){
        $sql.=" and namep like '%".$keyw."%'";
    }
    if($idcg > 0){
        $sql.=" and idcg = '".$idcg."'";
    }
    $sql.=" order by idp desc limit ".$start.','.$soluong;//nối chuổi nhớ cách khoảng
    $listproduct = pdo_query($sql);
    return $listproduct;
}

function count_product(){
    $sql = "select count(*) from product";
    $count = pdo_query_column($sql);
    return $count;
}


function loadall_product_loadpage($keyw,$idcg,$page){
    $numberPages = 9;
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
    $sql="select * from product where 1 and status like 1 order by idp desc limit 0,8";
    $listproduct = pdo_query($sql);
    return $listproduct;
}

function loadall_product_top_view(){
    $sql="select * from product where 1 and status like 1 order by view desc limit 0,8";
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
function update_product($idp,$namep, $price ,$quantity ,$img, $info ,$idcg){
    if($img!="")
        $sql="update product set namep='".$namep."', price='".$price."', quantity='".$quantity."' ,img='".$img."', info='".$info."', idcg='".$idcg."' where idp=".$idp;
    else
        $sql="update product set namep='".$namep."', price='".$price."', quantity='".$quantity."', info='".$info."', idcg='".$idcg."' where idp=".$idp;
    pdo_execute($sql);
}

function tangluotxem($idp){
 
    $sql="update product set view = view +1 where idp=".$idp;
    pdo_execute($sql);
}

// hàm xóa cứng, xóa thẳng vào database
function delete_product($idp){
    $sql="delete from product where idp=".$idp;
    pdo_execute($sql);
}

// hàm xóa mềm,không xóa thẳng vào database
function remove_product($idp,$status){
    $sql="update product set status='".$status."' where idp=".$idp;
    pdo_execute($sql);
}


function load_products_same($idp){
    $sql = "select * from product where idp <> ".$idp;
    $listproduct = pdo_query($sql);
    return $listproduct;
}

?>