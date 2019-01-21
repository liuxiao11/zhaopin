<?php
// +----------------------------------------------------------------------
// | 节点
// +----------------------------------------------------------------------
// | 时间：15/3/12
// +----------------------------------------------------------------------
// | Author: midadong <turn8888@163.com>
// +----------------------------------------------------------------------
namespace Admin\Controller;
use Think\Controller;
class InviteController extends CommonController {
    private $invite_part = 'invite_part';
    private $invite_full = 'invite_full';
    private $city = 'city';
	public function _initialize(){
		parent::_initialize();
        $this->_pageNum='20';//每页显示数量
    }

    //兼职招聘列表
    public function part(){
        $params = [];

        //分页
        $count=M($this->invite_part)
            ->where($params)
            ->count();
        $page = $this->Tpage($count,$this->_pageNum);
        $this->assign('page',$page);
        //end

        $invite_list = M($this->invite_part)
            ->field('id,phone,call,company_name,cat_one,cat_two,salary,company_province,company_city,status,create_time')
            ->where($params)
            ->page($page['page'])
            ->order('id desc')
            ->select();

        $city_id_arr = [];
        foreach($invite_list as $k=>$v){
            $city_id_arr[] = $v['company_province'];
            $city_id_arr[] = $v['company_city'];
        }
        $params = [];
        $params['id'] = array('in',array_unique($city_id_arr));
        $city_list = M($this->city)
            ->field('id,name')
            ->where($params)
            ->select();
        $key_city_list = [];
        foreach($city_list as $k=>$v){
            $key_city_list[$v['id']] = $v;
        }
        foreach($invite_list as $k=>$v){
            $invite_list[$k]['company_province'] = $key_city_list[$v['company_province']]['name'];
            $invite_list[$k]['company_city'] = $key_city_list[$v['company_city']]['name'];
        }

        $this->assign('cat_one',$this->cat_one);
        $this->assign('cat_two',$this->cat_two);
        $this->assign('salary',$this->salary);
        $this->assign('cat',$this->cat);
        $this->assign('invite_list',$invite_list);
        $this->display();
    }

    //全职招聘列表
    public function full(){
        $get = I('get.');
        //获取城市级联信息
        $params = [];
        $params['pid'] = 1;
        $province_list = M($this->city)
            ->where($params)
            ->select();
        $this->assign('province_list',$province_list);

        $params = [];
        if($get['work_province']){
            $params['work_province'] = $get['work_province'];
            $_ajax = new AjaxController();
            $city_list = $_ajax->city($get['work_province']);
            $this->assign('city_list',$city_list);
        }
        if($get['work_city']){
            $params['work_city'] = $get['work_city'];
        }
        if($get['cat']){
            $params['cat'] = $get['cat'];
        }

        //分页
        $count=M($this->invite_full)
            ->where($params)
            ->count();
        $page = $this->Tpage($count,$this->_pageNum);
        $this->assign('page',$page);
        //end

        $invite_list = M($this->invite_full)
            ->field('id,phone,cat,title,work_years,education,work_province,work_city,salary,status,create_time')
            ->where($params)
            ->page($page['page'])
            ->order('id desc')
            ->select();
        if(!$invite_list){
            $this->assign('salary',$this->salary);
            $this->assign('work_years',$this->work_years);
            $this->assign('education',$this->education);
            $this->assign('cat',$this->cat);
            $this->assign('get',$get);
            $this->assign('invite_list',$invite_list);
            $this->display();return ;
        }

        $city_id_arr = [];
        foreach($invite_list as $k=>$v){
            $city_id_arr[] = $v['work_province'];
            $city_id_arr[] = $v['work_city'];
        }
        $params = [];
        $params['id'] = array('in',array_unique($city_id_arr));
        $city_list = M($this->city)
            ->field('id,name')
            ->where($params)
            ->select();
        $key_city_list = [];
        foreach($city_list as $k=>$v){
            $key_city_list[$v['id']] = $v;
        }
        foreach($invite_list as $k=>$v){
            $invite_list[$k]['work_province'] = $key_city_list[$v['work_province']]['name'];
            $invite_list[$k]['work_city'] = $key_city_list[$v['work_city']]['name'];
        }

        $this->assign('salary',$this->salary);
        $this->assign('work_years',$this->work_years);
        $this->assign('education',$this->education);
        $this->assign('cat',$this->cat);
        $this->assign('get',$get);
        $this->assign('invite_list',$invite_list);
        $this->display();
    }
}