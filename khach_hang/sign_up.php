<?php include_once "../class/class.php";
?>
<?php include_once "../dau_cuoi/header.php" ?>
<?php
$user = new user_class();
if (isset($_POST['uploadclick'])) {
    $mat_khau = $_POST['mat_khau'];
    $mat_khau_nl = $_POST['mat_khau_nl'];
    if ($_POST['ten_kh'] == '' || $_POST['sdt'] == '' || $_POST['email'] == '' || $_POST['mat_khau'] == '' || $_POST['mat_khau_nl'] == '') {
        echo "";
    } elseif (strlen($mat_khau) < 8) {
        echo "";
    }
    elseif (strlen($sdt) != 10) {
        echo "";
    } elseif ($mat_khau != $mat_khau_nl) {
        echo "";
    } else {
        $insert_user = $user->insert_khachhang($_POST['ten_kh'], $_POST['sdt'], $_POST['email'], $_POST['mat_khau']);
        echo $insert_user;
        header("Location:../khach_hang/sign_in.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link rel="shortcut icon" href="img/logoo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/sign_up.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>
    <main>
        <section>
            <div class="title-box">
                <div class="container">
                    <div class="title-item">
                        <h1>Đăng ký thành viên Homestay Hanoi - Tích điểm thưởng và nhận ưu đãi</h1>
                    </div>
                    <div class="title-item">
                        <p>Nhanh chóng, tiện lợi và an toàn. Đăng ký liền tay, rinh ngay quyền lợi.</p>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="content-and-form-box">
                <div class="container">
                    <div class="content">
                        <div class="content-row">
                            <div class="content-item">
                                <div class="img-content">
                                    <img src="../img/loginAndSignUp/icon1.png" alt="">
                                </div>
                                <div class="text-content">
                                    <h3>Tích điểm nhanh chóng</h3>
                                    <p>Tích điểm đối với mỗi lượt đặt chỗ thành công. Quy đổi thành Hanoi Credit để du
                                        lịch nhiều hơn nữa.</p>
                                </div>
                            </div>
                            <!-- End content-item -->
                            <div class="content-item">
                                <div class="img-content">
                                    <img src="../img/loginAndSignUp/icon2.png" alt="">
                                </div>
                                <div class="text-content">
                                    <h3>Tiện ích thông minh</h3>
                                    <p>Check-in và kiểm tra hóa đơn thanh toán kể cả khi không có kết nối mạng. Hoàn
                                        tiền nhanh gọn. Đổi lịch dễ dàng.</p>
                                </div>
                            </div>
                            <!-- End content-item -->
                        </div>
                        <!-- End content-row -->
                        <div class="content-row">
                            <div class="content-item">
                                <div class="img-content">
                                    <img src="../img/loginAndSignUp/icon3.png" alt="">
                                </div>
                                <div class="text-content">
                                    <h3>Thanh toán đơn giản</h3>
                                    <p>Phương thức thanh toán tiện lợi, an toàn. Tích hợp chức năng lưu thẻ để đặt phòng
                                        lần sau.</p>
                                </div>
                            </div>
                            <!-- End content-item -->
                            <div class="content-item">
                                <div class="img-content">
                                    <img src="../img/loginAndSignUp/icon4.png" alt="">
                                </div>
                                <div class="text-content">
                                    <h3>Ưu đãi mỗi ngày</h3>
                                    <p>Nhận thông báo ưu đãi từ Homestay hanoi khi có kế hoạch du lịch để lựa chọn và
                                        đặt ngay cho mình một chỗ ở phù hợp, tiện nghi với giá tốt nhất.</p>
                                </div>
                            </div>
                            <!-- End content-item -->
                        </div>
                        <!-- End content-row -->
                    </div>
                    <form action="" class="form-sign-up" method="post" enctype="multipart/form-data">
                        <div class="text-title">
                            <h2>Đăng ký thành viên</h2>
                        </div>
                        <div class="input-name">
                            <h4>Họ và tên</h4>
                            <input type="text" name="ten_kh">
                            <ion-icon name="person-outline"></ion-icon>
                        </div>
                        <div class="input-phone-number">
                            <h4>Số điện thoại</h4>
                            <input type="text" name="sdt" length="10" required>
                            <ion-icon name="call-outline"></ion-icon>
                        </div>
                        <div class="input-email">
                            <h4>Địa chỉ email</h4>
                            <input type="email" name="email">
                            <ion-icon name="mail-outline"></ion-icon>
                        </div>
                        <div class="input-password">
                            <h4>Mật khẩu</h4>
                            <input type="password" name="mat_khau" minlength="8" required>
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </div>
                        <div class="input-re-password">
                            <h4>Nhập lại mật khẩu</h4>
                            <input type="password" name="mat_khau_nl">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </div>
                        <button type="submit" class="btn-sign-up" name="uploadclick">Đăng ký</button>
                        <div class="text-sign-in">
                            <span>Bạn đã có tài khoản ?</span><a href="#">Đăng nhập</a>
                        </div>
                        <div class="text-terms">
                            <p>Tôi đồng ý với <strong>Bảo mật</strong> và <strong>Điều khoản hoạt động</strong> của Homestay Hanoi</p>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

</html>
<?php include_once "../dau_cuoi/footer.php" ?>