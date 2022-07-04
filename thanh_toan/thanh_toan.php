<?php
session_start();
include_once "../class/class.php"; ?>
<?php
$usermodel = new user_class();
$ten_kh = '';
$sdt = '';
if (isset($_SESSION['user'])) {
    $ten_kh = $_SESSION['user']['ten_kh'];
    $sdt = $_SESSION['user']['sdt'];
}
if (isset($_SESSION['user'])) {
    if (isset($_POST['dat_phong'])) {
        // echo "<pre>";
        // print_r($_SESSION['cart']);
        // echo "</pre>";
        $ma_kh = $_SESSION['user']['ma_kh'];
        $ngay_dat = $_SESSION['cart']['ngay_dat'];
        $ngay_den = $_SESSION['cart']['ngay_den'];
        $ngay_ve = $_SESSION['cart']['ngay_ve'];
        $ma_lp = $_SESSION['cart']['ma_lp'];
        $ma_hs = $_SESSION['cart']['ma_hs'];
        $ten_hs = $_SESSION['cart']['ten_hs'];
        $ten_lp = $_SESSION['cart']['ten_lp'];
        $tong_tien = $_SESSION['cart']['tong_tien'];
        $ten_kh = $_POST['ten_kh'];
        $sdt = $_POST['sdt'];
        $dia_chi = $_POST['dia_chi'];
        $ma_km = '1';
        $trang_thai = '0';
        $_SESSION['show_thanhtoan'] = [
            'ma_kh' => $ma_kh,
            'ngay_dat' => $ngay_dat,
            'ngay_den' => $ngay_den,
            'ngay_ve' => $ngay_ve,
            'ma_lp' => $ma_lp,
            'ten_hs' => $ten_hs,
            'ten_lp' => $ten_lp,
            'tong_tien' => $tong_tien,
            'ten_kh' => $ten_kh,
            'sdt' => $sdt,
            'dia_chi' => $dia_chi,
            'ma_km' => $ma_km,
        ];
        $result = '';
        $result = $usermodel->check_cart($ma_hs);
        date_default_timezone_set('ASIA/HO_CHI_MINH');
        $date = date('Y-m-d');
        if ($result == '') {
            $usermodel->insert_datphong($ma_kh, $ten_kh, $sdt, $dia_chi, $ngay_dat, $ngay_den, $ngay_ve, $ma_km, $trang_thai, $ma_hs, $tong_tien);
        }
        elseif($result != '' ){
            if($result['ngay_ve'] <$date){
                $usermodel->insert_datphong($ma_kh, $ten_kh, $sdt, $dia_chi, $ngay_dat, $ngay_den, $ngay_ve, $ma_km, $trang_thai, $ma_hs, $tong_tien);
            }
            else{
                echo "<script>
                //     alert('Bạn đang ở homestay này!');
                //     </script>";
            }
        }
        else {
            echo "<script>
            alert('Bạn đã đặt homestay này rồi!!!');
            </script>";
        }

        // echo "<pre>";
        // print_r($datphong);
        // echo "</pre>";
        // header('Location:../cam_on/cam_on.php');
        // exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="shortcut icon" href="../img/logo/logoo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/pay.css">
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
                    <li><span class="line"></span></li>
                    <?php if (!isset($_SESSION['user'])) :  ?>
                        <li><a href="../khach_hang/sign_in.php">Đăng nhập</a></li>
                    <?php else : ?>
                        <a href="../khach_hang/formdx.php"> Đăng xuất</a>
                        <li><span class="line "></span></li>
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
    <div class="container">
        <main>
            <article>
                <!-- <div class="checkout-progress">
                    <span class="checkout-progress-step text-green">1. Thông tin đặt chỗ</span>
                    <i class="fas fa-chevron-right"></i>
                    <span class="checkout-progress-step">2. Xác nhận và thanh toán</span>
                </div> -->
                <!-- <div class="box-login">
                        <h3>Đăng nhập và tận hưởng quyền lợi của Thành viên!</h3>
                        <span>Đăng ký thành viên Luxstay, trải nghiệm đột phá - Đặt phòng nhanh hơn, ưu đãi nhiều hơn nữa.</span>
                        <button type="submit">Đăng nhập ngay</button>
                </div> -->
                <div class="title-book-homestay">
                    <h2>Thông tin đặt chỗ</h2>
                </div>
                <div class="type-homestay">
                    <h5>Loại phòng</h5>
                    <p><?php echo $_SESSION['cart']['ten_lp']; ?></p>
                </div>
                <div class="time-book-homestay">
                    <h5>Thời gian đặt phòng</h5>
                    <p><?php echo $_SESSION['cart']['ngay_dat']; ?></p>
                </div>
                <div class="box-check-in-out">
                    <div class="check-in-date">
                        <hr class="line-green">
                        <span>Nhận phòng</span>
                        <p><?php echo $_SESSION['cart']['ngay_den']; ?></p>
                    </div>

                    <div class="check-out-date">
                        <hr class="line-orange">
                        <span>Trả phòng</span>
                        <p><?php echo $_SESSION['cart']['ngay_ve']; ?></p>
                    </div>
                </div>

                <div class="rulers-text">
                    <h5>Trách nhiệm vật chất</h5>
                    <span>Khách hàng chịu mọi trách nhiệm thiệt hại về tài sản đã gây ra tại chỗ ở trong thời gian lưu trú.</span>
                </div>

                <div class="rulers-text">
                    <h5>Nội quy chỗ ở</h5>
                    <span>Hạn chế làm ồn sau 10 giờ tối. Không hút thuốc ở khu vực chung.</span>
                </div>

                <div class="title-your-information">
                    <h2>Thông tin của bạn</h2>
                </div>

                <form action="" method="post">
                    <div class="form-group">
                        <label>* Tên Khách hàng</label>
                        <input type="text" name="ten_kh" value="<?php echo $ten_kh ?>">
                    </div>
                    <div class="form-group">
                        <label>* Số điện thoại</label>
                        <input type="text" name="sdt" value="<?php echo $sdt ?>">
                    </div>
                    <div class="form-group">
                        <label>* Địa chỉ</label>
                        <input type="text" name="dia_chi">
                    </div>
                    <div class="form-group">
                        <label>Mã khuyến mãi</label>
                        <input type="text" name="ma_km">
                    </div>
                    <div class="btn-submit-book">
                        <button type="submit" name="dat_phong">Đặt phòng</button>
                    </div>
                </form>

            </article>
            <aside>
                <div class="title-details-homestay">
                    <h2>Chi tiết đặt phòng</h2>
                </div>
                <div class="details-homestay">
                    <div class="box-1">
                        <div class="name-homestay">
                            <h4><?php echo $_SESSION['cart']['ten_hs'] ?></h4>
                        </div>
                        <div class="img-homestay">
                            <img src="../img/anh_hs/<?php echo $_SESSION['cart']['anh_hs'] ?>" alt="">
                        </div>
                    </div>

                    <div class="box-2">
                        <div class="date-book">
                            <i class="far fa-calendar-alt"></i>
                            <span class="date-in"><?php echo $_SESSION['cart']['ngay_den'] ?></span>
                            <span>-</span>
                            <span class="date-out"><?php echo $_SESSION['cart']['ngay_ve'] ?></span>
                        </div>
                    </div>

                    <div class="box-3">
                        <div class="total-price">
                            <span class="total">Tổng tiền</span>
                            <span class="price"><?php $format_number_4 = number_format($_SESSION['cart']['tong_tien'], 0, ',', '.');
                                                echo  $format_number_4;      ?> vnđ</span>
                        </div>
                    </div>
                </div>
            </aside>

        </main>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../js/header.js"></script>

</html>
<?php include_once "../dau_cuoi/footer.php" ?>
<style>

</style>