<?php include_once "../class/class.php"; ?>
<?php include_once "../admin/admin.php"; ?>
<style>
.container{
    max-width: 1000px;
    margin: auto;
}
.container h1 {
    text-transform: uppercase;
    padding: 20px 0;
}
.container .list {
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
.container .list:hover {
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
.content-table td .delete  {
    text-decoration: none;
    color: #fff;
    padding: 10px 15px;
    background-color: #96c93d;
    border-radius: 5px;
    transition: all 0.3s ease-in-out;
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
<div class="container">
        <!-- Code chức năng  -->
<?php include_once "../class/class.php" ?>
<?php
$list = new user_class();
if (isset($_GET['delid'])) {
    $delUser = $list->delete_binhluan($_GET['delid']);
}
if (isset($delUser)) echo $delUser;

?>
<h1>Chi tiết bình luận</h1>
<a class="list" href="./adshow_bl.php">Danh sách bình luận</a>
<table class="content-table">
  <thead>
    <tr>
      <th>Nội dung</th>
      <th>Ngày bình luận</th>
      <th>Xử lý</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $ma_hs  = $_GET['ma_hs'];
    $home = $list->show_binhluan($ma_hs);
    foreach ($home as $row) { ?>
    <tr>
        <td><?php echo $row['noi_dung'] ?></td>
        <td><?php echo $row['ngay_bl'] ?></td>
        <td><a class="delete" onclick="return confirm('Bạn muốn xóa bình luận?')" href="chitiet_showbl.php?delid=<?php echo $row['ma_bl']; ?>">Xóa</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>