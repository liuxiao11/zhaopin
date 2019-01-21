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
<style>
    .quanxuan{
        height:29px;line-height:29px;
        border-bottom:1px solid rgb(235,243,249);background-color: rgb(73,141,197);
        color:white;font-size: 14px;
    }
    .level-1{
        height:29px;line-height:29px;
        border-bottom:1px solid rgb(235,243,249);background-color: rgb(245,249,252);
        color:#333;font-size: 14px;
    }
    .level-2{
        height:29px;line-height: 29px;border-bottom:1px solid rgb(235,243,249);font-size: 14px;
    }
    .level-3{
        height:29px;line-height: 29px;border-bottom:1px solid rgb(235,243,249);font-size: 14px;
    }
    .div-4{
        height:29px;line-height: 29px;border-bottom:1px solid rgb(235,243,249);font-size: 14px;
    }
</style>
<div class="quanxuan">
    <input type="checkbox" class="checkbox all" style="margin-left:20px;vertical-align:middle;" />&nbsp;全选
</div>
<form action="" method="post">
    <input type="hidden" name="gid" value="<?php echo ($get["gid"]); ?>" />
    <?php foreach($rule_list as $k=>$v){ ?>
    <div class="div-1">
        <div class="level-1">
            <input type="checkbox" class="checkbox lv1" name="rule[]" <?php if($v['is_have'] == 1){echo 'checked';} ?> value="<?php echo ($v["id"]); ?>" style="margin-left:20px;vertical-align:middle;" />&nbsp;<?php echo ($v["title"]); ?>
        </div>

        <?php foreach($v['children_two'] as $kk=>$vv){ ?>
        <div class="div-2">
            <div class="level-2" style="">
                <input type="checkbox" lv-one="<?php echo ($v["id"]); ?>" class="checkbox lv2" name="rule[]" <?php if($vv['is_have'] == 1){echo 'checked';} ?> value="<?php echo ($vv["id"]); ?>" style="margin-left:40px;vertical-align:middle;" />&nbsp;<?php echo ($vv["title"]); ?>
            </div>
            <?php foreach($vv['children_three'] as $kkk=>$vvv){ ?>
            <div class="div-3">
                <div class="level-3">
                    <input type="checkbox" lv-one="<?php echo ($v["id"]); ?>" lv-two="<?php echo ($vv["id"]); ?>" class="checkbox lv3" name="rule[]" <?php if($vvv['is_have'] == 1){echo 'checked';} ?> value="<?php echo ($vvv["id"]); ?>" style="margin-left:60px;vertical-align:middle;" />&nbsp;<?php echo ($vvv["title"]); ?>
                </div>

                <?php if($vvv['children_four']){ ?>
                <div class="div-4">
                    <?php foreach($vvv['children_four'] as $k4=>$v4){ ?>
                    <input type="checkbox" lv-one="<?php echo ($v["id"]); ?>" lv-two="<?php echo ($vv["id"]); ?>" lv-thress="<?php echo ($vvv["id"]); ?>" name="rule[]" <?php if($v4['is_have'] == 1){echo 'checked';} ?> value="<?php echo ($v4["id"]); ?>" class="checkbox lv4" style="margin-left:60px;vertical-align:middle;" />&nbsp;<?php echo ($v4["title"]); ?>
                    <?php } ?>
                </div>
                <?php } ?>
                <div style="height:30px;"></div>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
    <div style="height:1px;background-color: rgb(21,101,157);"></div>
    <input class="submit" type="submit" value="确认" style="float:right;margin-top:10px;border:0px;border-radius: 3px;width:54px;height:25px;line-height: 25px;background-color: rgb(88,176,68);color:white;font-size: 12px;text-align:center;" />
</form>

<script>
    //第一层选中
    $('.lv1').click(function(){
        var one_checked = $(this).is(':checked');
        var val = $(this).val();
        if(one_checked){
            $('.checkbox').each(function(){
                if($(this).attr('lv-one') == val){
                    $(this).attr("checked",'true');
                }
            })
        }else{
            $(".all").removeAttr("checked");
            $('.checkbox').each(function(){
                if($(this).attr('lv-one') == val){
                    $(this).removeAttr("checked");
                }
            })
        }
    });

    //第二层选中
    $('.lv2').click(function(){
        var two_checked = $(this).is(':checked');
        var val = $(this).val();
        var _this = $(this);
        if(two_checked){
            $('.checkbox').each(function(){
                if($(this).val() == _this.attr('lv-one')){
                    $(this).attr("checked",'true');
                }
                if($(this).attr('lv-two') == val){
                    $(this).attr("checked",'true');
                }
            })
        }else{
            $(".all").removeAttr("checked");
            $('.checkbox').each(function(){
                if($(this).attr('lv-two') == val){
                    $(this).removeAttr("checked");
                }
            })
        }
    });

    //第三层选中
    $('.lv3').click(function(){
        var three_checked = $(this).is(':checked');
        var val = $(this).val();
        var _this = $(this);
        if(three_checked){
            $('.checkbox').each(function(){
                if($(this).val() == _this.attr('lv-one')){
                    $(this).attr("checked",'true');
                }
                if($(this).val() == _this.attr('lv-two')){
                    $(this).attr("checked",'true');
                }
                if($(this).attr('lv-thress') == val){
                    $(this).attr("checked",'true');
                }
            })
        }else{
            $(".all").removeAttr("checked");
            $('.checkbox').each(function(){
                if($(this).attr('lv-thress') == val){
                    $(this).removeAttr("checked");
                }
            })
        }
    });

    //第四层选中
    $('.lv4').click(function(){
        var four_checked = $(this).is(':checked');
        var _this = $(this);
        if(four_checked){
            $('.checkbox').each(function(){
                if($(this).val() == _this.attr('lv-one')){
                    $(this).attr("checked",'true');
                }
                if($(this).val() == _this.attr('lv-two')){
                    $(this).attr("checked",'true');
                }
                if($(this).val() == _this.attr('lv-thress')){
                    $(this).attr("checked",'true');
                }
            })
        }else{
            $(".all").removeAttr("checked");
        }
    });

    //全选
    $(".all").click(function(){
        var all_checked = $(this).is(':checked');
        if(all_checked){
            $('.checkbox').attr("checked",'true');
        }else{
            $('.checkbox').removeAttr("checked");
        }
    });
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