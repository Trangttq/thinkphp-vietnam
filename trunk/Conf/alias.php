<?php

if (!defined('THINK_PATH')) exit();
// 系统别名定义文件
return array(
    'Model'         => CORE_PATH.'Core/Model.class.php',
    'Db'            => CORE_PATH.'Core/Db.class.php',
    'Log'          =>   CORE_PATH.'Core/Log.class.php',
    'ThinkTemplate' => CORE_PATH.'Template/ThinkTemplate.class.php',
    'TagLib'        => CORE_PATH.'Template/TagLib.class.php',
    'Cache'         => CORE_PATH.'Core/Cache.class.php',
    'Widget'         => CORE_PATH.'Core/Widget.class.php',
    'TagLibCx'      => CORE_PATH.'Driver/TagLib/TagLibCx.class.php',
);