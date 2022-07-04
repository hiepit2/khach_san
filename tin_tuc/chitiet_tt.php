<?php
include_once "../class/class.php";
include_once "../dau_cuoi/header.php";
?>
<?php
$usermodel = new user_class();
if (isset($_GET['chitiet_tt'])) :
    $tintuc = $usermodel->show_tintuctm($_GET['chitiet_tt']);
    // echo "<pre>";
    //     print_r($diadiem);
    //     echo "</pre>";
?>
    <div class="main">
        <div class="top1">
            <img src="../img/anh_tt/<?php echo $tintuc['anh_tin']; ?>" alt="">
        </div>
        <div class="top2">
            <p class="tt_top">Tên tin: <?php echo $tintuc['ten_tin'] ?></p>
            <i class="tt_main"><b style="font-size: 16px;">Ngày đăng:</b> <?php echo $tintuc['ngay_tin'] ?></i>
            <p><b style="font-size: 18px;">Giới thiệu:</b> <?php echo $tintuc['gioi_thieu'] ?></p>
        </div>
    </div>
<?php
endif;
?>
<?php
include_once "../dau_cuoi/footer.php";
?>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    .main {
        /* background-color: red; */
        width: 1200px;
        /* text-align: center; */
        margin: 0 auto;


    }

    .top1 img {
        width: 600px;
        /* height: 600px; */
        margin-top: 80px;
        margin-left: 300px;

    }

    .tt_top {
        font-size: 25px;
        font-weight: 600;
        padding-top: 20px;
    }

    .tt_main {
        padding-top: 30px;

    }
</style>