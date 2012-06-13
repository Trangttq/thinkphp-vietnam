<?php

class UserModel extends CommonModel {

    protected $_validate = array(
        array('account', '/^[a-z]\w{4,}$/i', '帐号格式错误'),
        array('password', 'require', '密码必须'),
        array('repassword', 'require', '确认密码必须'),
        array('repassword', 'password', '确认密码不一致', 0, 'confirm'),
        array('account', '', '帐号已经存在', 0, 'unique', self::MODEL_INSERT),
        array('bind_account', 'checkBindAccount', '绑定帐号重复', 2, 'callback', self::MODEL_BOTH),
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
