<?php

/**
 +------------------------------------------------------------------------------
 * Thao tác hệ thống mở rộng ghi tệp nhớ cache
 * Thêm các tham số cấu hình như sau
 +------------------------------------------------------------------------------
 */
class WriteHtmlCacheBehavior extends Behavior {

    // Thao tác mở rộng cần phải được run
    public function run(&$content){
        if(C('HTML_CACHE_ON') && defined('HTML_FILE_NAME'))  {
            //Ghi tệp html tĩnh
            // Nếu bạn mở tính năng tạo tệp tin tĩnh, cần kiểm tra và viết lại tệp
            // Thao tác mà không sử dụng đến giao diện sẽ không thể tạo ra tệp tĩnh
            if(!is_dir(dirname(HTML_FILE_NAME)))
                mk_dir(dirname(HTML_FILE_NAME));
            if( false === file_put_contents( HTML_FILE_NAME , $content ))
                throw_exception(L('_CACHE_WRITE_ERROR_').':'.HTML_FILE_NAME);
        }
    }
}