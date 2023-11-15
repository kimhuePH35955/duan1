<?php
function insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm)
{
    $sql = "INSERT INTO sanpham(name,price,img,mota,iddm) VALUES('$tensp','$giasp','$hinh','$mota','$iddm')";
    pdo_execute($sql);
}
function delete_sanpham($id)
{
    $sql = "DELETE FROM sanpham WHERE id=" . $id;
    pdo_execute($sql);
}
function load9_sanpham_home($search = "", $iddm = 0)
{
    $sql = "SELECT * FROM sanpham WHERE 1 ORDER BY id limit 0,9";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function top10_sp()
{
    $sql = "SELECT * FROM sanpham WHERE 1 ORDER BY luotxem limit 0,10";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadALl_sanpham($search = "", $iddm = 0)
{
    $sql = "SELECT * FROM sanpham WHERE 1";
    if ($search != "") {
        $sql .= " and name like '%" . $search . "%'";
    }
    if ($iddm > 0) {
        $sql .= " and iddm = '" . $iddm . "'";
    }
    $sql .= " ORDER BY id desc";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function load_ten_dm($iddm)
{
    if ($iddm > 0) {
        $sql = "SELECT * FROM danhmuc WHERE id=" . $iddm;
        $dm = pdo_query_one($sql);
        extract($dm);
        return $name;
    } else {
        return "";
    }
}
function loadone_sanpham($id)
{
    $sql = "SELECT * FROM sanpham WHERE id=" . $id;
    $sp = pdo_query_one($sql);
    return $sp;
}
function load_sanpham_cungloai($id, $iddm)
{
    $sql = "SELECT * FROM sanpham WHERE iddm=" . $iddm . " and id <>" . $id;
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function update_sanpham($id, $iddm, $tensp, $gia, $mota, $hinh)
{
    if ($hinh != "") {
        $sql = "UPDATE sanpham SET 
        iddm= '" . $iddm . "',
        name= '" . $tensp . "',
        price='" . $gia . "',
         mota= '" . $mota . "', 
         img= '" . $hinh . "' 
         WHERE id=" . $id;
    } else {
        $sql = "UPDATE sanpham SET
        iddm= '" . $iddm . "',
        name= '" . $tensp . "',
        price='" . $gia . "',
         mota= '" . $mota . "' 
         WHERE id=" . $id;
    }
    return pdo_execute($sql);
}
