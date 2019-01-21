<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title><?php echo ($news_info["title"]); ?></title>
    <meta name="keywords" content="<?php echo ($news_info["keywords"]); ?>">
    <meta name="description" content="<?php echo ($news_info["description"]); ?>">
    <link rel="stylesheet" href="/Public/css/common.css"/>
    <link rel="stylesheet" href="/Public/css/jquery.pagination.css"/>
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
            <li><a href="#">资讯</a></li>
        </ul>
        <div class="nav">
            <?php foreach($news_type as $k=>$v){ ?>
            <a href="/news/lists/type/<?php echo ($k); ?>.html" <?php if($news_info['type'] == $k){echo "class=\"active\"";} ?>><?php echo ($v); ?></a>
            <?php } ?>
        </div>
        <div class="slip"></div>
        <div class="section" style="padding-left: 0;">
            <div class="companies clearfloat" style="padding-top: 0">
                <div class="c_left lf">
                    <div class="information-detail" style="padding-left: 40px;">
                        <h3><?php echo ($news_info["title"]); ?></h3>
                        <div style="text-align: center">
                            <span style="margin-right: 30px;"><?php echo ($news_info["author"]); ?></span>
                            <span><?php echo date("Y-m-d",$news_info['create_time']); ?></span>
                        </div>
                        <p><?php echo ($news_info["content"]); ?></p>
                    </div>
                </div>
                <div class="c_right rt">
                    <img src="/Public/images/slide_03.jpg" alt=""/>
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
                    <div class="line"></div>
                    <h3 class="t"><span>热招职位</span></h3>
                    <ul class="hot-job">
                        <li>
                            <a href="">
                                <h5>上海歆瑞商务有限公司</h5>
                                <p class="clearfloat">
                                    <span>江苏-常州</span>
                                    <span class="rt">0.8-1.5万/1年</span>
                                </p>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <h5>上海歆瑞商务有限公司</h5>
                                <p class="clearfloat">
                                    <span>江苏-常州</span>
                                    <span class="rt">0.8-1.5万/1年</span>
                                </p>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <h5>上海歆瑞商务有限公司</h5>
                                <p class="clearfloat">
                                    <span>江苏-常州</span>
                                    <span class="rt">0.8-1.5万/1年</span>
                                </p>
                            </a>
                        </li>
                    </ul>
                    <img src="/Public/images/img_23.jpg" alt=""/>
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
<script src="/Public/js/jquery.pagination.min.js"></script>
<script src="/Public/js/inside.js"></script>
</body>
</html>