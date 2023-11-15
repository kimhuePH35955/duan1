<script>
    $().ready(function() {
        $("#quen_mk").validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,
            rules: {
                "email": {
                    required: true,
                    email: true
                }
            },
            messages: {
                "email": {
                    required: "Vui lòng không được để trống",
                    email: "Vui lòng nhập đúng định dạng email"
                }
            }
        });
    });
</script>

<main class="catalog  mb ">

    <div class="boxleft">

        <div class="box_title">Quên mật khẩu</div>
        <div class="box_content form_account">
            <form id="quen_mk" action="index.php?act=quenmk" method="post">
                <div>
                    <p>Địa chỉ email</p>
                    <input type="email" name="email" placeholder="email">
                </div>
                <input type="submit" value="Gửi" name="guiemail">
                <input type="reset" value="Nhập lại">
            </form><br>
            <h4 class="thongbao">
                <?php
                if (isset($thongbao)) {
                    echo $thongbao;
                }
                ?>
            </h4>
        </div>

    </div>
    <?php
    include "view/box_right.php";
    ?>
</main>