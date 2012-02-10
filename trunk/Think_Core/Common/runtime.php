<?php

/**
 +------------------------------------------------------------------------------
 * ThinkPHP Tệp runtime đã được biên dịch và không cần sử dụng đến
 +------------------------------------------------------------------------------
 */
if (!defined('THINK_PATH')) exit();
//  Thông tin phiên bản
define('THINK_VERSION', '3.0RC2');
define('THINK_RELEASE', '20120207');
//revision 2724

//   Thông tin hệ thống
if(version_compare(PHP_VERSION,'5.4.0','<') ) {
    @set_magic_quotes_runtime (0);
    define('MAGIC_QUOTES_GPC',get_magic_quotes_gpc()?True:False);
}
define('IS_CGI',substr(PHP_SAPI, 0,3)=='cgi' ? 1 : 0 );
define('IS_WIN',strstr(PHP_OS, 'WIN') ? 1 : 0 );
define('IS_CLI',PHP_SAPI=='cli'? 1   :   0);

if(!IS_CLI) {
    // Tên tệp hiện tại
    if(!defined('_PHP_FILE_')) {
        if(IS_CGI) {
            //CGI/FASTCGI模式下
            $_temp  = explode('.php',$_SERVER["PHP_SELF"]);
            define('_PHP_FILE_',  rtrim(str_replace($_SERVER["HTTP_HOST"],'',$_temp[0].'.php'),'/'));
        }else {
            define('_PHP_FILE_',    rtrim($_SERVER["SCRIPT_NAME"],'/'));
        }
    }
    if(!defined('__ROOT__')) {
        // URL gốc
        if( strtoupper(APP_NAME) == strtoupper(basename(dirname(_PHP_FILE_))) ) {
            $_root = dirname(dirname(_PHP_FILE_));
        }else {
            $_root = dirname(_PHP_FILE_);
        }
        define('__ROOT__',   (($_root=='/' || $_root=='\\')?'':$_root));
    }

    //Mẫu URL hỗ trợ
    define('URL_COMMON',      0);   //Chế độ bình thường
    define('URL_PATHINFO',    1);   //Chế độ PATHINFO
    define('URL_REWRITE',     2);   //Chế độ REWRITE
    define('URL_COMPAT',      3);   // Chế độ tương thích
}

// Thiết lập đường dẫn có thể định nghĩa lại đường dẫn tất cả đường dẫn phải có "." sau cùng
if(!defined('CORE_PATH')) define('CORE_PATH',THINK_PATH.'Lib/'); // Thư viện hệ thống
if(!defined('EXTEND_PATH')) define('EXTEND_PATH',THINK_PATH.'Extend/'); // Thư viện mở rộng hệ thống
if(!defined('MODE_PATH')) define('MODE_PATH',EXTEND_PATH.'Mode/'); // Thư mục model hệ thống
if(!defined('VENDOR_PATH')) define('VENDOR_PATH',EXTEND_PATH.'Vendor/'); // Lớp mở rộng ngoài hệ thống
if(!defined('LIBRARY_PATH')) define('LIBRARY_PATH',EXTEND_PATH.'Library/'); // Thư viện mở rộng ngoài hệ thống
if(!defined('COMMON_PATH')) define('COMMON_PATH',    APP_PATH.'Common/'); // Thư mục chứa tệp cấu hình chung
if(!defined('LIB_PATH')) define('LIB_PATH',    APP_PATH.'Lib/'); // Thư mục chứa class thư viện
if(!defined('CONF_PATH')) define('CONF_PATH',  APP_PATH.'Conf/'); // Thư mục chứa tệp cấu hình project
if(!defined('LANG_PATH')) define('LANG_PATH', APP_PATH.'Lang/'); // Thư mục chứa tệp ngôn ngữ
if(!defined('TMPL_PATH')) define('TMPL_PATH',APP_PATH.'Tpl/'); // Thư mục chứa giao diện
if(!defined('HTML_PATH')) define('HTML_PATH',APP_PATH.'Html/'); // Thư mục chứa tệp html tĩnh
if(!defined('LOG_PATH')) define('LOG_PATH',  RUNTIME_PATH.'Logs/'); // Thư mục chứa log project
if(!defined('TEMP_PATH')) define('TEMP_PATH', RUNTIME_PATH.'Temp/'); // Thư mục chứa tệp nhớ tạm thời
if(!defined('DATA_PATH')) define('DATA_PATH', RUNTIME_PATH.'Data/'); // Thư mục chứa data
if(!defined('CACHE_PATH')) define('CACHE_PATH',   RUNTIME_PATH.'Cache/'); // Thư mục chứa cache

// Nạp tệp runtime và chịu trách nhiệm tạo ra các tệp
function load_runtime_file() {
    // Tải thư viện hệ thống
    require THINK_PATH.'Common/common.php';
    // Đọc các tệp biên dịch core hệ thống
    $list = array(
        CORE_PATH.'Core/Think.class.php',
        CORE_PATH.'Core/ThinkException.class.php',  // Lớp exception
        CORE_PATH.'Core/Behavior.class.php',
    );
    // Nạp danh sách tệp tin mode
    foreach ($list as $key=>$file){
        if(is_file($file))  require_cache($file);
    }
    // Nạp class trong thư viện đã được định nghĩa
    alias_import(include THINK_PATH.'Conf/alias.php');

    // Kiểm tra cấu trúc thư mục project, nếu không tồn tại tự động tạo
    if(!is_dir(LIB_PATH)) {
        // Tạo cấu trúc thư mục project
        build_app_dir();
    }elseif(!is_dir(CACHE_PATH)){
        // Kiểm tra tệp chứa cache
        check_runtime();
    }elseif(APP_DEBUG){
        // Chuyển đổi chế độ debug để xóa cache đã được biên dịch
        if(is_file(RUNTIME_FILE))   unlink(RUNTIME_FILE);
    }
}

// Kiểm tra tệp chứa cache (Runtime) nếu không tồn tại, tự động tạo ra
function check_runtime() {
    if(!is_dir(RUNTIME_PATH)) {
        mkdir(RUNTIME_PATH);
    }elseif(!is_writeable(RUNTIME_PATH)) {
        header("Content-Type:text/html; charset=utf-8");
        exit('Thư mục [ '.RUNTIME_PATH.' ] không có quyền ghi');
    }
    mkdir(CACHE_PATH);  // Thư mục chứa cache
    if(!is_dir(LOG_PATH))	mkdir(LOG_PATH);    // Thư mục chứa log
    if(!is_dir(TEMP_PATH))  mkdir(TEMP_PATH);	// Thư mục chứa dữ liệu tạm thời
    if(!is_dir(DATA_PATH))	mkdir(DATA_PATH);	// Thư mục chứa dữ liệu
    return true;
}

// Tạo tệp biên dịch tạm thời
function build_runtime_cache($append='') {
    // Trình tạo các tệp biên dịch
    $defs = get_defined_constants(TRUE);
    $content    =  '$GLOBALS[\'_beginTime\'] = microtime(TRUE);';
    if(defined('RUNTIME_DEF_FILE')) { // Giới thiệu về các hằng số trong file biên dịch
        file_put_contents(RUNTIME_DEF_FILE,'<?php '.array_define($defs['user']));
        $content  .=  'require \''.RUNTIME_DEF_FILE.'\';';
    }else{
        $content  .= array_define($defs['user']);
    }
    // Đọc danh sách các tệp core để biên dịch
    $list = array(
        THINK_PATH.'Common/common.php',
        CORE_PATH.'Core/Think.class.php',
        CORE_PATH.'Core/ThinkException.class.php',
        CORE_PATH.'Core/Behavior.class.php',
    );
    foreach ($list as $file){
        $content .= compile($file);
    }
    // Lấy tag thư viện của hệ thống
    if(C('APP_TAGS_ON')) {
        $content .= build_tags_cache();
    }
    $alias = include THINK_PATH.'Conf/alias.php';
    $content .= 'alias_import('.var_export($alias,true).');';
    // Biên dịch framework sử dụng ngôn ngữ, và cấu hình
    $content .= $append."\nL(".var_export(L(),true).");C(".var_export(C(),true).');G(\'loadTime\');Think::Start();';
    file_put_contents(RUNTIME_FILE,strip_whitespace('<?php '.$content));
}

// Lấy thông tin từ thư viện mở rộng để xây dựng thao tác hệ thống
function build_tags_cache() {
    $tags = C('extends');
    $content = '';
    foreach ($tags as $tag=>$item){
        foreach ($item as $key=>$name) {
            $content .= is_int($key)?compile(CORE_PATH.'Behavior/'.$name.'Behavior.class.php'):compile($name);
        }
    }
    return $content;
}

// Tạo cấu trúc thư mục cho project
function build_app_dir() {
    // Nếu như chưa tạo thư mục cho project, tự động tạo thư mục
    if(!is_dir(APP_PATH)) mk_dir(APP_PATH,0777);
    if(is_writeable(APP_PATH)) {
        $dirs  = array(
            LIB_PATH,
            RUNTIME_PATH,
            CONF_PATH,
            COMMON_PATH,
            LANG_PATH,
            CACHE_PATH,
            TMPL_PATH,
            TMPL_PATH.C('DEFAULT_THEME').'/',
            LOG_PATH,
            TEMP_PATH,
            DATA_PATH,
            LIB_PATH.'Model/',
            LIB_PATH.'Action/',
            LIB_PATH.'Behavior/',
            LIB_PATH.'Widget/',
            );
        foreach ($dirs as $dir){
            if(!is_dir($dir))  mk_dir($dir,0777);
        }
        // Ghi thông tin vào tệp được bảo mật
        if(!defined('BUILD_DIR_SECURE')) define('BUILD_DIR_SECURE',false);
        if(BUILD_DIR_SECURE) {
            if(!defined('DIR_SECURE_FILENAME')) define('DIR_SECURE_FILENAME','index.html');
            if(!defined('DIR_SECURE_CONTENT')) define('DIR_SECURE_CONTENT',' ');
            // Tự động ghi thông tin vào tệp được bảo vệ
            $content = DIR_SECURE_CONTENT;
            $a = explode(',', DIR_SECURE_FILENAME);
            foreach ($a as $filename){
                foreach ($dirs as $dir)
                    file_put_contents($dir.$filename,$content);
            }
        }
        // Ghi tệp cấu hình cho group
        if(!is_file(CONF_PATH.'config.php'))
            file_put_contents(CONF_PATH.'config.php',"<?php\nreturn array(\n\t//'Tên biến'=>'Giá trị'\n);\n?>");
        // Ghi test Action
        if(!is_file(LIB_PATH.'Action/IndexAction.class.php'))
            build_first_action();
    }else{
        header("Content-Type:text/html; charset=utf-8");
        exit('Thư mục project không thể ghi, không thể tạo thư mục<BR> Vui lòng sử dụng project builder hoặc tạo thủ công~');
    }
}

// Tạo test Action
function build_first_action() {
    $content = file_get_contents(THINK_PATH.'Tpl/default_index.tpl');
    file_put_contents(LIB_PATH.'Action/IndexAction.class.php',$content);
}

// Nạp và chạy các tệp yêu cầu
load_runtime_file();