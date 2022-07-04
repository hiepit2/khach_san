<?php include_once "../class/class.php"; ?>
<?php
$user = new user_class();
if (isset($_POST['uploadclick'])) {
  $insert_user = $user->insert_homestay($_POST['ten_hs'], $_FILES['anh_hs']['name'], $_POST['gioi_thieu'], $_POST['ma_lp'], $_POST['gia'],$_POST['gia_km'], $_POST['ma_dd']);
  echo $insert_user;
  header("Location:../homestay/adshow_dp.php");
}
?>
<?php include_once "../admin/admin.php"; ?>
<div class="container">
  <!-- Code chức năng  -->
  <h1>Thêm homestay</h1>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-item">
      <label for="">Tên homestay</label>
      <input type="text" name="ten_hs" placeholder="Nhập tên phòng">
    </div>
    <div class="form-item">
      <label for="">Ảnh homestay</label>
      <input type="file" name="anh_hs">
    </div>
    <div class="form-item">
      <label for="">Giới thiệu</label>
      <textarea name="gioi_thieu" id="" cols="30" rows="10" placeholder="Nhập giới thiệu"></textarea>
    </div>
    <div class="form-item">
      <?php
      $loaiphong = $user->show_loaiphong();
      ?>
      <label for="">Chọn loại phòng</label>
      <select name="ma_lp" id="">
        <option selected>Chọn loại phòng</option>
        <?php
        foreach ($loaiphong as $row) :
        ?>
          <option value="<?php echo $row['ma_lp'] ?>"><?php echo $row['ten_lp'] ?></option>
        <?php
        endforeach
        ?>
      </select>
    </div>

    <div class="form-item">
      <label for="">Giá homestay</label>
      <input type="text" name="gia" placeholder="Nhập giá">
    </div>
    <div class="form-item">
      <label for="">Giá homestay khuyến mại</label>
      <input type="text" name="gia_km" placeholder="Nhập giá">
    </div>
    <div class="form-item">
      <?php
      $dia_diem = $user->show_diadiem();
      // echo "<pre>";
      // print_r($homestay);
      // echo "</pre>";
      ?>
      <label for="">Chọn địa điểm</label>
      <select name="ma_dd" id="">
        <option selected>Chọn địa điểm</option>
        <?php
        foreach ($dia_diem as $row) :
        ?>
          <option value="<?php echo $row['ma_dd'] ?>"><?php echo $row['ten_dd'] ?></option>
        <?php
        endforeach
        ?>
      </select>
    </div>
    <a href="./adshow_dp.php">Danh Sách Homestay</a>
    <button type="submit" name="uploadclick">Thêm homestay</button>
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

  form a:hover,
  form button:hover {
    background-color: #5abf90;
  }
</style>