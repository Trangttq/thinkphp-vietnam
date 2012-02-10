<?php

/**
 +------------------------------------------------------------------------------
 * ThinkPHP AMF模式应用程序类
 +------------------------------------------------------------------------------
 */
class App {

    /**
     +----------------------------------------------------------
     * 应用程序初始化
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @return void
     +----------------------------------------------------------
     */
    static public function run() {

    	//导入类库
    	Vendor('Zend.Amf.Server');
    	//实例化AMF
    	$server = new Zend_Amf_Server();
        $actions =  explode(',',C('APP_AMF_ACTIONS'));
        foreach ($actions as $action)
       	    $server -> setClass($action.'Action');
    	echo $server -> handle();

        // 保存日志记录
        if(C('LOG_RECORD')) Log::save();
        return ;
    }

};