<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]

// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');
define('UPLOADS', __DIR__ . '/../public/uploads');
define('PUBLICS', __DIR__ . '/../public');
//define('DS', '/');
//冲突掉/thinkphp/base.php中的define('DS', DIRECTORY_SEPARATOR);上传文件windows\的缘故，linux则为/
// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';

