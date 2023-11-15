<?php 
function tongdonhang() {

    $tong=0;
    foreach ($_SESSION['mycart'] as $cart) {
        $thanhtoan=$cart[3]*$cart[4];
        $tong+=$thanhtoan;
    }
    return $tong;
    
}
function insert_bill($name, $email, $address,$tel,$ngaydathang,$tongdonhang)
{
    $sql = "
        INSERT INTO `binhluan`(`name`, `email`, `address`, `tel`,`ngaydathang`,`tongdonhang`) 
        VALUES ('$name','$email','$address','$tel','$ngaydathang','$tongdonhang');
    ";
    pdo_execute($sql);
}
