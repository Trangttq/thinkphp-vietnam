<?php

/**
 +------------------------------------------------------------------------------
 * Thao tác mở rộng hệ thống Bộ tạo form mẫu token
 +------------------------------------------------------------------------------
 */
class TokenBuildBehavior extends Behavior {
    // Định nghĩa thao tác
    protected $options   =  array(
        'TOKEN_ON'              => true,     // Bật chức năng xác nhận token
        'TOKEN_NAME'            => '__hash__',    // Token authentication từ trường bị ẩn
        'TOKEN_TYPE'            => 'md5',   // Quy tắc sử dụng để xác nhận
        'TOKEN_RESET'               =>   true, // Có tạo lại token khi bị lỗi?
    );

    public function run(&$content){
        if(C('TOKEN_ON')) {
            if(strpos($content,'{__TOKEN__}')) {
                // Xác định vị trí trường ẩn giấu từ biểu mẫu
                $content = str_replace('{__TOKEN__}',$this->buildToken(),$content);
            }elseif(preg_match('/<\/form(\s*)>/is',$content,$match)) {
                // Tạo token thông minh từ biểu mẫu
                $content = str_replace($match[0],$this->buildToken().$match[0],$content);
            }
        }
    }

    // Tạo form token
    private function buildToken() {
        $tokenName   = C('TOKEN_NAME');
        $tokenType = C('TOKEN_TYPE');
        if(!isset($_SESSION[$tokenName])) {
            $_SESSION[$tokenName]  = array();
        }
        // Định nghĩa dành cho trang hiện hành
        $tokenKey  =  md5($_SERVER['REQUEST_URI']);
        if(isset($_SESSION[$tokenName][$tokenKey])) {// Tránh trường hợp trùng mã token bằng cách thêm biến session
            $tokenValue = $_SESSION[$tokenName][$tokenKey];
        }else{
            $tokenValue = $tokenType(microtime(TRUE));
            $_SESSION[$tokenName][$tokenKey]   =  $tokenValue;
        }
        // Thêm thao tác bổ sung để tránh trường hợp trang remote khác có thể thao tác trái phép
        if($action   =  C('TOKEN_ACTION')){
            $_SESSION[$action($tokenKey)] = true;
        }
        $token   =  '<input type="hidden" name="'.$tokenName.'" value="'.$tokenKey.'_'.$tokenValue.'" />';
        return $token;
    }
}