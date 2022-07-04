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
    <title>Main News</title>
    <link rel="shortcut icon" href="../img/logo/logoo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/main_news.css">
</head>
<body>
<main>
        <div class="container">
        <article>
            <div class="title-new-news">
                <h2>Bài viết mới</h2>
            </div>
        <?php
            $users = $list_product->show_tintuc();
            foreach ($users as $row) {
            //         echo "<pre>";
            // print_r($rows);
            // echo "</pre>";
        ?>
        <section>
            <a href="news_detail.html">
            <div class="img-new-news">
            <a href="chitiet_tt.php?chitiet_tt=<?php echo $row['ma_tin']; ?>"><img src="../img/anh_tt/<?php echo $row['anh_tin']; ?>" alt=""></a>
            </div>
            <div class="content-new-news">
                <h3><?php echo $row['ten_tin'] ?></h3>
                <span><?php echo $row['ngay_tin'] ?></span>
                
                <p><?php echo substr($row['gioi_thieu'], 0, 120); ?></p>
            </div>
        </a>
        </section>
        <?php } ?>
        <!-- End section -->
        </article>
        <!-- End article -->
        <aside>
            <div class="title-hot-news">
                <h2>Bài viết nổi bật</h2>
            </div>
        <?php
            $show = $list_product->show_tintuclimit();
            foreach ($show as $rows) {
            //         echo "<pre>";
            // print_r($rows);
            // echo "</pre>";
        ?>      
            <section>
                <div class="img-hot-news">
                <a href="chitiet_tt.php?chitiet_tt=<?php echo $rows['ma_tin']; ?>"><img src="../img/anh_tt/<?php echo $rows['anh_tin']; ?>" alt=""></a>
                </div>
                <div class="content-hot-news">
                    <h3><?php echo substr($rows['ten_tin'], 0, 50); ?></h3>
                    <span><?php echo $rows['ngay_tin'] ?></span>
                </div>
            </section>
        <?php } ?>
            <!-- End section -->
        </aside>
    </div>
    </main>
</body>
</html>