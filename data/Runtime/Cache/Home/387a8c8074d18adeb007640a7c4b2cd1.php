<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="/Public/css/jquery.pagination.css"/>
    <link rel="stylesheet" href="/Public/css/common.css"/>
    <link rel="stylesheet" href="/Public/css/cities.css"/>
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
            <li><a href="">招聘</a></li>
            <li><a href="">资质</a></li>
            <li><a href="">公司</a></li>
            <li><a href="">资讯</a></li>
            <li><a href="/resume/full.html">简历库</a></li>
        </ul>
        <div class="tel rt">
            <img src="/Public/images/tel.png" alt=""/>
            <span>400-000-1212</span>
        </div>
    </div>
</div>
<div class="center-contain bg">
    <div class="flow-type">
        <div style="width: 1200px;background: #ffffff;margin: 0 auto">
            <div class="flow-box">
                <div class="cell">
                    <b>1</b>
                    <p>选择类型</p>
                </div>
                <img src="/Public/images/point_03.png" alt=""/>
                <div class="cell">
                    <b>2</b>
                    <p>选择分类</p>
                </div>
                <img src="/Public/images/point_03.png" alt=""/>
                <div class="cell active">
                    <b>3</b>
                    <p>填写信息</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container clearfloat">
        <div class="content-rt flow">
            <h4>选择类型</h4>
            <div class="form-box">
                <form action="">
                    <div class="form-group clearfloat">
                        <div class="col-lf lf">
                            <label>职位类别</label>
                        </div>
                        <div class="col-rt lf s">
                            <input name="" id="job_style" placeholder="请选择5个职位类别"/>
                        </div>
                    </div>
                    <div class="form-group clearfloat">
                        <div class="col-lf lf">
                            <label>工作地址</label>
                        </div>
                        <div class="col-rt lf ">
                            <!--地区联动-->
                            <div id="sjld" style="position:relative;">
                                <div class="m_zlxg" id="shenfen">
                                    <p title="">选择省份</p>
                                    <div class="m_zlxg2">
                                        <ul></ul>
                                    </div>
                                </div>
                                <input id="sfdq_num" type="hidden" value="" />
                                <input id="csdq_num" type="hidden" value="" />
                                <input id="sfdq_tj" type="hidden" value="" />
                                <input id="csdq_tj" type="hidden" value="" />
                                <input id="qydq_tj" type="hidden" value="" />
                            </div>

                        </div>
                    </div>

                    <div class="form-group clearfloat">
                        <div class="col-lf lf">
                            <label for="price1">期望薪资</label>
                        </div>
                        <div class="col-rt lf">
                            <div class="selector s">
                                <select name="" id="price1" style="width: 240px;">
                                    <option value="0">请选择</option>
                                    <option value="1">1000</option>
                                    <option value="2">2000</option>
                                </select>
                                <i><img src="/Public/images/down.jpg" alt=""/></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group clearfloat">
                        <div class="col-lf lf">
                            <label for="detail">职位描述</label>
                        </div>
                        <div class="col-rt lf">
                            <textarea name="" id="detail" placeholder="请填写你的信息"></textarea>
                        </div>
                    </div>
                    <h4 style="margin-bottom: 30px;">基本信息</h4>
                    <div class="form-group clearfloat">
                        <div class="col-lf lf">
                            <label for="c_tel">手机号码</label>
                        </div>
                        <div class="col-rt lf l">
                            <input type="text" id="c_tel"/>
                        </div>
                    </div>
                    <div class="form-group clearfloat">
                        <div class="col-lf lf">
                            <label for="c_pwd">登录密码</label>
                        </div>
                        <div class="col-rt lf l">
                            <input type="text" id="c_pwd" placeholder=""/>
                        </div>
                    </div>
                    <div class="form-group clearfloat">
                        <div class="col-lf lf" style="height: 1px;">
                        </div>
                        <div class="col-rt lf">
                            <button class="get-code" id="publish">发布</button>
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
<!--jobs职位类别选择-->
<div class="chose_job">
    <table>
        <tr>
            <td>工程管理类</td>
            <td class="clearfloat">
                <span>总经理/副总经理</span>
                <span class="color">项目经理</span>
                <span>项目总工</span>
                <span class="color">工程师</span>
                <span>高级工程师</span>
                <span>助理工程师</span>
                <span class="color">建筑师</span>
                <span>现场施工管理</span>
                <span class="color">工程部经理</span>
                <span>总监理师</span>
                <span>工程总监</span>
                <span>项目部主管</span>
                <span>安全部经理</span>
                <span>质量部经理</span>
                <span>生产部经理</span>
                <span class="color">技术负责人</span>
            </td>
        </tr>
        <tr>
            <td>工程技术类</td>
            <td class="clearfloat">
                <span>土建工程师</span>
                <span class="color">电气工程师</span>
                <span>安全工程师</span>
                <span>园林工程师</span>
                <span>监理工程师</span>
                <span>给排水工程师</span>
                <span>道路/公路工程师</span>
                <span class="color">热控（能）工程师</span>
                <span>暖通工程师</span>
                <span>其他工程师</span>
                <span>技术员</span>
                <span class="color">施工员</span>
                <span class="color">监理员</span>
                <span>资料员</span>
                <span>安全员</span>
                <span>质量员</span>
                <span>测绘/测量员</span>
                <span>工长</span>
            </td>
        </tr>
        <tr>
            <td>设计类</td>
            <td class="clearfloat">
                <span>建筑师（主创）</span>
                <span class="color">建筑师/建筑设计师</span>
                <span>助理建筑师</span>
                <span class="color">施工图设计师</span>
                <span>方案设计师</span>
                <span>总工程师</span>
                <span>总规划师</span>
                <span>城市/市政规划师</span>
                <span>室内设计师</span>
                <span>园林景观设计师</span>
                <span>结构设计师</span>
                <span>给排水设计师</span>
                <span>暖通设计师</span>
                <span class="color">电气设计师</span>
                <span>其他设计师</span>
                <span class="color">绘图员</span>
                <span>渲染人员</span>
                <span>建模师</span>
                <span>BIM工程师</span>
            </td>
        </tr>
        <tr>
            <td>工程经济类</td>
            <td class="clearfloat">
                <span>总经理/副总经理</span>
                <span>总经济师</span>
                <span class="color">采购经理</span>
                <span>审计经理</span>
                <span>合约经理</span>
                <span>成本经理</span>
                <span>造价工程师</span>
                <span>招投标经理</span>
                <span>造价员</span>
                <span>预算员</span>
                <span>采购员/采购经理</span>
                <span>招/投标员</span>
            </td>
        </tr>
        <tr>
            <td>市场|销售|运营类</td>
            <td class="clearfloat">
                <span>总经理/副总经理</span>
                <span>销售总监</span>
                <span class="color">市场经理</span>
                <span>销售经理</span>
                <span>市场专员</span>
                <span class="color">房地产销售</span>
                <span>战略（前期）经理</span>
                <span>资产运营中心经理</span>
                <span>前期专员</span>
                <span class="color">物业专员</span>
            </td>
        </tr>
        <tr>
            <td>行政|人事|财务类</td>
            <td class="clearfloat">
                <span>总经理/副总经理</span>
                <span>财务经理</span>
                <span>办公室主任</span>
                <span>出纳</span>
                <span>行政专员</span>
            </td>
        </tr>
        <tr>
            <td>其他</td>
            <td class="clearfloat">
                <span>其他</span>
            </td>
        </tr>
        <tr>
            <td></td>
            <td class="clearfloat" style="padding-left: 190px;">
                <a href="javascript:;" class="ok" id="confirm">确定</a>
                <a href="javascript:;" class="hide">取消</a>
            </td>
        </tr>
    </table>
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
<script src="/Public/js/form.js"></script>
<script type="text/javascript" src="/Public/js/address.js"></script>
<script type="text/javascript" src="/Public/js/drag.js"></script>
<script type="text/javascript" src="/Public/js/nationality_arr.js"></script>
<script type="text/javascript" src="/Public/js/funtype_arr.js"></script>
<script type="text/javascript" src="/Public/js/funtype_func.js"></script>
<script src="/Public/js/my.js"></script>
<script>
    $(function(){
        $("#sjld").sjld("#shenfen","#chengshi","#quyu");

    });
</script>
</body>
</html>