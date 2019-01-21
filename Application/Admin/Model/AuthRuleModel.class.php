<?php
namespace Admin\Model;
use Think\Model;
class AuthRuleModel extends Model{
	 protected $_validate = array(
		array('title','require','请输入标题！'), //标题不能为空
		array('name','require','请输入地址！'),   // 在新增的时候验证name不为空
		array('name','','地址已经存在！',0,'unique',3), // 在新增/修改的时候验证name字段是否唯一
		);
}












