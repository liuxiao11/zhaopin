<?php

namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
    public $user_type = array(
        '1' => '人才',
        '2' => '建企',
        '3' => '猎头',
    ); //用户类型

    public $sex = array(
        '未填写',
        '男',
        '女',
    ); //性别

    public $education = array(
        '未选择',
        '高中及以下',
        '中专/技校',
        '大专',
        '本科',
        '硕士',
        '博士',
    ); //学历类型

    public $job_title = array(
        '无',
        '初级',
        '中级',
        '副高',
        '高级',
    ); //职称类型

    public $cat_one = array(
        1=>'一级建造师',
        2=>'二级建造师',
        3=>'造价工程师',
        4=>'监理工程师',
        5=>'公用设备工程师',
        6=>'电气工程师',
        7=>'土木工程师',
        8=>'结构工程师',
        9=>'注册咨询师',
        10=>'注册建筑师',
        11=>'职称证书',
        12=>'技工证',
        13=>'八大员',
        14=>'其他证书',
    ); //兼职职位类别第一层

    public $cat_two = array(
        1=>array(1=>'建筑工程','市政公用','机电工程','水利水电','公路工程','铁路工程','矿业工程','民航机场','通信与广电','港口与航道'),
        2=>array(1=>'建筑工程','市政公用工程','机电工程','水利水电工程','公路工程','矿业工程'),
        3=>array(1=>'建设部','水利部','交通部'),
        4=>array(1=>'建设部','水利部','交通部'),
        5=>array(1=>'暖通空调','给水排水','动力'),
        6=>array(1=>'供配电','发输变电'),
        7=>array(1=>'注册岩土','港口航道','水利水电'),
        8=>array(1=>'一级结构师','二级结构师'),
        9=>array(1=>'环境工程','市政公用工程','建筑工程/建筑材料','火电/水电/核电','城市轨道交通','地质/测量/岩土工程','综合经济','新能源','煤炭/石化','水利','生态环境','给排水','核工业','机械/电子','城市规划','港口河海工程','钢铁/有色冶金','通信/通讯/广播电影电视','石油天然气','轻工/纺织/化纤','林业/农业','公路/铁路/民航','化工/医药','其他'),
        10=>array(1=>'一级建筑师','二级建筑师'),
        11=>array(1=>'工民建','土建/建筑施工/房建','园林设计/园艺师','给排水','电气/机电','暖通空调/热处理','水利水电','自动化/自动化控制','建筑工程/土木工程','材料','输煤除灰','矿山','照明','通信保护','热工控制','建筑装饰','室内设计','环境','林业','工程管理','风景园林','机械/机械设备/动力','统计师','通风','化工/石油化工/化学工程','港口与航道','农业','公路/道路桥梁/市政','造价/概预算','通信/网络工程','岩土','焊接','结构','暖通','环保/安全环保/安全工程','装饰设计/建筑美学设计/环境艺术','经济师专业类','计算机/电子','建筑设计','规划','园林绿化','会计师','测量/测绘','防护防化','计算机系统集成','燃气','总图','环境工程','船舶/冷冻类','人力资源管理师','电力/热能动力/新能源','地质工程/水工','质量工程','其他'),
        12=>array(1=>'土建','市政','园林绿化','机械化施工','安装工程','供水','环卫','燃气','古建筑装饰装修'),
        13=>array(1=>'安全员','造价员','施工员','机械员','质量员','劳务员','材料员','资料员'),
        14=>array(1=>'城市规划师','化工工程师','园林工程师','环评工程师','房地产估价师','二级地震安全性评价工程师','九大员类','项目管理师','信息系统项目管理师','环境监理师','计量工程师','人防防护防化工程师','房地产经纪人','注册冶金','注册核安全','投资分析师','注册矿产储量评估师','注册矿业权评估师','注册采矿矿物工程师','一级地震安全性评价工程师','注册测绘师','测量工程师','系统集成项目管理师','招标师','注册税务师','注册会计师','环保工程师','土地估价师','安全工程师','安全评价师','设备监理师','质量工程师','概预算工程师','经济师','物业管理师','资产评估师','人力资源管理师','其他'),
    ); //兼职职位类别第二层

    public $cat_full = array(
        1 => array('name'=>'工程管理类','child'=>array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18)),
        2 => array('name'=>'工程施工类','child'=>array(19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47)),
        3 => array('name'=>'设计类 ','child'=>array(48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67)),
        4 => array('name'=>'工程经济类','child'=>array(68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83)),
        5 => array('name'=>'市场销售','child'=>array(84,85,86,87,88,89,90,91,92,93,94,95)),
        6 => array('name'=>'职能管理','child'=>array(96,97,98,99,100,101,102,103,104)),
    );
    public $cat = array(
        1=>'总经理/副总经理','技术负责人','生产部经理','项目部主管','助理工程师','高级工程师','工程师','总监理师','现场施工管理','建造师','质量部经理','安全部经理','项目总工','项目经理','工程部经理','工程总监','总工程师','其他',
        '土建工程师','机电/电气工程师','施工员','总监理师','城市/市政工程师','路桥隧工程师','测量/测绘工程师','安全工程师','钢结构工程师','园林工程师','监理工程师','资料员','材料员','质量员','质检员','监理员','装饰工程师','岩土工程师','幕墙工程师','水利水电工程师','安全员','造价工程师','造价员','热控（能）工程师','其他工程师','暖通工程师','技术员','工长','其他',
        '建筑（主创）设计师','施工图设计师','室内设计师','电气设计师','绘图员','园林景观设计师','结构设计师','给排水设计师','暖通设计师','城市/市政设计','路桥隧设计师','建模员','渲染人员','助理建筑师','施工图设计师','方案设计师','总规划师','其他设计师','BIM工程师','其他',
        '资产运营中心经理','合约经理','采购经理','审计经理','采购员','院长/副院长','规划师','总经济师','招投标经理','预算员','招投标员','招商总监','成本经理','招商部专员','投融资经理','其他',
        '总经理/副总经理','销售总监','市场部经理','销售部经理','市场部专员','销售部专员','物业专员','战略部(前期)经理','前期专员','市场总监','房地产销售','其他',
        '办公室主任','信息中心经理','会计','出纳','人力资源','财务经理','行政专员','其他部门经理','其他',
    ); //全职职位类别

    public $subject = array(
        '未选择',
        '建筑工程',
        '机电工程',
        '市政公用工程',
    ); //全职期望专业

    public $salary = array(
        '未选择',
        '面议',
        '1000元以下',
        '1000-2000元',
        '3000-5000元',
        '5000-8000元',
        '8000-12000元',
        '12000-20000元',
        '25000元以上',
    ); //全职期望薪资

    public $work_years = array(
        '未选择',
        '无经验',
        '应届毕业生',
        '1年以下',
        '1 - 2年',
        '3 - 5年',
        '6 - 10年',
        '10年以上',
    ); //全职工作年限

    public $news_type = array(
        '1' => '政策解读',
        '2' => '资质行情',
        '3' => '职场资讯',
    );

    public $status = array(
        '1' => '未审核',
        '2' => '已审核',
    );//是否审核

    public $company_scale = array(
        '1' => '0-20人',
        '2' => '20-99人',
        '3' => '100-499人',
        '4' => '500-599人',
        '5' => '1000-9999人',
        '6' => '10000人以上',
    );//公司规模

	public function _initialize(){

    }

    //公用的分页
    protected function Tpage($count,$num){
        $get = I('get.');
        $p = $get['page'];
        $page = [];


        $page['max_page'] = ceil($count/$num);
        $page['count'] = $count;


        if($p > $page['max_page']){
            $p = $page['max_page'];
        }

        if($p < 1){
            $p = 1;
        }

        $page['p'] = $p;
        $page['page'] = $p.','.$num;

        if($page['p']-1 > 2){ // 是否存在首页
            $page['is_index'] = 1;
        }else{
            $page['is_index'] = 0;
        }

        if($page['p'] > 1){ // 是否存在上一页
            $page['is_last'] = 1;
        }else{
            $page['is_last'] = 0;
        }

        if($page['max_page'] - $page['p'] > 2){ // 是否存在尾页
            $page['is_end'] = 1;
        }else{
            $page['is_end'] = 0;
        }

        if($page['max_page'] > $page['p']){ // 是否存在下一页
            $page['is_next'] = 1;
        }else{
            $page['is_next'] = 0;
        }

        //显示5页
        $start = 1;
        if($page['p'] > 2){
            $start = $page['p'] - 2;
        }

        if($page['p'] > $page['max_page'] - 2){
            $start = $page['max_page'] - 4;
        }

        for($i=$start;$i<=$start+4;$i++){
            if($i >= 1 && $i <= $page['max_page']){
                $page['page_list'][] = $i;
            }
        }

        $page['link'] = strtolower('/'.MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME);

        if(!$get){
            return $page;
        }

        foreach($get as $k=>$v){
            if($k != 'page'){
                $page['link'] .= '/'.$k.'/'.$v;
            }
        }

        return $page;
    }
}