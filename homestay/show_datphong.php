<?php include_once "../class/class.php"; ?>
<?php include_once "../admin/admin.php"; ?>

<div class="container">
  <!-- Code chức năng  -->
  <?php
  $list_product = new user_class();
  ?>

  <h1>Danh sách đặt phòng</h1>
  <table class="content-table">
    <thead>
      <tr>
        <th>Tên khách hàng</th>
        <th>Tên loại phòng</th>
        <th>Ngày đặt</th>
        <!-- <th>Ngày đến</th>
        <th>Ngày về</th> -->
        <!-- <th>Tổng tiền</th> -->
        <th>Chi tiết</th>
        <th>Hoạt động</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $tenkh = $list_product->show_tenkhdp();
      date_default_timezone_set('ASIA/HO_CHI_MINH');
      $date = date('Y-m-d');
      foreach ($tenkh as $rows) {

      ?>
        <tr>
          <td><?php echo $rows['ten_kh'] ?></td>
          <td><?php echo substr($rows['ten_hs'], 0, 40) . '...' ?></td>
          <td><?php echo $rows['ngay_dat'] ?></td>
          <!-- <td><?php //echo $rows['ngay_den'] 
                    ?></td>
          <td><?php //echo $rows['ngay_ve'] 
              ?></td> -->
          <!-- <td><?php
                    //$format_number_4 = number_format($rows['tong_tien'], 0, ',', '.');

                    //echo  $format_number_4 
                    ?>vnđ</td> -->
          <td><a class="edit" href="chitiet_dat.php?update_trangthai=<?php echo $rows['ma_dp']; ?>">Chi tiết</a></td>
          <td>
            <?php if ($rows['trang_thai'] == '0') {
              if($rows['ngay_den'] < $date){
                echo "<div class='ron1'><h4>Quá thời gian xác nhận</h4></div>";
              }
              else{
                echo "<div class='ron1'><h4>Chưa xác nhận</h4></div>";
              }
            } elseif ($rows['trang_thai'] == '1' && $rows['ngay_ve'] < $date) {
              echo "<div class='ron2'><h4>Đã kết thúc</h4></div>";
            } elseif ($rows['trang_thai'] == '1' && $rows['ngay_den'] > $date) {
              echo "<div class='ron2'><h4>Chưa diễn ra</h4></div>";
            } elseif ($rows['trang_thai'] == '2') {
              echo "<div class='ron1'><h4>Đã hủy</h4></div>";
            } else {
              echo "<div class='ron1'><h4>Đang diễn ra</h4></div>";
            }
            ?>
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

  .ron1 h4 {
    color: red;
  }

  .ron2 h4 {
    color: blue;
  }

  .ron3 h4 {
    color: green;
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