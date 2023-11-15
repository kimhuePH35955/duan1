<div class="row2">
    <div class="row2 font_title">
        <h1>Thống kê sản phẩm</h1>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=listdm" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th></th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Số lượng</th>
                        <th>Giá cao nhất</th>
                        <th>Giá thấp nhất</th>
                        <th>Giá trung bình</th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($thongke as $thongkesp) {
                        extract($thongkesp);
                        $chitiet = "index.php?act=chitiet_thongkesp" . $id;
                        echo '
                        <tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>' . $id . '</td>
                        <td>' . $name . '</td>
                        <td>' . $soluong . '</td>
                        <td>$' . number_format($gia_max, 0) . '</td>
                        <td>$' . number_format($gia_min, 0) . '</td>
                        <td>$' . number_format($gia_trungbinh, 0) . '</td>
                        <td>
                            <a href="' . $chitiet . '">
                                <input type="button" value="Chi tiết">
                            </a>
                        </td>
                        </tr>
                        ';
                    }
                    ?>
                </table>
            </div>
            <div class="row mb10 ">
                <a href="index.php?act=bieudo"><input type="button" value="Biểu đồ"></a>
            </div>
        </form>
    </div>
</div>