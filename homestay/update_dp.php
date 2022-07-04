<?php include_once "../class/class.php"; ?>
<?php
$user = new user_class();
if (isset($_POST['submit_ud'])) {
  $ten_hs = $_POST['ten_hs'];
  if ($_FILES['anh_hs']['name'] == '') {
    $anh_hs = $_POST['anh_hs_cu'];
  } else {
    $anh_hs = $_FILES['anh_hs']['name'];
  }
  $gioi_thieu = $_POST['gioi_thieu'];

  $ma_lp = $_POST['ma_lp'];
  if (empty($ma_lp)) {
    $ma_lp = $_POST['id_lp_cu'];
  }
  $gia = $_POST['gia'];
  $gia_km = $_POST['gia_km'];
  $ma_dd = $_POST['ma_dd'];
  echo $_POST['id_dd_cu'];
  if (empty($ma_dd)) {
    $ma_dd = $_POST['id_dd_cu'];
  }
  $ma_hs = $_GET['update_datphong'];
  echo $ten_hs, $anh_hs, $gioi_thieu, $ma_lp, $gia, $ma_dd, $ma_hs;
  $user->update_homestay($ten_hs, $anh_hs, $gioi_thieu, $ma_lp, $gia,$gia_km, $ma_dd, $ma_hs);
  header("Location:adshow_dp.php");
}

?>
<?php include_once "../admin/admin.php"; ?>
<div class="container">
  <!-- Code chức năng  -->
  <?php
  if (isset($_GET['update_datphong'])) {
    $users = $user->show_homestay2($_GET['update_datphong']);
    // echo "<pre>";
    // print_r($users);
    // echo "</pre>";
  ?>
    <h1>Cập nhật homestay</h1>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-item">
        <label for="">Tên phòng</label>
        <input type="text" name="ten_hs" value="<?php echo $users['ten_hs'] ?>" placeholder="Nhập tên phòng">
      </div>
      <div class="form-item">
        <label for="">Ảnh</label>
        <input type="file" name="anh_hs" value="">
        <input type="text" name="anh_hs_cu" value="<?php echo $users['anh_hs'] ?>">
      </div>
      <div class="form-item">
        <label for="">Giới thiệu</label>
        <textarea name="gioi_thieu" id="" cols="30" rows="10" placeholder="Nhập nội dung"><?php echo $users['gioi_thieu'] ?></textarea>
      </div>
      <div class="form-item">
        <?php
        $loaiphong = $user->show_loaiphong();
        ?>
        <label for="">Chọn loại phòng</label>
        <select name="ma_lp" id="">

          <option value="">Chọn</option>

          <?php
          foreach ($loaiphong as $row) :
          ?>
            <option value="<?php echo $row['ma_lp'] ?>"><?php echo $row['ten_lp'] ?></option>
          <?php
          endforeach
          ?>
          <input type="text" name="ma_lp_cu" readonly value="<?php echo $users['ten_lp'] ?>">
          <input style="visibility: hidden;" type="text" name="id_lp_cu" readonly value="<?php echo $users['ma_lp'] ?>">
        </select>
      </div>

      <div class="form-item">
        <label for="">Giá homestay</label>
        <input type="text" name="gia" placeholder="Nhập giá" value="<?php echo $users['gia'] ?>">
      </div>
      <div class="form-item">
        <label for="">Giá homestay khuyến mại</label>
        <input type="text" name="gia_km" placeholder="Nhập giá khuyến mại" value="<?php echo $users['gia_km'] ?>">
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
          <option value="">Chọn địa điểm</option>
          <?php
          foreach ($dia_diem as $row) :
          ?>
            <option value="<?php echo $row['ma_dd'] ?>"><?php echo $row['ten_dd'] ?></option>
          <?php
          endforeach
          ?>
          <input type="text" name="ma_dd_cu" readonly value="<?php echo $users['ten_dd'] ?>">
          <input style="visibility: hidden;" type="text" name="id_dd_cu" readonly value="<?php echo $users['ma_dd'] ?>">
        </select>
      </div>
      <a href="./adshow_dp.php">Danh Sách Phòng</a>
      <button type="submit" name="submit_ud">Cập Nhật Phòng</button>
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