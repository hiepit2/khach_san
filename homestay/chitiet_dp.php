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
    // echo "<pre>";
    // print_r($diadiem);
    // echo "</pre>";
    if (isset($_POST['dat'])) {
        $ma_kh = '';
        $ma_km = '';
        date_default_timezone_set('ASIA/HO_CHI_MINH');
        $ngay_dat = date('Y-m-d H:i:s');
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
            // var_dump($songay);
            // echo $gia;
            $_SESSION['cart'] = [
                'ngay_dat' => $ngay_dat,
                'ngay_den' => $_POST['ngay_den'],
                'ngay_ve' => $_POST['ngay_ve'],
                'tong_tien' => $tong_tien,
                'ma_lp' => $diadiem['ma_lp'],
                'ma_hs' => $diadiem['ma_hs'],
                'ten_lp' => $diadiem['ten_lp'],
                'anh_hs' => $diadiem['anh_hs'],
                'ten_hs' => $diadiem['ten_hs'],
                'ma_hs' => $_GET['chitiet_dp'],
            ];
        } else {
            $gia = $diadiem['gia_km'];
            $tong_tien = $gia * ($songay - 1);
            $_SESSION['cart'] = [
                'ngay_dat' => $ngay_dat,
                'ngay_den' => $_POST['ngay_den'],
                'ngay_ve' => $_POST['ngay_ve'],
                'tong_tien' => $tong_tien,
                'ma_lp' => $diadiem['ma_lp'],
                'ma_hs' => $diadiem['ma_hs'],
                'ten_lp' => $diadiem['ten_lp'],
                'anh_hs' => $diadiem['anh_hs'],
                'ten_hs' => $diadiem['ten_hs'],
                'ma_hs' => $_GET['chitiet_dp'],
            ];
        }

        if ($_POST['ngay_den'] == '' || $_POST['ngay_ve'] == '' || strtotime($_POST['ngay_den']) >= strtotime($_POST['ngay_ve']) || $_POST['ngay_den'] < $ngay_dat) {
            echo " ";
        } else {
            header('Location:../thanh_toan/thanh_toan.php');
            exit();
        }
        // echo $diadiem['ma_lp'];
        // echo $_SESSION['cart']['ma_lp'];

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
        <link rel="stylesheet" href="../css/homestay_details.css">
        <!-- <style>
            .news-img-slider img {
                height: 370px;
            }
        </style> -->
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
                            <li><a href="../dau_cuoi/support.php">Trợ Giúp</a></li>
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
                        <a href="../thanh_toan/ad.php"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                </div>
            </div>
        </header>
        <!-- End header -->
        <main>
            <section>
                <div class="box-b">
                    <div class="container">
                        <div class="img-homestay">
                            <img src="../img/anh_hs/<?php echo $diadiem['anh_hs']; ?>" alt="">
                        </div>
                        <div class="order">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="price">
                                    <h2 class="number-price">
                                        <?php if ($diadiem['gia_km'] == '0') {
                                            $format_number_4 = number_format($diadiem['gia'], 0, ',', '.');
                                            echo  $format_number_4;
                                        } else {
                                            // $format_number_4 = number_format($diadiem['gia'], 0, ',', '.');
                                            // echo  $format_number_4 . 'vnđ/đêm';
                                            $format_number_3 = number_format($diadiem['gia_km'], 0, ',', '.');
                                            echo  $format_number_3;
                                        }
                                        ?>
                                    </h2><span>vnđ/đêm</span>
                                </div>
                                <div class="time">
                                    <input type="date" name="ngay_den" id="" class="first">
                                    <span>đến</span>
                                    <input type="date" name="ngay_ve" id="" class="last">
                                </div>
                                <div class="type">
                                    <?php ?>
                                    <!-- <select name="" id="">
                                    <option value="0" selected>Chọn loại phòng</option>
                                    <option value="1">1 người</option>
                                    <option value="2">2 người</option>
                                </select> -->
                                </div>
                                <div class="voucher">
                                    <!-- <select name="" id="">
                                    <option value="0" selected>Chọn voucher (nếu có)</option>
                                    <option value="1">Giảm 10%</option>
                                    <option value="2">Giảm 20%</option>
                                </select> -->
                                </div>
                                <div class="btn-order">
                                    <button type="submit" name="dat">Đặt <i class="fas fa-star"></i> ngay</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="box-content">
                    <div class="container">
                        <div class="title-homestay">
                            <h1><?php echo $diadiem['ten_hs'] ?></h1>
                        </div>
                        <div class="content-homestay">
                            <div class="address">
                                <!-- <i class="fas fa-map-marker-alt"></i><span>Cầu Giấy, Hà Nội, Vietnam</span><a href="">Xem bản đồ</a> -->
                            </div>
                            <div class="content-detail">
                                <p><?php echo $diadiem['gioi_thieu'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="box-comment">
                    <div class="container">
                        <?php
                        if (isset($_SESSION['user'])) :
                        ?>

                            <?php
                            if (isset($_POST['submit'])) {
                                $noidung = $_POST['noi_dung'];
                                date_default_timezone_set('ASIA/HO_CHI_MINH');
                                $date = date('Y-m-d H:i');
                                $usermodel->insert_binhluan($noidung, $ma_hs, $_SESSION['user']['ma_kh'], $date);
                            }
                            ?>
                            <h4>Bình luận </h4>
                            <form action="" method="post">
                                <div class="comment">
                                    <textarea title="Nội dung" name="noi_dung" id="binh_luan" placeholder="Nội dung. Tối thiểu 15 ký tự *" minlength="15" required></textarea>
                                </div>
                                <div class="send-comment">
                                    <button type="submit" name="submit">GỬI BÌNH LUẬN
                                        <i class="fas fa-paper-plane" style="margin-right: 5px;"></i></button>
                                </div>
                            </form>
                        <?php endif; ?>
                        <div class="item-comment">
                            <h4>Khách hàng bình luận</h4>
                            <?php
                            $ma_hs = $_GET['chitiet_dp'];
                            $allbl = $usermodel->show_binhluan($ma_hs);
                            foreach ($allbl as $row) { ?>

                                <div class="avatar-and-name">
                                    <i class="fas fa-user-tie"></i>
                                    <h5><?php echo $row['ten_kh'] ?> </h5>

                                </div>
                                <div class="detail-comment">
                                    <p><?php echo $row['ngay_bl'] ?></p>
                                    <p><?php echo $row['noi_dung'] ?></p>
                                </div>

                            <?php } ?>
                        </div>
                        <!-- End item-comment -->
                    </div>
                </div>
            </section>
        </main>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="../js/header.js"></script>
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
<?php
endif;
?>
<?php include_once "../dau_cuoi/footer.php"; ?>