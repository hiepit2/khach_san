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
    <title>Slider News</title>
    <link rel="shortcut icon" href="../img/logo/logoo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="../css/slider_news.css">
</head>
<body>
<div class="slide-show">
        <div class="container">
            <div class="news-slider">
            <?php
                $users = $list_product->show_tintuclimit();
                foreach ($users as $row) {
                //         echo "<pre>";
                // print_r($rows);
                // echo "</pre>";
            ?>
                        <div class="news-item-slider">
                            <div class="news-img-slider">
                            <a href="chitiet_tt.php?chitiet_tt=<?php echo $row['ma_tin']; ?>"><img src="../img/anh_tt/<?php echo $row['anh_tin']; ?>" alt=""></a>
                            </div>
                            <div class="news-content-slider">
                                <h3><?php echo substr($row['ten_tin'], 0, 50); ?></h3>
                                <time><?php echo $row['ngay_tin'] ?></time>
                            </div>
                        </div>
            <?php } ?>
                        <!-- End news-item -->
                    </div>
                </div>
    </div>
    <!-- End slide-show -->
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="../js/slider_news.js"></script>
</html>