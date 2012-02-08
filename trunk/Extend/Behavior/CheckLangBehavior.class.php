<?php

/**
 +------------------------------------------------------------------------------
 * Thao tác mở rộng hệ thống Phát hiện ngôn ngữ và tự tải gói ngôn ngữ
 +------------------------------------------------------------------------------
 */
class CheckLangBehavior extends Behavior {
    // Tham số định nghĩa cho thao tác mở rộng (mặc định) có thể định nghĩa lại trong các project
    protected $options   =  array(
            'LANG_SWITCH_ON'        => false,   // Thiết lập chuyển đổi ngôn ngữ
            'LANG_AUTO_DETECT'      => true,   // Tự động phát hiện ngôn ngữ
            'LANG_LIST' => 'vi-vn,en-us', // Danh sách ngôn ngữ hỗ trợ
            'VAR_LANGUAGE'          => 'l',		// Biến chuyển đổi ngôn ngữ
        );

    // Thao tác mở rộng cần phải được run
    public function run(&$params){
        // Check ngôn ngữ
        $this->checkLanguage();
    }

    /**
     +----------------------------------------------------------
     * Kiểm tra ngôn ngữ
     * Kiểm tra xem trình duyệt đang sử dụng ngôn ngữ nào, tự động tải gói ngôn ngữ thích hợp
     +----------------------------------------------------------
     * @access private
     +----------------------------------------------------------
     * @return void
     +----------------------------------------------------------
     */
    private function checkLanguage() {
        // 
        if (!C('LANG_SWITCH_ON')){
            return;
        }
        $langSet = C('DEFAULT_LANG');
        // Mở chức năng đa ngôn ngữ
        // Kiểm tra xem có bật chức năng tự động phát hiện hay không, để lấy thông số cho ngôn ngữ đã chọn
        if (C('LANG_AUTO_DETECT')){
            if(isset($_GET[C('VAR_LANGUAGE')])){
                $langSet = $_GET[C('VAR_LANGUAGE')];// Lấy tham số ngôn ngữ từ url
                cookie('think_language',$langSet,3600);
            }elseif(cookie('think_language')){// Lấy thông số mà người dùng lựa chọn cuối
                $langSet = cookie('think_language');
            }elseif(isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])){// Tự động phát hiện ngôn ngữ trình duyệt sử dụng
                preg_match('/^([a-z\-]+)/i', $_SERVER['HTTP_ACCEPT_LANGUAGE'], $matches);
                $langSet = $matches[1];
                cookie('think_language',$langSet,3600);
            }
            if(false === stripos(C('LANG_LIST'),$langSet)) { // Tham số ngôn ngữ không hợp lệ
                $langSet = C('DEFAULT_LANG');
            }
        }
        // Định nghĩa ngôn ngữ hiện hành
        define('LANG_SET',strtolower($langSet));
        // Đọc tệp ngôn ngữ dùng chung cho gói ngôn ngữ lựa chọn
        if (is_file(LANG_PATH.LANG_SET.'/common.php'))
            L(include LANG_PATH.LANG_SET.'/common.php');
        $group = '';
        // Đọc gói ngôn ngữ dành cho nhóm project hiện hành
        if (defined('GROUP_NAME')){
            $group = GROUP_NAME.C('TMPL_FILE_DEPR');
            if (is_file(LANG_PATH.LANG_SET.'/'.$group.'lang.php'))
                L(include LANG_PATH.LANG_SET.'/'.$group.'lang.php');
        }
        // Đọc gói ngôn ngữ dành cho module hiện hành
        if (is_file(LANG_PATH.LANG_SET.'/'.$group.strtolower(MODULE_NAME).'.php'))
            L(include LANG_PATH.LANG_SET.'/'.$group.strtolower(MODULE_NAME).'.php');
    }
}