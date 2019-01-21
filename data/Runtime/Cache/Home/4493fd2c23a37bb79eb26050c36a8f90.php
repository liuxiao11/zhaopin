<?php if (!defined('THINK_PATH')) exit();?><header>
    <div class="top">
        <div class="container clearfloat">
            <div class="lf">
                <a href=""><img src="/Public/images/wechat.png" alt=""/>微信</a>
                <span>|</span>
                <a href=""><img src="/Public/images/chat.png" alt=""/>客服</a>
            </div>
            <div class="rt">
                <a href="">登录</a><span>|</span>
                <a href="">注册</a><span>|</span>
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
                    <a href="" class="btn release"><img src="/Public/images/release.png" alt=""/>信息发布</a>
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
            <li><a href="">简历库</a></li>
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
            <h4>填写信息</h4>
            <div class="form-box">
                <form action="" method="post">
                    <div class="form-group clearfloat">
                        <div class="clearfloat">
                            <div class="col-lf lf">
                                <label for="c_tel">姓名</label>
                            </div>
                            <div class="col-rt lf">
                                <input type="text" name="name" placeholder="请输入姓名"/>
                            </div>
                        </div>
                        <div style="height:20px;"></div>
                        <div class="clearfloat">
                            <div class="col-lf lf">
                                <label>性别</label>
                            </div>
                            <div class="col-rt lf">
                                <div class="selector s">
                                    <select name="sex" style="width: 100px;">
                                        <option value="1">男</option>
                                        <option value="2">女</option>
                                    </select>
                                    <i><img src="/Public/images/down.jpg" alt=""/></i>
                                </div>
                            </div>
                        </div>
                        <div style="height:20px;"></div>
                        <div class="clearfloat">
                            <div class="col-lf lf">
                                <label for="c_tel">生日</label>
                            </div>
                            <div class="col-rt lf">
                                <input type="date" name="birthday" />
                            </div>
                        </div>
                        <div style="height:20px;"></div>
                        <div class="col-lf lf">
                            <label>证书所在地</label>
                        </div>
                        <div class="col-rt lf">
                            <!--地区联动-->
                            <div id="sjld" style="position:relative;">
                                <div class="m_zlxg" id="shenfen">
                                    <p title="">选择省份</p>
                                    <div class="m_zlxg2">
                                        <ul></ul>
                                    </div>
                                </div>
                                <div class="m_zlxg" id="chengshi">
                                    <p title="">选择城市</p>
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
                            <label for="price1">期待价格</label>
                        </div>
                        <div class="col-rt lf">
                            <input type="text" id="price1" name="salary" placeholder="如（4000）"/>元/年
                        </div>
                    </div>
                    <div class="form-group clearfloat">
                        <div class="col-lf lf">
                            <label>职称</label>
                        </div>
                        <div class="col-rt lf">
                            <div class="selector s">
                                <select name="job_title" id="" style="width: 100px;">
                                    <?php foreach($job_title as $k=>$v){ ?>
                                    <option value="<?php echo ($k); ?>"><?php echo ($v); ?></option>
                                    <?php } ?>
                                </select>
                                <i><img src="/Public/images/down.jpg" alt=""/></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group clearfloat">
                        <div class="col-lf lf">
                            <label for="special">详细说明</label>
                        </div>
                        <div class="col-rt lf">
                            <textarea name="position_desc" id="special" placeholder="最多可输入100个字符"></textarea>
                        </div>
                    </div>
                    <div class="form-group clearfloat">
                        <div class="col-lf lf">
                            <label for="c_tel">手机号码</label>
                        </div>
                        <div class="col-rt lf">
                            <input type="text" id="c_tel" name="phone" placeholder="请输入手机号码"/>
                        </div>
                    </div>
                    <div class="form-group clearfloat">
                        <div class="col-lf lf">
                            <label for="c_code">验证码</label>
                        </div>
                        <div class="col-rt lf">
                            <input type="text" id="c_code" placeholder="请输入手机验证码"/>
                            <button class="get-code">获取手机验证码</button>
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