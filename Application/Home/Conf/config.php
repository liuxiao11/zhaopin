<?php
return array(
	//'配置项'=>'配置值'
	
	'VIEW_PATH'				=>		false,
	'DEFAULT_THEME'    		=>    	'',
	'TMPL_PARSE_STRING'     =>      array(
				'__PUBLIC__' => substr(MODULE_PATH,'1',strlen(MODULE_PATH)), // 更改默认的/Public 替换规则
	),
	'TMPL_ACTION_SUCCESS' 	=> 		'public:success',
	'TMPL_ACTION_ERROR' 	=> 		'public:error',
	
);