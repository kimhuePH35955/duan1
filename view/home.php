<main class="catalog  mb ">
    <div class="boxleft">
        <div class="banner">
            <img id="banner" src="./img/anh0.jpg" alt="">
            <button class="pre" onclick="pre()">&#10094;</button>
            <button class="next" onclick="next()">&#10095;</button>
        </div>
        <div class="items">
            <?php
            foreach ($sanpham_home_9 as $sanpham) {
                extract($sanpham);
                $hinh = $img_path . $img;
                $linksp = "index.php?act=sanphamct&idsp=" . $id;
            ?>
            <?php
                include "group_box_sp.php";
            }
            ?>
        </div>

    </div>
    <?php
    include "view/box_right.php";
    ?>


</main>