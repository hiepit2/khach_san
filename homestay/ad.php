<?php
session_start();
include_once "../class/class.php"; ?>
<?php
function getDatesFromRange($start, $end, $format = 'm-d-Y')
{
    $array = array();
    $interval = new DateInterval('P1D');
    $realEnd = new DateTime($end);
    $realEnd->add($interval);
    $period = new DatePeriod(new DateTime($start), $interval, $realEnd);
    foreach ($period as $date) {
        $array[] = $date->format($format);
    }
    return count($array);
}
$usermodel = new user_class();
if (isset($_GET['chitiet_dp'])) :
    $ma_hs = $_GET['chitiet_dp'];
    $diadiem = $usermodel->show_homestaytm($_GET['chitiet_dp']);
    if (isset($_POST['dat'])) {
        $ma_kh = '';
        $ma_km = '';
        $ngay_dat = date('Y-m-d');
        if (isset($_SESSION['user'])) {
            $ma_kh = $_SESSION['user']['ma_kh'];
        }
        // echo "<pre>";
        // print_r($_SESSION);
        // echo "</pre>";
        $songay = getDatesFromRange($_POST['ngay_den'], $_POST['ngay_ve']);
        if ($diadiem['gia_km'] == 0) {
            $gia = $diadiem['gia'];
            $tong_tien = $gia * $songay;
            var_dump($songay);
            echo $gia;
            $_SESSION['cart'] = [
                'ngay_dat' => $ngay_dat,
                'ngay_den' => $_POST['ngay_den'],
                'ngay_ve' => $_POST['ngay_ve'],
                'tong_tien' => $tong_tien,
                'ma_lp' => $diadiem['ma_lp'],
                'ten_lp' => $diadiem['ten_lp'],
                'ma_hs' => $_GET['chitiet_dp'],
            ];
        } else {
            $gia = $diadiem['gia_km'];
            $tong_tien = $gia * $songay;
            $_SESSION['cart'] = [
                'ngay_dat' => $ngay_dat,
                'ngay_den' => $_POST['ngay_den'],
                'ngay_ve' => $_POST['ngay_ve'],
                'tong_tien' => $tong_tien,
                'ma_lp' => $diadiem['ma_lp'],
                'ten_lp' => $diadiem['ten_lp'],
                'ma_hs' => $_GET['chitiet_dp'],
            ];
        }
        // echo $diadiem['ma_lp'];
        // echo $_SESSION['cart']['ma_lp'];
        header('Location:../thanh_toan/thanh_toan.php');
        exit();
    } ?>


    <!-- <form action="" method="post" enctype="multipart/form-data">

    <label for="">Từ ngày</label>
    <input type="date" name="ngay_den">
    <label for="">đến</label>
    <input type="date" name="ngay_ve">
    <button type="submit" name="dat">Đặt phòng</button>
</form> -->


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Chi tiết phòng</title>
        <link rel="shortcut icon" href="../img/logo/logoo.png" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" /> -->
        <!-- <link rel="stylesheet" href="../css/news.css" /> -->
        <link rel="stylesheet" href="../css/detail.css" />
        <link rel="stylesheet" href="../css/header_and_footer.css">
        <style>
            .news-img-slider img {
                height: 370px;
            }
        </style>
    </head>

    <body>
        <div class="header-top">
            <div class="container">
                <div class="contact">
                    <ul>
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
                <div class="account">
                    <?php
                    if (isset($_SESSION['success'])) {
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    }
                    ?>
                    <ul>
                        <li><a href="../khach_hang/sign_up.php">Đăng ký</a></li>
                        <span class="line"></span>
                        <?php if (!isset($_SESSION['user'])) :  ?>
                            <li><a href="../khach_hang/sign_in.php">Đăng nhập</a></li>
                        <?php else : ?>
                            <a href="../khach_hang/formdx.php">Đăng xuất</a>
                            <span class="line "></span>
                            <a href="../khach_hang/thong_tin.php"> Tài khoản</a>
                        <?php endif; ?>

                    </ul>
                </div>
            </div>
        </div>
        <!-- End header-top -->
        <header>
            <div class="header-main">
                <div class="container">

                    <div class="logo">
                        <img src="../img/logo/logo.png" alt="">
                    </div>
                    <nav>
                        <ul>
                            <li><a href="../adminn/index.php">Trang Chủ</a></li>
                            <li><a href="../homestay/show_dp.php">Đặt Phòng</a></li>
                            <li><a href="../tin_tuc/show_tt.php">Tin Tức</a></li>
                            <li><a href="../dia_diem/show_dd.php">Địa Điểm</a></li>
                            <li><a href="">Trợ Giúp</a></li>
                        </ul>
                    </nav>
                    <div class="icon">
                        <div class="search-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <form class="search-input" action="../dau_cuoi/tim_kiem_tt.php">
                            <input type="text" placeholder="Bạn cần tìm gì ?" name="name">
                            <button type="submit" name="tim_kiem"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <div class="cart-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                </div>
            </div>
        </header>
        <!-- End header -->
        <main>
            <div class="left">
                <div class="text-top">
                    <h1>
                        The Royal Homies Suite Balcony - Phu My Hung (SECC, Crescent Mall, SC Vivo City)
                    </h1>
                    <br />
                    <br />
                    <br />
                    <div class="text1">
                        <div class="i">
                            <i class="fas fa-map-marker-alt"></i>
                            <strong>Cầu Giấy, Hà Nội, Vietnam</strong>
                        </div>

                        <a style="text-decoration: none" href="https://www.google.com/maps/@9.779349,105.6189045,11z?hl=vi-VN">Xem bản
                            đồ</a>
                    </div>
                    <div class="text2">
                        <i class="fas fa-home"></i>
                        <strong>Căn hộ dịch vụ 55m <sub> &#178;</sub></strong>
                    </div>
                    <span>Phòng riêng <strong>·</strong> 1 Phòng tắm <strong>·</strong> 1
                        giường <strong>·</strong> 1 phòng ngủ <strong>·</strong> 2 khách
                        (tối đa 2 khách)
                    </span>
                </div>
                <div class="text-main">
                    <p>
                        <b>The Royal Homies - Phú Mỹ Hưng</b> tọa lạc tại Nội khu Hưng Gia
                        1, phường Tân Phong, quận 7. Khu dân dư đông đúc, an ninh thắt chặt
                        bởi đội ngủ bảo vệ Phú Mỹ Hưng. Trung tâm hành chính và tập trung
                        nhiều khu vui chơi giải trí, nhà hàng, quán ăn, quán cà phê, siêu
                        thị, chợ, trung tâm mua sắm, thương mại, cách Trung tâm Hội nghị và
                        Triển lãm Sài Gòn 1,3 km. Nơi lưu trú có tiện nghi nhà hàng phục vụ
                        món ăn và thức uống có trong thực đơn, quầy lễ tân làm việc 24 giờ
                        và dịch vụ phòng đến 15 giờ chiều mỗi ngày, WiFi được lắp đặt có thể
                        sử dụng miễn phí trong toàn bộ khuôn viên.
                        <br />
                        <br />
                        Tất cả các phòng được trang bị máy lạnh, lò vi sóng, bếp nấu ăn
                        riêng từng phòng, tủ lạnh, ấm đun nước, chậu vệ sinh, máy sấy tóc và
                        bàn làm việc. Tại các phòng của khách sạn được trang bị tủ quần áo,
                        TV màn hình phẳng và phòng tắm riêng biệt.Tất cả các phòng điều có
                        cửa sổ và tầm nhìn hướng đường phố và công viên, sân vườn Du khách
                        có thể thuê xe máy và xe hơi có tài xế tại chỗ nghỉ. <br />
                        <br />
                        Bến Nhà Rồng và Bảo tàng Mỹ thuật đều nằm trong bán kính 7 km. Sân
                        bay gần nhất là sân bay quốc tế Tân Sơn Nhất, cách đó 12 km, và
                        khách sạn căn hộ này cung cấp dịch vụ đưa đón sân bay với một khoản
                        phụ phí. <br />
                        <br />
                        <b style="color: #68921f"> Chúng tôi sử dụng ngôn ngữ của bạn!</b>
                        <br />
                        <br /><b>The Royal Homies - Phú Mỹ Hưng</b> tọa lạc tại Nội khu Hưng
                        Gia 1, phường Tân Phong, quận 7. Khu dân dư đông đúc, an ninh thắt
                        chặt bởi đội ngủ bảo vệ Phú Mỹ Hưng. Trung tâm hành chính và tập
                        trung nhiều khu vui chơi giải trí, nhà hàng, quán ăn, quán cà phê,
                        siêu thị, chợ, trung tâm mua sắm, thương mại, cách Trung tâm Hội
                        nghị và Triển lãm Sài Gòn 1,3 km. Nơi lưu trú có tiện nghi nhà hàng
                        phục vụ món ăn và thức uống có trong thực đơn, quầy lễ tân làm việc
                        24 giờ và dịch vụ phòng đến 15 giờ chiều mỗi ngày, WiFi được lắp đặt
                        có thể sử dụng miễn phí trong toàn bộ khuôn viên.
                    </p>
                </div>
                <div class="text-last">
                    <strong>Tiện ích chỗ ở</strong>
                    <p>
                        - Wifi <br />
                        - TV <br />
                        - Điều hoà <br />
                        - Dầu gội, dầu xả <br />
                        - Giấy vệ sinh<br />
                        - Khăn tắm<br />
                        - Kem đánh răng<br />
                        - Xà phòng tắm<br />
                        - Máy sấy<br />
                        - Internet<br />
                        - Tiện ích bếp<br />
                        - Bếp điện<br />
                        - Lò vi sóng<br />
                        - Tủ lạnh<br />
                        - Tiện ích phòng<br />
                        - Ban Công<br />
                    </p>
                </div>
            </div>
            <div class="right">
                <div class="box-sidebar">
                    <form action="" method="post" enctype="multipart/form-data">
                        <?php
                        if (isset($_SESSION['success'])) {
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                        }
                        ?>

                        <!-- <img src="../img/anh_hs/<?php //echo $diadiem['anh_hs']; 
                                                        ?>" alt=""> -->
                        <p><?php //echo $diadiem['ten_hs'] 
                            ?></p>
                        <p><?php //echo $diadiem['ten_lp'] 
                            ?></p>
                        <p><?php //echo $diadiem['gioi_thieu'] 
                            ?></p>

                        <div class="text-box">
                            <strong><?php if ($diadiem['gia_km'] == '0') {
                                        $format_number_4 = number_format($diadiem['gia'], 0, ',', '.');
                                        echo  $format_number_4;
                                    } else {
                                        // $format_number_4 = number_format($diadiem['gia'], 0, ',', '.');
                                        // echo  $format_number_4 . 'vnđ/đêm';
                                        $format_number_3 = number_format($diadiem['gia_km'], 0, ',', '.');
                                        echo  $format_number_3;
                                    }
                                    ?></strong>
                            <span style="color: rgb(87, 84, 84)"> vnđ/đêm</span>
                        </div>
                        <div class="fo">
                            <!-- <form action="" method="post" enctype="multipart/form-data">

                        <label for="">Từ ngày</label>
                        <input type="date" name="ngay_den">
                        <label for="">đến</label>
                        <input type="date" name="ngay_ve">
                        <button type="submit" name="dat">Đặt phòng</button>
                    </form> -->

                            <input type="date" id="birthday" name="ngay_den" />
                            <i class="fas fa-arrow-right"></i>
                            <input type="date" id="birthday" name="ngay_ve" />

                        </div>
                        <div class="voucher">
                        </div>
                        <button type="submit" name="dat">Đặt<i class="fas fa-star"></i> Ngay</button>
                    </form>
                </div>
            </div>
        </main>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="../js/header.js"></script>
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->


    </html>
    <h2>Bình luận</h2>
    <div class="top3">
        <?php
        $ma_hs = $_GET['chitiet_dp'];
        $allbl = $usermodel->show_binhluan($ma_hs);
        // echo "<pre>";
        //         print_r($allbl);
        //         echo "</pre>";
        foreach ($allbl as $row) {
            echo "<p>Tên người bình luận: {$_SESSION['user']['ten_kh']}</p>";
            echo "<p>Ngày bình luận: {$row['ngay_bl']}</p>";
            echo "<p>Nội dung bình luận: {$row['noi_dung']}</p>";
            echo "--------------";
        }
        ?>
    </div>
    <?php
    if (isset($_SESSION['user'])) :
    ?>

        <?php
        if (isset($_POST['submit'])) {
            $noidung = $_POST['noi_dung'];
            $date = date('Y-m-d H:i');
            $usermodel->insert_binhluan($noidung, $ma_hs, $_SESSION['user']['ma_kh'], $date);
        }
        ?>
        <form action="" method="post">
            <label for="binh_luan">Bình luận</label>
            <input type="text" name="noi_dung" id="binh_luan"> <br>
            <input type="submit" name="submit" value="Gửi">

        </form>
    <?php endif; ?>
<?php
endif;
?>
<?php include_once "../dau_cuoi/footer.php"; ?>