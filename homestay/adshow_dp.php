<?php include_once "../class/class.php"; ?>
<?php include_once "../admin/admin.php"; ?>
<div class="container">
  <!-- Code chức năng  -->
  <?php
  $list_product = new user_class();
  if (isset($_GET['delid'])) {
    $delUser = $list_product->delete_homestay($_GET['delid']);
  }
  if (isset($delUser)) echo $delUser;
  ?>

  <h1>Danh sách homestay</h1>
  <a class="add" href="./insert_dp.php">Thêm homestay</a>
  <table class="content-table">
    <thead>
      <tr>

        <th>Ảnh homestay</th>
        <th>Tên homestay</th>
        <th>Giới thiệu</th>
        <th>Tên loại phòng</th>
        <th>Giá</th>
        <th>Giá khuyến mại</th>
        <th style="width: 150px;">Xử lý</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $users = $list_product->show_homestay1();
      foreach ($users as $rows) {
      ?>
        <tr>

          <td><img src="../img/anh_hs/<?php echo $rows['anh_hs']; ?>" alt=""></td>
          <td><?php echo $rows['ten_hs']; ?></td>
          <td><?php echo substr($rows['gioi_thieu'], 0, 120); ?></td>
          <td><?php echo $rows['ten_lp']; ?></td>
          <td><?php
              $format_number_4 = number_format($rows['gia'], 0, ',', '.');

              echo  $format_number_4 ?>vnđ</td>
          <td><?php
              $format_number_4 = number_format($rows['gia_km'], 0, ',', '.');

              echo  $format_number_4 ?>vnđ</td>
          <td><a class="edit" href="update_dp.php?update_datphong=<?php echo $rows['ma_hs']; ?>">Sửa</a>
            <a class="delete" onclick="return confirm('Bạn có chắc muốn xóa phòng này không?')" href="adshow_dp.php?delid=<?php echo $rows['ma_hs']; ?>">Xóa</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<style>
  .container {
    max-width: 1000px;
    margin: auto;
  }

  .container h1 {
    text-transform: uppercase;
    padding: 20px 0;
  }

  .container .add {
    float: left;
    padding: 10px 20px;
    margin-bottom: 10px;
    background-color: #96c93d;
    border-radius: 10px;
    text-decoration: none;
    color: #fff;
    font-weight: bold;
    transition: all 0.3s ease-in-out;
  }

  .container .add:hover {
    background-color: #5abf90;
  }

  /* Table */
  .content-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    width: 1000px;
    border-radius: 5px 5px 0 0;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    
  }

  .content-table thead tr {
    background-color: #96c93d;
    color: #ffffff;
    text-align: center;
    font-weight: bold;
  }

  .content-table th,
  .content-table td {
    padding: 12px 15px;
  }

  .content-table tbody tr {
    border-bottom: 1px solid #dddddd;
    transition: all 0.3s ease-in-out;
  }

  .content-table td img {
    width: 100px;
  }

  .content-table td .edit,
  .content-table td .delete {
    text-decoration: none;
    color: #fff;
    padding: 10px 15px;
    background-color: #96c93d;
    border-radius: 5px;
    transition: all 0.3s ease-in-out;
  }

  .content-table td .edit:hover {
    background-color: #FFCC00;
  }

  .content-table td .delete:hover {
    background-color: #FF3333;
  }

  .content-table tbody tr:last-of-type {
    border-bottom: 2px solid #96c93d;
  }

  .content-table tbody tr:hover {
    color: #009879;
    background-color: #f3f3f3;
  }
</style>