<?php

/**
 +------------------------------------------------------------------------------
 * Thao tác mở rộng hệ thống Hiển thị thông tin runtime
 +------------------------------------------------------------------------------
 */
class ShowRuntimeBehavior extends Behavior {
    // Định nghĩa tham số mở rộng
    protected $options   =  array(
        'SHOW_RUN_TIME'			=> false,   // Hiển thị runtime
        'SHOW_ADV_TIME'			=> false,   // Hiển thị chi tiết runtime
        'SHOW_DB_TIMES'			=> false,   // Hiển thị truy vấn tới csdl
        'SHOW_CACHE_TIMES'		=> false,   // Hiển thị thông số cache
        'SHOW_USE_MEM'			=> false,   // Hiển thị thông số bộ nhớ sử dụng
        'SHOW_LOAD_FILE'          => false,   // Hiển thị thời gian tải trang
        'SHOW_FUN_TIMES'         => false ,  // Hiển thị số lượng chức năng sử dụng
    );

    // Thao tác mở rộng cần phải được run
    public function run(&$content){
        if(C('SHOW_RUN_TIME')){
            if(false !== strpos($content,'{__NORUNTIME__}')) {
                $content   =  str_replace('{__NORUNTIME__}','',$content);
            }else{
                $runtime = $this->showTime();
                 if(strpos($content,'{__RUNTIME__}'))
                     $content   =  str_replace('{__RUNTIME__}',$runtime,$content);
                 else
                     $content   .=  $runtime;
            }
        }else{
            $content   =  str_replace(array('{__NORUNTIME__}','{__RUNTIME__}'),'',$content);
        }
    }

    /**
     +----------------------------------------------------------
     * Hiển thị runtime,thông số về truy vấn, số lượng cache、,thông số memorry
	 +----------------------------------------------------------
     * @access private
     +----------------------------------------------------------
     * @return string
     +----------------------------------------------------------
     */
    private function showTime() {
        // Hiển thị thời gian chạy
        G('beginTime',$GLOBALS['_beginTime']);
        G('viewEndTime');
        $showTime   =   'Process: '.G('beginTime','viewEndTime').'s ';
        if(C('SHOW_ADV_TIME')) {
            // Hiển thị thời gian chi tiết
            $showTime .= '( Load:'.G('beginTime','loadTime').'s Init:'.G('loadTime','initTime').'s Exec:'.G('initTime','viewStartTime').'s Template:'.G('viewStartTime','viewEndTime').'s )';
        }
        if(C('SHOW_DB_TIMES') && class_exists('Db',false) ) {
            // Hiển thị số truy vấn tới csdl
            $showTime .= ' | DB :'.N('db_query').' queries '.N('db_write').' writes ';
        }
        if(C('SHOW_CACHE_TIMES') && class_exists('Cache',false)) {
            // Đọc và ghi cache
            $showTime .= ' | Cache :'.N('cache_read').' gets '.N('cache_write').' writes ';
        }
        if(MEMORY_LIMIT_ON && C('SHOW_USE_MEM')) {
            // Hiển thị số memory đã sử dụng
            $showTime .= ' | UseMem:'. number_format((memory_get_usage() - $GLOBALS['_startUseMems'])/1024).' kb';
        }
        if(C('SHOW_LOAD_FILE')) {
            $showTime .= ' | LoadFile:'.count(get_included_files());
        }
        if(C('SHOW_FUN_TIMES')) {
            $fun  =  get_defined_functions();
            $showTime .= ' | CallFun:'.count($fun['user']).','.count($fun['internal']);
        }
        return $showTime;
    }
}