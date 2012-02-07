<?php

// ThinkPHP Import các tệp

//Ghi lại thời gian khởi chạy
$GLOBALS['_beginTime'] = microtime(TRUE);
// Khi thông số memory sử dụng
define('MEMORY_LIMIT_ON',function_exists('memory_get_usage'));
if(MEMORY_LIMIT_ON) $GLOBALS['_startUseMems'] = memory_get_usage();
if(!defined('APP_PATH')) define('APP_PATH', dirname($_SERVER['SCRIPT_FILENAME']).'/');
if(!defined('RUNTIME_PATH')) define('RUNTIME_PATH',APP_PATH.'Runtime/');
if(!defined('APP_DEBUG')) define('APP_DEBUG',false); // Chế độ debug?
$runtime = defined('MODE_NAME')?'~'.strtolower(MODE_NAME).'_runtime.php':'~runtime.php';
if(!defined('RUNTIME_FILE')) define('RUNTIME_FILE',RUNTIME_PATH.$runtime);
if(!APP_DEBUG && is_file(RUNTIME_FILE)) {
    // Kiểu sử dụng tệp lưu trữ
    require RUNTIME_FILE;
}else{
    if(version_compare(PHP_VERSION,'5.2.0','<'))  die('require PHP > 5.2.0 !');
    // ThinkPHP Định nghĩa đường dẫn hệ thống
    if(!defined('THINK_PATH')) define('THINK_PATH', dirname(__FILE__).'/');
    if(!defined('APP_NAME')) define('APP_NAME', basename(dirname($_SERVER['SCRIPT_FILENAME'])));
    // Load tệp và chạy
    require THINK_PATH."Common/runtime.php";
    // Lưu thời gian tải tệp
    G('loadTime');
    // Thực thi
    Think::Start();
}