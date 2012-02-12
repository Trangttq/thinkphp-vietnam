<?php

/**
 +------------------------------------------------------------------------------
 * ThinkPHP Tệp cấu hình tùy chọn
 * Vui lòng không chỉnh sửa tệp tin này, mọi chỉnh sửa có thể làm hệ thống lỗi.
 * Trong trường hợp bạn thay đổi cấu hình tùy ý, hệ thống sẽ biến đổi thành chữ thường
 * Tất cả các tham số phải được cấu hình trước khi chạy core
 +------------------------------------------------------------------------------
 * @category Think
 * @package  Common
 * @author   liu21st <liu21st@gmail.com>
 * @version  $Id$
 +------------------------------------------------------------------------------
 */
if (!defined('THINK_PATH')) exit();
return  array(
    /* Thiết lập project */
    'APP_STATUS'            => 'debug',  // 应用调试模式状态 调试模式开启后有效 默认为debug 可扩展 并自动加载对应的配置文件
    'APP_FILE_CASE'         => false,   // 是否检查文件的大小写 对Windows平台有效
    'APP_AUTOLOAD_PATH'     => '',// 自动加载机制的自动搜索路径,注意搜索顺序
    'APP_TAGS_ON'           => true, // 系统标签扩展开关
    'APP_SUB_DOMAIN_DEPLOY' => false,   // 是否开启子域名部署
    'APP_SUB_DOMAIN_RULES'  => array(), // 子域名部署规则
    'APP_SUB_DOMAIN_DENY'   => array(), //  子域名禁用列表
    'APP_GROUP_LIST'        => '',      // 项目分组设定,多个组之间用逗号分隔,例如'Home,Admin'

    /* Thiết lập cookie */
    'COOKIE_EXPIRE'         => 3600,    // Thời gian lưu cookie
    'COOKIE_DOMAIN'         => '',      // Cookie domain
    'COOKIE_PATH'           => '/',     // Cookie path
    'COOKIE_PREFIX'         => '',      // Cookie prefix

    /* Thiết lập mặc định */
    'DEFAULT_APP'           => '@',     // Tên project mặc định, @ nghĩa là project hiện hành
    'DEFAULT_LANG'          => 'vi-vn', // Ngôn ngữ mặc định
    'DEFAULT_THEME'    => '',	// 默认模板主题名称
    'DEFAULT_GROUP'         => 'Home',  // Nhóm mặc định
    'DEFAULT_MODULE'        => 'Index', // Module mặc định
    'DEFAULT_ACTION'        => 'index', // Thao tác mặc định
    'DEFAULT_CHARSET'       => 'utf-8', // Charset mặc định
    'DEFAULT_TIMEZONE'      => 'Asia/Saigon',	// Múi giờ khu vực có thể sử dụng: Asia/Ho_Chi_Minh hoặc Asia/Saigon
    'DEFAULT_AJAX_RETURN'   => 'JSON',  // Định dạng dữ liệu trả về từ ajax,tùy chọn JSON hoặc XML ...
    'DEFAULT_FILTER'        => 'htmlspecialchars', // Cách lọc thông số mặc định VD: $this->_get('Tên biến');$this->_post('Tên biến')...

    /* Thiết lập cơ sở dữ liệu */
    'DB_TYPE'               => 'mysql',     // Kiểu dữ liệu
	'DB_HOST'               => 'localhost', // Máy chủ dữ liệu
	'DB_NAME'               => '',          // Tên db
	'DB_USER'               => 'root',      // Tài khoản db
	'DB_PWD'                => '',          // Mật khẩu db
	'DB_PORT'               => '',        // Cổng db
	'DB_PREFIX'             => 'think_',    // Tiền tố dữ liệu
    'DB_FIELDTYPE_CHECK'    => false,       // Có kiểm tra loại trường db không?
    'DB_FIELDS_CACHE'       => true,        // Bật, tắt chức năng cache db
    'DB_CHARSET'            => 'utf8',      // DB charset sử dụng, mặc định là utf8
    'DB_DEPLOY_TYPE'        => 0, // Database deployment:0 tập trụng(chỉ 1 dữ liệu),1 phân tán(máy chủ và máy slave)
    'DB_RW_SEPARATE'        => false,       // Database read and write whether separation Master-slave type of effective
    'DB_MASTER_NUM'         => 1, // Read and write after the separation The number of primary server
    'DB_SQL_BUILD_CACHE'    => false, // SQL database query to create a cache
    'DB_SQL_BUILD_QUEUE'    => 'file',   // SQL cache queue cache to support the file xcache and apc
    'DB_SQL_BUILD_LENGTH'   => 20, // SQL cache queue length

    /* Cài đặt bộ nhớ cache */
    'DATA_CACHE_TIME'		=> 0,      // The data cache is valid o mean permanent cache
    'DATA_CACHE_COMPRESS'   => false,   // Whether the data cache compression cache
    'DATA_CACHE_CHECK'		=> false,   // Data cache is parity cache
    'DATA_CACHE_TYPE'		=> 'File',  // Types of data cache,VD:File|Db|Apc|Memcache|Shmop|Sqlite|Xcache|Apachenote|Eaccelerator
    'DATA_CACHE_PATH'       => TEMP_PATH,// Cache path settings (Cache is valid only for File mode)
    'DATA_CACHE_SUBDIR'		=> false,    // 使用子目录缓存 (自动根据缓存标识的哈希创建子目录)
    'DATA_PATH_LEVEL'       => 1,        // Subdirectory of the cache level

    /* Thông báo lỗi */
    'ERROR_MESSAGE'         => 'Có lỗi phát sinh, vui lòng thử lại sau~',//Error display, non-debug mode is effective
    'ERROR_PAGE'            => '',	// Trang định hướng lỗi
    'SHOW_ERROR_MSG'        => false,    // Hiển thị thông báo lỗi

    /* Thiết lập log */
    'LOG_RECORD'            => false,   // The default log does not record
    'LOG_TYPE'                 => 3, // 日志记录类型 0 系统 1 邮件 3 文件 4 SAPI 默认为文件方式
    'LOG_DEST'                 => '', // 日志记录目标
    'LOG_EXTRA'               => '', // 日志记录额外信息
    'LOG_LEVEL'                => 'EMERG,ALERT,CRIT,ERR',// 允许记录的日志级别
    'LOG_FILE_SIZE'         => 2097152,	// 日志文件大小限制
    'LOG_EXCEPTION_RECORD'  => false,    // 是否记录异常信息日志

    /* Thiết lập SESSION */
    'SESSION_AUTO_START'    => true,    // 是否自动开启Session
    'SESSION_OPTIONS'           => array(), // session 配置数组 支持type name id path expire domian 等参数
    'SESSION_TYPE'              => '', // session hander类型 默认无需设置 除非扩展了session hander驱动
    'SESSION_PREFIX'            => '', // session 前缀
    'VAR_SESSION_ID'        => 'session_id',     //sessionID的提交变量

    /* Cài đặt cơ bản cho template engine */
    'TMPL_CONTENT_TYPE'     => 'text/html', // 默认模板输出类型
    'TMPL_ACTION_ERROR'     => THINK_PATH.'Tpl/dispatch_jump.tpl', // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS'   => THINK_PATH.'Tpl/dispatch_jump.tpl', // 默认成功跳转对应的模板文件
    'TMPL_EXCEPTION_FILE'   => THINK_PATH.'Tpl/think_exception.tpl',// 异常页面的模板文件
    'TMPL_DETECT_THEME'     => false,       // 自动侦测模板主题
    'TMPL_TEMPLATE_SUFFIX'  => '.html',     // 默认模板文件后缀
    'TMPL_FILE_DEPR'=>'/', //模板文件MODULE_NAME与ACTION_NAME之间的分割符，只对项目分组部署有效

    /* Thiết lập URL */
	'URL_CASE_INSENSITIVE'  => false,   // 默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL'             => 1,       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
    // 0 (Chế độ bình thường); 1 (PATHINFO mode); 2 (REWRITE  mode); 3 (Chế độ tương thích)  默认为PATHINFO 模式，提供最好的用户体验和SEO支持
    'URL_PATHINFO_DEPR'     => '/',	// PATHINFO Mode, ký tự phân tách giữa các thông số
    'URL_HTML_SUFFIX'       => '',  // Thiết lập hậu tố tĩnh cho URL

    /* Thiết lập biến hệ thống */
    'VAR_GROUP'             => 'g',     // Biến định danh của nhóm
    'VAR_MODULE'            => 'm',		// Biến định danh của module
    'VAR_ACTION'            => 'a',		// Biến định danh của action
    'VAR_AJAX_SUBMIT'       => 'ajax',  // Giá trị ajax được submit
    'VAR_PATHINFO'          => 's',	// PATHINFO Chế độ tương thích xuất đường dẫn như ?s=/module/action/id/1, thông tin trả về phụ tuộc vào URL_PATHINFO_DEPR
    'VAR_URL_PARAMS'      => '_URL_', // PATHINFO URL参数变量
    'VAR_TEMPLATE'          => 't',		// 默认模板切换变量
);