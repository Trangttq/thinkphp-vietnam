<?php

/**
 +------------------------------------------------------------------------------
 * Thao tác mở rộng hệ thống Thông tin trace xuất ra màn hình
 +------------------------------------------------------------------------------
 */
class ShowPageTraceBehavior extends Behavior {
    // Tham số định nghĩa cho thao tác mở rộng
    protected $options   =  array(
        'SHOW_PAGE_TRACE'        => false,   // Có hiển thị thông tin trace hay không
    );

    // Thao tác mở rộng cần phải được run
    public function run(&$params){
        if(C('SHOW_PAGE_TRACE')) {
            echo $this->showTrace();
        }
    }

    /**
     +----------------------------------------------------------
     * Có hiển thị thông tin trace hay không
     +----------------------------------------------------------
     * @access private
     +----------------------------------------------------------
     */
    private function showTrace() {
         // Thông tin mặc định hệ thống
        $log  =   Log::$log;
        $files =  get_included_files();
        $trace   =  array(
            'Thời gian yêu cầu'=>  date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']),
            'Trang hiện tại'=>  __SELF__,
            'Request Protocol'=>  $_SERVER['SERVER_PROTOCOL'].' '.$_SERVER['REQUEST_METHOD'],
            'Thời gian'=>  $this->showTime(),
            'Session ID'    =>  session_id(),
            'Thông số log'=>  count($log)?count($log).' log<br/>'.implode('<br/>',$log):'Không có log',
            'Số tệp load'=>  count($files).str_replace("\n",'<br/>',substr(substr(print_r($files,true),7),0,-2)),
            );

        // Đọc thông tin từ project
        $traceFile  =   CONF_PATH.'trace.php';
        if(is_file($traceFile)) {
            // Kiểu định nghĩa return array('Trang hiện tại'=>$_SERVER['PHP_SELF'],'Request Protocol'=>$_SERVER['SERVER_PROTOCOL'],...);
            $trace   =  array_merge(include $traceFile,$trace);
        }
        // Thiết lập thông tin trace
        trace($trace);
        // Gọi đến tệp giao diện cho trang thông tin trace
        ob_start();
        include C('TMPL_TRACE_FILE')?C('TMPL_TRACE_FILE'):THINK_PATH.'Tpl/page_trace.tpl';
        return ob_get_clean();
    }

    /**
     +----------------------------------------------------------
     * Running time, database operations, cache, memory usage information.
     +----------------------------------------------------------
     * @access private
     +----------------------------------------------------------
     * @return string
     +----------------------------------------------------------
     */
    private function showTime() {
        // Hiển thị runtime
        G('beginTime',$GLOBALS['_beginTime']);
        G('viewEndTime');
        $showTime   =   'Process: '.G('beginTime','viewEndTime').'s ';
        // Hiển thị chi tiết runtime
        $showTime .= '( Load:'.G('beginTime','loadTime').'s Init:'.G('loadTime','initTime').'s Exec:'.G('initTime','viewStartTime').'s Template:'.G('viewStartTime','viewEndTime').'s )';
        // Hiển thị truy vấn tới csdl
        if(class_exists('Db',false) ) {
            $showTime .= ' | DB :'.N('db_query').' queries '.N('db_write').' writes ';
        }
        // Đọc và ghi cache
        if( class_exists('Cache',false)) {
            $showTime .= ' | Cache :'.N('cache_read').' gets '.N('cache_write').' writes ';
        }
        // Dung lượng memory sử dụng
        if(MEMORY_LIMIT_ON ) {
            $showTime .= ' | UseMem:'. number_format((memory_get_usage() - $GLOBALS['_startUseMems'])/1024).' kb';
        }
        // Các tệp tin đã nạp
        $showTime .= ' | LoadFile:'.count(get_included_files());
        // Hiển thị số lượng chức năng hệ thống, chức năng tùy chọn
        $fun  =  get_defined_functions();
        $showTime .= ' | CallFun:'.count($fun['user']).','.count($fun['internal']);
        return $showTime;
    }
}