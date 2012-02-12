<?php

// 
return array(
    'app_init'=>array(
    ),
    'app_begin'=>array(
        'ReadHtmlCache', // Đọc tệp cache tĩnh
    ),
    'route_check'=>array(
        'CheckRoute', // Phát hiện bộ định tuyến
    ), 
    'app_end'=>array(),
    'path_info'=>array(),
    'action_begin'=>array(),
    'action_end'=>array(),
    'view_begin'=>array(),
    'view_template'=>array(
        'LocationTemplate', // Tự động xác định tệp tin giao diện
    ),
    'view_parse'=>array(
        'ParseTemplate', // 模板解析 支持PHP、内置模板引擎和第三方模板引擎
    ),
    'view_filter'=>array(
        'ContentReplace', // 模板输出替换
        'TokenBuild',   // 表单令牌
        'WriteHtmlCache', // 写入静态缓存
        'ShowRuntime', // 运行时间显示
    ),
    'view_end'=>array(
        'ShowPageTrace', // Hiển thị trang thông tin trace
    ),
);