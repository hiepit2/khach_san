<?php
include_once "../dau_cuoi/header.php";
include_once "../class/class.php";

?>
<div class="containers">
    <?php
    $list = new user_class();

    ?>
    <!-- <h1>Danh sách đặt phòng</h1> -->
    <table class="content-table">
        <thead>
            <tr>
                <th>Ảnh homestay</th>
                <th>Tên homestay</th>
                <th>Chi tiết</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_SESSION['user'])) {
                $ma_kh = $_SESSION['user']['ma_kh'];
                $date = date('Y-m-d');
                $show = $list->show_datphongtm($ma_kh);
                foreach ($show as $row) { 
                    if (isset($_GET['update'])) {

                        if ($row['trang_thai'] == 1 && $row['ngay_den'] > $date || $row['trang_thai'] == 0) {
                            // $trang_thai = '2';
                            // $ma_dp = $_GET['update'];
                            // $list->update_datphong($trang_thai, $ma_dp);
                            $list->delete_datphong($_GET['update']);
                        }
                        else {
                            echo "";
                        }
                    }?>
                    <tr>
                        <td><img src="../img/anh_hs/<?php echo $row['anh_hs'] ?>" alt=""></td>
                        <td><?php echo $row['ten_hs'] ?></td>
                        <td class="text1"><a href="../thanh_toan/show_thanhtoan.php?show=<?php echo $row['ma_dp'] ?>">Chi tiết</a>
                            <a href="../thanh_toan/ad.php?update=<?php echo $row['ma_dp'] ?>">Hủy</a>
                        </td>
                        <td><?php
                            if ($row['trang_thai'] == 0) {
                                echo "Chưa xác nhận";
                            } elseif ($row['trang_thai'] == 1) {
                                if ($row['ngay_den'] > $date) {
                                    echo "Sắp diễn ra";
                                } elseif ($row['ngay_den'] <= $date && $date <= $row['ngay_ve']) {
                                    echo "Đang diễn ra";
                                } elseif ($date > $row['ngay_ve']) {
                                    echo "Đã kết thúc";
                                }
                            } elseif ($row['trang_thai'] == 2) {
                                echo "Đã hủy";
                            }
                            ?></td> <br>
                    </tr>
            <?php }
            } ?>
        </tbody>
    </table>
</div>
<style>
    .containers {
        margin-top: 80px;
        margin-left: 180px;
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
    tbody tr td a{
        text-decoration: none;
        background-color: #96c93d;
        padding: 10px;
        border-radius: 10px;
        color: white;
    }
    tbody .text1{
        text-align: center;
    }
</style>