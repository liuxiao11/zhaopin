<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="/Public/css/common.css"/>
    <link rel="stylesheet" href="/Public/css/swiper.min.css"/>
    <link rel="stylesheet" href="/Public/css/animate.min.css"/>
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
    <div class="banner">
        <div class="container">
            <h2 class="animated flipInX"><img src="/Public/images/b_03.jpg" alt=""/></h2>
            <div class="hot-tel animated fadeInLeft"><img src="/Public/images/t_03.png" alt=""/></div>
            <div class="number animated fadeInLeft">400-1234-6547</div>
            <ul class="adv clearfloat animated fadeInLeft">
                <li>
                    <p><img src="/Public/images/mark_03.jpg" alt=""/>发布需求</p>
                    <p>免费获取精准标价</p>
                </li>
                <li>
                    <p><img src="/Public/images/mark_03.jpg" alt=""/>1个需求</p>
                    <p>多家中介机构参与</p>
                </li>
                <li>
                    <p><img src="/Public/images/mark_03.jpg" alt=""/>95%以上需求</p>
                    <p>获得圆满解决</p>
                </li>
            </ul>
            <div class="pic animated fadeInRight"><img src="/Public/images/b_01.jpg" alt=""/></div>
            <div class="btn-box animated zoomIn">
                <a href="/sign/login.html">我是人才</a>
                <a href="/sign/login/type/2.html" style="background: #fe8829">我是建企</a>
                <a href="/sign/login/type/3.html">我是中介</a>
            </div>
        </div>
    </div>
    <div class="classification">
        <div class="container">
            <ul class="clearfloat">
                <li>
                    <a href="/invite/part.html">
                        <img src="/Public/images/icon_03.png" alt=""/>
                        <p>证书招聘</p>
                    </a>
                </li>
                <li>
                    <a href="/resume/part.html">
                        <img src="/Public/images/icon_05.png" alt=""/>
                        <p>证书简历</p>
                    </a>
                </li>
                <li>
                    <a href="/invite/full.html">
                        <img src="/Public/images/icon_07.png" alt=""/>
                        <p>全职招聘</p>
                    </a>
                </li>
                <li>
                    <a href="/resume/full.html">
                        <img src="/Public/images/icon_09.png" alt=""/>
                        <p>全职简历</p>
                    </a>
                </li>
                <li>
                    <a href="/news/lists/type/2.html">
                        <img src="/Public/images/icon_11.png" alt=""/>
                        <p>资质服务</p>
                    </a>
                </li>
                <li>
                    <a href="/news/lists/type/1.html">
                        <img src="/Public/images/icon_13.png" alt=""/>
                        <p>建筑资讯</p>
                    </a>
                </li>
                <li>
                    <a href="">
                        <p>全部分类</p>
                        <img src="/Public/images/icon_22.png" alt=""/>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="section section_01">
        <div class="container">
            <h3>证书招聘</h3>
            <div class="jobs-contain clearfloat">
                <div class="jobs-group lf">
                    <div class="cell">
                        <h4>一级建造师</h4>
                        <a href="" style="margin-right: 44px">建筑工程</a>
                        <a href="">铁路工程</a>
                        <br/>
                        <a href="" style="margin-right: 44px">市政公用</a>
                        <a href="">水利水电</a>
                        <br/>
                        <a href="" style="margin-right: 44px">机电工程</a>
                        <a href="">公路工程</a>
                        <br/>
                        <a href="" style="margin-right: 44px">矿业工程</a>
                        <a href="">通信与广电</a>
                        <br/>
                        <a href="" style="margin-right: 44px">民航机场</a>
                        <a href="">港口与航道</a>
                    </div>
                    <div class="cell">
                        <h4>电气工程师</h4>
                        <a href="" style="margin-right: 44px">供配电</a>
                        <a href="">发输变电</a>
                    </div>
                    <div class="cell">
                        <h4>八大员</h4>
                        <a href="" style="margin-right: 44px">安全员</a>
                        <a href="">造价员</a>
                        <br/>
                        <a href="" style="margin-right: 44px">施工员</a>
                        <a href="">机械员</a>
                        <br/>
                        <a href="" style="margin-right: 44px">质量员</a>
                        <a href="">劳务员</a>
                        <br/>
                        <a href="" style="margin-right: 44px">材料员</a>
                        <a href="">资料员</a>
                    </div>
                </div>
                <div class="jobs-group lf">
                    <div class="cell">
                        <h4>二级建造师</h4>
                        <a href="" style="margin-right: 44px">建筑工程</a>
                        <a href="" style="margin-right: 44px">公路工程</a>
                        <a href="">市政公用</a>
                        <br/>
                        <a href="" style="margin-right: 44px">水利水电</a>
                        <a href="" style="margin-right: 44px">矿业工程</a>
                        <a href="">机电工程</a>
                    </div>
                    <div class="cell">
                        <h4>结构工程师</h4>
                        <a href="" style="margin-right: 44px">一级结构师</a>
                        <a href="">二级结构师</a>
                    </div>
                    <div class="cell">
                        <h4>土木工程师</h4>
                        <a href="" style="margin-right: 44px">水利水电</a>
                        <a href="" style="margin-right: 44px">注册岩土</a>
                        <a href="">港口航道</a>
                    </div>
                    <div class="cell">
                        <h4>注册咨询师</h4>
                        <a href="" style="margin-right: 44px">环境工程</a>
                        <a href="">城市规划</a><br/>
                        <a href="" style="margin-right: 44px">市政公用工程</a>
                        <a href="">火电/水电/核电</a><br/>
                        <a href="">建筑工程/建筑材料</a><br/>
                        <a href="" style="color: #999">更多></a>
                    </div>
                </div>
                <div class="jobs-group lf">
                    <div class="cell">
                        <h4>注册建筑师</h4>
                        <a href="" style="margin-right: 44px">一级建筑师</a>
                        <a href="">二级建筑师</a>
                    </div>
                    <div class="cell">
                        <h4>监理工程师</h4>
                        <a href="" style="margin-right: 44px">建设部</a>
                        <a href="" style="margin-right: 44px">水利部</a>
                        <a href="">交通部</a>
                    </div>
                    <div class="cell">
                        <h4>造价工程师</h4>
                        <a href="" style="margin-right: 44px">建设部</a>
                        <a href="" style="margin-right: 44px">水利部</a>
                        <a href="">交通部</a>
                    </div>
                    <div class="cell">
                        <h4>公共设备工程师</h4>
                        <a href="" style="margin-right: 44px">动力</a>
                        <a href="" style="margin-right: 44px">暖通空调</a>
                        <a href="">给水排水</a>
                    </div>
                    <div class="cell">
                        <h4>技工证</h4>
                        <a href="" style="margin-right: 44px">土建</a>
                        <a href="" style="margin-right: 44px">市政</a>
                        <a href="">园林绿化</a><br/>
                        <a href="" style="color: #999">更多></a>
                    </div>
                </div>
                <div class="jobs-group rt">
                    <div class="cell">
                        <h4>其他证书</h4>
                        <a href="" style="margin-right: 44px">质量工程师</a>
                        <a href="">房地产评估师</a><br/>
                        <a href="" style="margin-right: 44px">园林工程师</a>
                        <a href="">环评工程师</a><br/>
                        <a href="" style="margin-right: 44px">城市规划师</a>
                        <a href="">注册测绘师</a><br/>
                        <a href="">化工工程师</a>
                    </div>
                    <div class="cell">
                        <h4>职称证书</h4>
                        <a href="" style="margin-right: 18px">公路/道路桥梁/市政</a>
                        <a href="">造价/概预算</a><br/>
                        <a href="" style="margin-right: 18px">建筑工程/土木工程</a>
                        <a href="">电气/机电</a><br/>
                        <a href="" style="margin-right: 18px">土建/建筑施工/房建</a>
                        <a href="">工民建</a><br/>
                        <a href="" style="margin-right: 18px">自动化/自动化控制</a>
                        <a href="">给排水</a><br/>
                        <a href="" style="margin-right: 18px">暖通空调/热处理</a>
                        <a href="">水利水电</a><br/>
                        <a href="">园林设计/园艺师</a><br/>
                        <a href="">通信/网络工程</a><br/>
                        <a href="" style="color: #999">更多></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section section_02">
        <div class="container">
            <h3>最新招聘信息 <a href="" class="more rt">查看更多>></a></h3>
            <ul class="clearfloat">
                <li>
                    <h4>建筑工程一建【江苏】</h4>
                    <div>
                        <span class="ac">盛工 【猎头/培训机构】</span>
                        <span class="addr">江苏常州天宁区湘潭市花园</span>
                    </div>
                    <div>
                        <span class="money">0.8-1.5万/年</span>
                        <span class="education">学历/不限</span>
                        <span class="status">转注册</span>
                        <span class="experience">经验不限</span>
                    </div>
                    <a href="" class="check">点击查看</a>
                </li>
                <li>
                    <h4>建筑工程一建【江苏】</h4>
                    <div>
                        <span class="ac">盛工 【猎头/培训机构】</span>
                        <span class="addr">江苏常州天宁区湘潭市花园</span>
                    </div>
                    <div>
                        <span class="money">0.8-1.5万/年</span>
                        <span class="education">学历/不限</span>
                        <span class="status">转注册</span>
                        <span class="experience">经验不限</span>
                    </div>
                    <a href="" class="check">点击查看</a>
                </li>
                <li>
                    <h4>建筑工程一建【江苏】</h4>
                    <div>
                        <span class="ac">盛工 【猎头/培训机构】</span>
                        <span class="addr">江苏常州天宁区湘潭市花园</span>
                    </div>
                    <div>
                        <span class="money">0.8-1.5万/年</span>
                        <span class="education">学历/不限</span>
                        <span class="status">转注册</span>
                        <span class="experience">经验不限</span>
                    </div>
                    <a href="" class="check">点击查看</a>
                </li>
                <li>
                    <h4>建筑工程一建【江苏】</h4>
                    <div>
                        <span class="ac">盛工 【猎头/培训机构】</span>
                        <span class="addr">江苏常州天宁区湘潭市花园</span>
                    </div>
                    <div>
                        <span class="money">0.8-1.5万/年</span>
                        <span class="education">学历/不限</span>
                        <span class="status">转注册</span>
                        <span class="experience">经验不限</span>
                    </div>
                    <a href="" class="check">点击查看</a>
                </li>
                <li>
                    <h4>建筑工程一建【江苏】</h4>
                    <div>
                        <span class="ac">盛工 【猎头/培训机构】</span>
                        <span class="addr">江苏常州天宁区湘潭市花园</span>
                    </div>
                    <div>
                        <span class="money">0.8-1.5万/年</span>
                        <span class="education">学历/不限</span>
                        <span class="status">转注册</span>
                        <span class="experience">经验不限</span>
                    </div>
                    <a href="" class="check">点击查看</a>
                </li>
                <li>
                    <h4>建筑工程一建【江苏】</h4>
                    <div>
                        <span class="ac">盛工 【猎头/培训机构】</span>
                        <span class="addr">江苏常州天宁区湘潭市花园</span>
                    </div>
                    <div>
                        <span class="money">0.8-1.5万/年</span>
                        <span class="education">学历/不限</span>
                        <span class="status">转注册</span>
                        <span class="experience">经验不限</span>
                    </div>
                    <a href="" class="check">点击查看</a>
                </li>
                <li>
                    <h4>建筑工程一建【江苏】</h4>
                    <div>
                        <span class="ac">盛工 【猎头/培训机构】</span>
                        <span class="addr">江苏常州天宁区湘潭市花园</span>
                    </div>
                    <div>
                        <span class="money">0.8-1.5万/年</span>
                        <span class="education">学历/不限</span>
                        <span class="status">转注册</span>
                        <span class="experience">经验不限</span>
                    </div>
                    <a href="" class="check">点击查看</a>
                </li>
                <li>
                    <h4>建筑工程一建【江苏】</h4>
                    <div>
                        <span class="ac">盛工 【猎头/培训机构】</span>
                        <span class="addr">江苏常州天宁区湘潭市花园</span>
                    </div>
                    <div>
                        <span class="money">0.8-1.5万/年</span>
                        <span class="education">学历/不限</span>
                        <span class="status">转注册</span>
                        <span class="experience">经验不限</span>
                    </div>
                    <a href="" class="check">点击查看</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="section section_03">
        <div class="container clearfloat">
            <div class="list-contain lf">
                <h3>最新简历</h3>
                <div class="title-box">
                    <div class="adv">海量资源选择</div>
                    <p class="p1">信息真实 安全可靠</p>
                    <p class="p2">最新的职位信息，为您实时更新</p>
                </div>
                <ul class="list">
                    <li>
                        <a href="">
                            <i style="background: #0ea7f8"></i>
                            注册咨询师-水利
                            <span class="rt">14分钟前</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i style="background: #ff3f19"></i>
                            注册咨询师-水利
                            <span class="rt">14分钟前</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i style="background: #fec100"></i>
                            注册咨询师-水利
                            <span class="rt">14分钟前</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i></i>
                            注册咨询师-水利
                            <span class="rt">14分钟前</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i></i>
                            注册咨询师-水利
                            <span class="rt">14分钟前</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i></i>
                            注册咨询师-水利
                            <span class="rt">14分钟前</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i></i>
                            注册咨询师-水利
                            <span class="rt">14分钟前</span>
                        </a>
                    </li>
                    <li style="text-align: right">
                        <a href="" class="more-msg">更多信息>></a>
                    </li>
                </ul>
            </div>
            <div class="list-contain lf">
                <h3>最新资质</h3>
                <div class="title-box">
                    <div class="adv">海量资源选择</div>
                    <p class="p1">信息真实 安全可靠</p>
                    <p class="p2">最新的职位信息，为您实时更新</p>
                </div>
                <ul class="list">
                    <li>
                        <a href="">
                            <i style="background: #0ea7f8"></i>
                            注册咨询师-水利
                            <span class="rt">14分钟前</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i style="background: #ff3f19"></i>
                            注册咨询师-水利
                            <span class="rt">14分钟前</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i style="background: #fec100"></i>
                            注册咨询师-水利
                            <span class="rt">14分钟前</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i></i>
                            注册咨询师-水利
                            <span class="rt">14分钟前</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i></i>
                            注册咨询师-水利
                            <span class="rt">14分钟前</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i></i>
                            注册咨询师-水利
                            <span class="rt">14分钟前</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i></i>
                            注册咨询师-水利
                            <span class="rt">14分钟前</span>
                        </a>
                    </li>
                    <li style="text-align: right">
                        <a href="" class="more-msg">更多信息>></a>
                    </li>
                </ul>
            </div>
            <div class="list-contain rt">
                <h3>资质服务</h3>
                <div class="title-box">
                    <div class="adv">海量资源选择</div>
                    <p class="p1">信息真实 安全可靠</p>
                    <p class="p2">最新的职位信息，为您实时更新</p>
                </div>
                <ul class="list">
                    <li>
                        <a href="">
                            <i style="background: #0ea7f8"></i>
                            注册咨询师-水利
                            <span class="rt">14分钟前</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i style="background: #ff3f19"></i>
                            注册咨询师-水利
                            <span class="rt">14分钟前</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i style="background: #fec100"></i>
                            注册咨询师-水利
                            <span class="rt">14分钟前</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i></i>
                            注册咨询师-水利
                            <span class="rt">14分钟前</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i></i>
                            注册咨询师-水利
                            <span class="rt">14分钟前</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i></i>
                            注册咨询师-水利
                            <span class="rt">14分钟前</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i></i>
                            注册咨询师-水利
                            <span class="rt">14分钟前</span>
                        </a>
                    </li>
                    <li style="text-align: right">
                        <a href="" class="more-msg">更多信息>></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="section section_04">
        <div class="container">
            <h3>名企推荐<a href="" class="more rt">查看更多>></a></h3>
            <div class="companies" style="position: relative">
                <!-- Swiper -->
                <div class="swiper-container swiper-container-01">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
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
                        <div class="swiper-slide">
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
                        <div class="swiper-slide">
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
                        <div class="swiper-slide">
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
                        <div class="swiper-slide">
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
                </div>
                <!-- 如果需要导航按钮 -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>
    <div class="section section_05">
        <div class="container">
            <h3>热门资讯<a href="/news/lists.html" class="more rt">查看更多>></a></h3>
            <div class="news_contain clearfloat">
                <div class="news_lf lf">
                    <?php foreach($hot_news_list as $k=>$v){ ?>
                    <div class="new_cell">
                        <a href="/news/show/id/<?php echo ($v["id"]); ?>.html" class="clearfloat">
                            <div class="img lf"><img src="<?php echo ($v["img"]); ?>" style="width:150px;height:96px;"/></div>
                            <div class="detail rt">
                                <h5><?php echo ($v["title"]); ?></h5>
                                <p><?php echo ($v["description"]); ?></p>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
                <div class="news_mid lf">
                    <?php if($new_news_list){ ?>
                    <div class="new_cell">
                        <a href="/news/show/id/<?php echo ($new_news_list[0]['id']); ?>.html" class="clearfloat">
                            <div class="img lf"><img src="<?php echo ($new_news_list[0]['img']); ?>" style="width:150px;height:96px;"/></div>
                            <div class="detail rt">
                                <h5><?php echo ($new_news_list[0]['title']); ?></h5>
                                <p><?php echo ($new_news_list[0]['description']); ?></p>
                            </div>
                        </a>
                    </div>
                    <ul>
                        <?php foreach($new_news_list as $k=>$v){ ?>
                        <?php if($k > 0){ ?>
                        <li>
                            <a href="/news/show/id/<?php echo ($v["id"]); ?>.html"><?php echo ($v["title"]); ?>？<span class="rt"><?php echo date("Y-m-d",$v["create_time"]); ?></span></a>
                        </li>
                        <?php } ?>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                </div>
                <div class="news_rt rt">
                    <div class="swiper-container swiper-container-02">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="/Public/images/img_10.jpg" alt=""/>
                            </div>
                            <div class="swiper-slide">
                                <img src="/Public/images/img_10.jpg" alt=""/>
                            </div>
                            <div class="swiper-slide">
                                <img src="/Public/images/img_10.jpg" alt=""/>
                            </div>
                            <div class="swiper-slide">
                                <img src="/Public/images/img_10.jpg" alt=""/>
                            </div>
                        </div>
                        <!-- 如果需要分页器 -->
                        <div class="swiper-pagination"></div>
                    </div>
                    <a href="/news/lists.html">
                        <div class="else">
                            <div class="clearfloat">
                                <p class="lf">更多文章资讯
                                    <br/>
                                    <span>More information</span>
                                </p>
                                <img src="/Public/images/more_03.png" alt="" class="lf"/>
                            </div>
                            <div class="swag">我们知道的还远不止这些！</div>
                        </div>
                    </a>

                </div>
            </div>
            <a href="#header" class="to-top"><img src="/Public/images/top.png" alt=""/></a>
        </div>
    </div>
</div>
<!--底部-->
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
<script src="/Public/js/my.js"></script>
<script>
    var swiper = new Swiper('.swiper-container-01', {
        slidesPerView: 4,
        spaceBetween: 18,
        autoplay:5000,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev'
    });
    var swiperA = new Swiper('.swiper-container-02', {
        pagination: '.swiper-pagination',
        paginationClickable :true,
        autoplay : 5000,
        speed:300
    });
</script>
</body>
</html>