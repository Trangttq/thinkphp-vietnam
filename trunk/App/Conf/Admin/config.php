<?php

return array(
    'URL_DISPATCH_ON' => 1,
    'URL_MODEL' => 2,
    'AUTO_BUILD_HTML' => 0,
    'USER_AUTH_ON' => true,
    'USER_AUTH_TYPE' => 1, // Loại auth mặc định 1 Login authentication 2 Realtime certification
    'RBAC_ROLE_TABLE' => 'think_role',
    'RBAC_USER_TABLE' => 'think_role_user',
    'RBAC_ACCESS_TABLE' => 'think_access',
    'RBAC_NODE_TABLE' => 'think_node',
    'USER_AUTH_KEY' => 'authId', // User Auth SESSION mark
    'ADMIN_AUTH_KEY' => 'administrator',
    'USER_AUTH_MODEL' => 'User', // The default data table model
    'AUTH_PWD_ENCODER' => 'md5', // User auth password encryption tye\pe
    'USER_AUTH_GATEWAY' => '/Admin/Public/login', // The default page for auth
    'NOT_AUTH_MODULE' => 'Public', // Public module for guest
    'REQUIRE_AUTH_MODULE' => '', // Module must use login form and auth cert
    'NOT_AUTH_ACTION' => '', // The default action for guest
    'REQUIRE_AUTH_ACTION' => '', // Action must use login form and auth cert
    'GUEST_AUTH_ON' => false, // Whether open visitor authorized to access
    'GUEST_AUTH_ID' => 0, // The Id of visitor
    'SHOW_RUN_TIME' => true, // Display runtime
    'SHOW_ADV_TIME' => true, // Display detailed runtime
    'SHOW_DB_TIMES' => true, // Display db query and loading time
    'SHOW_CACHE_TIMES' => true, // Show cache times
    'SHOW_USE_MEM' => true, // Display memory used
    'SHOW_PAGE_TRACE' => 1,
    'LIKE_MATCH_FIELDS' => 'title|remark',
    'TAG_NESTED_LEVEL' => 3,
    'UPLOAD_FILE_RULE' => 'uniqid', //  File upload naming rule Example: time uniqid com_create_guid ... support for custom function Applies only with UploadFile class
);
?>