<!-- <?php //include_once "../class/class.php"; ?>
<?php //include_once "../dau_cuoi/header.php"; ?>
<?php
//$list_product = new user_class();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin Tức</title>
    <link rel="shortcut icon" href="img/logoo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="../css/news.css">
</head>

<body>
    <form action="" class="menu2">
        <main>
            <div class="container">
                <article>
                    <div class="title-new-news">
                        <h2>Bài viết mới</h2>
                    </div>
                    <section>
                        <?php
                        //$users = $list_product->show_tintuc();
                        //foreach ($users as $rows) {
                            //         echo "<pre>";
                            // print_r($rows);
                            // echo "</pre>";
                        ?>
                            <a href="">
                                <div class="img-new-news">
                                    <a href="chitiet_tt.php?chitiet_tt=<?php //echo $rows['ma_tin']; ?>"><img src="../img/anh_tt/<?php echo $rows['anh_tin']; ?>" alt=""></a>
                                </div>
                                <div class="content-new-news">
                                    <h3><?php //echo $rows['ten_tin'] ?></h3>
                                    <span><?php //echo $rows['ngay_tin'] ?></span>
                                    <p><?php //echo $rows['gioi_thieu'] ?></p>
                                </div>
                            </a>
                        <?php //}
                        ?>
                    </section>
                    End section -->
                </article>
                <!-- End article -->
                <!-- <aside>
                    <div class="title-hot-news">
                        <h2>Bài viết nổi bật</h2>
                    </div>
                    <section>
                        <?php
                        //$users = $list_product->show_tintuclimit();
                        //foreach ($users as $row) { -->
                            //         echo "<pre>";
                            // print_r($rows);
                            // echo "</pre>";
                        ?>
                            <div class="img-hot-news">
                            <a href="chitiet_tt.php?chitiet_tt=<?php //echo $row['ma_tin']; ?>"><img src="../img/anh_tt/<?php echo $row['anh_tin']; ?>" alt=""></a>
                            </div>
                            <div class="content-hot-news">
                                <h3><?php //echo $row['ten_tin'] ?></h3>
                                <span><?php //echo $row['ngay_tin'] ?></span>
                                <p><?php //echo $row['gioi_thieu'] ?></p>
                            </div>
                        <?php //} ?>
                    </section>
                     End section -->
                </aside>
            </div>
        </main>
    </form>

</html>
<?php include_once '../dau_cuoi/header.php' ?>
<?php include_once '../tin_tuc/slider_news.php' ?>
<?php include_once '../tin_tuc/main_news.php' ?>
<?php include_once '../dau_cuoi/footer.php' ?>