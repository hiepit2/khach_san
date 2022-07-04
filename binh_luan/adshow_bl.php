<?php include_once "../class/class.php"; ?>
<?php include_once "../admin/admin.php"; ?>
<div class="container">
  <!-- Code chức năng  -->
  <?php include_once "../class/class.php" ?>


  <h1>Danh sách bình luận</h1>
  <table class="content-table">
    <thead>
      <tr>
        <th>Ảnh homestay</th>
        <th>Tên homestay</th>
        <th>Chi tiết</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $list = new user_class();
      $home = $list->show_homestay();
      foreach ($home as $row) { ?>
        <tr>
          <td><img src="../img/anh_hs/<?php echo $row['anh_hs'] ?>" alt=""></td>
          <td><?php echo $row['ten_hs'] ?></td>
          <td><a class="details" href="chitiet_showbl.php?ma_hs=<?php echo $row['ma_hs'] ?>">Chi tiết</a></td>
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

  .content-table td .details {
    text-decoration: none;
    color: #fff;
    padding: 10px 15px;
    background-color: #96c93d;
    border-radius: 5px;
    transition: all 0.3s ease-in-out;
  }

  .content-table td .details:hover {
    background-color: #5abf90;
  }

  .content-table tbody tr:last-of-type {
    border-bottom: 2px solid #96c93d;
  }

  .content-table tbody tr:hover {
    color: #009879;
    background-color: #f3f3f3;
  }
</style>