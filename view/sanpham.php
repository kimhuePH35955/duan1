<main class="catalog  mb ">
    <div class="boxleft">
        <div class="mb  ">
            <div class="box_title">Sản phẩm <?= $tendm ?></div>
            <div class="items">
                <?php
                foreach ($dssanpham as $sp) {
                    extract($sp);
                    $hinh = $img_path . $img;
                    $linksp = "index.php?act=sanphamct&idsp=" . $id;

                ?>
                <?php
                    include "group_box_sp.php";
                }
                ?>
            </div>
        </div>
    </div>

    <?php
    include "box_right.php";
    ?>

</main>