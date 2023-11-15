<script>
    $().ready(function() {
        $("#addsp").validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,
            rules: {
                "iddm": {
                    required: true,
                },
                "tensp": {
                    required: true,
                },
                "giasp": {
                    required: true,
                    digits: true
                },
                "hinh": {
                    required: true,
                },
                "mota": {
                    required: true,
                }
            },
            messages: {
                "iddm": {
                    required: "Vui lòng không được để trống",
                },
                "tensp": {
                    required: "Vui lòng không được để trống",
                },
                "giasp": {
                    required: "Vui lòng không được để trống",
                    digits: "Giá sản phẩm phải là số dương"
                },
                "hinh": {
                    required: "Vui lòng không được để trống"
                },
                "mota": {
                    required: "Vui lòng không được để trống"

                }
            }
        });
    });
</script>
<div class="row2">
    <div class="row2 font_title">
        <h1>THÊM MỚI SẢN PHẨM</h1>
    </div>
    <div style="color: green;margin-bottom: 19px;font-size:1.3rem;">
        <?php
        if (isset($thongbao) && $thongbao != "") {
            echo $thongbao;
        }
        ?>
        <div class="row2 form_content ">
            <form id="addsp" action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
                <div class="row2 mb10 form_content_container">
                    <label> Danh mục</label> <br>
                    <select name="iddm" id="">
                        <option value="0" selected>Tất cả</option>
                        <?php
                        foreach ($listdanhmuc as $danhmuc) {
                            extract($danhmuc);
                            echo '
                               <option value="' . $id . '">' . $name . '</option>
                        ';
                        }
                        ?>
                    </select>
                </div>
                <div class="row2 mb10">
                    <label>Tên sản phẩm </label> <br>
                    <input type="text" name="tensp">
                </div>
                <div class="row2 mb10">
                    <label>Giá</label> <br>
                    <input type="text" name="giasp">
                </div>
                <div class="row2 mb10">
                    <label>Hình ảnh</label> <br>
                    <input type="file" name="hinh">
                </div>
                <div class="row2 mb10">
                    <label>Mô tả </label> <br>
                    <textarea name="mota" id="" cols="30" rows="10"></textarea>
                </div>

                <div class="row mb10 ">
                    <input class="mr20" name="themmoi" type="submit" value="THÊM MỚI">
                    <input class="mr20" type="reset" value="NHẬP LẠI">

                    <a href="index.php?act=listsp"><input class="mr20" type="button" value="DANH SÁCH"></a>
                </div>
            </form>
        </div>
    </div>