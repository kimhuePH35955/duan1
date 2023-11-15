<main class="catalog  mb ">
    <div class="boxleft">
        <form action="index.php?act=confirm_dathang" class="form_account">
            <div class="box_title">Thông tin đặt hàng</div>
            <div class="box_content">
                <?php
                if (isset($_SESSION['user'])) {
                    $name = $_SESSION['user']['user'];
                    $address = $_SESSION['user']['address'];
                    $email = $_SESSION['user']['email'];
                    $tel = $_SESSION['user']['tel'];
                } else {
                    $name = "";
                    $address = "";
                    $email = "";
                    $tel = "";
                }
                ?>
                <div>
                    <label for="">Người đặt hàng</label>
                    <input type="text" value="<?= $name ?>">
                </div>
                <div>
                    <label for="">Địa chỉ</label>
                    <input type="text" value="<?= $address ?>">
                </div>
                <div>
                    <label for="">Email</label>
                    <input type="text" value="<?= $email ?>">
                </div>
                <div>
                    <label for="">Điện thoại</label>
                    <input type="text" value="<?= $tel ?>">
                </div>
            </div>
            <div class=" box_title ">Phương thức thanh toán</div>
            <div class=" box_content phuongthuctht">
                <div class="">
                    <input type="radio" checked id="tienmat" name="thanhtoan" value="0">Trả tiền khi nhận hàng
                </div>
                <div class="">
                    <input type="radio" id="chuyenkhoan" name="thanhtoan" value="1">Chuyển khoản ngân hàng
                </div>
                <div class="">
                    <input type="radio" id="thanht_online" name="thanhtoan" value="2">Thanh toán online
                </div>
            </div>

            <!--  -->
            <div class="box_title">Giỏ hàng</div>
            <div class="box_content">
                <table border="1" class="giohang">
                    <tr>
                        <th>STT</th>
                        <th>Hình ảnh</th>
                        <th>Sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                    <?php
                    $tong = 0;
                    $i = 1;
                    foreach ($_SESSION['mycart'] as $cart) {
                        $hinh = $img_path . $cart[2];
                        $thanhtien = $cart[3] * $cart[4];
                        $tong += $thanhtien;
                        echo '
                    <tr>
                    <td>' . $i . '</td>
                                <td><img src="' . $hinh . '" height="150px" alt=""></td>
                                <td>' . $cart[1] . '</td>
                                <td>' . $cart[3] . '</td>
                                <td>' . $cart[4] . '</td>
                                <td>' . $thanhtien . '</td>
                                </tr>
                                ';
                        $i += 1;
                    }
                    ?>
                </table>
            </div>
            <a href="">
                <input style="padding:10px; margin-top: 20px;" type="submit" name="dongydathang" value="Đồng ý đặt hàng">
            </a>
        </form>
    </div>
    <?php
    include "view/box_right.php";
    ?>
    </div>

</main>