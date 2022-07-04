<!-- <?php //include_once "../class/class.php"; ?>
<?php //$list_product = new user_class(); ?>
<form action="" class="menu2">
    <div class="row">
        <h2>Địa điểm nổi bật</h2>
        <?php
        //$users = $list_product->show_diadiemlimit();
        //foreach ($users as $rows) {
        ?>
            <div class="image">
                <a href="../dia_diem/chitiet_dd.php?chitiet_dd=<?php //echo $row['ma_dd']; ?>"><img src="../img/anh_dd/<?php //echo $rows['anh_dd']; ?>" alt=""></a>
                <p style="font-weight: bolder; font-size: 20px"><?php //echo $rows['ten_dd'] ?> </p>

            </div>
        <?php
        //}
        ?>
    </div>
</form> -->
<?php include_once "../class/class.php"; ?>
<?php
$list_product = new user_class();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Địa đểm nổi bật</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="../css/prominent-place.css">
</head>
<body>
            <div class="prominent-place-box">
                <div class="container">
                    <div class="title-prominent-place" style="margin-top: 50px;">
                        <h2>Địa điểm nổi bật</h2>
                        <p style="margin-top: 10px;">Cùng Homestay Hanoi bắt đầu chuyến hành trình chinh phục thế giới
                            của bạn</p>
                    </div>
                    <!-- End title-prominent-place -->
                    <div class="prominent-place-slider">
                    <?php
                    $users = $list_product->show_diadiemlimit();
                    foreach ($users as $rows) {
                    ?>
                        <div class="prominent-place-item">
                            <div class="prominent-place">
                            <a href="../dia_diem/chitiet_dd.php?chitiet_dd=<?php echo $rows['ma_dd']; ?>"><img src="../img/anh_dd/<?php echo $rows['anh_dd']; ?>" alt=""></a>
                            </div>
                            <div class="title-item-prominent-place">
                                <h3><?php echo $rows['ten_dd'] ?></h3>
                                <span class="itm-number-room"
                                    style="margin-right: 5px; font-weight: bold;">268</span><span>Chỗ ở</span>
                            </div>
                        </div>
                        <?php } ?>
                        <!-- End prominent-place-item -->
                    </div>
                </div>
            </div>
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="../js/prominent-place.js"></script>
</html>