<style>
    [for="khachhang"],
    [for="quanli"] {
        display: inline;
        margin-left: 7px;

    }
</style>
<script>
    $().ready(function() {
        $("#addtk").validate({
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
                    minlength: 3
                },
                "email": {
                    required: true,
                    email: true
                },
                "role": {
                    required: true,
                }
            },
            messages: {
                "user": {
                    required: "Vui lòng không được để trống",
                    maxlength: "Kí tự tối đã 255"
                },
                "pass": {
                    required: "Vui lòng không được để trống",
                    minlength: "Tối thiểu phải có 3 kí tự"
                },
                "email": {
                    required: "Vui lòng không được để trống",
                    email: "Phải nhập đúng định dạng email"
                },
                "role": {
                    required: "Vui lòng không được để trống",
                }
            }
        });
    });
</script>

<div class="row2">
    <div class="row2 font_title">
        <h1>Thêm tài khoản</h1>
    </div>
    <?php
    if (isset($thongbao) && $thongbao != "") {
        echo $thongbao;
    }
    ?>
    <div class="row2 form_content ">
        <form id="addtk" action="index.php?act=addtk" method="POST">
            <div class="row2 mb10 form_content_container">
                <label>Mã khách hàng</label><br>
                <input type="text" name="iduser" placeholder="Auto" disabled>
            </div>
            <div class="row2 mb10 form_content_container">
                <label>Tên đăng nhập</label> <br>
                <input type="text" name="user">
            </div>
            <div class="row2 mb10">
                <label>Mật khẩu </label> <br>
                <input type="text" name="pass">
            </div>
            <div class="row2 mb10">
                <label>Email </label> <br>
                <input type="text" name="email">
            </div>
            <div class="row2 mb10">
                <label>Địa chỉ </label> <br>
                <input type="text" name="address">
            </div>
            <div class="row2 mb10">
                <label>Số điện thoại </label> <br>
                <input type="text" name="tel">
            </div>
            <div class="row2 mb10">
                <label>Vai trò</label><br>
                <div>
                    <div>
                        <input type="radio" name="role" value="0" id="khachhang">
                        <label for="khachhang">Khách hàng</label>
                    </div>
                    <div>
                        <input type="radio" name="role" value="1" id="quanli">
                        <label for="quanli">Quản lí</label>
                    </div>
                </div>
            </div>
            <div class="row mb10 ">
                <input class="mr20" name="themmoi" type="submit" value="THÊM MỚI">
                <input class="mr20" type="reset" value="NHẬP LẠI">
                <a href="index.php?act=dskh"><input class="mr20" type="button" value="DANH SÁCH"></a>
            </div>

        </form>
    </div>
</div>