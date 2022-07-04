<?php
include_once "../database/database.php";

class user_class
{
    public $controll;
    public function __construct()
    {
        $this->controll = new database();
    }

    //khach hang
    public function insert_khachhang($ten_kh, $sdt, $email, $mat_khau)
    {
        $insert_khachhang = "INSERT INTO khach_hang(anh,ten_kh,sdt,email,mat_khau) VALUES('../img/anh_kh/anh1.png','$ten_kh','$sdt','$email','$mat_khau')";
        $this->controll->exec($insert_khachhang);
    }
    public function show_khachhang()
    {
        $show_khachhang = "SELECT * FROM khach_hang";
        $result = $this->controll->select_all($show_khachhang);
        return $result;
    }
    public function show_khachhangtm($ma_kh)
    {
        $show_khachhangtm = "SELECT * FROM khach_hang WHERE ma_kh = '$ma_kh'";
        $result =  $this->controll->select_one($show_khachhangtm);
        return $result;
    }
    public function update_khachhang($anh, $email, $ten_kh, $mat_khau, $ma_kh)
    {
        $update_khachhang = "UPDATE khach_hang SET anh='$anh',email='$email',ten_kh='$ten_kh',mat_khau='$mat_khau' WHERE ma_kh= '$ma_kh'";
        $this->controll->exec($update_khachhang);
    }
    public function update_vaitro($vai_tro, $ma_kh)
    {
        $update_vaitro = "UPDATE khach_hang SET vai_tro='$vai_tro' WHERE ma_kh= '$ma_kh'";
        $this->controll->exec($update_vaitro);
    }
    public function delete_khachhang($ma_kh)
    {
        $delete_khachhang = "DELETE FROM khach_hang WHERE ma_kh='$ma_kh'";
        $this->controll->exec($delete_khachhang);
    }

    // Địa điểm
    public function insert_diadiem($anh_dd, $ten_dd)
    {
        $insert_diadiem = "INSERT INTO dia_diem(anh_dd,ten_dd) VALUES('$anh_dd','$ten_dd')";
        $this->controll->exec($insert_diadiem);
    }
    public function show_diadiem()
    {
        $show_diadiem = "SELECT * FROM dia_diem ";
        $result = $this->controll->select_all($show_diadiem);
        return $result;
    }
    public function show_diadiemlimit()
    {
        $show_diadiem = "SELECT * FROM dia_diem ORDER BY ten_dd LIMIT 6";
        $result = $this->controll->select_all($show_diadiem);
        return $result;
    }
    public function show_diadiemtm($ma_dd)
    {
        $show_diadiemtm = "SELECT * FROM dia_diem WHERE ma_dd='$ma_dd'";
        $result = $this->controll->select_one($show_diadiemtm);
        return $result;
    }

    public function update_diadiem($anh_dd, $ten_dd, $ma_dd)
    {
        $update_diadiem = "UPDATE dia_diem SET anh_dd='$anh_dd',ten_dd='$ten_dd' WHERE ma_dd= '$ma_dd'";
        $this->controll->exec($update_diadiem);
    }
    public function delete_diadiem($ma_dd)
    {
        $delete_diadiem = "DELETE FROM dia_diem WHERE ma_dd='$ma_dd'";
        $this->controll->exec($delete_diadiem);
    }
    //Homestay
    public function insert_homestay($ten_hs, $anh_hs, $gioi_thieu, $ma_lp, $gia, $gia_km, $ma_dd)
    {
        $insert_datphong = "INSERT INTO homestay(ten_hs,anh_hs,gioi_thieu,ma_lp,gia,gia_km,ma_dd) 
        VALUES('$ten_hs', '$anh_hs','$gioi_thieu', '$ma_lp','$gia','$gia_km','$ma_dd')";
        $this->controll->exec($insert_datphong);
    }
    public function show_homestay()
    {
        $show_datphong = "SELECT * FROM homestay ";
        $result = $this->controll->select_all($show_datphong);
        return $result;
    }
    public function show_homestaylimit()
    {
        $show_datphong = "SELECT * FROM homestay INNER JOIN loai_phong ON homestay.ma_lp=loai_phong.ma_lp ORDER BY ten_hs LIMIT 6 ";
        $result = $this->controll->select_all($show_datphong);
        return $result;
    }
    public function show_homestaytm($ma_hs)
    {
        $show_datphongtm = "SELECT * FROM homestay INNER JOIN loai_phong ON homestay.ma_lp=loai_phong.ma_lp WHERE ma_hs='$ma_hs' ";
        $result = $this->controll->select_one($show_datphongtm);
        return $result;
    }
    public function show_homestaytheomadd($ma_dd)
    {
        $show_datphongtm = "SELECT * FROM homestay INNER JOIN loai_phong ON homestay.ma_lp=loai_phong.ma_lp  WHERE ma_dd='$ma_dd'";
        $result = $this->controll->select_all($show_datphongtm);
        return $result;
    }
    public function show_homestayinner($ma_hs)
    {
        $show_datphongtm = "SELECT * FROM homestay INNER JOIN loai_phong ON homestay.ma_lp=loai_phong.ma_lp 
        INNER JOIN dia_diem ON homestay.ma_dd=dia_diem.ma_dd WHERE ma_hs_'$ma_hs'";
        $result = $this->controll->select_one($show_datphongtm);
        return $result;
    }
    public function show_homestay1()
    {
        $show_datphongtm = "SELECT * FROM homestay INNER JOIN loai_phong ON homestay.ma_lp=loai_phong.ma_lp";
        $result = $this->controll->select_all($show_datphongtm);
        return $result;
    }
    public function show_homestay2($ma_hs)
    {
        $show_datphongtm = "SELECT * FROM homestay INNER JOIN loai_phong ON homestay.ma_lp=loai_phong.ma_lp INNER JOIN dia_diem ON homestay.ma_dd=dia_diem.ma_dd WHERE ma_hs='$ma_hs'";
        $result = $this->controll->select_one($show_datphongtm);
        return $result;
    }
    public function update_homestay($ten_hs, $anh_hs, $gioi_thieu, $ma_lp, $gia, $gia_km, $ma_dd, $ma_hs)
    {
        // $update_datphong = "UPDATE homestay SET ten_hs='$ten_hs',anh_hs='$anh_hs',gioi_thieu='$gioi_thieu,ma_dd='$ma_dd' WHERE ma_hs= '$ma_hs'";
        $update_homestay = "UPDATE homestay SET ten_hs='$ten_hs',anh_hs='$anh_hs',gioi_thieu='$gioi_thieu',ma_lp='$ma_lp',gia='$gia',gia_km='$gia_km',ma_dd='$ma_dd' WHERE ma_hs= '$ma_hs'";
        $this->controll->exec($update_homestay);
    }
    public function delete_homestay($ma_hs)
    {
        $delete_datphong = "DELETE FROM homestay WHERE ma_hs='$ma_hs'";
        $this->controll->exec($delete_datphong);
    }
    //Đặt phòng
    public function insert_datphong($ma_kh, $ten_kh, $sdt, $dia_chi, $ngay_dat, $ngay_den, $ngay_ve, $ma_km,$trang_thai, $ma_hs, $tong_tien)
    {
        $insert_datphong = "INSERT INTO dat_phong(ma_kh,ten_kh, sdt, dia_chi,ngay_dat,ngay_den,ngay_ve,ma_km,trang_thai,ma_hs,tong_tien) 
        VALUES('$ma_kh','$ten_kh','$sdt','$dia_chi','$ngay_dat','$ngay_den','$ngay_ve', '$ma_km','$trang_thai','$ma_hs','$tong_tien')";
        $this->controll->exec($insert_datphong);
    }
    public function show_datphong()
    {
        $show_tintuc = "SELECT * FROM dat_phong ";
        $result = $this->controll->select_all($show_tintuc);
        return $result;
    }
    public function show_datphongtm($ma_kh)
    {
        $sql = "SELECT * FROM dat_phong INNER JOIN homestay ON dat_phong.ma_hs=homestay.ma_hs INNER JOIN loai_phong ON homestay.ma_lp=loai_phong.ma_lp  WHERE ma_kh='$ma_kh' ORDER BY ngay_dat DESC";
        $result = $this->controll->select_all($sql);
        return $result;
    }
    public function show_chitietdatphongtm($ma_dp)
    {
        $sql = "SELECT * FROM dat_phong INNER JOIN homestay ON dat_phong.ma_hs=homestay.ma_hs INNER JOIN loai_phong ON homestay.ma_lp=loai_phong.ma_lp  WHERE ma_dp='$ma_dp' ";
        $result = $this->controll->select_one($sql);
        return $result;
    }
    public function update_datphong($trang_thai,$ma_dp)
    {
        $update_datphong = "UPDATE dat_phong SET trang_thai='$trang_thai' WHERE ma_dp= '$ma_dp'";
        $this->controll->exec($update_datphong);
    }
    public function delete_datphong($ma_dp)
    {
        $delete_loai = "DELETE FROM dat_phong WHERE ma_dp='$ma_dp'";
        $this->controll->exec($delete_loai);
    }
    // public function show_datphong_thanhtoan($ma_kh)
    // {
    //     $show_tintuc = "SELECT * FROM dat_phong INNER JOIN loai_phong ON dat_phong.ma_lp=loai_phong.ma_lp WHERE ma_kh='$ma_kh' ";
    //     $result = $this->controll->select_all($show_tintuc);
    //     return $result;
    // }
    //Tin tức
    public function insert_tintuc($ten_tin, $anh_tin, $gioi_thieu, $ngay_tin)
    {
        $insert_tintuc = "INSERT INTO tin_tuc(ten_tin,anh_tin,gioi_thieu,ngay_tin) 
        VALUE('$ten_tin', '$anh_tin','$gioi_thieu','$ngay_tin')";
        $this->controll->exec($insert_tintuc);
    }
    public function show_tintuc()
    {
        $show_tintuc = "SELECT * FROM tin_tuc ";
        $result = $this->controll->select_all($show_tintuc);
        return $result;
    }
    public function show_tintuctm($ma_tin)
    {
        $show_tintuctm = "SELECT * FROM tin_tuc WHERE ma_tin='$ma_tin'";
        $result = $this->controll->select_one($show_tintuctm);
        return $result;
    }
    public function show_tintuclimit()
    {
        $show_tintuctm = "SELECT * FROM tin_tuc ORDER BY ngay_tin DESC LIMIT 4";
        $result = $this->controll->select_all($show_tintuctm);
        return $result;
    }
    public function update_tintuc($ten_tin, $anh_tin, $gioi_thieu, $ngay_tin, $ma_tin)
    {
        $update_tintuc = "UPDATE tin_tuc SET ten_tin='$ten_tin',anh_tin='$anh_tin',gioi_thieu='$gioi_thieu',ngay_tin='$ngay_tin' WHERE ma_tin= '$ma_tin'";
        $this->controll->exec($update_tintuc);
    }
    public function delete_tintuc($ma_tin)
    {
        $delete_tintuc = "DELETE FROM tin_tuc WHERE ma_tin='$ma_tin'";
        $this->controll->exec($delete_tintuc);
    }

    //bình luận
    public function insert_binhluan($noi_dung, $ma_hs, $ma_kh, $ngay_bl)
    {
        $insert_binhluan = "INSERT INTO binh_luan(noi_dung,ma_hs,ma_kh,ngay_bl) VALUE('$noi_dung','$ma_hs','$ma_kh','$ngay_bl')";
        $this->controll->exec($insert_binhluan);
    }
    public function show_binhluan($ma_hs)
    {
        $show_binhluan = "SELECT * FROM binh_luan INNER JOIN khach_hang ON binh_luan.ma_kh=khach_hang.ma_kh WHERE ma_hs = '$ma_hs' ORDER BY ngay_bl DESC";
        $result = $this->controll->select_all($show_binhluan);
        return $result;
    }
    public function show_binhluantat()
    {
        $show_binhluan = "SELECT * FROM binh_luan ";
        $result = $this->controll->select_all($show_binhluan);
        return $result;
    }
    public function delete_binhluan($ma_bl)
    {
        $delete_binhluan = "DELETE FROM binh_luan WHERE ma_bl='$ma_bl'";
        $this->controll->exec($delete_binhluan);
    }

    //loại phòng
    public function update_loaiphong($ten_lp, $ma_lp)
    {
        $update_loai = "UPDATE loai_phong SET ten_lp='$ten_lp' WHERE ma_lp= '$ma_lp'";
        $this->controll->exec($update_loai);
    }
    public function insert_loaiphong($ten_lp)
    {
        $insert_loai = "INSERT INTO loai_phong(ten_lp) VALUE('$ten_lp')";
        $this->controll->exec($insert_loai);
    }

    public function show_loaiphong()
    {
        $show_loai = "SELECT * FROM loai_phong";
        $result = $this->controll->select_all($show_loai);
        return $result;
    }

    public function delete_loaiphong($ma_lp)
    {
        $delete_loai = "DELETE FROM loai_phong WHERE ma_lp='$ma_lp'";
        $this->controll->exec($delete_loai);
    }
    public function show_loaiphongtm($ma_lp)
    {
        $show_loaitm = "SELECT * FROM loai_phong WHERE ma_lp='$ma_lp'";
        $result = $this->controll->select_one($show_loaitm);
        return $result;
    }
    public function show_loaiphonghs($ma_lp)
    {
        $show_loaitm = "SELECT * FROM loai_phong WHERE ma_lp='$ma_lp'";
        $result = $this->controll->select_all($show_loaitm);
        return $result;
    }
    //Đăng nhập
    public function get_user($email, $mat_khau)
    {
        $sql = "SELECT * FROM khach_hang WHERE email = '$email' AND mat_khau = '$mat_khau'";
        $result = $this->controll->select_one($sql);
        return $result;
    }
    //Tổng địa điểm
    public function so_lp($ten_lp)
    {
        $sql = "SELECT COUNT * FROM loai_phong WHERE ten_lp='$ten_lp'";
        $result = $this->controll->select_all($sql);
        return $result;
    }
    public function tim_kiem($ma_dd, $ma_lp, $gia)
    {
        $sql = "SELECT * FROM dia_diem INNER JOIN homestay INNER JOIN loai_phong ON homestay.ma_lp=loai_phong.ma_lp WHERE dia_diem.ma_dd='$ma_dd'";
        if (!empty($ma_lp)) {
            $sql = $sql . "AND loai_phong.ma_lp='$ma_lp'";
            if (!empty($gia)) {
                $sql = $sql . "AND homestay.gia<='$gia'";
            }
        } else {
            $sql = $sql . "AND homestay.gia<='$gia'";
        }
        $result = $this->controll->select_all($sql);
        return $result;
    }
    // public function tim_kiem($ma_dd, $ma_hs, $gia_lp)
    // {
    //     $sql = "SELECT * FROM dia_diem INNER JOIN homestay INNER JOIN loai_phong ON homestay.ma_hs=loai_phong.ma_hs WHERE dia_diem.ma_dd='$ma_dd'";
    //     if (!empty($ma_hs)) {
    //         $sql = $sql . "AND homestay.ma_hs='$ma_hs'";
    //         if (!empty($gia_lp)) {
    //             $sql = $sql . "AND loai_phong.gia_lp<='$gia_lp'";
    //         }
    //     } else {
    //         $sql = $sql . "AND loai_phong.gia_lp<='$gia_lp'";
    //     }
    //     $result = $this->controll->select_all($sql);
    //     return $result;
    // }
    public function show_tenkhdp()
    {
        $sql = "SELECT * FROM dat_phong INNER JOIN homestay ON dat_phong.ma_hs=homestay.ma_hs INNER JOIN loai_phong ON homestay.ma_lp=loai_phong.ma_lp ORDER BY ngay_dat DESC";
        $result = $this->controll->select_all($sql);
        return $result;
    }
    public function show_chitiet_tenkhdp($ma_dp)
    {
        $sql = "SELECT * FROM dat_phong INNER JOIN homestay ON dat_phong.ma_hs=homestay.ma_hs INNER JOIN loai_phong ON homestay.ma_lp=loai_phong.ma_lp WHERE ma_dp='$ma_dp'";
        $result = $this->controll->select_one($sql);
        return $result;
    }
    public function tim_kiem_theoten($name)
    {
        $sql = "SELECT * FROM dia_diem LEFT JOIN homestay ON dia_diem.ma_dd=homestay.ma_dd LEFT JOIN loai_phong ON homestay.ma_lp=loai_phong.ma_lp WHERE dia_diem.ten_dd LIKE'%$name%' OR homestay.ten_hs LIKE'%$name%' OR loai_phong.ten_lp LIKE'%$name%'";
        $result = $this->controll->select_all($sql);
        return $result;
    }

    //Hỗi trợ
    public function insert_hoitro($ten_ht, $sdt_ht, $email_ht, $noi_dung)
    {
        $sql = "INSERT INTO hoi_tro(ten_ht,sdt_ht,email_ht,noi_dung) VALUE('$ten_ht','$sdt_ht','$email_ht','$noi_dung')";
        $this->controll->exec($sql);
    }
    public function show_hoitro()
    {
        $sql = "SELECT * FROM hoi_tro";
        $result = $this->controll->select_all($sql);
        return $result;
    }

    public function check_cart($ma_hs){
        $sql = "SELECT * FROM dat_phong WHERE ma_hs = '$ma_hs'";
        $result = $this->controll->select_one($sql);
        return $result;
    }
}
