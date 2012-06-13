<?php

class PublicAction extends CommonAction {

    protected function checkUser() {
        if (!isset($_SESSION[C('USER_AUTH_KEY')])) {
            $this->assign('jumpUrl', __APP__ . '/Public/login');
            $this->error('Bạn chưa đăng nhập');
        }
    }

    public function index() {
        //Tự động chuyển về trang chủ
        redirect(__APP__);
    }

    public function login() {

        if (!isset($_SESSION[C('USER_AUTH_KEY')])) {
            $array['test'] = 'test';
            $this->assign($array);
            $this->display();
        } else {
            $this->redirect('Admin-Index/index');
        }
    }

    public function checkLogin() {
        if (empty($_POST['account'])) {
            $this->error('Bạn chưa nhập tài khoản!');
        } elseif (empty($_POST['password'])) {
            $this->error('Ban chưa nhập mật khẩu!');
        } elseif ('' === trim($_POST['verify'])) {
            $this->error('Bạn chưa nhập mã xác thực!');
        }
        //Generate the certification requirements
        $map = array();
        // Support the use of binding account login
        $map['account'] = $_POST['account'];
        $map["status"] = array('gt', 0);
        if ($_SESSION['verify'] != md5($_POST['verify'])) {
            $this->error('Mã xác thực không đúng!');
        }
        import('ORG.Util.RBAC');
        $authInfo = RBAC::authenticate($map);
        //Authentication using the user name, password, and the state
        if (false === $authInfo) {
            $this->error('Tài khoản không tồn tại hoặc đã bị khoá!');
        } else {
            if ($authInfo['password'] != pwdHash($_POST['password'])) {
                $this->error('Mật khẩu không đúng!');
            }
            $_SESSION[C('USER_AUTH_KEY')] = $authInfo['id'];
            $_SESSION['loginUserName'] = $authInfo['nickname'];
            $_SESSION['lastLoginTime'] = $authInfo['last_login_time'];
            $_SESSION['login_count'] = $authInfo['login_count'];
            $_SESSION['user_type'] = $authInfo['type_id'];
            if ($authInfo['account'] == 'admin') {
                $_SESSION['administrator'] = true;
            }
            //Save login information
            $User = M('User');
            $ip = get_client_ip();
            $time = time();
            $data = array();
            $data['id'] = $authInfo['id'];
            $data['last_login_time'] = $time;
            $data['login_count'] = array('exp', '(login_count+1)');
            $data['last_login_ip'] = $ip;
            $User->save($data);
            $_SESSION['loginId'] = $loginId;
            // Cache access rights
            RBAC::saveAccessList();
            $this->success('Đăng nhập thành công');
        }
    }

    public function verify() {
        import("ORG.Util.Image");
        Image::buildImageVerify(4);
    }

}

?>
