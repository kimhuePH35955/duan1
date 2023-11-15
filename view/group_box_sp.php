<?php
echo '
 <div class="box_items box_items_home">
     <div class="box_items_img">
         <a href="' . $linksp . '">
             <img src="' . $hinh . '" alt="">
          </a>
     </div>
         <p>' . $price . '</p>
         <a href="' . $linksp . '">' . $name . '</a>
         <div class="add" href="">
      <form action="index.php?act=addtocart" method="POST">
         <input type="hidden" name="id" value="' . $id . '">
         <input type="hidden" name="name" value="' . $name . '">
         <input type="hidden" name="img" value="' . $img . '">
         <input type="hidden" name="price" value="' . $price . '">
          <input type="submit" name="addtocart" value="Thêm vào giỏ hàng">
       </form>
         </div>
 </div>
 ';
