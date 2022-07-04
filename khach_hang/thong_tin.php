<?php include_once "../dau_cuoi/header.php"; ?>
<?php
// echo "<pre>";
// print_r($_SESSION['user']);
// echo "</pre>";
if (isset($_SESSION['user'])) :

?>
    <link rel="stylesheet" href="../css/thong_tin.css">
    <div class="main">
        <div class="img">
            <!-- <label for="">Ảnh</label> -->
            <!-- <img src="../img/anh_kh/anh.png" alt=""> -->
            <img src="../img/anh_kh/<?php echo "{$_SESSION['user']['anh']}" ?>" alt="" style="width: 100px;" readoly> <br>
        </div>
        <div class="user">
            <label for="">Tên</label> 
            <input type="text" readonly value="<?php echo "{$_SESSION['user']['ten_kh']}" ?>"> <br>
        </div>
        <div class="mail">
            <label for="">Email</label>
            <input type="text" readonly value="<?php echo "{$_SESSION['user']['email']}" ?>"> <br>
        </div>
        <div class="pass">
            <label for="">Mật khẩu</label>
            <input type="text" readonly value="<?php echo "{$_SESSION['user']['mat_khau']}" ?>"> <br>
        </div>

        <a class="btn-tt1" href="../adminn/index.php">Quay trở về</a>

        <a class="btn-tt" href="update_kh.php?id=<?php echo "{$_SESSION['user']['ma_kh']}" ?>">Cập nhật thông tin</a>
    </div>
<?php
endif;
?>
<?php include_once "../dau_cuoi/footer.php"; ?>