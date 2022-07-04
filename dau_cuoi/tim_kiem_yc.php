<!-- <?php //include_once "../class/class.php"; ?>
<?php
//$list = new user_class();
//$diadiem = $list->show_diadiem();
//$homestay = $list->show_homestay();
?>

<form action="../dau_cuoi/tim_kiem.php" method="post">
    <select name="ma_dd" id="">
        <option value=""></option>
        <?php //foreach ($diadiem as $row) { ?>
            <option value="<?php //echo $row['ma_dd'] ?>"><?php //echo $row['ten_dd'] ?></option>
        <?php
        //} ?>
    </select>
    <select name="ma_hs" id="">
        <option value=""></option>
        <?php //foreach ($homestay as $row) { ?>
            <option value="<?php //echo $row['ma_hs'] ?>"><?php //echo $row['ten_hs'] ?></option>

        <?php

        //} ?>
    </select>
    <input type="text" name="gia_lp">
    <button type="submit" name="tim">Tìm kiếm</button>
</form> -->
<?php include_once "../class/class.php"; ?>
<?php
$list = new user_class();
$diadiem = $list->show_diadiem();
$loaiphong = $list->show_loaiphong();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm nhanh</title>
    <link rel="stylesheet" href="../css/quick_search.css">
</head>

<body>
    <div class="search-box">
        <div class="container">
            <div class="title-search">
                <h3>Tìm phòng nhanh</h3>
            </div>
            <form action="../dau_cuoi/tim_kiem.php" class="quick-search" method="post">
                <div class="img-search">
                    <img src="../img/slider/file.png" alt="">
                </div>

                <div class="box-search">
                    <h3>TÌM PHÒNG PHÙ HỢP VỚI BẠN</h3>
                    <div class="item-search">
                        <div class="col-items" style="margin-right: 50px;">
                            <div class="location-house">
                                <select name="ma_dd" id="">
                                    <option selected>Chọn địa điểm</option>
                                    <?php foreach ($diadiem as $row) { ?>
                                        <option value="<?php echo $row['ma_dd'] ?>"><?php echo $row['ten_dd'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <!-- End location-house -->
                            <div class="room-type">
                                <select name="ma_lp" id="">
                                    <option value="">Chọn loại phòng</option>
                                    <?php foreach ($loaiphong as $row) { ?>
                                        <option value="<?php echo $row['ma_lp'] ?>"><?php echo $row['ten_lp'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <!-- End number-people -->
                        </div>
                        <!-- End col-item -->
                        <div class="col-items">
                            <div class="room-price">
                                <input type="text" name="gia" placeholder="Nhập số tiền">
                            </div>
                            <!-- End room-price -->
                            <div class="search-btn">
                                <button type="submit" name="tim">Tìm kiếm</button>
                            </div>
                        </div>
                        <!-- End col-item -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>