<!-- <?php //include_once "../class/class.php"; 
        ?>
<?php //$list_product = new user_class(); 
?>
<form action="" class="menu2">
    <div class="row">
        <h2>Homestay nổi bật</h2>
        <?php
        //$users = $list_product->show_homestaylimit();
        //foreach ($users as $rows) {
        //echo "<pre>";
        //print_r($rows);
        //echo "</pre>";
        ?>
            <div class="image">
                <a href="../homestay/chitiet_dp.php?chitiet_dp=<?php echo $rows['ma_hs']; ?>"><img src="../img/anh_hs/<?php echo $rows['anh_hs']; ?>" alt=""></a>
                <p><?php //echo $rows['ten_hs'] 
                    ?> </p>
                <p><?php //echo $rows['ten_lp'] 
                    ?> </p>
                <p><?php //echo $rows['gioi_thieu'] 
                    ?> </p>
                <?php //if ($rows['gia_km'] == '0') {
                //echo $rows['gia'];
                //} else {
                //     $format_number_4 = number_format($rows['gia'], 0, ',', '.');
                //     echo  $format_number_4 . 'vnđ/đêm';
                //     $format_number_3 = number_format($rows['gia_km'], 0, ',', '.');
                //     echo  $format_number_3 . 'vnđ/đêm';
                // }
                ?>
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
    <title>HomeStay nổi bật</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="../css/outstanding-homestay.css">
</head>

<body>
    <div class="outstanding-homestay-box">
        <div class="container">
            <div class="title-outstanding-homestay">
                <h2 style="margin-bottom: 40px;">Homestay nổi bật</h2>
            </div>
            <!-- End title-outstanding-homestay -->
            <div class="outstanding-homestay-slider">
                <?php
                $users = $list_product->show_homestaylimit();
                foreach ($users as $rows) {
                    //         echo "<pre>";
                    // print_r($rows);
                    // echo "</pre>";
                ?>
                    <div class="outstanding-homestay-item" style="height: 400px; margin-bottom: 10px;">
                        <div class="outstanding-homestay" style="height: 100%;">
                            <a href="../homestay/chitiet_dp.php?chitiet_dp=<?php echo $rows['ma_hs']; ?>"><img src="../img/anh_hs/<?php echo $rows['anh_hs']; ?>" alt=""></a>
                            <div class="title-item-outstanding-homestay">

                                <h3 class="title-item"><?php echo substr($rows['ten_hs'], 0, 50) .'...'; ?></h3>
                                <span class="info-item"><?php echo $rows['ten_lp'] ?></span>

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
                                                                                    } ?></span>
                                <a href="../homestay/chitiet_dp.php?chitiet_dp=<?php echo $rows['ma_hs']; ?>"><button class="btn-item" type="submit">Đặt ngay</button></a>
                                <!-- <button class="btn-item" type="submit">Đặt ngay</button> -->
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- End outstanding-homestay-item -->
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="../js/outstanding-homestay.js"></script>

</html>