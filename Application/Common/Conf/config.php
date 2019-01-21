<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

/**
 * 系统配文件
 * 所有系统级别的配置
 */
return array(
    /* 模块相关配置 */
    'AUTOLOAD_NAMESPACE' => array('Addons' => ONETHINK_ADDON_PATH), //扩展模块列表

    /* 系统数据加密设置 */
    'DATA_AUTH_KEY' => '%h7itCDqR36#kHTf&wxgW!dy"r]A`[s(~NEZe512', //默认数据加密KEY

    /* 用户相关设置 */
    'USER_MAX_CACHE'     => 1000, //最大缓存用户数

    /* URL配置 */
    'URL_CASE_INSENSITIVE' => true, //默认false 表示URL区分大小写 true则表示不区分大小写

    /* 全局过滤配置 */
    'DEFAULT_FILTER' => '', //全局过滤函数

    /* 文档模型配置 (文档模型核心配置，请勿更改) */
    'DOCUMENT_MODEL_TYPE' => array(2 => '主题', 1 => '目录', 3 => '段落'),
    
	
    //'配置项'=>'配置值'
	'URL_MODEL'			    =>   	2,
	'MULTI_MODULE'          =>  	true,
	'SESSION_AUTO_START'    =>      true,
	'DEFAULT_MODULE'        =>      'Home',  // 默认模块
	'TMPL_PARSE_STRING'     =>      array(
	'__UPLOAD__'    => 	    NEWDATA_PATH.'uploads', // 增加新的上传路径替换规则
	),
	'VIEW_PATH'				=>		NEWDATA_PATH.'templete/',
	'STYLE_PATH'			=>	    substr(NEWDATA_PATH,'1',strlen(NEWDATA_PATH)).'templete/',
	'TMPL_TEMPLATE_SUFFIX'	=>		'.html',
	'DEFAULT_THEME'    		=>      'default',
//		'TMPL_ACTION_SUCCESS' 	=> 		'public:success',
//		'TMPL_ACTION_ERROR' 	=> 		'public:error',
	//'MODULE_ALLOW_LIST'     =>       array('Home','Admin','Api','Api2','Server','Mobile','Mobile2'),
	'MODULE_ALLOW_LIST'     =>       array('Home','Admin','Api'),
	//'配置项'=>'配置值'
    'LANG_SWITCH_ON'        =>     	true,    //开启语言包功能       
    'LANG_AUTO_DETECT'      =>      true, // 自动侦测语言
    'DEFAULT_LANG'          =>     'zh-cn', // 默认语言       
    'LANG_LIST'             =>     'zh-cn,en', //必须写可允许的语言列表
    'VAR_LANGUAGE'     		=> 'l', // 默认语言切换变量

	'DB_TYPE' => 'mysql',  // 数据库类型
	'DB_HOST' => 'localhost', // 服务器地址
	'DB_NAME' => 'guangjian', // 数据库名
	'DB_USER' => 'root', // 用户名
	'DB_PWD' => 'root', // 密码
	'DB_PORT' => '3306', // 端口
	'DB_PREFIX' => 'app_', // 数据库表前缀
);
