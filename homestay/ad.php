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

    <label for="">T??? ng??y</label>
    <input type="date" name="ngay_den">
    <label for="">?????n</label>
    <input type="date" name="ngay_ve">
    <button type="submit" name="dat">?????t ph??ng</button>
</form> -->


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Chi ti???t ph??ng</title>
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
                        <li><a href="../khach_hang/sign_up.php">????ng k??</a></li>
                        <span class="line"></span>
                        <?php if (!isset($_SESSION['user'])) :  ?>
                            <li><a href="../khach_hang/sign_in.php">????ng nh???p</a></li>
                        <?php else : ?>
                            <a href="../khach_hang/formdx.php">????ng xu???t</a>
                            <span class="line "></span>
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
                            <li><a href="">Tr??? Gi??p</a></li>
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
                            <strong>C???u Gi???y, H?? N???i, Vietnam</strong>
                        </div>

                        <a style="text-decoration: none" href="https://www.google.com/maps/@9.779349,105.6189045,11z?hl=vi-VN">Xem b???n
                            ?????</a>
                    </div>
                    <div class="text2">
                        <i class="fas fa-home"></i>
                        <strong>C??n h??? d???ch v??? 55m <sub> &#178;</sub></strong>
                    </div>
                    <span>Ph??ng ri??ng <strong>??</strong> 1 Ph??ng t???m <strong>??</strong> 1
                        gi?????ng <strong>??</strong> 1 ph??ng ng??? <strong>??</strong> 2 kh??ch
                        (t???i ??a 2 kh??ch)
                    </span>
                </div>
                <div class="text-main">
                    <p>
                        <b>The Royal Homies - Ph?? M??? H??ng</b> t???a l???c t???i N???i khu H??ng Gia
                        1, ph?????ng T??n Phong, qu???n 7. Khu d??n d?? ????ng ????c, an ninh th???t ch???t
                        b???i ?????i ng??? b???o v??? Ph?? M??? H??ng. Trung t??m h??nh ch??nh v?? t???p trung
                        nhi???u khu vui ch??i gi???i tr??, nh?? h??ng, qu??n ??n, qu??n c?? ph??, si??u
                        th???, ch???, trung t??m mua s???m, th????ng m???i, c??ch Trung t??m H???i ngh??? v??
                        Tri???n l??m S??i G??n 1,3 km. N??i l??u tr?? c?? ti???n nghi nh?? h??ng ph???c v???
                        m??n ??n v?? th???c u???ng c?? trong th???c ????n, qu???y l??? t??n l??m vi???c 24 gi???
                        v?? d???ch v??? ph??ng ?????n 15 gi??? chi???u m???i ng??y, WiFi ???????c l???p ?????t c?? th???
                        s??? d???ng mi???n ph?? trong to??n b??? khu??n vi??n.
                        <br />
                        <br />
                        T???t c??? c??c ph??ng ???????c trang b??? m??y l???nh, l?? vi s??ng, b???p n???u ??n
                        ri??ng t???ng ph??ng, t??? l???nh, ???m ??un n?????c, ch???u v??? sinh, m??y s???y t??c v??
                        b??n l??m vi???c. T???i c??c ph??ng c???a kh??ch s???n ???????c trang b??? t??? qu???n ??o,
                        TV m??n h??nh ph???ng v?? ph??ng t???m ri??ng bi???t.T???t c??? c??c ph??ng ??i???u c??
                        c???a s??? v?? t???m nh??n h?????ng ???????ng ph??? v?? c??ng vi??n, s??n v?????n Du kh??ch
                        c?? th??? thu?? xe m??y v?? xe h??i c?? t??i x??? t???i ch??? ngh???. <br />
                        <br />
                        B???n Nh?? R???ng v?? B???o t??ng M??? thu???t ?????u n???m trong b??n k??nh 7 km. S??n
                        bay g???n nh???t l?? s??n bay qu???c t??? T??n S??n Nh???t, c??ch ???? 12 km, v??
                        kh??ch s???n c??n h??? n??y cung c???p d???ch v??? ????a ????n s??n bay v???i m???t kho???n
                        ph??? ph??. <br />
                        <br />
                        <b style="color: #68921f"> Ch??ng t??i s??? d???ng ng??n ng??? c???a b???n!</b>
                        <br />
                        <br /><b>The Royal Homies - Ph?? M??? H??ng</b> t???a l???c t???i N???i khu H??ng
                        Gia 1, ph?????ng T??n Phong, qu???n 7. Khu d??n d?? ????ng ????c, an ninh th???t
                        ch???t b???i ?????i ng??? b???o v??? Ph?? M??? H??ng. Trung t??m h??nh ch??nh v?? t???p
                        trung nhi???u khu vui ch??i gi???i tr??, nh?? h??ng, qu??n ??n, qu??n c?? ph??,
                        si??u th???, ch???, trung t??m mua s???m, th????ng m???i, c??ch Trung t??m H???i
                        ngh??? v?? Tri???n l??m S??i G??n 1,3 km. N??i l??u tr?? c?? ti???n nghi nh?? h??ng
                        ph???c v??? m??n ??n v?? th???c u???ng c?? trong th???c ????n, qu???y l??? t??n l??m vi???c
                        24 gi??? v?? d???ch v??? ph??ng ?????n 15 gi??? chi???u m???i ng??y, WiFi ???????c l???p ?????t
                        c?? th??? s??? d???ng mi???n ph?? trong to??n b??? khu??n vi??n.
                    </p>
                </div>
                <div class="text-last">
                    <strong>Ti???n ??ch ch??? ???</strong>
                    <p>
                        - Wifi <br />
                        - TV <br />
                        - ??i???u ho?? <br />
                        - D???u g???i, d???u x??? <br />
                        - Gi???y v??? sinh<br />
                        - Kh??n t???m<br />
                        - Kem ????nh r??ng<br />
                        - X?? ph??ng t???m<br />
                        - M??y s???y<br />
                        - Internet<br />
                        - Ti???n ??ch b???p<br />
                        - B???p ??i???n<br />
                        - L?? vi s??ng<br />
                        - T??? l???nh<br />
                        - Ti???n ??ch ph??ng<br />
                        - Ban C??ng<br />
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
                                        // echo  $format_number_4 . 'vn??/????m';
                                        $format_number_3 = number_format($diadiem['gia_km'], 0, ',', '.');
                                        echo  $format_number_3;
                                    }
                                    ?></strong>
                            <span style="color: rgb(87, 84, 84)"> vn??/????m</span>
                        </div>
                        <div class="fo">
                            <!-- <form action="" method="post" enctype="multipart/form-data">

                        <label for="">T??? ng??y</label>
                        <input type="date" name="ngay_den">
                        <label for="">?????n</label>
                        <input type="date" name="ngay_ve">
                        <button type="submit" name="dat">?????t ph??ng</button>
                    </form> -->

                            <input type="date" id="birthday" name="ngay_den" />
                            <i class="fas fa-arrow-right"></i>
                            <input type="date" id="birthday" name="ngay_ve" />

                        </div>
                        <div class="voucher">
                        </div>
                        <button type="submit" name="dat">?????t<i class="fas fa-star"></i> Ngay</button>
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
    <h2>B??nh lu???n</h2>
    <div class="top3">
        <?php
        $ma_hs = $_GET['chitiet_dp'];
        $allbl = $usermodel->show_binhluan($ma_hs);
        // echo "<pre>";
        //         print_r($allbl);
        //         echo "</pre>";
        foreach ($allbl as $row) {
            echo "<p>T??n ng?????i b??nh lu???n: {$_SESSION['user']['ten_kh']}</p>";
            echo "<p>Ng??y b??nh lu???n: {$row['ngay_bl']}</p>";
            echo "<p>N???i dung b??nh lu???n: {$row['noi_dung']}</p>";
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
            <label for="binh_luan">B??nh lu???n</label>
            <input type="text" name="noi_dung" id="binh_luan"> <br>
            <input type="submit" name="submit" value="G???i">

        </form>
    <?php endif; ?>
<?php
endif;
?>
<?php include_once "../dau_cuoi/footer.php"; ?>