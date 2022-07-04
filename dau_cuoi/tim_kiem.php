<?php include_once "../class/class.php"; ?>
<?php include_once "../dau_cuoi/header.php"; ?>
<?php
$list = new user_class();
if (isset($_POST['ma_dd'])) {
    // echo $_POST['ma_dd'];
    // echo $_POST['ma_lp'];
    // echo $_POST['gia'];
    $user = $list->tim_kiem($_POST['ma_dd'], '', '');
    if (!empty($_POST['ma_lp'])) {
        if (!empty($_POST['gia'])) {
            $user = $list->tim_kiem($_POST['ma_dd'], $_POST['ma_lp'], $_POST['gia']);
        } else {
            $user = $list->tim_kiem($_POST['ma_dd'], $_POST['ma_lp'], '');
        }
    } else {

        if (!empty($_POST['gia'])) {
            $user = $list->tim_kiem($_POST['ma_dd'], '', $_POST['gia']);
        } else {
            if (!empty($_POST['gia'])) {
                $user = $list->tim_kiem($_POST['ma_dd'], '', '');
            }
        }
    } ?>
<?php
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HomeStay</title>
    <link rel="shortcut icon" href="img/logoo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/room.css">
</head>

<body>
    <main>
        <section>
            <div class="box-t">
                <div class="container">
                    <div class="title-r">
                        <h1>Danh sách phòng</h1>
                    </div>
                    <div class="select-price">
                        <select name="" id="">
                            <option value="0" selected>Sắp xếp theo</option>
                            <option value="1">Giá từ cao đến thấp</option>
                            <option value="2">Giá từ thấp đến cao</option>
                        </select>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <!-- <div class="homestay"> -->
                <div class="homestay-item">

                    <!-- <form action="" class="menu2"> -->
                    <?php
                    foreach ($user as $rows) {
                    ?>

                        <div class="item">
                            <a href="../homestay/chitiet_dp.php?chitiet_dp=<?php echo $rows['ma_hs']; ?>"><img src="../img/anh_hs/<?php echo $rows['anh_hs']; ?>" alt=""></a>
                            <div class="title-item-homestay">
                                <h3 class="title-item"><?php echo substr($rows['ten_hs'], 0, 50) . '...'; ?></h3>
                                <span class="info-item"><?php echo $rows['ten_lp'] ?></span> <br>
                                <span class="info-item"><?php echo substr($rows['gioi_thieu'], 0, 100); ?></span> <br>
                                <!-- <span style="padding-top: 5px; font-size: 15px; color: red;"></span> -->
                                <span class="price-item" style="display: block;"><?php if ($rows['gia_km'] == '0') {
                                                                                        echo $rows['gia'] . 'đ/đêm';
                                                                                    } else { ?>
                                        <h4 style="text-decoration-line:line-through; color:black">
                                            <?php
                                                                                        $format_number_4 = number_format($rows['gia'], 0, ',', '.');
                                                                                        echo  $format_number_4 . 'đ/đêm' . '<br>'; ?>
                                        </h4>
                                    <?php
                                                                                        $format_number_3 = number_format($rows['gia_km'], 0, ',', '.');
                                                                                        echo  $format_number_3 . 'đ/đêm';
                                                                                    } ?>
                                </span>
                                <a href="chitiet_dp.php?chitiet_dp=<?php echo $rows['ma_hs']; ?>"><button class="btn-item" type="submit">Đặt ngay</button></a>
                            </div>

                        </div>
                    <?php
                    }
                    ?>
                    <!-- </form> -->
                </div>
                <!-- End homestay-item -->
                <!-- </div> -->

            </div>

        </section>
    </main>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../js/script1.js"></script>

</html>
<?php include_once "../dau_cuoi/footer.php";
?>