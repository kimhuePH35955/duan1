<script>
    $().ready(function() {
        $("#form_dki").validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,
            rules: {
                "user": {
                    required: true,
                    notequalTo: "#user",
                },
                "pass": {
                    required: true,
                    minlength: 8
                },
                "email": {
                    required: true,
                    email: true
                }
            },
            messages: {
                "user": {
                    required: "Vui lòng không được để trống",
                    equalTo:"Vui lòng nhập tên khác, tên này đã tồn tại"
                },
                "pass": {
                    required: "Vui lòng không được để trống",
                    minlength: "Tối thiểu phải có 8 kí tự"
                },
                "email": {
                    required: "Vui lòng không được để trống",
                    email: "Phải nhập đúng định dạng email"
                }
            }
        });
    });
</script>
<main class="catalog  mb ">

    <div class="boxleft">

        <div class="box_title">Đăng ký thành viên</div>
        <h3 class="thongbao">
            <?php
            if (isset($thongbao) && $thongbao != "") {
                echo $thongbao;
            }
            ?>
        </h3>
        <div class="box_content form_account">
            <form id="form_dki" action="index.php?act=dangky" method="post">
                <div>
                    <h4>Tên đăng nhập</h4><br>
                    <input type="text" name="user">
                </div>
                <div>
                    <h4>Địa chỉ email</h4><br>
                    <input type="email" name="email">
                </div>
                <div>
                    <h4>Mật khẩu</h4><br>
                    <input type="password" name="pass">
                </div>
                <input type="submit" value="Đăng ký" name="dangky">
                <input type="reset" value="Nhập lại">
            </form>
        </div>

    </div>
    <?php
    include "view/box_right.php";
    ?>

</main>