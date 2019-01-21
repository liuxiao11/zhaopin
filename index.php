<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
header("Content-type: text/html; charset=utf-8");
// 应用入口文件

//echo "<h1 align='center' style='margin-top:200px;'>暂停维护中!</h1>";
//die;
//引入oss
require_once 'vendor/autoload.php';


// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');


//xunsearch目录
define('XS_APP_PATH',__DIR__.'/xunsearch/sdk/php/lib/');


// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',true);
// 后台版本
define('VERSION','2.5.6');
//数据目录
define('NEWDATA_PATH','./data/');
//数据
define('RUNTIME_PATH',NEWDATA_PATH.'Runtime/');
// 定义应用目录
define('APP_PATH','./Application/');
// 定义根目录
define('PATH',$_SERVER['DOCUMENT_ROOT']);
// 定义当前域名
define('HOST','http://'.$_SERVER['SERVER_NAME']);
// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';
// 亲^_^ 后面不需要任何代码了 就是如此简单
