<?php
// +----------------------------------------------------------------------
// | 会员模型
// +----------------------------------------------------------------------
// | 时间：2015-3-13
// +----------------------------------------------------------------------
// | Author: midadong <turn8888@163.com>
// +----------------------------------------------------------------------
namespace Admin\Model;
use Think\Model;
class AuthGroupModel extends Model{
		
		
	
	/**
	 * 验证规则
	 * @author dadong <turn8888@163.com>
	 */	
	protected $_validate = array(
		array('title','require','请填写组名！','0'), // 在新增/修改的时候验证用户名不能为空  存在字段
	);
	
	
	
	/**
	 * 完成规则
	 * @author dadong <turn8888@163.com>
	 */	
	protected $_auto = array (
	
		array('rules','rulesFun',2,'callback'), // 对password字段在新增和编辑的时候使md5函数处理
	);

     function rulesFun($str){
     	if($str){
     		$newstr=implode(',',$str);
     		return $newstr;
     	}else{
     		return '';
     	}
     }
}