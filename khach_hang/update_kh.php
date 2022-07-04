<?php
session_start(); ?>
<?php include_once "../class/class.php"; ?>
<?php
$user = new user_class();
if (isset($_POST['submit_ud'])) {
    if ($_FILES['anh']['name'] == '') {
        $anh = $_POST['anh_cu'];
    } else {
        $anh = $_FILES['anh']['name'];
    }
    $email = $_POST['email'];
    $ten_kh = $_POST['ten_kh'];
    $mat_khau = $_POST['mat_khau'];
    $ma_kh = $_SESSION['user']['ma_kh'];
    $_SESSION['user']['anh'] = $anh;
    $_SESSION['user']['ten_kh'] = $ten_kh;
    $_SESSION['user']['email'] = $email;
    $_SESSION['user']['mat_khau'] = $mat_khau;
    $user->update_khachhang($anh, $email, $ten_kh, $mat_khau, $ma_kh);
    header("Location:thong_tin.php");
}
?>
<?php
if (isset($_GET['id'])) {
    $users = $user->show_khachhangtm($_GET['id']);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../css/update_kh.css">

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
        <div class="main">
            <form action="" method="post" enctype="multipart/form-data">
                <label for="">Ảnh</label> <br>
                <input type="file" name="anh" value=""><br>
                <input type="text" name="anh_cu" value="<?php echo $users['anh'] ?>" readonly><br>
                <label for="">Email</label> <br>
                <input type="text" name="email" value="<?php echo $users['email'] ?>"> <br>
                <label for="">Tên khách hàng</label> <br>
                <input type="text" name="ten_kh" value="<?php echo $users['ten_kh'] ?>"> <br>
                <label for="">Mật khẩu</label> <br>
                <input type="text" name="mat_khau" value="<?php echo $users['mat_khau'] ?>"> <br>
                <p>
                    <button type="submit" name="submit_ud">Cập nhật</button>
                </p>
            </form>
        </div>
    </body>

    </html>
<?php

}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- <script src="../js/script.js"></script> -->
<script src="../js/header.js"></script>
<?php include_once "../dau_cuoi/footer.php" ?>