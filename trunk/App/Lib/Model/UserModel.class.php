<?php

class UserModel extends CommonModel {

    protected $_validate = array(
        array('account', '/^[a-z]\w{4,}$/i', 'Tên tài khoản không hợp lệ'),
        array('password', 'require', 'Bạn phải nhập mật khẩu'),
        array('repassword', 'require', 'Bạn phải xác thực mật khẩu'),
        array('repassword', 'password', 'Mật khẩu không trùng khớp', 0, 'confirm'),
        array('account', '', 'Tài khoản này đã tồn tại', 0, 'unique', self::MODEL_INSERT),
        array('bind_account', 'checkBindAccount', 'Đồng bộ tài khoản', 2, 'callback', self::MODEL_BOTH),
    );
    protected $_auto = array(
        array('password', 'pwdHash', 'callback', self::MODEL_BOTH),
        array('create_time', 'time', 'function', self::MODEL_INSERT),
        array('update_time', 'time', 'function', self::MODEL_UPDATE),
    );

    public function checkBindAccount() {
        $map['id'] = array('neq', $_POST['id']);
        $map['bind_account'] = $_POST['bind_account'];
        if ($this->where($map)->find()) {
            return false;
        }
        return true;
    }

    protected function pwdHash() {
        if (isset($_POST['password'])) {
            return pwdHash($_POST['password']);
        } else {
            return false;
        }
    }

}

?>
