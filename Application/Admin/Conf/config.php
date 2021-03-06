<?php
$db_prefix=C('DB_PREFIX');
$suffix=C('TMPL_TEMPLATE_SUFFIX');
return array(
	//'配置项'=>'配置值'
	'VIEW_PATH'				=>		false,
	'DEFAULT_THEME'    		=>    	'',
	'TMPL_PARSE_STRING'     =>      array(
				'__PUBLIC__' => substr(MODULE_PATH,'1',strlen(MODULE_PATH)), // 更改默认的/Public 替换规则
	),
	'USER_ADMINISTRATOR'    =>'1,2,3',     //超级管理员
	'USER_PATH'   			=>'index',     //不用验证的控制器多个逗号隔开
	'TMPL_ACTION_SUCCESS' 	=> 		'public:success',
	'TMPL_ACTION_ERROR' 	=> 		'public:error',
//	'ERROR_PAGE' => 'public:e',// 异常页面的模板文件
//  'TMPL_EXCEPTION_FILE'   =>APP_PATH.MODULE_NAME.'/view/public/404'.$suffix,//404页面
	//Auth权限设置
    'AUTH_CONFIG' => array(
        'AUTH_ON' => true,  // 认证开关
        'AUTH_TYPE' => 1, // 认证方式，1为实时认证；2为登录认证。
        'AUTH_GROUP' => $db_prefix.'auth_group', // 用户组数据表名
        'AUTH_GROUP_ACCESS' => $db_prefix.'auth_group_access', // 用户-用户组关系表
        'AUTH_RULE' => $db_prefix.'auth_rule', // 权限规则表
        'AUTH_USER' => $db_prefix.'member', // 用户信息表
    ),
    //'配置项'=>'配置值'
    'LANG_SWITCH_ON'     =>     true,    //开启语言包功能       
    'LANG_AUTO_DETECT'     =>     true, // 自动侦测语言
    'DEFAULT_LANG'         =>     'zh-cn', // 默认语言       
    'LANG_LIST'            =>    'zh-cn,en', //必须写可允许的语言列表
    'VAR_LANGUAGE'     => 'l', // 默认语言切换变量
	'TUOKE_API_URL'			=>		'http://101.200.184.105:8080',   //托科接口域名
	'SHOW_PAGE_TRACE' =>false,
);