<div id="my-modal" class="modal-add">
  <div class="modal-content">
    <div class="modal-header">
      <span class="close"></span>
      <h2 style="text-align: center;">Thêm Người Dùng</h2>
    </div>
    <div class="modal-body">
      <form action="index.php?action=adduser" method="post" enctype="multipart/form-data">
        <div class="boxform">
          <table>
            <div class="row mb10">
              <p>Name</p>
              <input type="text" class="inputaddform" value="" name="name">
            </div>
            <div class="row mb10">
              <p>Images</p>
              <input type="file" class="inputaddform" name="upload`">
            </div>
            <div class="row mb10">
              <p>Email</p>
              <input type="text" class="inputaddform" name="email">
            </div>
            <div class="row mb10">
              <p>Pass</p>
              <input type="text" class="inputaddform" name="pass">
            </div>
            <div class="row mb10">
              <p>Tel</p>
              <input type="text" class="inputaddform" name="tel">
            </div>
            <div class="row mb10">
              <input type="submit" name="add" value="Thêm mới">
              <a href="index.php?action=listuser"><input type="button" value="Danh sách"></a>
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != "")) { ?>
              <p style="color: red; display: flex; align-items: center;font-style: italic; font-size: 16px;"><i style="font-size: 2rem;" class='bx bxs-error-circle'></i><?= $thongbao ?></p>
            <?php } ?>
          </table>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <h3>Modal Footer</h3>
    </div>
  </div>
</div>