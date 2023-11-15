<main class="catalog  mb ">
    <div class="boxleft">
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
                    <th>Thao tác</th>
                </tr>
                <?php
                $tong = 0;
                $i = 1;
                $j = 0;
                foreach ($_SESSION['mycart'] as $cart) {
                    //$cart ko extract vi la mang ko co key. 
                    $hinh = $img_path . $cart[2];
                    // $spadd = [$id, $name, $img, $price, $soluong, $thanhtien]; 
                    // => mangr cart co img nam vi tri so 2. dem tu 0 1 2
                    $thanhtien = $cart[3] * $cart[4];
                    $tong += $thanhtien;
                    $xoasp_cart = '
                       <a href="index.php?act=delcart&idcart=' . $j . '">
                       <input onclick="return confirm(\'Bạn có chắc chắn muốn xóa không\')" style="padding: 10px 10px;" type="button" name="xoa" value="Xóa">
                       </a>
                    ';
                    echo '
                         <tr>
                              <td>' . $i . '</td>
                                <td><img src="' . $hinh . '" height="150px" alt=""></td>
                                <td>' . $cart[1] . '</td>
                                <td>' . $cart[3] . '</td>
                                <td>' . $cart[4] . '</td>
                                <td>' . $thanhtien . '</td>
                                <td>' . $xoasp_cart . '</td>
                        </tr>
                        ';
                    $j += 1;
                    $i += 1;
                }
                echo '
                    <td style="padding: 20px;" colspan="5">Tổng đơn hàng</td>
                    <td style="padding: 20px;" >' . $tong . '</td>
                ';
                ?>
            </table>

        </div>
        <div class="view_a">
            <a href="index.php?act=thongtin_dathang"><input type="button">Đồng ý đặt hàng</a>
            <a href="index.php?act=delcart&idcart=''"><input type="button">Xóa tất cả</a>
        </div>
    </div>
    <?php
    include "view/box_right.php";
    ?>

</main>