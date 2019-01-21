<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="/Public/css/common.css"/>
    <link rel="stylesheet" href="/Public/css/vip.css"/>
</head>
<body>
<header>
    <div class="container">
        <div class="head clearfloat">
            <div class="logo lf">
                <a href="/home"><img src="/Public/images/slogo.png" alt=""/></a>
                <span>注册</span>
            </div>
            <div class="go-back rt">
                <a href="/home">返回首页</a>
            </div>
        </div>
    </div>
</header>
<div class="main register">
    <div class="container">
        <div class="vip-box clearfloat">
            <div class="vip-lf lf">
                <div class="form-box">
                    <form action="">
                        <div class="form-group">
                            <label><img src="/Public/images/vi_03.png" alt=""/></label>
                            <input type="text" name="phone" placeholder="请输入11位手机号" id="uTel"/>
                        </div>
                        <div class="form-group">
                            <label><img src="/Public/images/v_03.png" alt=""/></label>
                            <input type="text" placeholder="请输入手机验证码" id="code"/>
                        </div>
                        <a href="javascript:;" class="test" style="width: 100px;">获取验证码</a>
                        <div class="form-group">
                            <label><img src="/Public/images/vi_06.png" alt=""/></label>
                            <input id="uPwd" type="password" name="password" placeholder="8-16字符，至少包含数字、字母"/>
                        </div>
                        <div class="button-holder">
                            <div class="radio"  style="border: 0">
                                <span>您的身份</span>
                                <input type="radio" id="rencai" name="type" class="regular-radio regular-checkbox" checked value="1" />
                                <label for="rencai"></label>人才
                                <input type="radio" id="jianqi" name="type" class="regular-radio regular-checkbox" value="2" />
                                <label for="jianqi"></label>建企
                                <input type="radio" id="lietou" name="type" class="regular-radio regular-checkbox" value="3" />
                                <label for="lietou"></label>猎头
                            </div>
                        </div>
                        <div class="slide-box">
                            <span class="lf">验证</span>
                            <div id="slider">
                                <div id="slider_bg"></div>
                                <span id="label">>></span> <span id="labelTip">请按住滑块，拖到最右边</span>
                            </div>
                        </div>
                        <div class="button-holder">
                            <div class="radio"  style="border: 0">
                                <input type="checkbox" id="agree" name="a" class="regular-radio regular-checkbox" checked/>
                                <label for="agree" style="margin: 0 10px 0 0;"></label>我同意接受《广建筑才服务协议》
                            </div>
                        </div>
                        <button class="btn click" style="width: 180px;border:0px;" id="register">完成注册</button>
                    </form>
                </div>
            </div>
            <div class="vip-rt lf">
                <h4>提示：</h4>
                <ul>
                    <li>请正确选择注册类型，一旦发现假冒类型将永久封闭；</li>
                    <li>若你是业务顾问、中介公司或培训机构请注册猎头用户；</li>
                    <li>本网站可免费发布信息，除了特定的增值服务外，是不收取任何费用的；</li>
                    <li>请勿发布虚假信息，一旦查处立即封号，带来的相关影响本网站不承担任何责任；</li>
                    <li>禁止发布与本网站信息不相关的内容。</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--验证内容-->
<div class="false">
    <div class="false_text">
        <div class="close" id="close"><img src="/Public/images/delete.png" alt=""/></div>
        <p></p>
    </div>
</div>
<footer>
    <p>@COPYRIGHT 京ICP备15047379号-1 版权所有：北京中储亨通信息咨询有限公司</p>
    <p>电话： 地址：石景山区阜石路166号泽阳大厦1506</p>
</footer>
<script src="/Public/js/jquery-1.11.3.js"></script>
<script src="/Public/js/jquery.slideunlock.js"></script>
<script>
    $(function () {
        $('#register').css('background','#e1e1e1');
        $('#register').click(function(){
            $(this).attr('href','javascript:;');
            $(this).css('background','#e1e1e1');
        });
        var slider = new SliderUnlock("#slider",{
            successLabelTip : "验证成功"
        },function(e){
            $('#labelTip').css('color','#ffffff');

        });
        slider.init();
    })
</script>
</body>
</html>