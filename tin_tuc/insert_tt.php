<?php include_once "../class/class.php"; ?>
<?php
    $user = new user_class();
    if (isset($_POST['uploadclick'])) {
      $date = date('Y-m-d H:i');
      $insert_user = $user->insert_tintuc($_POST['ten_tin'], $_FILES['anh_tin']['name'], $_POST['gioi_thieu'], $date);
      echo $insert_user;
      header("Location:adshow_tt.php");
    }
?>
<?php include_once "../admin/admin.php"; ?>
<style>
.container{
    max-width: 1000px;
    text-align: center;
    margin: auto;
}
.container h1 {
    text-transform: uppercase;
    padding: 20px 0;
}
form {
  margin: auto;
  border-collapse: collapse;
  padding: 25px;
  width: 600px;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.form-item {
  margin-bottom: 30px;
}
form label {
  float: left;
  padding: 10px 0;
}
form textarea {
  display: block;
  min-width: 100%;
  max-height: 100px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 10px;
  font-size: 14px;
}
form textarea:focus {
  border: 1px solid #5abf90;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
form input {
  width: 100%;
}
form input[type="text"] {
  height: 30px;
  border-radius: 10px;
  border: 1px solid #ccc;
  text-indent: 10px;
}
form input[type="text"]:focus {
  border: 1px solid #5abf90;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
  color: #5abf90;
  font-weight: bold;
}
form a {
  float: left;
  text-decoration: none;
  color: #fff;
  padding: 10px 20px;
  background-color: #96c93d;
  border-radius: 8px;
  transition: all 0.3s ease-in-out;
}
form button {
  float: right;
  border: none;
  text-decoration: none;
  color: #fff;
  font-weight: 600;
  font-size: 15px;
  padding: 10px 20px;
  background-color: #96c93d;
  border-radius: 8px;
  transition: all 0.3s ease-in-out;
}
form a:hover, form button:hover {
  background-color: #5abf90;
}
</style>
  <div class="container">
    <!-- Code chức năng  -->
    <h1>Thêm Tin Tức</h1>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-item">
      <label for="">Ảnh tin tức</label>
      <input type="file" name="anh_tin">
      </div>
      <div class="form-item">
      <label for="">Tên tin tức</label>
      <input type="text" name="ten_tin" placeholder="Nhập tên tin tức">
      </div>
      <div class="form-item">
      <label for="">Nội dung</label>
      <textarea name="gioi_thieu" id="" cols="30" rows="10" placeholder="Nhập nội dung"></textarea>
      </div>
      <a href="./adshow_tt.php">Danh Sách Tin Tức</a>
      <button type="submit" name="uploadclick">Thêm Tin Tức</button>
    </form>
  </div>