<?php include_once "../class/class.php"; ?>
<?php
$user = new user_class();
if (isset($_POST['submit_ud'])) {
    $vai_tro = $_POST['vai_tro'];
    $ma_kh = $_GET['update_vaitro'];
    $user->update_vaitro($vai_tro, $ma_kh);
    header("Location:show_kh.php");
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
form select {
  -webkit-appearance: none;
  -moz-appearance: none;
  width: 100%;
  padding: 5px 20px 5px 10px;
  border: 1px solid #ccc;
  border-radius: 10px;
}
form select:focus {
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
<?php
if (isset($_GET['update_vaitro'])) {
    $users = $user->show_khachhangtm($_GET['update_vaitro']);
?>



<h1>Cập nhật Khách Hàng</h1>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-item">
      <label for="">Vai trò hiện tại</label>
      <input type="text" readonly name="vai_tro_cu"
             value="<?php if ($users['vai_tro'] == '1') {
                                echo "Admin";
                        } else {
                                echo "Khách hàng";
                        }  ?>">
      </div>
      <div class="form-item">
      <label for="">Vai trò mới</label>
      <select name="vai_tro" id="">
          <option selected>Chọn loại phòng mới</option>
          <option value="1">Admin</option>
          <option value="0">Khách hàng</option>
      </select>
      </div>
      <a href="./show_kh.php">Danh Sách Khách Hàng</a>
      <button type="submit" name="submit_ud">Cập Nhật Khách Hàng</button>
    </form>
<?php } ?>
</div>
