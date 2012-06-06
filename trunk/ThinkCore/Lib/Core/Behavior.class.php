<?php
/**
 +------------------------------------------------------------------------------
 * ThinkPHP Behavior基础类
 +------------------------------------------------------------------------------
 * @category   Think
 * @package  Think
 * @subpackage  Util
 * @author liu21st <liu21st@gmail.com>
 * @version  $Id: Behavior.class.php 2805 2012-03-07 15:15:21Z liu21st $
 +------------------------------------------------------------------------------
 */
abstract class Behavior {

    // 行为参数 和配置参数设置相同
    protected $options =  array();

   /**
     +----------------------------------------------------------
     * 架构函数
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     */
    public function __construct() {
        if(!empty($this->options)) {
            foreach ($this->options as $name=>$val){
                if(NULL !== C($name)) { // 参数已设置 则覆盖行为参数
                    $this->options[$name]  =  C($name);
                }else{ // 参数未设置 则传入默认值到配置
                    C($name,$val);
                }
            }
            array_change_key_case($this->options);
        }
    }
    
    // 获取行为参数
    public function __get($name){
        return $this->options[strtolower($name)];
    }

    /**
     +----------------------------------------------------------
     * 执行行为 run方法是Behavior唯一的接口
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @param mixed $params  行为参数
     +----------------------------------------------------------
     * @return void
     +----------------------------------------------------------
     */
    abstract public function run(&$params);

}