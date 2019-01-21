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
class MemberModel extends Model{
		
		
	
	/**
	 * 验证规则
	 * @author dadong <turn8888@163.com>
	 */	
	protected $_validate = array(
	    array('account','4,12','用户名最少4位！',0,'length'),
		array('account','','用户名已经存在！',0,'unique',3), // 在新增/修改的时候验证账号字段是否唯一
		array('nickname','require','请填写真实姓名！'), // 在新增/修改的时候验证用户名不能为空
		array('tel','checkPhone','请填写正确的手机号码！','0','function'), // 在新增/修改的时候验证电话号码格式
		array('pass','6,12','密码最少6-12位，区分大小写！',0,'length','1'), // 在新增验证长度
		array('pass','6,12','密码最少6-12位，区分大小写！',2,'length','3') // 在修改时若有密码验证长度
	);
		


		
	/**
	 * 完成规则
	 * @author dadong <turn8888@163.com>
	 */	
	protected $_auto = array (
		array('pass','passmd5',3,'callback') , // 对pass字段在新增的时候使md5函数处理
		array('time','time',1,'function'), // 对time字段在更新的时候写入当前时间戳
		array('last_log_time','time',1,'function') // 对time字段在更新的时候写入当前时间戳
	);
	
	
	  /**
	 * 密码加密
	 * @param string $phonenumber 手机号码
	 * @return type 
	 * @author dadong <turn8888@163.com>
	 */
	 function passmd5($str){
	 	if($str){
	 		return md5($str);
	 	}else{
	 		return '';
	 	}
	 }
}












