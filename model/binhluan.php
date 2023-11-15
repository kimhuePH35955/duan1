<?php
function load_binhluan($idsp)
{
    $sql = "
    SELECT binhluan.noidung, taikhoan.user, binhluan.ngaybinhluan FROM `binhluan` 
    LEFT JOIN taikhoan ON binhluan.iduser = taikhoan.id
    LEFT JOIN sanpham ON binhluan.idpro = sanpham.id
    WHERE sanpham.id = $idsp;
   ";
    $bl = pdo_query($sql);
    return $bl;
}
function insert_binhluan($idpro, $noidung, $iduser)
{
    $date = date('Y-m-d');
    $sql = "
        INSERT INTO `binhluan`(`noidung`, `iduser`, `idpro`, `ngaybinhluan`) 
        VALUES ('$noidung','$iduser','$idpro','$date');
    ";
    pdo_execute($sql);
}
function loadAll_binhluan($idpro)
{
    $sql = "SELECT * FROM binhluan WHERE 1";
    if ($idpro > 0) {
        $sql .= " and idpro ='" . $idpro . "'";
    }
    $sql .= " order by id desc";
    $listbl = pdo_query($sql);
    return $listbl;
}
function  delete_binhluan($id)
{
    $sql = "DELETE FROM binhluan WHERE id= " . $id;
    pdo_execute($sql);
}
