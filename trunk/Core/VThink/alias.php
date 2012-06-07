<?php

// 导入别名定义
alias_import(array(
    'Db' => THINK_PATH . '/Lib/Core/Db.class.php',//ok
    'DbMysql' => THINK_PATH . '/Lib/Driver/Db/DbMysql.class.php',//ok
    'ThinkTemplate' => THINK_PATH . '/Template/ThinkTemplate.class.php',//ok
    'Template' => THINK_PATH . '/Lib/Think/Util/Template.class.php',//not ok - not found
    'TagLib' => THINK_PATH . '/Template/TagLib.class.php',//ok
    'TagLibCx' => THINK_PATH . '/Lib/Driver/TagLib/TagLibCx.class.php',//ok
    'AdvModel' => THINK_PATH . '/Lib/Core/Model/AdvModel.class.php',//ok - added file support
    //'Widget'		=>	THINK_PATH.'/Lib/Think/Util/Widget.class.php',
    //'Bahivior'		=>	THINK_PATH.'/Lib/Think/Util/Behavior.class.php',
    'Cache' => THINK_PATH . '/Lib/Core/Cache.class.php',//ok
    'HtmlCache' => THINK_PATH . 'Util/HtmlCache.class.php',//ok
    /* 修改过的 */
    'Cookie' => THINK_PATH . '/Util/Cookie.class.php',//ok
    'Session' => THINK_PATH . '/Util/Session.class.php',//ok
    'Service' => CORE_PATH . '/VThink/Service.class.php',
    'Model' => CORE_PATH . '/VThink/Model.class.php',
    'Action' => CORE_PATH . '/VThink/Action.class.php',
    'View' => CORE_PATH . '/VThink/View.class.php',
    'Widget' => CORE_PATH . '/VThink/Widget.class.php',
    'Api' => CORE_PATH . '/VThink/Api.class.php',
    'AddonsInterface' => CORE_PATH . '/VThink/addons/AddonsInterfaces.class.php',
    'NormalAddons' => CORE_PATH . '/VThink/addons/NormalAddons.class.php',
    'SimpleAddons' => CORE_PATH . '/VThink/addons/SimpleAddons.class.php',
    'Addons' => CORE_PATH . '/VThink/Addons.class.php',
    'Hooks' => CORE_PATH . '/VThink/addons/Hooks.class.php',
    'AbstractAddons' => CORE_PATH . '/VThink/addons/AbstractAddons.class.php',
        )
);
?>
