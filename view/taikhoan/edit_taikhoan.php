<script>
    $().ready(function() {
        $("#edit_tk").validate({
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
                "tel": {
                    number: true
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
                "tel": {
                    number: "Số điện thoại phải là số"
                }
            }
        });
    });
</script>

<main class="catalog  mb ">

    <div class="boxleft">

        <div class="box_title">Sửa thông tin tài khoản</div>
        <h3 class="thongbao">
            <?php
            if (isset($thongbao) && $thongbao != "") {
                echo $thongbao;
            }
            ?>
        </h3>
        <div class="box_content form_account">
            <?php
            if (isset($_SESSION['user']) && is_array($_SESSION['user'])) {
                extract($_SESSION['user']);
            }
            ?>
            <form id="edit_tk" action="index.php?act=edit_taikhoan" method="post">
                <div>
                    <h4>Tên đăng nhập</h4><br>
                    <input type="text" name="user" value="<?= $user ?>">
                </div>
                <div>
                    <h4>Địa chỉ email</h4><br>
                    <input type="email" name="email" value="<?= $email ?>">
                </div>
                <div>
                    <h4>Mật khẩu</h4><br>
                    <input type="password" name="pass" value="<?= $pass ?>">
                </div>
                <div>
                    <h4>Địa chỉ</h4><br>
                    <input type="text" name="address" value="<?= $address ?>">
                </div>
                <div>
                    <h4>Điện thoại</h4><br>
                    <input type="text" name="tel" value="<?= $tel ?>">
                </div>
                <input type="hidden" name="id" value="<?= $id ?>">

                <input type="hidden" name="role" value="<?= $role ?>">

                <input type="submit" value="Cập nhật" name="capnhat">
                <input type="reset" value="Nhập lại">
            </form>
        </div>

    </div>
    <?php
    include "view/box_right.php";
    ?>

</main>