<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH BÌNH LUẬN </h1>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=dsbl" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Nội dung</th>
                        <th>Iduser</th>
                        <th>Idpro</th>
                        <th>Ngày bình luận</th>
                        <th> </th>
                    </tr>
                    <?php
                    foreach ($listbinhluan as $dsbl) {
                        extract($dsbl);
                        $xoabl = "index.php?act=xoabl&id=" . $id;
                        echo '
                        <tr>
                        <td><input type="checkbox"></td>
                        <td>' . $id . '</td>
                        <td>' . $noidung . '</td>
                        <td>' . $iduser . '</td>
                        <td>' . $idpro . '</td>
                        <td>' . $ngaybinhluan . '</td>
                        <td>
                            <a href="' . $xoabl . '"><input type="button" value="Xóa" onclick="return confirm(\'Bạn có chắc chắn muốn xóa không\')" ></a>
                        </td>
                        </tr>
                        ';
                    }
                    ?>
                </table>
            </div>
            <div class="row mb10 ">
                <input class="mr20" type="button" value="Chọn tất cả">
                <input class="mr20" type="button" value="Bỏ chọn tất cả">
                <input class="mr20" type="button" value="Xóa các mục đã chọn">
            </div>
        </form>
    </div>
</div>