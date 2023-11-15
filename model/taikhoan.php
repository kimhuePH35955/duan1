<?php
function insert_taikhoan($email, $user, $pass, $address = '', $tel = '', $role = '')
{
    $sql = "INSERT INTO taikhoan(email,user,pass,address,tel,role)
     VALUES('$email','$user','$pass','$address','$tel','$role')";
    pdo_execute($sql);
}
function checkuser($user, $pass)
{
    $sql = "SELECT * FROM taikhoan WHERE user='" . $user . "'and pass='" . $pass . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function check_email($email)
{
    $sql = "SELECT * FROM taikhoan WHERE email='$email' ";
    $sp = pdo_query_one($sql);
    return $sp;
}
function update_taikhoan($id, $user, $pass, $email, $address, $tel, $role)
{
    $sql = "UPDATE taikhoan SET
        user= '" . $user . "',
        pass='" . $pass . "',
        email= '" . $email . "' ,
        address= '" . $address . "' ,
        tel= '" . $tel . "' ,
        role='" . $role . "'
         WHERE id=" . $id;
    return pdo_execute($sql);
}
function loadALl_taikhoan()
{
    $sql = "SELECT * FROM taikhoan ORDER BY id desc";
    $listtaikhoan = pdo_query($sql);
    return $listtaikhoan;
}
function delete_taikhoan($id)
{
    $sql = "DELETE FROM taikhoan WHERE id=" . $id;
    pdo_execute($sql);
}
function loadone_taikhoan($id)
{
    $sql = "SELECT * FROM taikhoan WHERE id=" . $id;
    $tk = pdo_query_one($sql);
    return $tk;
}
