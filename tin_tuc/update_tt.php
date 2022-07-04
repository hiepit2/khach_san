<?php include_once "../class/class.php"; ?>
<?php
$user = new user_class();
if (isset($_POST['submit_ud'])) {
  $ten_tin = $_POST['ten_tin'];
  if ($_FILES['anh_tin']['name'] == '') {
    $anh_tin = $_POST['anh_tin_cu'];
  } else {
    $anh_tin = $_FILES['anh_tin']['name'];
  }
  $gioi_thieu = $_POST['gioi_thieu'];
  $ngay_tin = date('Y-m-d H:i');
  $ma_tin = $_GET['update_tintuc'];
  $user->update_tintuc($ten_tin, $anh_tin, $gioi_thieu, $ngay_tin, $ma_tin);
  header("Location:adshow_tt.php");
  exit();
  // echo "<script>window.location.replace('adshow_tt.php');</script>";
}
?>
<!-- Cả 1 đống HTML phía trước đoạn chuyển hướng nên nó báo lỗi -->
<!-- Hết lỗi rồi nhá ! -->
<?php include_once "../admin/admin.php"; ?>

<div class="container">
  <!-- Code chức năng  -->
  <?php
  if (isset($_GET['update_tintuc'])) {
    $users = $user->show_tintuctm($_GET['update_tintuc']);
  ?>
    <h1>Cập Nhật Tin Tức</h1>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-item">
        <label for="">Ảnh tin tức</label>
        <input type="file" name="anh_tin">
        <input type="text" name="anh_tin_cu"  value="<?php echo $users['anh_tin'] ?>">
      </div>
      <div class="form-item">
        <label for="">Tên tin tức</label>
        <input type="text" name="ten_tin" placeholder="Nhập tên tin tức" value="<?php echo $users['ten_tin'] ?>">
      </div>
      <div class="form-item">
        <label for="">Nội dung</label>
        <textarea name="gioi_thieu" id="" cols="30" rows="10" placeholder="Nhập nội dung"><?php echo $users['gioi_thieu'] ?></textarea>
      </div>
      <a href="./adshow_tt.php">Danh Sách Tin Tức</a>
      <button type="submit" name="submit_ud">Cập Nhật Tin Tức</button>
    </form>
  <?php } ?>
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

  form a:hover,
  form button:hover {
    background-color: #5abf90;
  }
</style>