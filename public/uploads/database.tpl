<?php
// +----------------------------------------------------------------------
// | WeiPHP [ 公众号和小程序运营管理系统 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 https://weiphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 凡星 <weiphp@weiphp.cn> <QQ:203163051>
// +----------------------------------------------------------------------
define('DB_PREFIX', 'wp_');
return [
    // 数据库类型
    'type' => 'mysql',
    // 服务器地址
    'hostname' => '[hostname]',
    // 数据库名
    'database' => '[database]',
    // 用户名
    'username' => '[username]',
    // 密码
    'password' => '[password]',
    
    // 端口
    'hostport' => '[hostport]',
    // 数据库连接参数
    'params' => [],
    // 数据库编码默认采用utf8
    'charset' => 'utf8mb4',
    // 数据库表前缀
    'prefix' => DB_PREFIX,
    // 数据库调试模式
    'debug' => true,

    // 是否严格检查字段是否存在
    'fields_strict' => false,
    // 数据集返回类型
    'resultset_type' => 'array',
    
    // 用户密码加密的KEY
    'data_auth_key' => '[auth]'
];
