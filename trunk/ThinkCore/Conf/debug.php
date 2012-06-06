<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2012 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// $Id: debug.php 2805 2012-03-07 15:15:21Z liu21st $

/**
 +------------------------------------------------------------------------------
 * ThinkPHP 默认的调试模式配置文件
 *  如果项目有定义自己的调试模式配置文件，本文件无效
 +------------------------------------------------------------------------------
 * @category   Think
 * @package  Common
 * @author   liu21st <liu21st@gmail.com>
 * @version  $Id: debug.php 2805 2012-03-07 15:15:21Z liu21st $
 +------------------------------------------------------------------------------
 */
if (!defined('THINK_PATH')) exit();
// Chế độ debug, các thiết lập dưới đây có thể thay đổi phụ thuộc vào tệp debug của mỗi project
return  array(
    'LOG_RECORD'=>true,  // Xử lý ghi dữ liệu
    'LOG_EXCEPTION_RECORD'  => true,    // Lưu thông tin exception
    'LOG_LEVEL'       =>   'EMERG,ALERT,CRIT,ERR,WARN,NOTIC,INFO,DEBUG,SQL',  // Các cấp độ lưu trữ log
    'DB_FIELDS_CACHE'=> false, // Lưu thông tin cache db (true|false)
    'APP_FILE_CASE'  =>   true, // Kiểm tra tệp trên môi trường Windows (true|false)
    'TMPL_CACHE_ON'    => false,        // Thiết lập cache giao diện (true|false)
    'TMPL_STRIP_SPACE'      => false,       // Xóa ký tự trống và dòng trống trong HTML (true|false)
    'SHOW_ERROR_MSG'        => true,    // Hiển thị thông báo lỗi (true|false)
);