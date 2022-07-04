<?php include_once "../class/class.php"; ?>
<?php
$user = new user_class();
if (isset($_POST['uploadclick'])) {
  $insert_user = $user->insert_diadiem($_FILES['anh_dd']['name'], $_POST['ten_dd']);
  echo $insert_user;
  header("Location:../dia_diem/adshow_dd.php");
  exit();
}
?>
<?php include_once "../admin/admin.php"; ?>
<div class="container">
  <!-- Code chức năng  -->
  <h1>Thêm địa điểm</h1>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-item">
      <label for="">Ảnh địa điểm</label>
      <input type="file" name="anh_dd">
    </div>
    <div class="form-item">
      <label for="">Tên địa điểm</label>
      <input type="text" name="ten_dd" placeholder="Nhập địa điểm">
    </div>
    <a href="./adshow_dd.php">Danh Sách Địa Điểm</a>
    <button type="submit" name="uploadclick">Nhập tên địa điểm</button>
  </form>
</div>
<style>
  .container {
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

  form a:hover,
  form button:hover {
    background-color: #5abf90;
  }
</style>