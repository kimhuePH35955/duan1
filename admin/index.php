<?php
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/thongke.php";
include "header.php";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
            // danh mục
        case 'adddm': {
                if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                    $tenloai = $_POST['tenloai'];
                    insert_danhmuc($tenloai);
                    $thongbao = "Thêm thành công";
                }
                include "danhmuc/add.php";
                break;
            }
        case 'listdm': {
                $listdanhmuc = loadAll_danhmuc();
                include "danhmuc/list.php";
                break;
            }
        case 'xoadm': {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    delete_danhmuc($_GET['id']);
                }
                $listdanhmuc = loadALl_danhmuc();
                include "danhmuc/list.php";
                break;
            }
        case 'suadm': {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $dm = loadone_danhmuc($_GET['id']);
                }
                include "danhmuc/update.php";
                break;
            }

        case 'updatedm': {
                if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                    $tenloai = $_POST['tenloai'];
                    $id = $_POST['id'];
                    update_danhmuc($id, $tenloai);
                    $thongbao = "Cập nhật thành công";
                }
                $listdanhmuc = loadAll_danhmuc();
                include "danhmuc/list.php";
                break;
            }
            // sản phẩm
        case 'addsp': {
                //ktra xem người dùng có click vào nút add hay ko và đúng
                if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                    $tensp = $_POST['tensp'];
                    $gia = $_POST['giasp'];
                    $mota = $_POST['mota'];
                    $iddm = $_POST['iddm'];
                    $hinh = $_FILES["hinh"]["name"];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . $hinh;
                    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                    // if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // } else {
                    //     echo "Không có hình ảnh";
                    // }   
                    insert_sanpham($tensp, $gia, $hinh, $mota, $iddm);
                    $thongbao = "Thêm sản phẩm thành công !!!";
                }
                $listdanhmuc = loadALl_danhmuc();
                include "sanpham/add.php";
                break;
            }

        case 'listsp':
            if (isset($_POST['listOk']) && $_POST['listOk']) {
                $search = $_POST['search'];
                $iddm = $_POST['iddm'];
            } else {
                $search = "";
                $iddm = 0;
            }
            $listdanhmuc = loadALl_danhmuc();
            $listsanpham = loadAll_sanpham($search, $iddm);
            include "sanpham/list.php";
            break;

        case 'xoasp': {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    delete_sanpham($_GET['id']);
                }
                $listdanhmuc = loadALl_danhmuc();
                $listsanpham = loadALl_sanpham();
                include "sanpham/list.php";
                break;
            }

        case 'suasp':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $sanpham = loadone_sanpham($_GET['id']);
            }
            $listdanhmuc = loadALl_danhmuc();
            include "sanpham/update.php";
            break;

        case 'updatesp':
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $id = $_POST['id']; // id hidden
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $gia = $_POST['giasp'];
                $mota = $_POST['mota'];
                $hinh = $_FILES["hinh"]["name"];
                $target_dir = "../upload/";
                $target_file = $target_dir . $hinh;
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    echo "Thêm ảnh thành công.";
                } else {
                    echo "Không có ảnh";
                }
                $listdanhmuc = loadALl_danhmuc();
                update_sanpham($id, $iddm, $tensp, $gia, $mota, $hinh);
                $thongbao = "Cập nhật thành công !!!";
            }
            $listsanpham = loadAll_sanpham();
            include "sanpham/list.php";
            break;

            // bình luận
        case 'dsbl':
            $listbinhluan = loadAll_binhluan(0);
            include "binhluan/list.php";
            break;
        case 'xoabl': {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    delete_binhluan($_GET['id']);
                }
                $listbinhluan = loadALl_binhluan(0);
                include "binhluan/list.php";
                break;
            }

            // tài khoản
        case 'updatetk':
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $id = $_POST['id']; // id hidden
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $role = $_POST['role'];
                update_taikhoan($id, $user, $pass, $email, $address, $tel, $role);
                $thongbao = "Cập nhật thành công !!!";
            }
            $listtaikhoan = loadAll_taikhoan();
            include "taikhoan/list.php";
            break;
        case 'suatk':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $taikhoan = loadone_taikhoan($_GET['id']);
            }
            $listtaikhoan = loadALl_taikhoan();
            include "taikhoan/updatetk.php";
            break;
        case 'addtk':
            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $role = $_POST['role'];
                insert_taikhoan($user, $pass, $email, $address, $tel, $role);
                $thongbao = "Thêm tài khoản thành công";
            }
            $listtaikhoan = loadALl_taikhoan();
            include "taikhoan/addtk.php";
            break;
        case 'xoatk': {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    delete_taikhoan($_GET['id']);
                }
                $listtaikhoan = loadALl_taikhoan();
                include "taikhoan/list.php";
                break;
            }
        case 'dskh':
            $listtaikhoan = loadALl_taikhoan();
            include "taikhoan/list.php";
            break;
        case 'thongke':
            $thongke = load_thongke_sp_danhmuc();
            include "thongke/listthongke.php";
            break;
        case 'bieudo':
            $thongke = load_thongke_sp_danhmuc();
            include "thongke/bieudo.php";
            break;
            // case 'chitiet_thongkesp':
            //     // $thongke = load_thongke_sp_danhmuc();
            //     // include "thongke/listthongke.php";
            //     break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
include "footer.php";
