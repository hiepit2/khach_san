<?php //include_once "../class/class.php"; 
?>
<?php //include_once "../dau_cuoi/header.php"; 
?>
<?php
//$list_product = new user_class();
?>

<form action="" class="menu2">
    <div class="row">
        <?php
        // $users = $list_product->show_diadiem();
        // foreach ($users as $rows) {
        ?>
        <!-- <div class="image">
                <a href="chitiet_dd.php?chitiet_dd=<?php echo $row['ma_dd']; ?>"><img src="../img/anh_dd/<?php echo $rows['anh_dd']; ?>" alt=""></a>
                <p style="font-weight: bolder; font-size: 20px"><?php echo $rows['ten_dd'] ?> </p>
                
            </div> -->
        <?php
        //}

        ?>
    </div>

</form>
<?php //include_once "../dau_cuoi/footer.php"; 
?>
<?php include_once "../class/class.php"; ?>
<?php
$list_product = new user_class();
?>
<?php include_once "../dau_cuoi/header.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HomeStay</title>
    <link rel="shortcut icon" href="../img/logo/logoo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/show_dd.css">
</head>

<body>
    <main>
        <section>
            <div class="box-t">
                <div class="container">
                    <div class="title-r">
                        <h1>Danh địa điểm</h1>
                    </div>
                    <div class="select-price">
                        <!-- <select name="" id="">
                            <option value="0" selected>Sắp xếp theo</option>
                            <option value="1">Giá từ cao đến thấp</option>
                            <option value="2">Giá từ thấp đến cao</option>
                        </select> -->
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
                    $users = $list_product->show_diadiem();
                    foreach ($users as $rows) {
                    ?>
                        <div class="item">
                            <a href="../dia_diem/chitiet_dd.php?chitiet_dd=<?php echo $rows['ma_dd']; ?>"><img src="../img/anh_dd/<?php echo $rows['anh_dd']; ?>" alt=""></a>
                            <div class="title-item-homestay">
                                <h3 class="title-item"><?php echo $rows['ten_dd'] ?></h3>
                                <!-- <span class="info-item"></span> <br>
                                <span class="info-item"></span> <br>
                                <span style="padding-top: 5px; font-size: 15px; color: red;">Giảm giá 10%</span>
                                <span class="price-item" style="display: block;">
                                        <h4 style="text-decoration-line:line-through; color:black">                                        
                                        </h4>
                                </span> -->
                                <!-- <button class="btn-item" type="submit">Đặt ngay</button> -->
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
<script src="../js/show_dd.js"></script>

</html>
<?php include_once "../dau_cuoi/footer.php";
?>