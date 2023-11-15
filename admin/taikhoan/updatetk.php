<style>
    [for="khachhang"],
    [for="quanli"] {
        display: inline;
        margin-left: 7px;

    }
</style>
<script>
    $().ready(function() {
        $("#form_updatetk").validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,
            rules: {
                "user": {
                    required: true,
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
        <h1>Sửa thông tin tài khoản</h1>
    </div>
    <div class="row2 form_content ">
        <?php
        if (isset($thongbao) && $thongbao != "") {
            echo $thongbao;
        }
        ?>
        <form id="form_updatetk" action="index.php?act=updatetk" method="POST">
            <?php
            if (is_array($taikhoan)) {
                extract($taikhoan);
            }
            ?>
            <div class="row2 mb10 form_content_container">
                <label>Mã khách hàng</label><br>
                <input type="text" name="iduser" placeholder="Auto" disabled>
            </div>
            <div class="row2 mb10 form_content_container">
                <label>Tên đăng nhập</label> <br>
                <input type="text" name="user" value="<?= $user ?>">
            </div>
            <div class="row2 mb10">
                <label>Mật khẩu </label> <br>
                <input type="text" name="pass" value="<?= $pass ?>">
            </div>
            <div class="row2 mb10">
                <label>Email </label> <br>
                <input type="text" name="email" value="<?= $email ?>">
            </div>
            <div class="row2 mb10">
                <label>Địa chỉ </label> <br>
                <input type="text" name="address" value="<?= $address ?>">
            </div>
            <div class="row2 mb10">
                <label>Số điện thoại </label> <br>
                <input type="text" name="tel" value="<?= $tel ?>">
            </div>
            <div class="row2 mb10">
                <label>Vai trò</label><br>
                <div>
                    <div>
                        <input type="radio" <?php if ($role == 1) echo "checked" ?> name="role" value="1" id="quanli">
                        <label for="quanli">Quản lí</label>
                    </div>
                    <div>
                        <input type="radio" <?php if ($role == 0) echo "checked" ?> name="role" value="0" id="khachhang">
                        <label for="khachhang">Khách hàng</label>
                    </div>
                </div>
            </div>
            <div class="row mb10 ">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input class="mr20" name="capnhat" type="submit" value="Cập nhật">
                <input class="mr20" type="reset" value="Nhập lại">
                <a href="index.php?act=dskh"><input class="mr20" type="button" value="Danh sách"></a>
            </div>
        </form>
    </div>
</div>