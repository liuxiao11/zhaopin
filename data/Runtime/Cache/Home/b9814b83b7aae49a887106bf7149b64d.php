<?php if (!defined('THINK_PATH')) exit(); echo ($user_info["name"]); ?><br/>
手机号：<?php echo ($user_info["phone"]); ?><br/>
注册时间：<?php echo date("Y-m-d",$user_info['create_time']); ?><br/><br/>

人才查看：<?php echo ($user_info["person"]); ?>&nbsp;&nbsp;建企查看：<?php echo ($user_info["company"]); ?>&nbsp;&nbsp;投递职位：<?php echo ($user_info["delivery"]); ?>