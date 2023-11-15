

<script>
    $().ready(function() {
        $("#form_dnhap").validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,
            rules: {
                "user": {
                    required: true,
                    maxlength: 255
                },
                "pass": {
                    required: true,
                    minlength: 8
                }
            },
            messages: {
                "user": {
                    required: "Vui lòng không được để trống",
                    maxlength: "Vui lòng nhập tối đa 255 kí tự"
                },
                "pass": {
                    required: "Vui lòng không được để trống",
                    minlength: "Vui lòng nhập tối thiểu 8 kí tự."
                }
            }
        });
    });
</script>

<div class="boxright">

    <div class="mb">
        <div class="box_title">TÀI KHOẢN</div>
        <div class="box_content form_account">
            <?php
            if (isset($_SESSION['user'])) {
                extract($_SESSION['user']);
            ?>
                <h2>Thông tin tài khoản</h2><br>
                <p>Xin chào <?= $user ?></p><br>
                <p>ID: <?= $id ?></p><br>
                <p>Email: <?= $email ?></p><br>
                <p>Địa chỉ: <?= $address ?></p><br>
                <p>Số điện thoại: <?= $tel ?></p><br>
                <p>Vai trò:
                    <?php
                    if ($role == 0) {
                        echo "Khách hàng";
                    } else {
                        echo "Quản lí";
                    }
                    ?>
                </p><br>
                <div>
                    <li class="form_li"><a href="index.php?act=viewcart">Đơn hàng của tôi</a></li>
                    <li class="form_li"><a href="index.php?act=edit_taikhoan&id=<?= $id?>">Cập nhật thông tin cá nhân</a></li>
                    <li class="form_li"><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
                    <?php
                    if ($role == 1) {
                    ?>
                        <li class="form_li">
                            <a href="admin/index.php">Đăng nhập admin</a>
                        </li>
                    <?php } ?>
                    <li class="form_li"><a href="index.php?act=dangxuat">Đăng xuất</a></li>
                </div>

            <?php

            } else { ?>
                <form id="form_dnhap" class="account" action="index.php?act=dangnhap" method="POST">
                    <h4>Tên đăng nhập</h4><br>
                    <input type="text" name="user">
                    <h4>Mật khẩu</h4><br>
                    <input type="password" name="pass"><br>
                    <input type="checkbox" checked name="" id="">Ghi nhớ tài khoản?
                    <br>
                    <br><input type="submit" name="dangnhap" value="Đăng nhập"> <br>
                    <?php
                    if (isset($thongbao)) {
                        echo $thongbao;
                    }
                    ?>
                    <ul class="dki_quenmk">
                        <li class="form_li"><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
                        <li class="form_li"><a href="index.php?act=dangky">Đăng kí thành viên</a></li>
                    </ul>
                </form>

            <?php } ?>
        </div>
    </div>
    <div class="mb">
        <div class="box_title">DANH MỤC</div>
        <div class="box_content2 product_portfolio">
            <ul>
                <?php
                foreach ($dsdm as $dm) {
                    extract($dm);
                    $linkdm = "index.php?act=sanpham&iddm=" . $id;
                    echo '
                    <li><a href="' . $linkdm . '">' . $name . '</a></li>
                    ';
                }
                ?>
            </ul>
        </div>

        <div class="box_search">
            <form action="index.php?act=sanpham" method="POST">
                <input type="text" name="search" id="" placeholder="Từ khóa tìm kiếm">
                <input type="submit" name="timkiem" value="Tìm kiếm">
            </form>
        </div>
    </div>

    <!-- DANH MỤC SẢN PHẨM BÁN CHẠY -->
    <div class="mb">
        <div class="box_title">TOP 10 YÊU THÍCH</div>
        <div class="box_content">
            <?php
            foreach ($dstop10 as $top10) {
                extract($top10);
                $linksp = "index.php?act=sanphamct&idsp=" . $id;
                $hinh = $img_path . $img;
                echo '
                <div class="selling_products" style="width:100%;">
                <img src="' . $hinh . '" alt="anh">
                <a href="' . $linksp . '">' . $name . '</a>
                  </div>
                ';
            }
            ?>
        </div>
    </div>
</div>