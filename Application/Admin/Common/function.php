<?php


/**
	 * API 接口返回json信息
	 * @param string or array 参数
	 * @author swift <swift_0606@163.com>
	 */
 	function dispose($data){
 		$json=urldecode(stripslashes(json_encode(disposes($data))));
 		return disposeStr($json); 
 	}
 	/**
	 * 用urlencode递归加密
	 * @param string or array 参数
	 * @author swift <swift_0606@163.com>
	 */
	function disposes($data){
		if(is_array($data)){
			$arr=array();
			foreach ($data as $k => $v) {
				$data[$k]=disposes($v);
			}
			$result=$data;
		}else{
			//str_replace(array('\r\n','\r','\n'), ' ', $data)
			$result=urlencode(str_replace(array("\r\n", "\r", "\n"), " ", $data));
		}
		return $result;
	 }
	
	
	/**
	 * 去除json字符串中的"\/"&替换"["、"]"等杂货
	 * @param $json string json字符串
	 * @author swift <swift_0606@163.com>
	 */
    function disposeStr($json){
		$s1=str_replace('"["','["', $json);
		$str=str_replace('"]"','"]', $s1);
		//$str=str_replace('\/', '/', $s2);
		return $str;
	}
/**
 * 获取对应状态的文字信息
 * @param string $str
 * @return string  默认值为1
 * @author dadong <turn8888@163.com>
 */
function typeEmpty($str) {
	if ($str == '') {
		return 1;
	} else {
		return $str;
	}

}

/**
 * 返回check状态
 * @param string $str 字段
 * @param string $on  判断参数
 * @return string  默认值为checekd
 * @author dadong <turn8888@163.com>
 */
function checked($str, $on) {
	if ($str == $on || ($on == "on" && $str == "")) {
		return 'checked="checked"';
	} else {
		return '';
	}
}

/**
 * 返回checkbox状态 单一checkbox状态
 * @param string $str 字段
 * @author dadong <turn8888@163.com>
 */
function checkboxone($str) {
	if ($str == 'on') {
		return 'checked="checked"';
	} else {
		return '';
	}
}

/**
 * 返回checknum状态
 * @param string $str 字段
 * @param string $on  判断参数
 * @return string  默认值为checekd
 * @author dadong <turn8888@163.com>
 */
function checknum($str, $on, $true) {
	if ($str == $on || ($true == '1' && $str == "")) {
		return 'checked="checked"';
	} else {
		return '';
	}
}

/**
 * 返回checkbox状态
 * @param string $str 字段
 * @param string $on  判断参数
 * @return string  默认值为checekd
 * @author dadong <turn8888@163.com>
 */
function checkboxfun($str, $on) {
	if ($str) {
		$newstr = explode(',', $str);
		if (in_array($on, $newstr)) {
			return 'checked="checked"';
		} else {
			return '';
		}
	} else {
		return '';
	}
}

/**
 * 返回checkbox状态
 * @param string $str 字段
 * @param string $on  判断参数
 * @return string  默认值为checekd
 * @author dadong <turn8888@163.com>
 */
function checktype($str, $on) {
	if ($str == '1') {
		return '栏目列表  ';
	} else if ($str == '2') {
		return '单页  ';
	} else if ($str == '3') {
		return '链接 ';
	}
}

/**
 * 返回checknum状态
 * @param string $str 字段
 * @param string $on  判断参数
 * @return string  默认值为checekd
 * @author dadong <turn8888@163.com>
 */
function positionval($str, $on) {
	if ($str == 'list') {
		return '列表';
	} else if ($str == 'bottom') {
		return '底部按钮';
	} else if ($str == 'right') {
		return '右侧按钮';
	}
}

/**
 * 返回栏目位置string
 * @param array $str
 * @author dadong <turn8888@163.com>
 */
function positionhave($str) {
	$strs = explode(',', $str);
	if (in_array('top', $strs)) {
		$newstr[] = '顶部';
	}
	if (in_array('center', $strs)) {
		$newstr[] = '中部';
	}
	if (in_array('bottom', $strs)) {
		$newstr[] = '底部';
	}
	if ($newstr) {
		$s = implode(',', $newstr);
		return $s;
	} else {
		return "<font color='red'>未分配</font>";
	}
}

/**
 * 返回Selected状态
 * @param string $str 字段
 * @return string  默认值为selected
 * @author dadong <turn8888@163.com>
 */
function selected($str, $on) {
	if ($str == $on) {
		return 'selected="selected"';
	} else {
		return '';
	}
}

/**
 * 验证邮箱
 * @param string $email_address 邮箱地址
 * @return type
 * @author dadong <turn8888@163.com>
 */
function checkMail($email_address) {
	$pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
	if (preg_match($pattern, $email_address)) {
		return true;
	} else {
		return false;
	}

}

/**
 * 验证手机号码
 * @param string $phonenumber 手机号码
 * @return type
 * @author dadong <turn8888@163.com>
 */
function checkPhone($phonenumber) {
	if (preg_match("/1[34578]{1}\d{9}$/", $phonenumber)) {
		return true;
	} else {
		return false;
	}
}

/**
 * 状态颜色
 * @param string
 * @return type
 * @author dadong <turn8888@163.com>
 */
function status($str,$n=0) {
	
	switch($n){
		case 1:
			$arr[]='已审核';
			$arr[]='待审核';
		break;
		default:
			$arr[]='启动';
			$arr[]='关闭';
	}
	if ($str == 'on') {
		return "<font color='green'>".$arr[0]."</font>";
	} else {
		return "<font color='red'>".$arr[1]."</font>";
	}
}

/**
 * 状态颜色
 * @param string
 * @return type
 * @author dadong <turn8888@163.com>
 */
function applystatus($str) {
	
	if ($str == 'on') {
		return "<font color='green'>已通过</font>";
	} else if($str == 'ban'){
		return "<font color='red'>已被禁止</font>";
	} else {
		return "<font color='#f7c754'>待审核..</font>";
	}
	
}

/**
 * 权限check
 * @param string $str 当前checkid
 * @param string $str 当前checkid
 * @return checked
 * @author dadong <turn8888@163.com>  15/3/15
 */
function rulecheck($str, $on) {
	$arr = explode(',', $on);
	if (in_array($str, $arr)) {
		return 'checked="checked"';
	} else {
		return "";
	}
}

/**
 * 是否
 * @param string $str 当前checkid
 * @return checked
 * @author dadong <turn8888@163.com>  15/3/18
 */
function is_is($str) {
	if ($str == 'on') {
		return '是';
	} else {
		return '否';
	}
}


/**
 * 男女
 * @param string $str 当前checkid
 * @return checked
 * @author dadong <turn8888@163.com>  15/3/18
 */
function is_sex($str) {
	if ($str == '0') {
		return '女';
	} else {
		return '男';
	}
}

/**
 * 男女
 * @param string $str 当前checkid
 * @return checked
 * @author dadong <turn8888@163.com>  15/3/18
 */
function is_type($str) {
	if ($str == '0') {
		return '<span style="color:yellow">动态</span>';
	} else {
		return '<span style="color:green">商品</span>';
	}
}

/**
 * 是否
 * @param string $str volist -> $key+1/3 是3的倍数输出回车
 * @return checked
 * @author dadong <turn8888@163.com>  15/3/18
 */
function is_br($key) {
	if ($key%3 == 0) {
		return '<br>';
	} else {
		return '';
	}
}



/**
 * 自定义判断函数
 * @return $is  true
 * @return $no	false
 * @author swift <swift_0606@163.com>  15/5/6
 */
function is_fun($str,$is='',$no='') {
	if ($key) {
		return $is;
	} else {
		return $no;
	}
}
/**
 * 日期判断
 * @author swift <swift_0606@163.com>  15/5/6
 */
function is_date($str,$no) {
	if ($str) {
		return date('Y-m-d',$str);
	} else {
		return $no;
	}
}


/**
 * in_array
 * @param array 在数组中
 * @return checked
 * @author dadong <turn8888@163.com>  15/3/18
 */
function in_arr($id,$arr) {
	if (in_array($id, $arr)) {
		return 'checked="checked"';
	} else {
		return '';
	}
}


/**
 * 检测当前用户是否为管理员
 * @return boolean true-管理员，false-非管理员
 * @author dadong <turn8888@163.com>  15/3/15
 */
function is_administrator($uid = null) {
	$uid = is_null($uid) ? is_login() : $uid;
	$admin = C('USER_ADMINISTRATOR');
	$arr = explode(',', $admin);
	$h = false;
	if (in_array($uid, $arr)) {
		$h = true;
	}
	return $uid && $h;
}

/**
 * 检测用户组
 * @return boolean true-管理员，false-非管理员
 * @author dadong <turn8888@163.com>  15/3/15
 */
function is_admin($str) {
	$admin = C('USER_ADMINISTRATOR');
	$arr = explode(',', $admin);
	if (in_array(UID, $arr)) {
		return "超级管理员";
	} else if ($str == '') {
		return "<font color='red'>您的账号未授权</font>";
	} else {
		return $str;
	}
}

/**
 * 检测不用检测的控制器
 * @return boolean true-管理员，false-非管理员
 * @author dadong <turn8888@163.com>  15/3/15
 */
function is_path($arr = null) {
	if (is_login()) {
		$path = C('USER_PATH');
		$arr = explode(',', $path);
		if (in_array(strtolower(CONTROLLER_NAME), $arr)) {
			return true;
		}
	}
	return false;
}

/**
 * 检测用户是否登录
 * @return integer false-未登录，大于0-当前登录用户ID
 * @author dadong <turn8888@163.com>  15/3/15
 */
function is_login() {
	$user = session('user_auth');
	//debug($user);
	if (empty($user)) {
		return false;
	} else {
		return session('user_auth_sign') == data_auth_sign($user) ? $user['uid'] : false;
	}
}


/**
 * 时间戳解析今日描红
 * @param  array  $str 时间戳
 * @author dongdoang <turn8888@163.com>  15/3/17
 */
function todayTime($str) {
	//今日
	$today = date('y/m/d');
	//时间戳y/m/d
	$newtoday = date('y/m/d', $str);
	//数据类型检测
	if ($today == $newtoday) {
		return "<font color='red'>" . date('y/m/d H:i:s', $str) . "</font>";
	} else {
		return date('y/m/d H:i:s', $str);
	}
}

/**
 * 合并相同键值数组
 * @param  array  $str 时间戳
 * @author dongdoang <turn8888@163.com>  15/3/17
 */
function arrMerge($data, $str) {
	foreach ($data as $k => $v) {
		if ($v['position'] == $str) {
			$arr['right'][] = $v;
		} else {
			$arr['bottom'][] = $v;
		}
	}
	return $arr;
}

/**
 * 单点登录
 * @param  return  true,false
 * @author dongdoang <turn8888@163.com>  15/3/17
 */
function is_login_only() {
	$user = session('user_auth');
	$s = s($user['uid']);
	if ($user['login_time'] != $s['login_time']) {
		return $s['ip'];
	}
}

/**
 * 按钮函数
 * @param  string  $url 模块/控制器/方法
 * @param  string  $id 处理ID
 * @param  string  $pid 处理PID
 * @param  string  $table 删除数据表
 * @author dongdoang <turn8888@163.com>  15/3/17
 */
function buttonvfy($url, $id, $pid, $table) {

	if ($url == '') {
		return '';
	}
	$exarr = explode('/', $url);
	$endarr = end($exarr);
	//创建
	if (($endarr == 'create' && count($exarr) == '3') || ($endarr == 'add' && count($exarr) == '3')) {
		$arr = 'class="btn btn_blue btnbot addData" fun="callbackFun" url="' . U($url) . '"';
		//排序
	} else if ($endarr == 'updatesort') {
		$arr = 'class="btn btn_blue btnbot updatesort" url="' . U($url) . '"';
		//发送消息
	} else if($endarr == 'send'){
		$array['id'] = $id;
		$arr = 'class="btn btn_blue btnbot send" href="' . U($url, $array) . '" ';
		//权限
	} else if ($endarr == 'power') {
		$array['id'] = $id;
		$arr = 'class="q abtn addData" fun="callbackFun" url="' . U($url, $array) . '"';
		//创建子类
	} else if ($endarr == 'create' && count($exarr) == '2') {
		$array['pid'] = $pid;
		$array['id'] = $id;
		$arr = 'class="add abtn addData" fun="callbackFun" url="' . U($url, $array) . '"';
		//修改
	} else if ($endarr == 'update' || $endarr == 'save') {
		$array['id'] = $id;
		if ($pid) {
			$array['pid'] = $pid;
		}
		$arr = 'class="edit abtn addData" fun="callbackFun" url="' . U($url, $array) . '"';
		//删除
	} else if ($endarr == 'del' || $endarr == 'delete') {
		$array['id'] = $id;
		$arr = 'class="del abtn delData" fun="delfun" url="' . U($url, $array) . '" msg="确认删除吗？"';
		//查看其他详情
	} else if ($endarr == 'detail') {
		$array['id'] = $id;
		$arr = 'class="detail abtn addData" fun="callbackFun" url="' . U($url, $array) . '" ';
		//查看子目录
	} else if ($endarr == 'show') {
		$array['id'] = $id;
		$arr = 'class="look abtn" href="javascript:void(0);" onclick="showFun(this);" ';
	} // 动态审核 通过与不通过
	else if($endarr == 'approved'){
		$arr = 'class="state state1" fun="callbackFun"  onclick="state1_click(this);" ';
	} //确认打款
 	else if ($endarr == 'paid') {
		$array['id'] = $id;
		$arr = 'class="paid abtn" fun="callbackFun" url="' . U($url, $array) . '" msg="确认对方已打款吗？"';
	} //确认发货
 	else if ($endarr == 'sent') {
		$array['id'] = $id;
		$arr = 'class="sent abtn" fun="callbackFun" url="' . U($url, $array) . '" msg="确认货品已发出？"';
	} //控制中心
 	else if ($endarr == 'control') {
		$array['id'] = $id;
		$arr = 'class="control abtn addData" fun="callbackFun" url="' . U($url, $array) . '"';
	} //退卡操作
 	else if ($endarr == 'quit') {
		$array['id'] = $id;
		$arr = 'class="quit abtn delData" fun="callbackFun" url="' . U($url, $array) . '" msg="确认吗?"';
	}
	else if ($endarr == 'blacklist') {
		$array['id'] = $id;
		$arr = 'class="quit abtn delData" fun="callbackFun" url="' . U($url, $array) . '" msg="确认加入黑名单吗?"';
	} //确认已退款
 	else if ($endarr == 'refund') {
		$array['id'] = $id;
		$arr = 'class="refund abtn delData" fun="callbackFun" url="' . U($url, $array) . '" msg="确认退款?"';
	}else if ($endarr == 'update_fee') {
		$array['id'] = $id;
		$arr = 'class="refund abtn addData" fun="callbackFun" url="' . U($url, $array) . '"';
	}else if ($endarr == 'del_I') {
		$array['id'] = $id;
		$arr = 'class="del abtn delData" fun="delfun" url="' . U($url, $array) . '" msg="确认删除吗？"';
		//查看其他详情
	}else if ($endarr == 'del_II') {
		$array['id'] = $id;
		$arr = 'class="del abtn delData" fun="delfun" url="' . U($url, $array) . '" msg="确认删除吗？"';
		//查看其他详情
	}else if ($endarr == 'no_show' || $endarr == 'reload_show') {
		$array['id'] = $id;
		$arr = 'class="quit abtn delData" fun="callbackFun" url="' . U($url, $array) . '" msg="确认吗?"';
		//查看其他详情
	}

	return $arr;
}




	/**
    * 实例化"环信"消息类  （类方法\thinkphp\vendor\message\message.class.php）
  	* @author swift <swift_0606@163.com>
	* */
	function mess($param=array()){
		/*$arr['client_id']='YXA6X3VowOzFEeS-J19GycyNfg';
		$arr['client_secret']='YXA619Kh9YBjfQ3TB1ISkb8yZuTOM3o';
		$arr['org_name']='wzlp8888';
		$arr['app_name']='wzlp';*/
		$_message=M('message_conf');
		$field='org_name,app_name,client_id,client_secret';
		$map['status']='on';
		if(!S('message_conf')){
			$message_conf=$_message->field($field)->where($map)->find();
			S('message_conf',$message_conf);
		}
		$message_conf=S('message_conf');
		if($message_conf){
			$mess=new \Vendor\Message\Message($message_conf,$param);
			return $mess;
		}else{
			$res['status']='0';
			$res['info']='message_conf is error !';
			echo dispose($res);
			exit;
		}
	}
	
	
	/**
    * 过滤危险字符
  	* @author swift <swift_0606@163.com>
	* */
    function filter($str) {
    	
		$newstr=mysql_escape_string($str);
		
		$arr=array('ﭐٍّ',' ॗ','ض','ﭐٍ','ॗ','ﭐ ٍّ');
		
		
		$newstr=str_replace($arr,'',$newstr);
		
		return $newstr;
		
    }
	
	/**
    * 反转义 mysql_escape_string
  	* @author swift <swift_0606@163.com>
	* */
    function unfilter($str) {	
		$str=str_replace('\n', "\n", $str);
		$str=str_replace('\r', "\r", $str);
		return $str;
    }
	
	/**
	* APP 中英文字符截取成数组
	* @author swift <swift_0606@163.com>
	*/
	function mb_str_split ($string, $len=1) {
	    $start = 0;
	    $strlen = mb_strlen($string);
	    while ($strlen) {
	        $array[] = mb_substr($string,$start,$len,"utf8");
	        $string = mb_substr($string, $len, $strlen,"utf8");
	        $strlen = mb_strlen($string);
	    }
	    return $array;
	}

	
	/**
	* model验证,描述是否小于指定长度
	* @author swift <swift_0606@163.com>
	*/
	function string_len($str,$num=10) {
		$arr=mb_str_split($str);
		if(count($arr)>$num){
			return true;
		}else{
			return false;
		}
	}
	
	/**
	* model验证图片,图片不存在
	* @author swift <swift_0606@163.com>
	*/
	function json_empty($json) {
		$arr=json_decode($json,true);
		if($arr){
			return true;
		}else{
			return false;
		}
	}


	/*
	 *  debug调试工具
	 *  lianger
	 */
	function debug($data){

		if(empty($data)){
			echo "<pre style='background-color: #000;color: #fff;font-size: 14px;height: 100px;line-height: 50px;'>";
			echo "<span style='margin-left: 20px;font-size: 18px;'>";
			var_dump($data);
			echo "</span>";
			echo "</pre>";
			die;
		}

		if(!is_array($data)){
			echo "<pre style='background-color: #000;color: #fff;font-size: 14px;min-height: 100px;line-height: 50px;'>";
			echo "<span style='margin-left: 20px;font-size: 18px;'>";
			print_r($data);
			echo "</span>";
			echo "</pre>";
			die;
		}


		echo "<pre style='background-color: #000;color: #fff;font-size: 14px;min-height: 100px;'>";
		echo "<br /><br /><br /><span style='margin-left: 20px;font-size: 13px;'>";
		print_r($data);
		echo "</span><br /><br /><br />";
		echo "</pre>";
		die;
	}


	/*
	 *  pr非断点调试工具
	 *  lianger
	 */
	function pr($data){

		if(empty($data)){
			echo "<pre style='background-color: #000;color: #fff;font-size: 14px;height: 100px;line-height: 50px;'>";
			echo "<span style='margin-left: 20px;font-size: 18px;'>";
			var_dump($data);
			echo "</span>";
			echo "</pre>";
			die;
		}

		if(!is_array($data)){
			echo "<pre style='color: red;font-size: 14px;min-height: 100px;line-height: 50px;'>";
			echo "<span style='font-size: 18px;'>";
			print_r($data);
			echo "</span>";
			echo "</pre>";
			//die;
		}else{
			echo "<pre style='color: red;font-size: 14px;min-height: 100px;'>";
			echo "<br /><br /><br /><span style='font-size: 13px;'>";
			print_r($data);
			echo "</span><br /><br /><br />";
			echo "</pre>";
			//die;
		}



	}

	/**
	 * Text:	请求响应
	 * Desc:
	 * User:   lianger  <sexyphp.com>
	 * CrDt:	2016-06-15
	 * UpDt:
	 */
	function response($status=0,$info='',$uri='',$data=''){

		$arr 	=	array();

		if($status){
			$arr	=	array(
					'status'	=>	'1',
					'info'		=>	'请求成功!'
			);
		}else{
			$arr	=	array(
					'status'	=>	'0',
					'info'		=>	'失败!'
			);
		}

		if(!empty($info)){
			$arr['info']	=	$info;
		}

		if(!empty($info)){
			$arr['uri']	=	$uri;
		}

		if(!empty($data)){
			$arr['data']	=	$data;
		}


		return $arr;
	}


	/**
	 * Text:		定义通用报错列表
	 * Desc:
	 * @return 	array
	 * User:    	lianger  <sexyphp.com>
	 * CrDt:		2016-06-15
	 * UpDt:
	 */
	function getErrorList(){

		return array(

				0=>array("en"=>"Failed", "zh"=>"失败"),
				1=>array("en"=>"Success", "zh"=>"成功"),

			/*
			|--------------------------------------------------------------------------
			| 系统级错误
			|--------------------------------------------------------------------------
			|
			| 系统级错误
			|
			*/
				10001=>array("en"=>"System error", "zh"=>"系统错误"),
				10002=>array("en"=>"Service unavailable", "zh"=>"服务暂停"),
				10003=>array("en"=>"Remote service error", "zh"=>"远程服务错误"),
				10004=>array("en"=>"IP limit", "zh"=>"IP限制"),
				10005=>array("en"=>"Param error", "zh"=>"参数错误"),
				10006=>array("en"=>"Illegal request", "zh"=>"非法请求"),
				10007=>array("en"=>"Request api not found", "zh"=>"接口不存在"),
				10008=>array("en"=>"HTTP method error", "zh"=>"请求方式错误"),
				10009=>array("en"=>"Request body length over limit", "zh"=>"请求长度超过限制"),
				10010=>array("en"=>"Invalid user", "zh"=>"不合法的用户"),
				10011=>array("en"=>"User requests out of rate limit", "zh"=>"用户请求频次超过上限"),
				10012=>array("en"=>"Request timeout", "zh"=>"请求超时"),
				10013=>array("en"=>"User doesn't exists", "zh"=>"用户不存在"),
				10014=>array("en"=>"Username has registered", "zh"=>"用户名已注册"),
				10015=>array("en"=>"No phone number","zh"=>"无电话号码"),
				10016=>array("en"=>"User has login","zh"=>"用户已登录"),
				10017=>array("en"=>"exit login fail","zh"=>"退出登录失败"),
				10018=>array("en"=>"User has not login","zh"=>"用户未登录"),
				10019=>array("en"=>"create token Failed","zh"=>"令牌未生成"),
				10020=>array("en"=>"User has not token","zh"=>"令牌无效"),
				10021=>array("en"=>"User has not token","zh"=>"交易失败"),
				10022=>array("en"=>"User has not registered", "zh"=>"用户未注册"),
			/*
			|--------------------------------------------------------------------------
			| 服务级错误
			|--------------------------------------------------------------------------
			|
			| 服务级错误
			| 2[级别]01[模块]01[错误编号]
			|
			*/
			//20000 - 20099   Common error    公共错误
				20001=>array("en"=>"Unknown error", "zh"=>"未知错误"),
				20002=>array("en"=>"DB error", "zh"=>"数据库错误"),
				20003=>array("en"=>"Object already exists", "zh"=>"记录已存在"),
			//20100 - 20199   System model error    系统模块错误
				20101=>array("en"=>"Cid parameter is null", "zh"=>"Cid参数为null"),
				20102=>array("en"=>"Failed to initialize user data", "zh"=>"初始化用户数据失败"),
			//20200 - 20299   User model error    用户模块错误
				20201=>array("en"=>"Uid parameter is null", "zh"=>"Uid参数为null"),
				20202=>array("en"=>"Username or password error","zh"=>"用户名或密码错误"),
				20203=>array("en"=>"Username and pwd auth out of rate limit", "zh"=>"用户名密码认证超过请求限制"),
				20204=>array("en"=>"Accounts have been locked", "zh"=>"账户已被锁定"),
				20205=>array("en"=>"Failed to modify password", "zh"=>"修改密码失败"),
				20206=>array("en"=>"The phone number has been used", "zh"=>"该手机号已经被使用"),
				20207=>array("en"=>"The account has bean bind phone", "zh"=>"该用户已经绑定手机"),
				20208=>array("en"=>"Verification code error", "zh"=>"验证码错误"),
				20209=>array("en"=>"Failed to send verification code", "zh"=>"发送验证码失败"),
				20210=>array("en"=>"Verification code ok", "zh"=>"验证码正确"),
				20212=>array("en"=>"The phone only bind once", "zh"=>"该手机号码已绑定收货地址"),
				20211=>array("en"=>"This address is not exists", "zh"=>"该收货地址不存在"),
			//20300 - 20399   Article model error    文章模块错误
				20301=>array("en"=>"Aid parameter is null", "zh"=>"Aid参数为null"),
				20302=>array("en"=>"Content is null", "zh"=>"内容为空"),
				20303=>array("en"=>"Article not found", "zh"=>"文章不存在"),
				20350=>array("en"=>"Article category error", "zh"=>"文章分类错误"),
				20351=>array("en"=>"Caid parameter is null", "zh"=>"Caid参数为null"),
			//20400 - 20499   Comment model error    评论模块错误
				20401=>array("en"=>"Coid parameter is null", "zh"=>"Coid参数为null"),
				20402=>array("en"=>"Comment does not exist", "zh"=>"不存在的评论"),
				20403=>array("en"=>"Illegal comment", "zh"=>"不合法的评论"),
			//20500 - 20599   Share model error    分享模块错误
				20501=>array("en"=>"You had get the red envelopes", "zh"=>"您已领取过该红包"),
				20502=>array("en"=>"Red envelopes for failure, please try again later", "zh"=>"红包领取失败,请稍后再试"),
				20503=>array("en"=>"Congratulations, red envelopes for success", "zh"=>"恭喜，红包领取成功"),
				20504=>array("en"=>"Phone number format is not correct", "zh"=>"手机号格式不正确"),
				20505=>array("en"=>"Mobile phone number can't be empty", "zh"=>"手机号码不能为空"),

			/*
			|--------------------------------------------------------------------------
			|
			|--------------------------------------------------------------------------
			|
			| 业务级错误
			| 3[级别]01[模块]01[错误编号]
			|
			*/
				30000=>array("en"=>"", "zh"=>"购买失败"),
				30001=>array("en"=>"", "zh"=>"本期已下线"),
				30002=>array("en"=>"", "zh"=>"用户不存在"),
				30003=>array("en"=>"", "zh"=>"剩余次数不足"),
				30004=>array("en"=>"", "zh"=>"数据库操作失败"),
				30005=>array("en"=>"", "zh"=>"添加默认收货地址,校验数据格式错误"),
				30006=>array("en"=>"", "zh"=>"请输入收货人姓名"),
				30007=>array("en"=>"", "zh"=>"请输入所在区域"),
				30008=>array("en"=>"", "zh"=>"请输入收货的详细地址"),
				30009=>array("en"=>"", "zh"=>"手机号码不正确"),
				30010=>array("en"=>"", "zh"=>"该商品已经下架"),
				30011=>array("en"=>"", "zh"=>"该款式的库存已不足"),
				30012=>array("en"=>"", "zh"=>"您购物车已有活动商品,请勿重复添加"),
				30013=>array("en"=>"", "zh"=>"只能加入非自己发布的商品"),
				30014=>array("en"=>"", "zh"=>"没有那么多库存了-1"),
				30015=>array("en"=>"", "zh"=>"您购物车已满，请先清理一下吧"),
				30016=>array("en"=>"", "zh"=>"没有那么多库存了-2"),
				30017=>array("en"=>"", "zh"=>"加入购物车失败"),
				30018=>array("en"=>"", "zh"=>"移出购物车失败"),
				30019=>array("en"=>"", "zh"=>"已经是最小值了"),
				30020=>array("en"=>"", "zh"=>"没有那么多库存了"),
				30021=>array("en"=>"", "zh"=>"移至收藏失败"),
				30022=>array("en"=>"", "zh"=>"您收藏夹里已满，请先清理再操作！"),
				30023=>array("en"=>"", "zh"=>"移至收藏失败"),
				30024=>array("en"=>"", "zh"=>"type参数输错"),
				30025=>array("en"=>"", "zh"=>"您今日已参与了0元活动"),
				30026=>array("en"=>"", "zh"=>"限量一天一件哦"),
				30027=>array("en"=>"", "zh"=>"两次发送验证码时间小于60秒"),
				30028=>array("en"=>"", "zh"=>"请先输入手机号"),
				30029=>array("en"=>"", "zh"=>"自动确认收货失败"),
				30030=>array("en"=>"", "zh"=>"回库失败"),
				30031=>array("en"=>"", "zh"=>"成长值获取失败"),
				30032=>array("en"=>"", "zh"=>"服务大使[售出所得]出现错误"),
				30033=>array("en"=>"", "zh"=>"删除失败"),
				30034=>array("en"=>"", "zh"=>"type参数输错"),
				30035=>array("en"=>"", "zh"=>"账号不存在"),
				30036=>array("en"=>"", "zh"=>"限量一天一件哦"),
				30037=>array("en"=>"", "zh"=>"非会员必填联系电话"),
				30038=>array("en"=>"", "zh"=>"提交订单异常"),
				30039=>array("en"=>"", "zh"=>"地址不能为空"),
				30040=>array("en"=>"", "zh"=>"网络繁忙，请稍后重试"),
				30041=>array("en"=>"", "zh"=>"某些商品已经下架，提交订单失败"),
				30042=>array("en"=>"", "zh"=>"禁止提交多个活动商品"),
				30043=>array("en"=>"", "zh"=>"提交订单失败"),
				30044=>array("en"=>"", "zh"=>"请输入物流公司名称以及物流单号"),
				30045=>array("en"=>"", "zh"=>"未付款或者已过期"),
				30046=>array("en"=>"", "zh"=>"会员免费商品谢绝退货"),
				30047=>array("en"=>"", "zh"=>"撤销失败"),
				30048=>array("en"=>"", "zh"=>"金额书写格式错误"),
				30049=>array("en"=>"", "zh"=>"下单失败,请刷新后重新试一试"),
				30050=>array("en"=>"", "zh"=>"楼主已删除该分享"),
				30051=>array("en"=>"", "zh"=>"已赞"),
				30052=>array("en"=>"", "zh"=>"目录创建失败"),
				30053=>array("en"=>"", "zh"=>"目录没有写权限"),
				30054=>array("en"=>"", "zh"=>"上传头像失败"),
				30055=>array("en"=>"", "zh"=>"图片格式错误"),
				30056=>array("en"=>"", "zh"=>"您已注册，请勿重复办理"),
				30057=>array("en"=>"", "zh"=>"请联系系统管理员"),
				30058=>array("en"=>"", "zh"=>"您已注册，请勿重复办理！"),
				30059=>array("en"=>"", "zh"=>"您的手机号已办理其他卡"),
				30060=>array("en"=>"", "zh"=>"请输入真实姓名"),
				30061=>array("en"=>"", "zh"=>"请输入身份证号"),
				30062=>array("en"=>"", "zh"=>"验证码输入有误"),
				30063=>array("en"=>"", "zh"=>"该手机号已办理其他VIP卡"),
				30064=>array("en"=>"", "zh"=>"手机号码验证失败"),
				30065=>array("en"=>"", "zh"=>"您不是会员,请核实后再进行绑定"),
				30066=>array("en"=>"", "zh"=>"会员卡已被绑定"),
				30067=>array("en"=>"", "zh"=>"用户唯一标识必填"),
				30068=>array("en"=>"", "zh"=>"用户唯一标识必须是数字"),
				30069=>array("en"=>"", "zh"=>"标题不能为空"),
				30070=>array("en"=>"", "zh"=>"内容不能为空"),
				30071=>array("en"=>"", "zh"=>"描述不能为空"),
				30072=>array("en"=>"", "zh"=>"已在黑名单里"),
		);
	}


	/**
	 * Text:		定义响应数据规范
	 * Desc:		语言:zh[中文简体]、en[英文]
	 * @param      			$code	状态码
	 * @param 		null  		$msg	提示信息
	 * @param 		array 		$data	数据
	 * @return 	array|string
	 * User:    	lianger  <sexyphp.com>
	 * CrDt:		2016-06-15
	 * UpDt:
	 */
	function responses( $code, $msg = null, $data = array() ) {
		$code = (int)$code;
		if( null == $msg ) {
			$errList = getErrorList();

			if( !array_key_exists( $code, $errList ) ) {
				return 'key not exist in config';
			}
			$msg = $errList[ $code ][ "zh" ];

		}

		$ret = array(
				'status' => $code,
				'info' => "{$msg}",
		);

		if( null != $data ) {
			$ret[ 'data' ] = $data;
		}

		return $ret;
	}



	/**
	 * Text:	定义响应数据规范
	 * Desc:	语言:zh[中文简体]、en[英文]
	 * @param       $code		状态码
	 * @param 	null  $msg		提示信息
	 * @param 	array $data		数据
	 * @param       $page		页数
	 * @return array|string
	 * User:    lianger  <sexyphp.com>
	 * CrDt:	2016-06-15
	 * UpDt:
	 */
	function getPageResponse( $code, $msg = null, $data = array() , $page ) {
		$code = (int)$code;
		if( null == $msg ) {
			$errList = getErrorList();

			if( !array_key_exists( $code, $errList ) ) {
				return 'key not exist in config';
			}

			$msg = $errList[ $code ][ "zh" ];

		}

		$ret = array(
				'code' => $code,
				'msg' => "{$msg}",
		);

		if( null != $data ) {
			$ret[ 'data' ] = $data;
		}

		if( null != $page ) {
			$ret[ 'pageInfo' ] = $page;
		}

		return $ret;
	}