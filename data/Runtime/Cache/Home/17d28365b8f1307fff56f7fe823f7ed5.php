<?php if (!defined('THINK_PATH')) exit(); if(C('LAYOUT_ON')) { echo ''; } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>跳转提示</title>
<style type="text/css">
*{ 
	padding: 0; margin: 0; 
}
body{ 
	background: #fff; font-family: '微软雅黑';
}
.notice{
	width: 300px;
	height: 200px;
 
	 margin:70px auto;
	border: 1px solid #b2b2b2;
	border-radius: 5px;
	background: #d84345;
}
.notice dl{
	width: 280px;
	height: 180px;
	margin: 10px;
	background: #fff;
	border-radius: 5px;
}
.notice dl dt{
	text-align: center;
	padding-top: 30px;
}
.notice dl dd{
	text-align: center;
	padding: 5px 0;
	color: #666;
}
.notice .notice_msg{
	font-size: 25px;
	font-family: "黑体";
}
.notice .notice_auto{
	
}
.notice .notice_auto b{
	color: #999;
	padding: 0 5px;
}
.notice .notice_auto a{
	padding: 0 15px;
	text-decoration: none;
	color: #999;
	font-size: 13px;
}
</style>
</head>
<body>
	<div class="notice">
		<dl>
			<dt><img src="/Public/images/error.png"></dt>
			<dd class="notice_msg"><?php echo($error); ?></dd>
			<dd class="notice_auto">跳转时间:<b id="wait"><?php echo($waitSecond); ?></b>秒<a id="href" href="<?php echo($jumpUrl); ?>">立即跳转</a></dd>
		</dl>
	</div>


<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>
</body>
</html>