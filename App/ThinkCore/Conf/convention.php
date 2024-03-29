<?php

/**
  +------------------------------------------------------------------------------
 * ThinkPHP惯例配置文件
 * 该文件请不要修改，如果要覆盖惯例配置的值，可在项目配置文件中设定和惯例不符的配置项
 * 配置名称大小写任意，系统会统一转换成小写
 * 所有配置参数都可以在生效前动态改变
  +------------------------------------------------------------------------------
 * @category Think
 * @package  Common
 * @author   liu21st <liu21st@gmail.com>
 * @version  $Id: convention.php 2886 2012-04-04 10:03:44Z liu21st@gmail.com $
  +------------------------------------------------------------------------------
 */
if (!defined('THINK_PATH'))
    exit();
return array(
    /* Thiết lập core gốc */
    'APP_STATUS' => 'debug', // 应用调试模式状态 调试模式开启后有效 默认为debug 可扩展 并自动加载对应的配置文件
    'APP_FILE_CASE' => false, // 是否检查文件的大小写 对Windows平台有效
    'APP_AUTOLOAD_PATH' => '', // 自动加载机制的自动搜索路径,注意搜索顺序
    'APP_TAGS_ON' => true, // 系统标签扩展开关
    'APP_SUB_DOMAIN_DEPLOY' => false, // 是否开启子域名部署
    'APP_SUB_DOMAIN_RULES' => array(), // 子域名部署规则
    'APP_SUB_DOMAIN_DENY' => array(), //  子域名禁用列表
    'APP_GROUP_LIST' => '', // Các nhóm ứng dụng, phân tác nhau bằng dấu phẩy, VD: Home,Admin

    /* Thiết lập cookie */
    'COOKIE_EXPIRE' => 3600, // Coodie Expire
    'COOKIE_DOMAIN' => '', // Cookie Domain
    'COOKIE_PATH' => '/', // Cookie Path
    'COOKIE_PREFIX' => '', // Cookie Prefix - tránh trùng cookies

    /* Thiết lập mặc định */
    'DEFAULT_APP' => '@', // Tên project mặc định, @ để chỉ project hiện tại
    'DEFAULT_LANG' => 'vi-vn', // Ngôn ngữ mặc định
    'DEFAULT_THEME' => '', // Giao diện mặc định
    'DEFAULT_GROUP' => 'Home', // Nhóm app mặc định
    'DEFAULT_MODULE' => 'Index', // Module mặc định
    'DEFAULT_ACTION' => 'index', // Thao tác mặc định
    'DEFAULT_CHARSET' => 'utf-8', // Charset mặc định
    'DEFAULT_TIMEZONE' => 'Asia/SaiGon', // Múi giờ mặc định
    'DEFAULT_AJAX_RETURN' => 'JSON', // 默认AJAX 数据返回格式,可选JSON XML ...
    'DEFAULT_FILTER' => 'htmlspecialchars', // 默认参数过滤方法 用于 $this->_get('变量名');$this->_post('变量名')...

    /* Thiết lập csdl */
    'DB_TYPE' => 'mysql', // Kiểu csdl
    'DB_HOST' => 'localhost', // Máy chủ dữ liệu
    'DB_NAME' => '', // Tên dữ liệu
    'DB_USER' => 'root', // Tài khoản
    'DB_PWD' => '', // MẬt khẩu
    'DB_PORT' => '', // Cổng
    'DB_PREFIX' => 'think_', // Tiền tố bảng
    'DB_FIELDTYPE_CHECK' => false, // Kiểm tra loại trường db
    'DB_FIELDS_CACHE' => true, // Lưu cach trường db
    'DB_CHARSET' => 'utf8', // Charset sử dụng truy vấn
    'DB_DEPLOY_TYPE' => 0, // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'DB_RW_SEPARATE' => false, // 数据库读写是否分离 主从式有效
    'DB_MASTER_NUM' => 1, // 读写分离后 主服务器数量
    'DB_SLAVE_NO' => '', // 指定从服务器序号
    'DB_SQL_BUILD_CACHE' => false, // 数据库查询的SQL创建缓存
    'DB_SQL_BUILD_QUEUE' => 'file', // SQL缓存队列的缓存方式 支持 file xcache和apc
    'DB_SQL_BUILD_LENGTH' => 20, // SQL缓存的队列长度

    /* 数据缓存设置 */
    'DATA_CACHE_TIME' => 0, // 数据缓存有效期 0表示永久缓存
    'DATA_CACHE_COMPRESS' => false, // 数据缓存是否压缩缓存
    'DATA_CACHE_CHECK' => false, // 数据缓存是否校验缓存
    'DATA_CACHE_TYPE' => 'File', // 数据缓存类型,支持:File|Db|Apc|Memcache|Shmop|Sqlite|Xcache|Apachenote|Eaccelerator
    'DATA_CACHE_PATH' => TEMP_PATH, // 缓存路径设置 (仅对File方式缓存有效)
    'DATA_CACHE_SUBDIR' => false, // 使用子目录缓存 (自动根据缓存标识的哈希创建子目录)
    'DATA_PATH_LEVEL' => 1, // 子目录缓存级别

    /* 错误设置 */
    'ERROR_MESSAGE' => '您浏览的页面暂时发生了错误！请稍后再试～', //错误显示信息,非调试模式有效
    'ERROR_PAGE' => '', // 错误定向页面
    'SHOW_ERROR_MSG' => false, // 显示错误信息

    /* 日志设置 */
    'LOG_RECORD' => false, // 默认不记录日志
    'LOG_TYPE' => 3, // 日志记录类型 0 系统 1 邮件 3 文件 4 SAPI 默认为文件方式
    'LOG_DEST' => '', // 日志记录目标
    'LOG_EXTRA' => '', // 日志记录额外信息
    'LOG_LEVEL' => 'EMERG,ALERT,CRIT,ERR', // 允许记录的日志级别
    'LOG_FILE_SIZE' => 2097152, // 日志文件大小限制
    'LOG_EXCEPTION_RECORD' => false, // 是否记录异常信息日志

    /* SESSION设置 */
    'SESSION_AUTO_START' => true, // 是否自动开启Session
    'SESSION_OPTIONS' => array(), // session 配置数组 支持type name id path expire domian 等参数
    'SESSION_TYPE' => '', // session hander类型 默认无需设置 除非扩展了session hander驱动
    'SESSION_PREFIX' => '', // session 前缀
    'VAR_SESSION_ID' => 'session_id', //sessionID的提交变量

    /* 模板引擎设置 */
    'TMPL_CONTENT_TYPE' => 'text/html', // 默认模板输出类型
    'TMPL_ACTION_ERROR' => THINK_PATH . 'Tpl/dispatch_jump.tpl', // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS' => THINK_PATH . 'Tpl/dispatch_jump.tpl', // 默认成功跳转对应的模板文件
    'TMPL_EXCEPTION_FILE' => THINK_PATH . 'Tpl/think_exception.tpl', // 异常页面的模板文件
    'TMPL_DETECT_THEME' => false, // 自动侦测模板主题
    'TMPL_TEMPLATE_SUFFIX' => '.html', // 默认模板文件后缀
    'TMPL_FILE_DEPR' => '/', //模板文件MODULE_NAME与ACTION_NAME之间的分割符，只对项目分组部署有效

    /* URL设置 */
    'URL_CASE_INSENSITIVE' => false, // 默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL' => 1, // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
    // 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)  默认为PATHINFO 模式，提供最好的用户体验和SEO支持
    'URL_PATHINFO_DEPR' => '/', // PATHINFO模式下，各参数之间的分割符号
    'URL_PATHINFO_FETCH' => 'ORIG_PATH_INFO,REDIRECT_PATH_INFO,REDIRECT_URL', // 用于兼容判断PATH_INFO 参数的SERVER替代变量列表
    'URL_HTML_SUFFIX' => '', // URL伪静态后缀设置


    /* 系统变量名称设置 */
    'VAR_GROUP' => 'g', // 默认分组获取变量
    'VAR_MODULE' => 'm', // 默认模块获取变量
    'VAR_ACTION' => 'a', // 默认操作获取变量
    'VAR_AJAX_SUBMIT' => 'ajax', // 默认的AJAX提交变量
    'VAR_PATHINFO' => 's', // PATHINFO 兼容模式获取变量例如 ?s=/module/action/id/1 后面的参数取决于URL_PATHINFO_DEPR
    'VAR_URL_PARAMS' => '_URL_', // PATHINFO URL参数变量
    'VAR_TEMPLATE' => 't', // 默认模板切换变量
    'VAR_FILTERS' => '', // 全局系统变量的默认过滤方法 多个用逗号分割
);