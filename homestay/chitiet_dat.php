<?php include_once "../admin/admin.php"; ?>
<?php
include_once "../class/class.php";
$list = new user_class();
if (isset($_GET['update_trangthai'])) {
    $ma_dp = $_GET['update_trangthai'];
    $show = $list->show_chitiet_tenkhdp($ma_dp);
    date_default_timezone_set('ASIA/HO_CHI_MINH');
    $date = date('Y-m-d');
}
if (isset($_GET['xacnhan'])) {
    if ($show['trang_thai'] == 1) {
        echo "";
    } 
    elseif($show['trang_thai'] == 2){
        echo "";
    }
    elseif($show['trang_thai'] == 0 && $show['ngay_den'] <= $date){
        echo "";
    }
    else {
        $trang_thai = '1';
        $ma_dp = $_GET['xacnhan'];
        $list->update_datphong($trang_thai, $ma_dp);
        header("Location:show_datphong.php");
        exit();
    }
}
if (isset($_GET['huy'])) {
    if ($show['trang_thai'] == 1 && $show['ngay_den'] <= $date) {
        echo "";
    } 
    elseif($show['trang_thai'] == 0 && $show['ngay_den'] <= $date){
        echo "";
    }
    else {
        $trang_thai = '2';
        $ma_dp = $_GET['huy'];
        $list->update_datphong($trang_thai, $ma_dp);
        header("Location:../homestay/show_datphong.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>
    <link rel="stylesheet" href="../css/chitiet_dat.css">
</head>
<style>
        .details-item a {
            border: none;
            background-color: #96c93d;
            color: white;
            padding: 15px 22px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 8px;
            font-size: 16px;
        }

        .details-item a :hover {
            background-color: #5abf90;
            color: black;
        }
    </style>
<body>
    <main>
        <div class="container">
            <div class="ticket">
                <div class="line-top">
                    <img src="../img/logo/logo.png" alt="">
                </div>
                <!-- End line-top -->
                <div class="line-bot">

                    <div class="content-ticket1">
                        <div class="title-item">
                            <h5>Tên hometay</h5>
                        </div>
                        <div class="details-item">
                            <h3><?php echo $show['ten_hs'] ?></h3>
                        </div>
                    </div>
                    <div class="content-ticket2">
                        <div class="item-ticket">
                            <div class="title-item">
                                <h5>Họ và tên</h5>
                            </div>
                            <div class="details-item">
                                <h3><?php echo $show['ten_kh']; ?></h3>
                            </div>
                        </div>
                        <!-- End item-ticket -->
                        <div class="item-ticket">
                            <div class="title-item">
                                <h5>Số điện thoại</h5>
                            </div>
                            <div class="details-item">
                                <h3><?php echo $show['sdt']; ?></h3>
                            </div>
                        </div>
                    </div>
                    <!-- End item-ticket -->
                    <div class="content-ticket2">
                        <div class="item-ticket">
                            <div class="title-item">
                                <h5>Ngày đến</h5>
                            </div>
                            <div class="details-item">
                                <h3><?php echo $show['ngay_den']; ?></h3>
                            </div>
                        </div>
                        <!-- End item-ticket -->
                        <div class="item-ticket">
                            <div class="title-item">
                                <h5>Ngày về</h5>
                            </div>
                            <div class="details-item">
                                <h3><?php echo $show['ngay_ve']; ?></h3>
                            </div>
                        </div>
                        <!-- End item-ticket -->
                    </div>

                    <div class="content-ticket2">
                        <div class="item-ticket">
                            <div class="title-item">
                                <h5>Loại phòng</h5>
                                <div class="details-item">
                                    <h3><?php echo $show['ten_lp']; ?></h3>
                                </div>
                            </div>
                        </div>
                        <!-- End item-ticket -->
                        <div class="item-ticket">
                            <div class="title-item">
                                <h5>Tổng tiền</h5>
                            </div>
                            <div class="details-item">
                                <h3><?php $format_number_4 = number_format($show['tong_tien'], 0, ',', '.');
                                    echo $format_number_4 . 'vnđ'; ?></h3>
                            </div>
                        </div>
                        <!-- End item-ticket -->
                    </div>
                    <div class="content-ticket2">
                        <div class="item-ticket">
                            <div class="title-item">
                                <h5></h5>
                                <div class="details-item">
                                    <h3></h3>
                                </div>
                            </div>
                        </div>
                        <!-- End item-ticket -->
                        <div class="item-ticket">
                            <div class="title-item">
                                <h5></h5>
                            </div>
                            <div class="details-item">
                                <h3><a href="?xacnhan=<?php echo $show['ma_dp'] ?>&update_trangthai=<?php echo $show['ma_dp'] ?>">Xác nhận</a>
                                    <a href="?huy=<?php echo $show['ma_dp'] ?>&update_trangthai=<?php echo $show['ma_dp'] ?>">Hủy</a>
                                </h3>
                            </div>
                        </div>
                        <!-- End item-ticket -->
                    </div>
                </div>
            </div>
            <!-- End ticket -->
        </div>
        <?php //}
        ?>
    </main>
</body>
</html>
