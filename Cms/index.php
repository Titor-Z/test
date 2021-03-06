<?php

// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);

// 定义应用目录
define('APP_PATH','./');

// 关闭自动生动index.html
define('BUILD_DIR_SECURE', false);

define('API_HOST', 'https://localhost/test/API/CMS/');

define('ADMIN_HOST', 'https://localhost/API/Api/');
define('FILE_HOST', 'https://localhost/API/Api/Upload/');

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单