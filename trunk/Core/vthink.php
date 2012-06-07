<?php

//Precaching Rules to be determined
//载入核心文件
//记录开始运行时间
$GLOBALS['_beginTime'] = microtime(TRUE);

//核心路径定义
if (!defined('SITE_PATH'))
    define('SITE_PATH', dirname(getcwd()));
if (!defined('CORE_PATH'))
    define('CORE_PATH', SITE_PATH . '/Core');
if (!defined('APPS_PATH'))
    define('APPS_PATH', SITE_PATH . '/Apps');
if (!defined('ADDON_PATH'))
    define('ADDON_PATH', SITE_PATH . '/Addons');
if (!defined('SITE_DATA_PATH'))
    define('SITE_DATA_PATH', SITE_PATH . '/Data');
if (!defined('UPLOAD_PATH'))
    define('UPLOAD_PATH', SITE_DATA_PATH . '/Uploads');

//New resolution fo application path
if (isset($_GET['app'])) {
    //To determine the open list, to carry out the necessary application name filter
    $app_name = strtolower(str_replace(array('/', '\\'), '', strip_tags(urldecode($_GET['app']))));
} else {
    $app_name = 'home';
}
if (!defined('APP_NAME'))
    define('APP_NAME', $app_name);
if (!defined('APP_PATH'))
    define('APP_PATH', APPS_PATH . '/' . APP_NAME);

//Resetting the core path
if (!defined('THINK_PATH'))
    define('THINK_PATH', CORE_PATH . '/ThinkCore');
if (!defined('RUNTIME_PATH'))
    define('RUNTIME_PATH', SITE_PATH . '/_runtime/~' . APP_NAME);
if (!defined('RUNTIME_ALLINONE'))
    define('RUNTIME_ALLINONE', true);

// Create runtime directory
/*
  Review: 01-06-2011 In order to prevent malicious directories to generate
  Only application in the apps directory to generate the cache directory
 */
if (!is_dir(RUNTIME_PATH)) {
    require_once SITE_PATH . '/Addons/libs/Io/Dir.class.php';
    $dirs = new Dir(SITE_PATH . '/Apps/');
    $dirs = $dirs->toArray();
    $in_dirs = false;
    foreach ($dirs as $v)
        if (APP_NAME == $v['filename'])
            $in_dirs = true;

    if ($in_dirs)
        mkdir(RUNTIME_PATH, 0777, true);
}

//Check the compiled file
if (RUNTIME_ALLINONE && is_file(RUNTIME_PATH . '/~allinone.php')) {
    // ALLINONE Using mod load all file in allinone.php
    $result = require RUNTIME_PATH . '/~allinone.php';
    C($result);
    // Automatic set running mod
    define('RUNTIME_MODEL', true);
} else {
    if (version_compare(PHP_VERSION, '5.0.0', '<'))
        die('require PHP > 5.0 !');
    // ThinkPHP - System directory defined
    if (is_file(RUNTIME_PATH . '/~runtime.php')) {
        // Load core framework compiler cache
        require RUNTIME_PATH . '/~runtime.php';
    } else {
        // 
        require CORE_PATH . "/VThink/runtime.php";
        // 生成核心编译~runtime缓存
        build_runtime();
    }
}

// Record time to load file
$GLOBALS['_loadTime'] = microtime(TRUE);
$GLOBALS['_lang'] = array();
?>