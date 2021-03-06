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
                //     alert('B???n ??ang ??? homestay n??y!');
                //     </script>";
            }
        }
        else {
            echo "<script>
            alert('B???n ???? ?????t homestay n??y r???i!!!');
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
    <title>Trang Ch???</title>
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
                    <li><a href="../khach_hang/sign_up.php">????ng k??</a></li>
                    <li><span class="line"></span></li>
                    <?php if (!isset($_SESSION['user'])) :  ?>
                        <li><a href="../khach_hang/sign_in.php">????ng nh???p</a></li>
                    <?php else : ?>
                        <a href="../khach_hang/formdx.php"> ????ng xu???t</a>
                        <li><span class="line "></span></li>
                        <a href="../khach_hang/thong_tin.php"> T??i kho???n</a>
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
                        <li><a href="../adminn/index.php">Trang Ch???</a></li>
                        <li><a href="../homestay/show_dp.php">?????t Ph??ng</a></li>
                        <li><a href="../tin_tuc/show_tt.php">Tin T???c</a></li>
                        <li><a href="../dia_diem/show_dd.php">?????a ??i???m</a></li>
                        <li><a href="../dau_cuoi/support.php">Tr??? Gi??p</a></li>
                    </ul>
                </nav>
                <div class="icon">
                    <div class="search-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <form class="search-input" action="../dau_cuoi/tim_kiem_tt.php">
                        <input type="text" placeholder="B???n c???n t??m g?? ?" name="name">
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
                    <span class="checkout-progress-step text-green">1. Th??ng tin ?????t ch???</span>
                    <i class="fas fa-chevron-right"></i>
                    <span class="checkout-progress-step">2. X??c nh???n v?? thanh to??n</span>
                </div> -->
                <!-- <div class="box-login">
                        <h3>????ng nh???p v?? t???n h?????ng quy???n l???i c???a Th??nh vi??n!</h3>
                        <span>????ng k?? th??nh vi??n Luxstay, tr???i nghi???m ?????t ph?? - ?????t ph??ng nhanh h??n, ??u ????i nhi???u h??n n???a.</span>
                        <button type="submit">????ng nh???p ngay</button>
                </div> -->
                <div class="title-book-homestay">
                    <h2>Th??ng tin ?????t ch???</h2>
                </div>
                <div class="type-homestay">
                    <h5>Lo???i ph??ng</h5>
                    <p><?php echo $_SESSION['cart']['ten_lp']; ?></p>
                </div>
                <div class="time-book-homestay">
                    <h5>Th???i gian ?????t ph??ng</h5>
                    <p><?php echo $_SESSION['cart']['ngay_dat']; ?></p>
                </div>
                <div class="box-check-in-out">
                    <div class="check-in-date">
                        <hr class="line-green">
                        <span>Nh???n ph??ng</span>
                        <p><?php echo $_SESSION['cart']['ngay_den']; ?></p>
                    </div>

                    <div class="check-out-date">
                        <hr class="line-orange">
                        <span>Tr??? ph??ng</span>
                        <p><?php echo $_SESSION['cart']['ngay_ve']; ?></p>
                    </div>
                </div>

                <div class="rulers-text">
                    <h5>Tr??ch nhi???m v???t ch???t</h5>
                    <span>Kh??ch h??ng ch???u m???i tr??ch nhi???m thi???t h???i v??? t??i s???n ???? g??y ra t???i ch??? ??? trong th???i gian l??u tr??.</span>
                </div>

                <div class="rulers-text">
                    <h5>N???i quy ch??? ???</h5>
                    <span>H???n ch??? l??m ???n sau 10 gi??? t???i. Kh??ng h??t thu???c ??? khu v???c chung.</span>
                </div>

                <div class="title-your-information">
                    <h2>Th??ng tin c???a b???n</h2>
                </div>

                <form action="" method="post">
                    <div class="form-group">
                        <label>* T??n Kh??ch h??ng</label>
                        <input type="text" name="ten_kh" value="<?php echo $ten_kh ?>">
                    </div>
                    <div class="form-group">
                        <label>* S??? ??i???n tho???i</label>
                        <input type="text" name="sdt" value="<?php echo $sdt ?>">
                    </div>
                    <div class="form-group">
                        <label>* ?????a ch???</label>
                        <input type="text" name="dia_chi">
                    </div>
                    <div class="form-group">
                        <label>M?? khuy???n m??i</label>
                        <input type="text" name="ma_km">
                    </div>
                    <div class="btn-submit-book">
                        <button type="submit" name="dat_phong">?????t ph??ng</button>
                    </div>
                </form>

            </article>
            <aside>
                <div class="title-details-homestay">
                    <h2>Chi ti???t ?????t ph??ng</h2>
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
                            <span class="total">T???ng ti???n</span>
                            <span class="price"><?php $format_number_4 = number_format($_SESSION['cart']['tong_tien'], 0, ',', '.');
                                                echo  $format_number_4;      ?> vn??</span>
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