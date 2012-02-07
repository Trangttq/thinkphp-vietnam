<?php

return array(
    'REST_METHOD_LIST'           => 'get,post,put,delete', // 允许的请求类型列表
    'REST_DEFAULT_METHOD'     => 'get', // 默认请求类型
    'REST_CONTENT_TYPE_LIST' => 'html,xml,json,rss', // REST允许请求的资源类型列表
    'REST_DEFAULT_TYPE'          => 'html', // 默认的资源类型
    'REST_OUTPUT_TYPE'           => array(  // REST允许输出的资源类型列表
            'xml' => 'application/xml',
            'json' => 'application/json',
            'html' => 'text/html',
        ),
);