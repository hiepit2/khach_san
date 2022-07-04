<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="shortcut icon" href="../img/logo/logoo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="../css/header_and_footer.css">
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
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../js/header.js"></script>

</html>