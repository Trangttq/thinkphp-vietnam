<?php

/**
 +------------------------------------------------------------------------------
 * Thao tác mở rộng hệ thống 模板检测
 +------------------------------------------------------------------------------
 */
class CheckTemplateBehavior extends Behavior {
    // Tham số định nghĩa cho thao tác mở rộng（默认值） 可在项目配置中覆盖
    protected $options   =  array(
            'VAR_TEMPLATE'          => 't',		// 默认模板切换变量
            'TMPL_DETECT_THEME'     => false,       // 自动侦测模板主题
            'DEFAULT_THEME'    => '',	// 默认模板主题名称
            'TMPL_TEMPLATE_SUFFIX'  => '.html',     // 默认模板文件后缀
            'TMPL_FILE_DEPR'=>'/', //模板文件MODULE_NAME与ACTION_NAME之间的分割符，只对项目分组部署有效
        );

    // Thao tác mở rộng cần phải được run
    public function run(&$params){
        // 开启静态缓存
        $this->checkTemplate();
    }

    /**
     +----------------------------------------------------------
     * 模板检查，如果不存在使用默认
     +----------------------------------------------------------
     * @access private
     +----------------------------------------------------------
     * @return void
     +----------------------------------------------------------
     */
    private function checkTemplate() {
        /* 获取模板主题名称 */
        $templateSet =  C('DEFAULT_THEME');
        if(C('TMPL_DETECT_THEME')) {// 自动侦测模板主题
            $t = C('VAR_TEMPLATE');
            if (isset($_GET[$t])){
                $templateSet = $_GET[$t];
            }elseif(cookie('think_template')){
                $templateSet = cookie('think_template');
            }
            // 主题不存在时仍改回使用默认主题
            if(!is_dir(TMPL_PATH.$templateSet))
                $templateSet = C('DEFAULT_THEME');
            cookie('think_template',$templateSet);
        }

        /* 模板相关目录常量 */
        define('THEME_NAME',   $templateSet);                  // 当前模板主题名称
        $group   =  defined('GROUP_NAME')?GROUP_NAME.'/':'';
        define('THEME_PATH',   TMPL_PATH.$group.(THEME_NAME?THEME_NAME.'/':''));
        define('APP_TMPL_PATH',__ROOT__.'/'.APP_NAME.(APP_NAME?'/':'').'Tpl/'.$group.(THEME_NAME?THEME_NAME.'/':''));
        C('TEMPLATE_NAME',THEME_PATH.MODULE_NAME.(defined('GROUP_NAME')?C('TMPL_FILE_DEPR'):'/').ACTION_NAME.C('TMPL_TEMPLATE_SUFFIX'));
        C('CACHE_PATH',CACHE_PATH.$group);
        return ;
    }
}