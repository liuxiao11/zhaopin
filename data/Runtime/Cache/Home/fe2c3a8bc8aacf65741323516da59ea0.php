<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="/Public/css/common.css"/>
    <link rel="stylesheet" href="/Public/css/jquery.pagination.css"/>
    <link rel="stylesheet" href="/Public/css/swiper.min.css"/>
    <link rel="stylesheet" href="/Public/css/my.css"/>
    <link rel="stylesheet" href="/Public/css/inside.css"/>
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
            <li><a href="/home">首页</a></li>
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
<div class="main-box">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="#">首页</a></li>
            <li><a href="#">兼职招聘</a></li>
            <li><a href="#">建筑工程一建【江苏】</a></li>
        </ul>
    </div>
    <div class="job-box">
        <div class="container">
            <div class="tit"><?php echo ($invite_info["title"]); ?></div>
            <div style="color: #999999">
                <span class="addr"><img src="/Public/images/l_icon_03.png" alt=""/>全职地区：<?php echo ($invite_info["work_province"]); ?>-<?php echo ($invite_info["work_city"]); ?></span>
                <b>|</b>
                <span>浏览：<?php echo ($invite_info["scan"]); ?></span>
                <b>|</b>
                <span>更新时间：<?php echo date('Y-m-d H:i:s',$invite_info['create_time']); ?></span>
            </div>
            <div class="price"><?php echo ($salary[$invite_info['salary']]); ?></div>
        </div>
    </div>
    <div class="container">
        <div class="detail-cont">
            <div class="content clearfloat">
                <div class="detail-left lf" style="padding-top: 0">
                    <div class="introduce">
                        <h3><img src="/Public/images/l_icon_07.png" alt=""/>职位信息</h3>
                    </div>
                    <ul class="basic-information clearfloat">
                        <li>分类：<span><?php echo ($cat[$invite_info['cat']]); ?></span></li>
                        <li>学历：<span><?php echo ($education[$invite_info['education']]); ?></span></li>
                        <li>工作经验：<span><?php echo ($work_years[$invite_info['work_years']]); ?></span></li>
                    </ul>
                    <div class="introduce">
                        <h3><img src="/Public/images/l_icon_16.png" alt=""/>其他说明</h3>
                        <p style="width: 650px;">
                            <?php echo ($invite_info["intro"]); ?>
                        </p>
                    </div>
                    <a href="javascript:void(0);" class="btn">点击查看联系方式</a>
                    <img src="/Public/images/in-a_07.jpg" alt=""/>
                    <div class="introduce">
                        <h3><img src="/Public/images/star_03.png" alt=""/>您可能感兴趣的职位信息</h3>
                    </div>
                    <ul class="jobs-cont clearfloat" style="padding-bottom: 0">
                        <li>
                            <a href="">
                                <div class="tit">建筑工程-一建【江苏】</div>
                                <div class="">
                                    <span class="addr">江苏-常州</span>
                                    <span style="color: #333">2.5年/年</span>
                                </div>
                                <div class="price">0.8-1.5万/1年</div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <div class="tit">建筑工程-一建【江苏】</div>
                                <div class="">
                                    <span class="addr">江苏-常州</span>
                                    <span style="color: #333">2.5年/年</span>
                                </div>
                                <div class="price">0.8-1.5万/1年</div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <div class="tit">建筑工程-一建【江苏】</div>
                                <div class="">
                                    <span class="addr">江苏-常州</span>
                                    <span style="color: #333">2.5年/年</span>
                                </div>
                                <div class="price">0.8-1.5万/1年</div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <div class="tit">建筑工程-一建【江苏】</div>
                                <div class="">
                                    <span class="addr">江苏-常州</span>
                                    <span style="color: #333">2.5年/年</span>
                                </div>
                                <div class="price">0.8-1.5万/1年</div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <div class="tit">建筑工程-一建【江苏】</div>
                                <div class="">
                                    <span class="addr">江苏-常州</span>
                                    <span style="color: #333">2.5年/年</span>
                                </div>
                                <div class="price">0.8-1.5万/1年</div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <div class="tit">建筑工程-一建【江苏】</div>
                                <div class="">
                                    <span class="addr">江苏-常州</span>
                                    <span style="color: #333">2.5年/年</span>
                                </div>
                                <div class="price">0.8-1.5万/1年</div>
                            </a>
                        </li>
                    </ul>
                    <div class="introduce">
                        <h3><img src="/Public/images/l_03.png" alt=""/>知名企业</h3>
                    </div>
                    <div class="companies famous clearfloat">
                        <div class="cell">
                            <img src="/Public/images/c_03.jpg" alt=""/>
                            <div class="c_introduce">
                                <h4>安徽中龙投资集团有限公司</h4>
                                <div class="scores">
                                    <div class="praise">口碑：<span>686</span></div>
                                    <div class="position">在招职位：<span>33</span></div>
                                    <div class="ask">咨询：<span>1234</span></div>
                                </div>
                                <a href="" class="more">点击查看</a>
                                <div class="c_logo">
                                    <img src="/Public/images/c_logo_03.png" alt=""/>
                                </div>
                            </div>
                        </div>
                        <div class="cell">
                            <img src="/Public/images/c_03.jpg" alt=""/>
                            <div class="c_introduce">
                                <h4>安徽中龙投资集团有限公司</h4>
                                <div class="scores">
                                    <div class="praise">口碑：<span>686</span></div>
                                    <div class="position">在招职位：<span>33</span></div>
                                    <div class="ask">咨询：<span>1234</span></div>
                                </div>
                                <a href="" class="more">点击查看</a>
                                <div class="c_logo">
                                    <img src="/Public/images/c_logo_03.png" alt=""/>
                                </div>
                            </div>
                        </div>
                        <div class="cell">
                            <img src="/Public/images/c_03.jpg" alt=""/>
                            <div class="c_introduce">
                                <h4>安徽中龙投资集团有限公司</h4>
                                <div class="scores">
                                    <div class="praise">口碑：<span>686</span></div>
                                    <div class="position">在招职位：<span>33</span></div>
                                    <div class="ask">咨询：<span>1234</span></div>
                                </div>
                                <a href="" class="more">点击查看</a>
                                <div class="c_logo">
                                    <img src="/Public/images/c_logo_03.png" alt=""/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="height: 60px;width: 100%"></div>
                </div>
                <div class="c_right rt">
                    <div class="p-box">
                        <img src="/Public/images/photo_03.jpg" alt=""/>
                        <h5><?php echo ($user_info["nickname"]); ?></h5>
                        <p><?php echo ($company_info["company_name"]); ?></p>
                        <p><img src="/Public/images/l_icon_11.png" alt=""/>电话：<?php echo ($company_info["tel"]); ?></p>
                        <p><img src="/Public/images/l_icon_14.png" alt=""/>地址：<?php echo ($company_info["province"]); ?>-<?php echo ($company_info["city"]); ?></p>
                    </div>
                    <div class="line"></div>
                    <h3 class="t"><span>建筑资讯</span></h3>
                    <ul class="slide-list">
                        <li><a href="">建造师注册证书丢失丢失</a></li>
                        <li><a href="">建造师注册证书丢失丢失</a></li>
                        <li><a href="">建造师注册证书丢失丢失</a></li>
                        <li><a href="">建造师注册证书丢失丢失</a></li>
                        <li><a href="">建造师注册证书丢失丢失</a></li>
                        <li><a href="">建造师注册证书丢失丢失</a></li>
                    </ul>
                </div>
            </div>
        </div>
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
<script src="/Public/js/swiper-3.4.2.min.js"></script>
<script src="/Public/js/inside.js"></script>
</body>
</html>