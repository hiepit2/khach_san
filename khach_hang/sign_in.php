<?php

include_once "../class/class.php"; ?>
<?php include_once "../dau_cuoi/header.php" ?>
<?php
$error = '';
if (isset($_POST['uploadclick'])) {
    $email = $_POST['email'];
    $pass = $_POST['mat_khau'];
    if (empty($email) || empty($pass)) {
        $error = "Phải nhập email hoặc password";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Sai định dạng email";
        echo $error;
    }
    if (empty($error)) {
        $user_model = new user_class();
        $user = $user_model->get_user($email, $pass);
        // echo "<pre>";
        // print_r($user);
        // echo "</pre>";
        $_SESSION['user'] = $user;

        if (empty($user)) {
            $error = "";
        } elseif ($_SESSION['user']['vai_tro'] == 1) {
            header("Location:../admin/admin.php");
        } else {
            $_SESSION['success'] = "";
            header("Location:../adminn/index.php");
            exit();
        }
    }
}
?>
<h3 style="color: red;"><?php echo $error; ?></h3>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="img/logoo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/sign_in.css">
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
            <!-- End title-box -->
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
                    <form action="" class="form-sign-in" method="post">
                        <div class="text-title">
                            <h2>Đăng nhập</h2>
                            <p>Đăng nhập Homestay Hanoi để trải nghiệm</p>
                        </div>
                        <div class="input-email">
                            <input type="email" placeholder="Địa chỉ email" name="email" id="email">
                            <ion-icon name="mail-outline"></ion-icon>
                        </div>
                        <div class="input-password">
                            <input type="password" placeholder="Mật khẩu" name="mat_khau" id="mat_khau">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </div>
                        <button type="submit" class="btn-sign-in" name="uploadclick">Đăng nhập</button>
                        <div class="text-forgot">
                            <span>Quên mật khẩu ?</span><a href="#">Nhấn vào đây</a>
                        </div>
                        <div class="text-sign-up">
                            <span>Bạn chưa có tài khoản ?</span><a href="#">Đăng ký ngay</a>
                        </div>
                        <div class="or"><span>Hoặc</span></div>
                        <div class="btn-facebook">
                            <button>Đăng nhập với Facebook</button><img src="../img/loginAndSignUp/facebook.png" alt="">
                        </div>
                        <div class="btn-google">
                            <button>Đăng nhập với Google</button><img src="../img/loginAndSignUp/google.png" alt="">
                        </div>
                    </form>
                    <!-- End form-sign_in -->
                </div>
            </div>
        </section>
    </main>

</html>
<?php include_once "../dau_cuoi/footer.php" ?>