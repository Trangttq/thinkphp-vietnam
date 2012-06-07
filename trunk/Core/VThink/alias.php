<?php
// +----------------------------------------------------------------------
// | ThinkPHP
// +----------------------------------------------------------------------
// | Copyright (c) 2008 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// $Id$

// 导入别名定义
alias_import(array(
    'Db'			=>	THINK_PATH.'/Lib/Think/Db/Db.class.php',
	'DbMysql'		=>	THINK_PATH.'/Lib/Think/Db/Driver/DbMysql.class.php',
    'ThinkTemplate'	=>	THINK_PATH.'/Template/ThinkTemplate.class.php',
    'Template'		=>	THINK_PATH.'/Lib/Think/Util/Template.class.php',
    'TagLib'		=>	THINK_PATH.'/Template/TagLib.class.php',
    'TagLibCx'		=>	THINK_PATH.'/Template/TagLib/TagLibCx.class.php',
    'AdvModel'		=>	THINK_PATH.'/Lib/Think/Core/Model/AdvModel.class.php',
	//'Widget'		=>	THINK_PATH.'/Lib/Think/Util/Widget.class.php',
	//'Bahivior'		=>	THINK_PATH.'/Lib/Think/Util/Behavior.class.php',
	'Cache'			=>	THINK_PATH.'/Lib/Think/Util/Cache.class.php',
	'HtmlCache'		=>	THINK_PATH.'/Lib/Think/Util/HtmlCache.class.php',
	/* 修改过的 */
    'Cookie'		=>	THINK_PATH.'/Lib/Think/Util/Cookie.class.php',
    'Session'		=>	THINK_PATH.'/Lib/Think/Util/Session.class.php',
	'Service'		=>	CORE_PATH.'/VThink/Service.class.php',
	'Model'			=>	CORE_PATH.'/VThink/Model.class.php',
	'Action'		=>	CORE_PATH.'/VThink/Action.class.php',
	'View'			=>	CORE_PATH.'/VThink/View.class.php',
	'Widget'		=>	CORE_PATH.'/VThink/Widget.class.php',
	'Api'		    =>	CORE_PATH.'/VThink/Api.class.php',
	'AddonsInterface' => CORE_PATH.'/VThink/addons/AddonsInterfaces.class.php',
	'NormalAddons'    => CORE_PATH.'/VThink/addons/NormalAddons.class.php',
	'SimpleAddons'    => CORE_PATH.'/VThink/addons/SimpleAddons.class.php',
	'Addons'          => CORE_PATH.'/VThink/Addons.class.php',
	'Hooks'           => CORE_PATH.'/VThink/addons/Hooks.class.php',
	'AbstractAddons'  => CORE_PATH.'/VThink/addons/AbstractAddons.class.php',
    )
);
?>
