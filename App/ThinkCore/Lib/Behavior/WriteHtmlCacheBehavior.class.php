<?php

/**
  +------------------------------------------------------------------------------
 * 系统行为扩展 静态缓存写入
 * 增加配置参数如下：
  +------------------------------------------------------------------------------
 */
class WriteHtmlCacheBehavior extends Behavior {

    // 行为扩展的执行入口必须是run
    public function run(&$content) {
        if (C('HTML_CACHE_ON') && defined('HTML_FILE_NAME')) {
            //静态文件写入
            // 如果开启HTML功能 检查并重写HTML文件
            // 没有模版的操作不生成静态文件
            if (!is_dir(dirname(HTML_FILE_NAME)))
                mk_dir(dirname(HTML_FILE_NAME));
            if (false === file_put_contents(HTML_FILE_NAME, $content))
                throw_exception(L('_CACHE_WRITE_ERROR_') . ':' . HTML_FILE_NAME);
        }
    }

}