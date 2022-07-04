<?php include_once "../dau_cuoi/header.php"; ?>
<?php
include_once "../class/class.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>
    <link rel="stylesheet" href="../css/ticket.css">
</head>

<body>
    <main>
        <?php
        $list = new user_class();
        if (isset($_GET['show'])) {
            $ma_dp = $_GET['show'];
            $row = $list->show_chitietdatphongtm($ma_dp);
        ?>
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
                                <h3><?php echo $row['ten_hs'] ?></h3>
                            </div>
                        </div>
                        <div class="content-ticket2">
                            <div class="item-ticket">
                                <div class="title-item">
                                    <h5>Họ và tên</h5>
                                </div>
                                <div class="details-item">
                                    <h3><?php echo $row['ten_kh']; ?></h3>
                                </div>
                            </div>
                            <!-- End item-ticket -->
                            <div class="item-ticket">
                                <div class="title-item">
                                    <h5>Loại phòng</h5>
                                </div>
                                <div class="details-item">
                                    <h3><?php echo $row['ten_lp']; ?></h3>
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
                                    <h3><?php echo $row['ngay_den']; ?></h3>
                                </div>
                            </div>
                            <!-- End item-ticket -->
                            <div class="item-ticket">
                                <div class="title-item">
                                    <h5>Ngày về</h5>
                                </div>
                                <div class="details-item">
                                    <h3><?php echo $row['ngay_ve']; ?></h3>
                                </div>
                            </div>
                            <!-- End item-ticket -->
                        </div>

                        <div class="content-ticket2">
                            <div class="item-ticket">
                                <div class="title-item">
                                    <h5>Tổng tiền</h5>
                                </div>
                            </div>
                            <!-- End item-ticket -->
                            <div class="item-ticket">

                                <div class="details-item">
                                    <h3><?php $format_number_4 = number_format($row['tong_tien'], 0, ',', '.');
                                        echo $format_number_4 . 'vnđ'; ?></h3>
                                </div>
                            </div>
                            <!-- End item-ticket -->
                        </div>

                    </div>

                </div>
                <!-- End ticket -->
            </div>
        <?php
        } ?>


    </main>
</body>

</html>
<?php include_once "../dau_cuoi/footer.php"; ?>