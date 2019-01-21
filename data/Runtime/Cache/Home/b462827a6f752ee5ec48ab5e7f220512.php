<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="/Public/css/jquery.pagination.css"/>
    <link rel="stylesheet" href="/Public/css/common.css"/>
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
            <a href="/headhunt" class="<?php if(ACTION_NAME == 'index'){echo 'active';} ?>">
                <i class="i1"></i>首页 <em></em>
            </a>
        </li>
        <li>
            <a href=""><i class="i2"></i>兼职招聘<em></em></a>
            <ul class="list">
                <li><a href="/home/headhunt/invite_part_list" class="<?php if(ACTION_NAME == 'invite_part_list' || ACTION_NAME == 'edit_invite_part'){echo 'active';} ?>">我的招聘<em></em></a></li>
                <li><a href="">简历投递记录<em></em></a></li>
                <li><a href="">简历下载记录<em></em></a></li>
            </ul>
        </li>
        <li>
            <a href=""><i class="i3"></i>全职招聘<em></em></a>
            <ul class="list">
                <li><a href="/home/headhunt/invite_full_list" class="<?php if(ACTION_NAME == 'invite_full_list' || ACTION_NAME == 'edit_invite_full'){echo 'active';} ?>">我的招聘<em></em></a></li>
                <li><a href="">简历投递记录<em></em></a></li>
                <li><a href="">简历下载记录<em></em></a></li>
            </ul>
        </li>
        <li>
            <a href=""><i class="i2"></i>兼职简历<em></em></a>
            <ul class="list">
                <li><a href="/home/headhunt/resume_part_list" class="<?php if(ACTION_NAME == 'resume_part_list' || ACTION_NAME == 'edit_resume_part'){echo 'active';} ?>">简历信息<em></em></a></li>
                <li><a href="">投递记录<em></em></a></li>
            </ul>
        </li>
        <li>
            <a href=""><i class="i3"></i>全职简历<em></em></a>
            <ul class="list">
                <li><a href="/home/headhunt/resume_full_list"class="<?php if(ACTION_NAME == 'resume_full_list' || ACTION_NAME == 'edit_resume_full'){echo 'active';} ?>">简历信息<em></em></a></li>
                <li><a href="">投递记录<em></em></a></li>
            </ul>
        </li>
        <li><a href="/publish" class="<?php if(ACTION_NAME == 'invite_full' || ACTION_NAME == 'invite_part' || ACTION_NAME == 'resume_part' || ACTION_NAME == 'resume_full'){echo 'active';} ?>"><i class="i4"></i>发布信息<em></em></a></li>
        <li>
            <a href=""><i class="i5"></i>账号管理<em></em></a>
            <ul class="list">
                <li><a href="/headhunt/info" class="<?php if(ACTION_NAME == 'info'){echo 'active';} ?>">公司资料<em></em></a></li>
                <li><a href="/headhunt/update_pwd" class="<?php if(ACTION_NAME == 'update_pwd'){echo 'active';} ?>">修改密码<em></em></a></li>
            </ul>
        </li>
        <li><a href="/sign/logout"><i class="i6"></i>退出<em></em></a></li>
    </ul>
</div>
        <div class="content-rt">
            <h3>我的简历</h3>
            <div class="content">
                <div class="count">
                    <ul class="clearfloat">
                        <li class="clearfloat">
                            <img src="/Public/images/infor_03.png" alt="" class="lf"/>
                            <div class="num lf">
                                <p>企业查看</p>
                                <p style="color: #ff4209">10</p>
                            </div>
                        </li>
                        <li class="clearfloat">
                            <img src="/Public/images/infor_05.png" alt="" class="lf"/>
                            <div class="num lf">
                                <p>中介查看</p>
                                <p style="color: #ff4209">10</p>
                            </div>
                        </li>
                        <li class="clearfloat">
                            <img src="/Public/images/infor_07.png" alt="" class="lf"/>
                            <div class="num lf">
                                <p>投递职位</p>
                                <p style="color: #ff4209">50</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="new-information">
                    <div class="selector">
                        <select name="class" id="class">
                            <option value="0">类别</option>
                            <option value="1">类别1</option>
                        </select>
                        <select name="area" id="area">
                            <option value="0">地区</option>
                            <option value="1">西城</option>
                        </select>
                        <select name="time" id="time">
                            <option value="0">时间</option>
                            <option value="1">今天</option>
                        </select>
                        <button>搜索</button>
                    </div>
                    <table>
                        <thead>
                        <tr>
                            <th>发布时间</th>
                            <th>职业类别</th>
                            <th>工作地点</th>
                            <th>期望薪资</th>
                            <th>审核</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($resume_list as $k=>$v){ ?>
                        <tr>
                            <td><?php echo date("Y-m-d",$v['create_time']); ?></td>
                            <td><?php echo $cat[$v['cat']]; ?></td>
                            <td><?php echo ($v["work_province"]); ?>-<?php echo ($v["work_city"]); ?></td>
                            <td><?php echo ($v['salary']); ?></td>
                            <td><?php echo ($status[$v['status']]); ?></td>
                            <td>
                                <a href="/headhunt/edit_resume_full/id/<?php echo ($v["id"]); ?>">编辑</a>
                                <a href="javascript:void(0);" class="del_full" resume_id="<?php echo ($v["id"]); ?>">删除</a>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <!--分页器-->
                    <?php if($page){ ?>
<div style="height:30px;"></div>
<div style="width:600px;margin:0 auto;height:40px;line-height:40px;text-align: center;">
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
    &nbsp;&nbsp;&nbsp;&nbsp;共 <?php echo ($page["count"]); ?> 条记录
</div>
<?php } ?>
                    <p class="cue"><span>*</span>有问题请联系客服：<span>400-000-1212</span></p>
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
<script src="/Public/js/my.js"></script>
<script>
    $('.del_full').click(function(){
        if(!confirm('确认删除吗？')){
            return ;
        }

        var resume_id = $(this).attr('resume_id');
        window.location.href = '/headhunt/del_resume_full/resume_id/'+resume_id;
    })
</script>
</body>
</html>