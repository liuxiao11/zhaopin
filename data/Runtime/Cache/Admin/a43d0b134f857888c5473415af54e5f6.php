<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>后台管理系统</title>
    <script type="text/javascript" charset="utf-8" src="/Application/Admin/static/js/jquery-1.8.3.min.js"></script>
    <style>
        *{ margin:0px; padding:0px;}
        .clear{clear:both;}
        html, body {height:100%;}
        .bjw_table{
            width:1000px;
            background-color: rgb(235,243,249);
        }
        .bjw_table tr{
            background-color: white;
        }
        .bjw_table th{
            font-size: 14px;
            text-align: left;
            height:30px;line-height: 30px;
            padding:0 10px;
            background-color: white;
        }
        .bjw_table td{
            font-size: 14px;
            text-align: left;
            height:30px;line-height: 30px;
            padding:0 5px;
            background-color: white;
        }

        .form_table{

        }
        .form_table .tr1{
            background-color: white;
        }
        .form_table .td1{
            font-size: 14px;
            text-align: right;
            height:54px;line-height: 54px;
            padding:0 20px;
            border-bottom: 1px solid rgb(235,243,249);
        }
        .form_table .td2{
            font-size: 14px;
            text-align: left;
            height:54px;line-height: 54px;
            padding:0 20px 0 10px;
            border-bottom: 1px solid rgb(235,243,249);
        }
        .form_table .td3{
            font-size: 14px;
            text-align: left;
            height:54px;line-height: 54px;
            padding:0 10px;
            border-bottom: 1px solid rgb(235,243,249);
        }
        .form_table .in_text{
            height:28px;
            padding:0 5px;
            border-radius: 3px;
            border:1px solid rgb(238,238,238);
        }
        .form_table select{
            width:100%;
        }
        .form_table .submit{
            border:0px;border-radius: 3px;
            width:54px;height:25px;line-height: 25px;
            background-color: rgb(88,176,68);
            color:white;font-size: 12px;
            text-align:center;
        }
        .a-children{display:inline-block;width:23px;height:23px;background:url('/Application/Admin/static/images/ico.png') -243px -155px;vertical-align:middle;}
        .a-edit{display:inline-block;width:23px;height:23px;background:url('/Application/Admin/static/images/ico.png') -184px -186px;vertical-align:middle;}
        .a-del{display:inline-block;width:23px;height:23px;background:url('/Application/Admin/static/images/ico.png') -214px -155px;vertical-align:middle;}
        .a-group-rule{display:inline-block;width:23px;height:23px;background:url('/Application/Admin/static/images/ico.png') -65px -155px;vertical-align:middle;}
        .nav{
            float:left;width:137px;height:35px;line-height:35px;text-align:center;font-size:14px;border:1px solid #f8fafc;background-color: rgb(226,237,246);color:#333;
        }
        .nav-active{
            border:1px solid #15659d;background-color: rgb(21,101,157);color:white;
        }
        .left{position:fixed;top:88px;bottom:0px;width:200px;height:auto;background-color: rgb(245,249,252);overflow-y: auto;z-index:1;display:none;}
        .left-active{display:block;}
        .li1{height:30px;line-height: 30px;font-size:14px;border-bottom:1px solid #efefef;padding-left: 55px;background-color: rgb(245,249,252);}
        .li1-active{
            background-color: white;
        }
        .h2 a{text-decoration: none;color:#333;}
    </style>
</head>
<body>
<div class="head" style="width:100%;position:fixed;z-index:1;">
    <div style="height:50px;line-height:50px;font-size:12px;color:white;background-color:rgb(73,141,197);">
        <span style="margin-left:12px;font-size:20px;font-weight: 700;"><?php echo L('_GLOBALTITLE');?>控制台</span>
        <span style="margin-left:100px;">管理员 : <?php echo ($auth["nickname"]); ?></span>
        &nbsp;&nbsp;|&nbsp;&nbsp;设置&nbsp;&nbsp;|&nbsp;&nbsp;帮助&nbsp;&nbsp;|&nbsp;<span class="logout">&nbsp;退出&nbsp;</span>
    </div>
    <div style="border-bottom:1px solid rgb(15,96,153);background-color: rgb(73,141,197);">
        <?php foreach($auth['rules'] as $k=>$v){ ?>
        <div class="nav <?php if($this_rule['top_id'] == $v['id']){echo 'nav-active';} ?>" data_id="<?php echo ($v["id"]); ?>">
            <?php echo ($v["title"]); ?>
        </div>
        <?php } ?>
        <div class="clear"></div>
    </div>
</div>
<?php foreach($auth['rules'] as $k=>$v){ ?>
<div class="left <?php if($this_rule['top_id'] == $v['id']){echo 'left-active';} ?>" id="left_<?php echo ($v["id"]); ?>">
    <div style="height:10px;"></div>
    <?php foreach($v['children_two'] as $kk=>$vv){ ?>
    <div class="div1">
        <div class="div h1" style="position:relative;height:30px;line-height: 30px;font-size:14px;color:#333;border-bottom:1px solid #efefef;padding-left: 40px;background-color:rgb(235,243,249);">
            <b style="position:absolute;width:14px;height:14px;top:8px;left:22px;background:url('/Application/Admin/static/images/icon.png')  -92px -50px;"></b><?php echo ($vv["title"]); ?>
        </div>
        <div class="h2">
            <?php foreach($vv['children_three'] as $kkk=>$vvv){ ?>
            <a href="/<?php echo ($vvv["name"]); ?>"><div class="div li1 <?php if($this_rule['show_id'] == $vvv['id']){echo 'li1-active';} ?>"><?php echo ($vvv["title"]); ?></div></a>
            <?php } ?>
        </div>
    </div>
    <?php } ?>
</div>
<?php } ?>
<div class="left-2" style="position:fixed;top:88px;left:200px;bottom:0px;width:13px;height:100%;line-height:200px;background-color: #498dc5;color:white;"><</div>
<div class="right" style="background:white;position:absolute;top:88px;left:213px;padding-top:60px;padding-bottom:50px;padding-left:20px;">
    <div class="right-title" style="height:40px;line-height:40px;position:fixed;right:0px;top:88px;left:213px;background-color: rgb(245,249,252);z-index: 1;">
        <?php if($page){ ?>
        <div class="page" style="float:right;height:40px;line-height:40px;">
            <?php if($page['max_page'] > 1){ ?>
            <?php if($page['is_index']){ ?>
            <a href="<?php echo ($page["link"]); ?>/page/1" style="display:inline-block;float:left;width:48px;height:24px;line-height:24px;text-align: center;background-color: #498DC5;text-decoration:none;position:relative;top:8px;color:white;border-radius: 3px;margin-left:10px;font-size:12px;">首页</a>
            <?php } ?>
            <?php if($page['is_last']){ ?>
            <a href="<?php echo ($page["link"]); ?>/page/<?php echo ($page['p'] - 1); ?>" style="display:inline-block;float:left;width:60px;height:24px;line-height:24px;text-align: center;background-color: #498DC5;text-decoration:none;position:relative;top:8px;color:white;border-radius: 3px;margin-left:10px;font-size:12px;">上一页</a>
            <?php } ?>
            <?php foreach($page['page_list'] as $k=>$v){ ?>
            <?php if($v == $page['p']){ ?>
            <span style="display:inline-block;float:left;height:24px;line-height:24px;text-align: center;background-color: rgb(245,249,252);position:relative;top:8px;color:#333;margin-left:10px;font-size:12px;padding:0 12px;"><?php echo ($v); ?></span>
            <?php }else{ ?>
            <a href="<?php echo ($page["link"]); ?>/page/<?php echo ($v); ?>" style="display:inline-block;float:left;height:24px;line-height:24px;text-align: center;background-color: #498DC5;text-decoration:none;position:relative;top:8px;color:white;border-radius: 3px;margin-left:10px;font-size:12px;padding:0 12px;"><?php echo ($v); ?></a>
            <?php } ?>
            <?php } ?>
            <?php if($page['is_next']){ ?>
            <a href="<?php echo ($page["link"]); ?>/page/<?php echo ($page['p'] + 1); ?>" style="display:inline-block;float:left;width:60px;height:24px;line-height:24px;text-align: center;background-color: #498DC5;text-decoration:none;position:relative;top:8px;color:white;border-radius: 3px;margin-left:10px;font-size:12px;">下一页</a>
            <?php } ?>
            <?php if($page['is_end']){ ?>
            <a href="<?php echo ($page["link"]); ?>/page/<?php echo ($page["max_page"]); ?>" style="display:inline-block;float:left;width:48px;height:24px;line-height:24px;text-align: center;background-color: #498DC5;text-decoration:none;position:relative;top:8px;color:white;border-radius: 3px;margin-left:10px;font-size:12px;">尾页</a>
            <?php } ?>
            <?php } ?>
            &nbsp;&nbsp;共 <?php echo ($page["count"]); ?> 条记录&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        <?php } ?>
    </div>
<script type="text/javascript" charset="utf-8" src="/Application/Admin/static/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Application/Admin/static/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/Application/Admin/static/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" charset="utf-8" src="/Application/Admin/static/ueditor/ueditor.all.min.js"> </script>
<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo ($news_info["id"]); ?>" />
    <table class="form_table">
        <tr class="tr1">
            <td class="td1">标题</td>
            <td class="td2"><input class="in_text" type="text" size="35" name="title" value="<?php echo ($news_info["title"]); ?>" ></td>
            <td class="td3">* 输入标题</td>
        </tr>
        <tr class="tr1">
            <td class="td1">描述</td>
            <td class="td2"><input class="in_text" type="text" size="35" name="description" value="<?php echo ($news_info["description"]); ?>" ></td>
            <td class="td3">* 输入描述</td>
        </tr>
        <tr class="tr1">
            <td class="td1">关键字</td>
            <td class="td2"><input class="in_text" type="text" size="35" name="keywords" value="<?php echo ($news_info["keywords"]); ?>" ></td>
            <td class="td3">* 输入关键字</td>
        </tr>
        <tr class="tr1">
            <td class="td1">分类</td>
            <td class="td2">
                <select name="type" style="width:150px;">
                    <?php foreach($news_type as $k=>$v){ ?>
                    <option value="<?php echo ($k); ?>" <?php if($k==$news_info['type']){echo 'selected';} ?>><?php echo ($v); ?></option>
                    <?php } ?>
                </select>
            </td>
            <td class="td3">* 选择分类</td>
        </tr>
        <tr class="tr1">
            <td class="td1">作者</td>
            <td class="td2"><input class="in_text" type="text" size="35" name="author" value="<?php echo ($news_info["author"]); ?>" ></td>
            <td class="td3">* 作者</td>
        </tr>
        <tr class="tr1">
            <td class="td1">资讯内容</td>
            <td><script id="container" name="content" type="text/plain" style="width:800px;height:400px;"><?php echo ($news_info["content"]); ?></script></td>
            <td class="td3">* 编辑内容</td>
        </tr>
        <tr class="tr1">
            <td class="td1">封面图</td>
            <td class="td2">
                <img class="news_img" src="<?php echo ($news_info["img"]); ?>" style="height:50px;position:relative;top:10px;"/>&nbsp;&nbsp;<input type="file" name="file" class="file" />
            </td>
            <td class="td3">* 限制jpg,jpeg,gif,png格式</td>
        </tr>
        <tr class="tr1">
            <td class="td1"></td>
            <td class="td2"></td>
            <td class="td3"><input class="submit" type="submit" value="确认" /></td>
        </tr>
    </table>
</form>
<script>
    //实例化编辑器
    <!-- 实例化编辑器  加载编辑器的容器 -->
    var ue = UE.getEditor('container');
    setTimeout("UE.getEditor('container').container.style.zIndex = 0;", 300);
    $('.file').change(function(){
        $('.news_img').remove();
    })
</script>
</div>
</body>
</html>
<script>
    $(".left-2").toggle(
        function () {
            $('.left').hide();
            $(this).css('left','0px');
            $(this).html('>');
            $('.right').css('left','13px');
            $('.right-title').css('left','13px');
        },
        function () {
            $('.left').show();
            $(this).css('left','200px');
            $(this).html('<');
            $('.right').css('left','213px');
            $('.right-title').css('left','213px');
        }
    );

    $('.logout').mouseover(function(){
        $(this).css('cursor','pointer');
        $(this).css('background-color','rgb(15,96,153)');
    }).mouseleave(function(){
        $(this).css('background-color','rgb(73,141,197)');
    });

    $('.page a').mouseover(function(){
        $(this).css('background','rgb(21,101,157)');
    }).mouseleave(function(){
        $(this).css('background','#498DC5');
    });

    $('.nav').mouseover(function(){
        $(this).css('cursor','pointer');
    });

    $('.logout').click(function(){
        if(!confirm('确认退出吗')){
            return ;
        }
        window.location.href = '/admin/sign/logout';
    });

    $(".h1").toggle(function(){
        $(this).parent().children('.h2').animate({height: 'toggle', opacity: 'toggle'});
        $(this).children('b').css('background',"url('/Public/images/icon.png')  -92px -41px")
    },function(){
        $(this).parent().children('.h2').animate({height: 'toggle', opacity: 'toggle'}, "normal");
        $(this).children('b').css('background',"url('/Public/images/icon.png')  -92px -50px")
    });

    $('.bjw_table tr').mouseover(function(){
        $(this).children('th').css('background-color','rgb(255,245,173)');
        $(this).children('td').css('background-color','rgb(255,245,173');
    }).mouseleave(function(){
        $(this).children('th').css('background-color','white');
        $(this).children('td').css('background-color','white');
    });

    $('.form_table tr').mouseover(function(){
        $(this).children('th').css('background-color','rgb(255,245,173)');
        $(this).children('td').css('background-color','rgb(255,245,173');
    }).mouseleave(function(){
        $(this).children('th').css('background-color','white');
        $(this).children('td').css('background-color','white');
    });

    var background_color = '';
    $('.nav').click(function(){
        var data_id = $(this).attr('data_id');
        $('.nav').attr('class','nav');
        $(this).attr('class','nav nav-active');
        $('.left').attr('class','left');
        $('#left_'+data_id).attr('class','left left-active');
    })
    $('.div').mouseover(function(){
        background_color = $(this).css('background-color');
        $(this).css('cursor','pointer');
        $(this).css('background-color','white');
    }).mouseleave(function(){
        $(this).css('background-color',background_color);
    });
</script>