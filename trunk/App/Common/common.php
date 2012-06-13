<?php
//Chức năng dùng chung cho hệ thống
function pwdHash($password, $type = 'md5') {
    return hash($type, $password);
}
?>
