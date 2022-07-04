<!-- <?php //include_once "../class/class.php"; 
        ?>
<?php
//$list_product = new user_class();
?>

<form action="" class="menu2">
    <div class="row2">
    <h2>Tin tức nổi bật</h2>
        <?php
        //$users = $list_product->show_tintuclimit();
        //foreach ($users as $rows) {
        //         echo "<pre>";
        // print_r($rows);
        // echo "</pre>";
        ?>
            <div class="image">
                <a href="../tin_tuc/chitiet_tt.php?chitiet_tt=<?php //echo $rows['ma_tin']; 
                                                                ?>"><img src="../img/anh_tt/<?php //secho $rows['anh_tin']; 
                                                                                            ?>" alt=""></a>
                <p style="font-weight: bolder; font-size: 20px"><?php //echo $rows['ten_tin'] 
                                                                ?> </p>
                <p style="font-weight: bolder; font-size: 20px"><?php //echo $rows['ngay_tin'] 
                                                                ?> </p>
                <p style="font-weight: bolder; font-size: 20px"><?php //echo $rows['gioi_thieu'] 
                                                                ?> </p>
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
    <title>Tin tức nổi bật</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="../css/featured-news.css">
</head>

<body>
    <div class="featured-news-box">
        <div class="container">
            <div class="title-featured-news">
                <h2 style="margin: 40px 0;">Tin tức nổi bật</h2>
            </div>
            <!-- End title-featured-news -->
            <div class="featured-news-slider">
                <?php
                $users = $list_product->show_tintuclimit();
                foreach ($users as $rows) {
                    //         echo "<pre>";
                    // print_r($rows);
                    // echo "</pre>";
                ?>                   
                        <div class="featured-news" style="height: auto; margin-bottom: 50px;">
                            <a href="../tin_tuc/chitiet_tt.php?chitiet_tt=<?php echo $rows['ma_tin']; ?>"><img src="../img/anh_tt/<?php echo $rows['anh_tin']; ?>" alt=""></a>
                            <div class="title-item-featured-news">
                                <h3 class="title-item-news"><?php echo $rows['ten_tin'] ?></h3>
                                <p class="content-item"><?php echo substr($rows['gioi_thieu'], 0, 150) . '...' ?></p>
                                <div class="post-and-time">
                                    <div class="port-item"><i class="far fa-user"></i><span>Admin</span></div>
                                    <div class="time-item"><i class="far fa-clock"></i><span><?php echo $rows['ngay_tin'] ?></span></div>
                                </div>
                            </div>
                        </div>


                    
                <?php } ?>
                <!-- End featured-news-item -->
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="../js/featured-news.js"></script>

</html>