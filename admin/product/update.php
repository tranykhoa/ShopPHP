
<?php
  if(isset($product) && (is_array($product))){
    extract($product);
  }

  $imgpath="../upload/".$img;
    if(is_file($imgpath)){
        $images = "<img src='".$imgpath."' height='80'>";
    }else{
        $images = "no photo";
    }
?>
<div id="my-modal" class="modal-add">
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2 style="text-align: center;">Sửa Sản Phẩm</h2>
    </div>
    <div class="modal-body">
      <form action="index.php?action=updateproduct" method="post" enctype="multipart/form-data">
        <div class="boxform">
          <table>
            <div class="row mb10">
              <p>Category</p>
              <select name="idcg">
                <?php
                foreach ($listcategory as $category) {
                  extract($category);
                  if ($category['idcg'] == $product['idcg'])
                    echo '<option value="' . $category['idcg'] . '" selected>' . $category['namecg'] . '</option>';
                  else
                    echo '<option value="'.$category['idcg'].'">'.$category['namecg'].'</option>';
                }
                ?>
              </select>
            </div>
            <div class="row mb10">
              <p>Name product</p>
              <input type="text" class="inputaddform" name="namep" value="<?=$namep?>">
            </div>
            <div class="row mb10">
              <p>Price</p>
              <input type="text" class="inputaddform" name="price" value="<?=$price?>">
            </div>
            <div class="row mb10">
              <p>Images</p>
              <input type="file" class="inputaddform" name="upload"><?=$images?>
            </div>
            <div class="row mb10">
              <p>Describe</p>
              <textarea name="info" cols="30" rows="10" style="width:100%;"><?=$info?></textarea>
            </div>
            <div class="row mb10">
              <input type="hidden" name="idp" value="<?=$idp?>">
              <input type="submit" name="update" value="Update">
              <a href="index.php?action=listproduct"><input type="button" value="Danh sách"></a>
            </div>
            <?php
                if(isset($thongbao)&&($thongbao != ""))
                  echo '<p style="color: red; font-style: italic; font-size: 16px;">'.$thongbao.'</p>';
             ?>
          </table>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <h3>Modal Footer</h3>
    </div>
  </div>
</div>