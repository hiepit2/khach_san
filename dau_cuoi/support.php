<?php include_once "../class/class.php"; ?>
<?php
$user = new user_class();
if (isset($_POST['uploadclick'])) {
    if ($_POST['sdt_ht'] == '') {
        echo "";
    } else {
        $insert_user = $user->insert_hoitro($_POST['ten_ht'], $_POST['sdt_ht'], $_POST['email_ht'], $_POST['noi_dung'],);
        echo $insert_user;
        header("Location:../adminn/index.php");
    }
}
?>
<?php include_once "../dau_cuoi/header.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="shortcut icon" href="img/logoo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/support.css">
</head>

<body>
    <main>
        <section>
            <div class="title-box">
                <div class="container">
                    <div class="title-item">
                        <h1>Hỗ trợ khách hàng</h1>
                    </div>
                </div>
            </div>
            <!-- End title-box -->
        </section>

        <section>
            <div class="map-and-form-box">
                <div class="container">
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2104.7305230816423!2d105.80969336808123!3d21.063725016658893!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aae6b094d043%3A0xc5339a4833d1affa!2zMTExIFBo4buRIFbhu4cgSOG7kywgWHXDom4gTGEsIFTDonkgSOG7kywgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1636789180762!5m2!1svi!2s" width="600" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <form action="" class="form-feedback" method="post" enctype="multipart/form-data">
                        <div class="text-title">
                            <h2>Hỗ trợ</h2>
                            <p>Hãy điền đủ thông tin chúng tôi sẽ sớm phản hồi bạn</p>
                        </div>
                        <div class="input-name">
                            <input type="text" placeholder="Họ và tên" name="ten_ht">
                            <ion-icon name="person-outline"></ion-icon>
                        </div>
                        <div class="input-phone-number">
                            <input type="text" placeholder="Số điện thoại" name="sdt_ht">
                            <ion-icon name="call-outline"></ion-icon>
                        </div>
                        <div class="input-email">
                            <input type="email" placeholder="Địa chỉ email" name="email_ht">
                            <ion-icon name="mail-outline"></ion-icon>
                        </div>
                        <div class="comment">
                            <textarea name="noi_dung" id="" cols="30" rows="10" placeholder="Nhập nội dung..."></textarea>
                        </div>
                        <button type="submit" class="btn-feedback" name="uploadclick">Gửi phản hồi</button>
                    </form>
                    <!-- End form-sign_in -->
                </div>
            </div>
        </section>

        <section>
            <div class="special-offers-box">
                <div class="container">
                    <div class="special-offers-item">
                        <div class="img-special-offers">
                            <img src="../img/loginAndSignUp/icon1.png" alt="">
                        </div>
                        <div class="text-special-offers">
                            <h3>Tích điểm nhanh chóng</h3>
                            <p>Tích điểm đối với mỗi lượt đặt chỗ thành công. Quy đổi thành Hanoi Credit để du
                                lịch nhiều hơn nữa.</p>
                        </div>
                    </div>
                    <!-- End special-offers-item -->
                    <div class="special-offers-item">
                        <div class="img-special-offers">
                            <img src="../img/loginAndSignUp/icon2.png" alt="">
                        </div>
                        <div class="text-special-offers">
                            <h3>Tiện ích thông minh</h3>
                            <p>Check-in và kiểm tra hóa đơn thanh toán kể cả khi không có kết nối mạng. Hoàn
                                tiền nhanh gọn. Đổi lịch dễ dàng.</p>
                        </div>
                    </div>
                    <!-- End special-offers-item -->
                    <div class="special-offers-item">
                        <div class="img-special-offers">
                            <img src="../img/loginAndSignUp/icon3.png" alt="">
                        </div>
                        <div class="text-special-offers">
                            <h3>Thanh toán đơn giản</h3>
                            <p>Phương thức thanh toán tiện lợi, an toàn. Tích hợp chức năng lưu thẻ để đặt phòng
                                lần sau.</p>
                        </div>
                    </div>
                    <!-- End special-offers-item -->
                    <div class="special-offers-item">
                        <div class="img-special-offers">
                            <img src="../img/loginAndSignUp/icon4.png" alt="">
                        </div>
                        <div class="text-special-offers">
                            <h3>Ưu đãi mỗi ngày</h3>
                            <p>Nhận thông báo ưu đãi từ Homestay hanoi khi có kế hoạch du lịch để lựa chọn và
                                đặt ngay cho mình một chỗ ở phù hợp, tiện nghi với giá tốt nhất.</p>
                        </div>
                    </div>
                    <!-- End special-offers-item -->
                </div>
            </div>
        </section>
    </main>
</body>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../js/script.js"></script>

</html>
<?php include_once "../dau_cuoi/footer.php" ?>