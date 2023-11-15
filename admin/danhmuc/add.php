<script>
    //add danh mục: 
    $().ready(function() {
        $("#adddm").validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,
            rules: {
                "tenloai": {
                    required: true,
                    notequalTo: "#tenloai",
                }
            },
            messages: {
                "tenloai": {
                    required: "Vui lòng nhập tên loại",
                    equalTo: "Danh mục này đã tồn tại"
                }
            }
        });
    });
</script>
<div class="row2">
    <div class="row2 font_title">
        <h1>THÊM MỚI LOẠI HÀNG</h1>
    </div>
    <div class="row2 form_content ">
        <form id="adddm" action="index.php?act=adddm" method="POST">
            <div class="row2 mb10 form_content_container">
                <label> Mã loại </label> <br>
                <input type="text" name="maloai" disabled>
            </div>
            <div class="row2 mb10">
                <label>Tên loại </label> <br>
                <input type="text" name="tenloai">
            </div>
            <div class="row mb10 ">
                <input class="mr20" name="themmoi" type="submit" value="THÊM MỚI">
                <input class="mr20" type="reset" value="NHẬP LẠI">

                <a href="index.php?act=listdm"><input class="mr20" type="button" value="DANH SÁCH"></a>
            </div>
            <?php
            if (isset($thongbao) && $thongbao != "") {
                echo $thongbao;
            }
            ?>
        </form>
    </div>
</div>