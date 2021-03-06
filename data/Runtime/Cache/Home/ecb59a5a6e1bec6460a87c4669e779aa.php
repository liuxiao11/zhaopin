<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="/Public/css/jquery.pagination.css"/>
    <link rel="stylesheet" href="/Public/css/common.css"/>
    <link rel="stylesheet" href="/Public/css/area.css"/>
    <link rel="stylesheet" href="/Public/css/my.css"/>
</head>
<body>
<header>
    <div class="top">
        <div class="container clearfloat">
            <div class="lf">
                <a href=""><img src="/Public/images/wechat.png" alt=""/>微信</a>
                <span>|</span>
                <a href=""><img src="/Public/images/chat.png" alt=""/>客服</a>
            </div>
            <div class="rt">
                <a href="<?php echo U('/home/sign/login');?>">登录</a><span>|</span>
                <a href="<?php echo U('/home/sign/register');?>">注册</a><span>|</span>
                <a href="">网站导航</a>
            </div>
        </div>
    </div>
    <div class="header">
        <div class="container clearfloat">
            <div class="logo lf">
                <a href=""><img src="/Public/images/logo.png" alt=""/></a>
            </div>
            <div class="province lf" id="chose">
                <div class="chose">全国
                    <span class="triangle-down"></span>
                </div>
                <div class="province-box">
                    <a href="">安徽省</a>
                    <a href="">北京市</a>
                    <a href="">重庆市</a>
                    <a href="">福建省</a>
                    <a href="">广东省</a>
                    <a href="">甘肃省</a>
                    <a href="">广西省</a>
                    <a href="">贵州省</a>
                    <a href="">河北省</a>
                    <a href="">湖南省</a>
                    <a href="">湖北省</a>
                    <a href="">河南省</a>
                    <a href="">黑龙江省</a>
                    <a href="">海南省</a>
                    <a href="">江苏省</a>
                    <a href="">吉林省</a>
                    <a href="">江西省</a>
                    <a href="">辽宁省</a>
                    <a href="">内蒙古</a>
                    <a href="">宁夏</a>
                    <a href="">青海</a>
                    <a href="">四川省</a>
                    <a href="">上海市</a>
                    <a href="">山东省</a>
                    <a href="">山西省</a>
                    <a href="">陕西省</a>
                    <a href="">天津市</a>
                    <a href="">西藏</a>
                    <a href="">新疆</a>
                    <a href="">云南省</a>
                    <a href="">浙江省</a>
                </div>
            </div>
            <div class="search-box lf">
                <div class="form clearfloat">
                    <div class="input-group input-group-sm search lf">
                        <label for="search" class="sr-only">搜索：</label>
                        <input type="text" class="form-control" id="search" placeholder="请输入关键词搜索"/>
                <span class="input-group-btn">
                  <button type="button" class="btn">
                      <span  class="glyphicon glyphicon-search"></span> 搜索
                  </button>
                </span>
                    </div>
                    <span class="or">或</span>
                    <a href="/publish" class="btn release"><img src="/Public/images/release.png" alt=""/>信息发布</a>
                </div>
                <div class="find">
                    <a href="">找职位</a>
                    <a href="">找资质</a>
                    <a href="">培训</a>
                    <a href="">资讯</a>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="navbar">
    <div class="container clearfloat">
        <ul class="lf">
            <li><a href="">首页</a></li>
            <li><a href="/invite/full.html">招聘</a></li>
            <li><a href="/news/lists/type/2.html">资质</a></li>
            <li><a href="">公司</a></li>
            <li><a href="/news/lists.html">资讯</a></li>
            <li><a href="/resume/full.html">简历库</a></li>
        </ul>
        <div class="tel rt">
            <img src="/Public/images/tel.png" alt=""/>
            <span>400-000-1212</span>
        </div>
    </div>
</div>
<div class="center-contain">
    <div class="container clearfloat">
        <div class="center-lf">
    <div class="head-portrait">
        <img src="/Public/images/photo_03.jpg" alt="" class="pic"/>
        <h3><?php echo ($user_info["nickname"]); ?></h3>
        <div class="level">我的等级：<span>普通会员</span></div>
        <div class="tel">我的手机：<span><?php echo ($user_info["phone"]); ?></span></div>
    </div>
    <ul class="parent-list">
        <li>
            <a href="/company" class="<?php if(ACTION_NAME == 'index'){echo 'active';} ?>">
                <i class="i1"></i>首页 <em></em>
            </a>
        </li>
        <li>
            <a href=""><i class="i2"></i>兼职招聘<em></em></a>
            <ul class="list">
                <li><a href="/home/company/invite_part_list" class="<?php if(ACTION_NAME == 'invite_part_list'){echo 'active';} ?>">我的招聘<em></em></a></li>
                <li><a href="">简历投递记录<em></em></a></li>
                <li><a href="">简历下载记录<em></em></a></li>
            </ul>
        </li>
        <li>
            <a href=""><i class="i3"></i>全职招聘<em></em></a>
            <ul class="list">
                <li><a href="/home/company/invite_full_list" class="<?php if(ACTION_NAME == 'invite_full_list'){echo 'active';} ?>">我的招聘<em></em></a></li>
                <li><a href="">简历投递记录<em></em></a></li>
                <li><a href="">简历下载记录<em></em></a></li>
            </ul>
        </li>
        <li><a href="/company/invite_full.html" class="<?php if(ACTION_NAME == 'invite_full' || ACTION_NAME == 'invite_part'){echo 'active';} ?>"><i class="i4"></i>发布信息<em></em></a></li>
        <li>
            <a href=""><i class="i5"></i>账号管理<em></em></a>
            <ul class="list">
                <li><a href="/company/info" class="<?php if(ACTION_NAME == 'info'){echo 'active';} ?>">公司资料<em></em></a></li>
                <li><a href="/company/update_pwd" class="<?php if(ACTION_NAME == 'update_pwd'){echo 'active';} ?>">修改密码<em></em></a></li>
            </ul>
        </li>
        <li><a href="/sign/logout"><i class="i6"></i>退出<em></em></a></li>
    </ul>
</div>
        <div class="content-rt">
            <h3>公司资料</h3>
            <div class="form-box">
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo ($company_info["id"]); ?>"/>
                    <div class="form-group clearfloat">
                        <div class="col-lf lf">
                            <label>公司名</label>
                        </div>
                        <div class="col-rt lf">
                            <input type="text" name="company_name" value="<?php echo ($company_info["company_name"]); ?>" placeholder="请输入公司名"/>
                        </div>
                    </div>

                    <div class="form-group clearfloat">
                        <div class="col-lf lf">
                            <label>公司规模</label>
                        </div>
                        <div class="col-rt lf">
                            <div class="selector s">
                                <select name="company_scale" style="width: 200px;">
                                    <option value="0">未选择</option>
                                    <?php foreach($company_scale as $k=>$v){ ?>
                                    <option value="<?php echo ($k); ?>" <?php if($company_info['company_scale'] == $k){echo 'selected';} ?>><?php echo ($v); ?></option>
                                    <?php } ?>
                                </select>
                                <i><img src="/Public/images/down.jpg" alt=""/></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group clearfloat">
                        <div class="col-lf lf">
                            <label>联系人</label>
                        </div>
                        <div class="col-rt lf">
                            <input type="text" name="contact" value="<?php echo ($company_info["contact"]); ?>" placeholder="请输入公司联系人"/>
                        </div>
                    </div>

                    <div class="form-group clearfloat">
                        <div class="col-lf lf">
                            <label>联系电话</label>
                        </div>
                        <div class="col-rt lf">
                            <input type="text" name="tel" value="<?php echo ($company_info["tel"]); ?>" placeholder="请输入联系电话"/>
                        </div>
                    </div>

                    <div class="form-group clearfloat">
                        <div class="col-lf lf">
                            <label>所在地区</label>
                        </div>
                        <div class="col-rt lf">
                            <div id="city">
                                <select class="prov" name="province" style="width:auto;">
                                    <option value="0">请选择</option>
                                    <?php foreach($province_list as $k=>$v){ ?>
                                    <option value="<?php echo ($v["id"]); ?>" <?php if($company_info['province'] == $v['id']){echo 'selected';} ?>><?php echo ($v["name"]); ?></option>
                                    <?php } ?>
                                </select>&nbsp;
                                <select class="city" name="city" style="width:auto;">
                                    <option value="0">请选择</option>
                                    <?php foreach($city_list as $k=>$v){ ?>
                                    <option value="<?php echo ($v["id"]); ?>" <?php if($v['id'] == $company_info['city']){echo 'selected';} ?>><?php echo ($v["name"]); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group clearfloat">
                        <div class="col-lf lf">
                            <label>详细地址</label>
                        </div>
                        <div class="col-rt lf">
                            <input type="text" name="address" value="<?php echo ($company_info["address"]); ?>" placeholder="请输入详细地址"/>
                        </div>
                    </div>

                    <div class="form-group clearfloat">
                        <div class="col-lf lf">
                            <label>公司介绍</label>
                        </div>
                        <div class="col-rt lf">
                            <textarea name="intro"><?php echo ($company_info["intro"]); ?></textarea>
                        </div>
                    </div>

                    <div class="form-group clearfloat">
                        <div class="col-lf lf" style="height: 1px;">
                        </div>
                        <div class="col-rt lf">
                            <button class="get-code" id="publish_01">发布</button>
                        </div>
                    </div>
                </form>
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
    <div class="container">
        <ul class="footer-cate-contain clearfloat">
            <li class="footer-cate-item">
                <span>广建英才</span>
                <ul>
                    <li><a href="">关于我们</a></li>
                    <li><a href="">招聘信息</a></li>
                    <li><a href="">联系我们</a></li>
                    <li><a href="">网站公告</a></li>
                </ul>
            </li>
            <li class="footer-cate-item">
                <span>综合服务</span>
                <ul>
                    <li><a href="">证书招聘</a></li>
                    <li><a href="">证书简历</a></li>
                    <li><a href="">全职招聘</a></li>
                    <li><a href="">资质服务</a></li>
                    <li><a href="">建筑培训</a></li>
                </ul>
            </li>
            <li class="footer-cate-item">
                <span>帮助中心</span>
                <ul>
                    <li><a href="">常见问题</a></li>
                    <li><a href="">友情链接</a></li>
                    <li><a href="">网站建议</a></li>
                    <li><a href="">便民服务</a></li>
                    <li><a href="">手机号冒用</a></li>
                </ul>
            </li>
            <li class="footer-cate-item">
                <span>关注我们</span>
                <div class="code-box">
                    <div class="cell">
                        <img src="/Public/images/code.jpg" alt=""/>
                        <p>关注官方微信</p>
                    </div>
                    <div class="cell">
                        <img src="/Public/images/code.jpg" alt=""/>
                        <p>关注手机站</p>
                    </div>
                </div>
            </li>
            <li class="footer-cate-item">
                <span>联系我们</span>
                <div class="tel">
                    <img src="/Public/images/tel.png" alt=""/>
                    <span>400-000-1212</span>
                </div>
                <p>客服QQ：1231620236</p>
                <p>周一至周日：08：30 - 18：00</p>
            </li>
        </ul>
        <div class="friend-link-box clearfloat">
            <p class="tit lf">友情链接</p>
            <ul class="friend-links lf">
                <li><a href="">商务服务网</a></li>
                <li><a href="">电力人才网</a></li>
                <li><a href="">人才招聘</a></li>
                <li><a href="">策划方案</a></li>
                <li><a href="">装修价格</a></li>
                <li><a href="">装修问答</a></li>
                <li><a href="">重庆二手房网</a></li>
                <li><a href="">猎头网</a></li>
                <li><a href="">人才网最新招聘信息</a></li>
                <li><a href="">装修网</a></li>
                <li><a href="">在职研究生</a></li>
                <li><a href="">装修效果图</a></li>
                <li><a href="">岗位职责</a></li>
                <li><a href="">二级建造师</a></li>
                <li><a href="">土木工程网</a></li>
            </ul>
        </div>
        <div class="bottom">
            <p>@COPYRIGHT 京ICP备15047379号-1 版权所有：北京中储亨通信息咨询有限公司</p>
            <p>电话： 地址：石景山区阜石路166号泽阳大厦1506</p>
        </div>
    </div>
</footer>
<script src="/Public/js/jquery-1.11.3.js"></script>
<script src="/Public/js/my.js"></script>
<script>
    $('.prov').change(function(){
        var province = $(this).val();
        $('.city').empty();
        if(province == 0){
            return ;
        }

        $.post("/admin/ajax/ajax_city",{province:province},function(data){
            if(data.code == 1){
                alert(data.message);
                return ;
            }

            $('.city').append("<option value=\"0\">请选择</option>");
            for(var i=0;i<data.data.length;i++){
                $('.city').append("<option value=\""+data.data[i].id+"\">"+data.data[i].name+"</option>");
            }
        },'json')
    })
</script>
</body>
</html>