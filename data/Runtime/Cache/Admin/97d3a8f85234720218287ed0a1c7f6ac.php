<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php echo L('_GLOBALTITLE');?>--控制台登陆</title>
    <script type="text/javascript" charset="utf-8" src="/Application/Admin/static/js/jquery-1.8.3.min.js"></script>
    <style>
        *{ margin:0px; padding:0px;}
        .clear{clear:both;}
    </style>
</head>
<body>
<div id="top">
    <img src="/Application/Admin/static/images/logo.png" style="width:177px;height:65px;float:left;margin-left:400px;"/>
    <div class="clear"></div>
</div>

<div style="height:600px;background-image:url('/Application/Admin/static/images/banner.jpg');">
    <form action="" method="post">
        <div style="width:338px;height:383px;float:right;margin-right:100px;margin-top:60px;background-color: rgba(225,225,225,.9);">
            <div style="height:75px;"></div>
            <div style="height:24px;line-height: 24px;text-align: center;font-size:18px;">账号登陆</div>
            <div style="height:38px;"></div>
            <div style="width:284px;height:42px;border:1px solid rgb(141,141,141);margin:0 auto;border-radius: 5px;">
                <i style="display:inline-block;width:24px;height:24px;position:relative;top:5px;background:url('/Application/Admin/static/images/input_bg.png') -145px -57px;"></i><input type="text" name="account" style="margin-left:5px;width:190px;height:26px;line-height:26px;padding-left:10px;border:0px;" />
            </div>
            <div style="height:10px;"></div>
            <div style="width:284px;height:42px;border:1px solid rgb(141,141,141);margin:0 auto;border-radius: 5px;">
                <i style="display:inline-block;width:24px;height:24px;position:relative;top:5px;background:url('/Application/Admin/static/images/input_bg.png') -170px -57px;"></i><input type="password" name="pass" style="margin-left:5px;width:190px;height:26px;line-height:26px;padding-left:10px;border:0px;" />
            </div>
            <div style="height:35px;"></div>
            <button class="submit" style="display:block;width:284px;height:42px;line-height:42px;text-align:center;margin:0 auto;border:1px solid rgb(217,84,17);background-color:rgb(217,84,17);color:white;font-size:16px;border-radius: 5px;">进入后台</button>
            <script>
                $('.submit').mouseover(function(){
                    $(this).css('background-color','rgb(245,111,43)');
                }).mouseleave(function(){
                    $(this).css('background-color','rgb(217,84,17)');
                })
            </script>
        </div>
    </form>

</div>
<div style="height:30px;"></div>
<div style="text-align:center;">
    <?php echo L('_COPYRIGHT');?>
</div>
</body>
</html>