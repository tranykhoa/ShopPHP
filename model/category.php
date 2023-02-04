<?php
function insert_category($tenloai){
    $sql="insert into category(namecg) values('$tenloai')";
    pdo_execute($sql);
}

// hàm xóa cứng, xóa thẳng vào database
function delete_category($idcg){
    $sql="delete from category where idcg=".$idcg;
    pdo_execute($sql);
}
// hàm xóa mềm, không xóa thẳng vào database
function remove_category($idcg,$status){
    $sql="update category set status='".$status."' where idcg=".$idcg;
    pdo_execute($sql);
}

function loadall_category(){
    $sql="select * from category where 1 and status like 1 order by idcg desc";
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