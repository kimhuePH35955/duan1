<?php
session_start();
include "model/pdo.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/binhluan.php";
include "model/taikhoan.php";
include "global.php";
include "view/header.php";
$sanpham_home_9 = load9_sanpham_home();
$dsdm = loadALl_danhmuc();
$dstop10 = top10_sp();
if (!isset($_SESSION['mycart'])) {
    $_SESSION['mycart'] = [];
}
if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {
        case 'sanphamct':
            if (isset($_POST['guibinhluan'])) {
                insert_binhluan($_POST['idpro'], $_POST['noidung'], $_SESSION['user']['id']);
            }
            if (isset($_GET['idsp']) && $_GET['idsp'] > 0) {
                $id = $_GET['idsp'];
                $chitiet = loadone_sanpham($_GET['idsp']);
                extract($chitiet);
                $sanpham_cungloai = load_sanpham_cungloai($id, $iddm);
                $binhluan = load_binhluan($_GET['idsp']);
                include "view/chitietsp.php";
            }
            break;
        case 'sanpham':
            if (isset($_POST['search']) && $_POST['search'] != "") {
                $search = $_POST['search'];
            } else {
                $search = "";
            }
            if (isset($_GET['iddm']) && $_GET['iddm'] > 0) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }
            $dssanpham = loadALl_sanpham($search, $iddm);
            $tendm = load_ten_dm($iddm);
            include "view/sanpham.php";
            break;
        case 'gioithieu':
            include "view/gioithieu.php";
            break;
        case 'lienhe':
            include "view/lienhe.php";
            break;
        case 'gopy':
            include "view/gopy.php";
            break;
        case 'hoidap':
            include "view/hoidap.php";
            break;
        case 'dangky':
            $thongbao = '';
            if (isset($_POST['dangky']) && $_POST['dangky']) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                if ($email == "" || $user == "" || $pass == "") {
                    $thongbao = "Vui lòng nhập đầy đủ thông tin!!!";
                } else {
                    insert_taikhoan($email, $user, $pass);
                    $thongbao = "Bạn đã đăng kí tài khoản thành công.";
                }
            }
            include "view/taikhoan/dangki.php";
            break;
        case 'dangnhap':
            $thongbao = "";
            if (isset($_POST['dangnhap']) && $_POST['dangnhap']) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $checkuser = checkuser($user, $pass);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    header('location: index.php');
                } else {
                    $thongbao = "Tài khoản ko tồn tại.Vui lòng kiểm tra lại hoặc đăng kí";
                }
            }
            include "view/home.php";
            break;
        case 'edit_taikhoan':
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $id = $_POST['id'];
                $role = $_POST['role'];
                $_SESSION['user'] = checkuser($user, $pass);
                update_taikhoan($id, $user, $pass, $email, $address, $tel, $role);
                header('location: index.php?act=edit_taikhoan&id="' . $id . '"');
            } else {
                $id = $_GET['id'];
                $_SESSION['user'] = loadone_taikhoan($id);
            }
            include "view/taikhoan/edit_taikhoan.php";
            break;
        case 'quenmk':
            if (isset($_POST['guiemail']) && $_POST['guiemail']) {
                $email = $_POST['email'];
                $checkemail =  check_email($email);
                if (is_array($checkemail)) {
                    $thongbao = "Mật khẩu của bạn là: " . $checkemail['pass'];
                } else {
                    $thongbao = "Email ko hợp lệ";
                }
            }
            include "view/taikhoan/quen_matkhau.php";
            break;
        case 'dangxuat':
            session_unset();
            header('location: index.php');
            break;
        case 'addtocart':
            if (isset($_POST['addtocart']) && $_POST['addtocart']) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                $soluong = 1;
                $thanhtien = $soluong * $price;
                $spadd = [$id, $name, $img, $price, $soluong, $thanhtien];
                array_push($_SESSION['mycart'], $spadd);
                // array_push(mảng cha, mảng con);
            }
            include "view/giohang/viewcart.php";
            break;
        case 'delcart':
            if (isset($_GET['idcart']) && $_GET['idcart'] >= 0) {
                $temparr = [];
                for ($i = 0; $i < count($_SESSION['mycart']); $i++) {
                    if ($i != $_GET['idcart']) {
                        array_push($temparr, $_SESSION['mycart'][$i]);
                    }
                }
                $_SESSION['mycart'] = $temparr;
                // array_slice($_SESSION['mycart'], $_GET['idcart'], 1);   
                // 1 xóa bao nhiêu phần tử.
            } else {
                $_SESSION['mycart'] = [];
            }
            header('location: index.php?act=viewcart');
            break;
        case 'viewcart':
            include "view/giohang/viewcart.php";
            break;
        case 'thongtin_dathang':
            include "view/giohang/thongtin_dathang.php";
            break;
        case 'confirm_dathang':
            if (isset($_POST['dongydathang']) && $_POST['dongydathang']) {
                $name = $_POST['name'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $tel = $_POST['tel'];
                $ngaydathang = date('h:i:sa d/m/y');
                $tongdonhang = tongdonhang();
            }
            include "view/giohang/confirm_dathang.php";
            break;
        default:
            include "view/home.php";
            break;
    }
} else {

    include "view/home.php";
}
include "view/footer.php";
