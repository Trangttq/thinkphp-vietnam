<?php

class CommonAction extends Action {

    public function _initialize() {
        if (C('USER_AUTH_ON') && !in_array(MODULE_NAME, explode(',', C('NOT_AUTH_MODULE')))) {
            import('ORG.Util.RBAC');
            if (!RBAC::AccessDecision(GROUP_NAME)) {
                if (!$_SESSION[C('USER_AUTH_KEY')]) {
                    //Nếu chưa thấy session thì chuyển tới trang đăng nhập
                    redirect(PHP_FILE . C('USER_AUTH_GATEWAY'));
                }
                if (C('RBAC_ERROR_PAGE')) {
                    redirect(C('RBAC_ERROR_PAGE'));
                } else {
                    if (C('GUEST_AUTH_ON')) {
                        $this->assign('jumpUrl', PHP_FILE . C('USER_AUTH_GATEWAY'));
                    }
                    $this->error(L('_VALID_ACCESS_'));
                }
            }
        }
    }

}

?>
