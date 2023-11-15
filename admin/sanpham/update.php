<div class="row2">
    <div class="row2 font_title">
        <h1>Sửa thông tin loại hàng</h1>
    </div>
    <div style="color: green;margin-bottom: 19px;font-size:1.3rem;">
        <?php
        if (isset($thongbao) && $thongbao != "") {
            echo $thongbao;
        }
        ?>
        <div class="row2 form_content ">
            <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
                <div class="row2 mb10 form_content_container">
                    <label> Danh mục</label> <br>
                    <select name="iddm">
                        <option value="0" selected>Tất cả</option>
                        <?php
                        foreach ($listdanhmuc as $danhmuc) {
                            extract($danhmuc);
                            if ($sanpham['iddm'] == $id) {
                                echo '
                            <option value="' . $id . '" selected>' . $name . '</option>
                            ';
                            } else {
                                echo '
                            <option value="' . $id . '">' . $name . '</option>
                            ';
                            }
                        }
                        ?>
                    </select>
                </div>
                <?php
                if (is_array($sanpham)) {
                    extract($sanpham);
                }
                $hinhpath = "../upload/" . $img;
                 // đường dẫn chứa hình ảnh // img khi đã extract
                if (is_file($hinhpath)) { 
                    // kiểm tra img có phải 1 file hay ko
                    $hinh = "<img src='" . $hinhpath . "'height='80'>";
                }
                // else {
                //     $hinh = "No photo!!!";
                // }
                ?>
                <div class="row2 mb10">
                    <label>Tên sản phẩm </label> <br>
                    <input type="text" name="tensp" value="<?= $name ?>">
                </div>
                <div class="row2 mb10">
                    <label>Giá</label> <br>
                    <input type="text" name="giasp" value="<?= $price ?>">
                </div>
                <div class="row2 mb10">
                    <label>Hình ảnh</label> <br>
                    <input type="file" name="hinh">
                    <?= $hinh ?>
                </div>
                <div class="row2 mb10">
                    <label>Mô tả </label> <br>
                    <textarea name="mota" id="" cols="30" rows="10">
                    <?= $mota ?>
                </textarea>
                </div>
                <!-- ltrim : cắt khoảng trắng trong textarea -->

                <div class="row mb10 ">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input class="mr20" name="capnhat" type="submit" value="Cập nhật">
                    <input class="mr20" type="reset" value="Nhập lại">
                    <a href="index.php?act=listsp"><input class="mr20" type="button" value="Danh sách"></a>
                </div>

            </form>
        </div>
    </div>