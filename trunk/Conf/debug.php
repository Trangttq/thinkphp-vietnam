<?php

/**
 +------------------------------------------------------------------------------
 * ThinkPHP Tệp cấu hình chế độ debug mặc định
 *  Nếu trong project của bạn có tệp cấu hình debug riêng, tệp này sẽ bị vô hiệu
 +------------------------------------------------------------------------------
 * @category   Think
 * @package  Common
 * @author   liu21st <liu21st@gmail.com>
 * @version  $Id$
 +------------------------------------------------------------------------------
 */
if (!defined('THINK_PATH')) exit();
// Chế độ debug, các cấu hình mặc định dưới đây có thể được định nghĩa lại trong từng project với tên tệp là debug.php
return  array(
    'LOG_RECORD'=>true,  // Ghi thông tin thao tác
    'LOG_EXCEPTION_RECORD'  => true,    // Ghi các thông tin thao tác ngoại lệ
    'LOG_LEVEL'       =>   'EMERG,ALERT,CRIT,ERR,WARN,NOTIC,INFO,DEBUG,SQL',  // Cấp độ ghi log
    'DB_FIELDS_CACHE'=> false, // Log trường cơ sở dữ liệu
    'APP_FILE_CASE'  =>   true, // Kiểm tra các tệp trong trường hợp sử dụng windows
    'TMPL_STRIP_SPACE'      => false,       // Loại bỏ cách dòng, khoảng trắng
    'SHOW_ERROR_MSG'        => true,    // Hiển thị lỗi
);