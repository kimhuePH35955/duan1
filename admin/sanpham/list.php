<div class="row2">
    <div class="row2 font_title mb">
        <h1>DANH SÁCH SẢN PHẨM </h1>
    </div>
    <div style="color: green;margin-bottom: 19px;font-size:1.3rem;">
        <?php
        if (isset($thongbao) && $thongbao != "") {
            echo $thongbao;
        }
        ?>
    </div>
    <form class="form_search mb" action="index.php?act=listsp" method="post">
        <input type="text" name="search" placeholder="Nhập từ khóa" id="">
        <select name="iddm">
            <option value="0" selected>Tất cả</option>
            <?php
            foreach ($listdanhmuc as $danhmuc) {
                extract($danhmuc);
                echo '<option value="' . $id . '">' . $name . '</option> ';
            }
            ?>
        </select>
        <input type="submit" value="Search" name="listOk">
    </form>
    <div class="row2 form_content ">
        <form action="index.php?act=listdm" method="POST">
            <div class="row2 mb10 formds_loai">
                <table class="listsp">
                    <tr>
                        <th></th>
                        <th>MÃ LOẠI</th>
                        <th>TÊN LOẠI</th>
                        <th>HÌNH</th>
                        <th>GIÁ</th>
                        <th>LƯỢT XEM</th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($listsanpham as $sanpham) {
                        extract($sanpham);
                        $suasp = "index.php?act=suasp&id=" . $id;
                        $xoasp = "index.php?act=xoasp&id=" . $id;
                        $hinhpath = "../upload/" . $img; // đường dẫn chứa hình ảnh // img khi đã extract
                        if (is_file($hinhpath)) { // kiểm tra img có phải 1 file hay ko
                            $hinh = "<img src='" . $hinhpath . "' height='80'>";
                        } else {
                            $hinh = "No photo!!!";
                        }
                        echo '
                        <tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>' . $id . '</td>
                        <td>' . $name . '</td>
                        <td>' . $hinh . '</td>
                        <td>' . $price . '</td>
                        <td>' . $luotxem . '</td>
                        <td>
                    <a href="' . $suasp . '">
                    <input type="button" value="Sửa"> 
                    </a>
                    <a href="' . $xoasp . '">
                    <input type="button" value="Xóa" onclick="return confirm(\'Bạn có chắc chắn muốn xóa không\')">
                    </a>
                        </td>
                        </tr>
                        ';
                    }
                    ?>
                </table>
            </div>
            <div class="row mb10 ">
                <input class="mr20" type="button" value="CHỌN TẤT CẢ">
                <input class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
                <a href="index.php?act=addsp"> <input class="mr20" type="button" value="NHẬp THÊM"></a>
            </div>

        </form>
    </div>
</div>

<!-- 
if (isset($thongbao) && $thongbao != "") {
    echo '
            <script>
                alert("' . $thongbao . '");
            </script>
        ';
}  -->