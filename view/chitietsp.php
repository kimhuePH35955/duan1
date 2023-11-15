<style>
    .box_content li a {
        text-decoration: none;
        color: black;
        padding: 7px 0;
    }

    .box_content li:hover a {
        color: blue;
    }

    .text {
        align-items: center;
    }
</style>
<main class="catalog  mb ">
    <div class="boxleft">
        <?php
        extract($chitiet);
        ?>
        <div class="mb ">
            <div class="box_title"><?= $name ?></div>
            <?php
            $hinh = $img_path . $img;
            echo '<div class="box_content mb spct text"><img src="' . $hinh . '" width="500">';
            echo "Id sản phẩm: " . $id .
                "<br>" .
                "Giá sản phẩm: " . $price . "<br>" .
                "Danh mục: " . $iddm . "<br>";
            echo '</div>';
            echo "Mô tả sản phẩm: " . $mota;
            ?>
        </div>
        <div class="mb">
            <div class="box_title">BÌNH LUẬN</div>
            <div class="box_content2  product_portfolio">
                <table class="chitietsanpham_view">
                    <?php
                    foreach ($binhluan as $cmt) {
                        extract($cmt);
                        echo '
                      <tr>
                        <td>' . $noidung . '</td>
                        <td>' . $user . '</td>
                        <td>' . $ngaybinhluan . '</td>
                     </tr> 
                    ';
                    }
                    ?>
                </table>
            </div>
            <div class="box_search">
                <form action="index.php?act=sanphamct&idsp=<?= $id ?>" method="POST">
                    <input type="hidden" name="idpro" value="<?= $id ?>">
                    <?php
                    if (!isset($_SESSION['user']['id'])) {
                        echo '
                        <input " type="text" disabled name="noidung" placeholder="Vui lòng đăng nhập để bình luận!">';
                    } else { ?>
                        <input type="text" name="noidung" placeholder="Nhập bình luận">
                        <input type="submit" name="guibinhluan" value="Gửi bình luận">
                    <?php  } ?>
                </form>
            </div>

        </div>
        <div class=" mb">
            <div class="box_title">SẢN PHẨM CÙNG LOẠI</div>
            <div class="box_content">
                <?php
                foreach ($sanpham_cungloai as $spcl) {
                    extract($spcl);
                    $linksp = "index.php?act=sanphamct&idsp=" . $id;
                    echo '
                    <li><a href="' . $linksp . '">' . $name . '</a></li>
                    ';
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    include "box_right.php";
    ?>

</main>