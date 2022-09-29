<?php
function insert_category($tenloai){
    $sql="insert into category(namecg) values('$tenloai')";
    pdo_execute($sql);
}

function delete_category($idcg){
    $sql="delete from category where idcg=".$idcg;
    pdo_execute($sql);
}

function loadall_category(){
    $sql="select * from category order by idcg desc";
    $listcategory = pdo_query($sql);
    return $listcategory;
}
function loadone_category($idcg){
    $sql = "select * from category where idcg=".$idcg;
    $category = pdo_query_one($sql);
    return $category;
}
function update_category($idcg,$namecg){
    $sql="update category set namecg='".$namecg."' where idcg=".$idcg;
    pdo_execute($sql);
}

// function loadname_danhmuc($id){
//    if($id > 0){
//     $sql = "select * from danhmuc where id=".$id;
//     $dm = pdo_query_one($sql);
//     extract($dm);
//     return $name;
//    }else{
//     return "";
//    }
// }

?>