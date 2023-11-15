<?php
function load_thongke_sp_danhmuc()
{
    $sql = "SELECT dm.id,dm.name, COUNT(*) 'soluong',MIN(price) 'gia_min', MAX(price) 'gia_max',AVG(price) 'gia_trungbinh' 
    FROM danhmuc dm JOIN sanpham sp ON dm.id=sp.iddm GROUP BY dm.id,dm.name ORDER BY soluong DESC";
    return pdo_query($sql);
}
