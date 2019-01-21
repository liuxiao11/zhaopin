<?php
namespace Home\Controller;
use Think\Controller;
use Admin\Controller\AjaxController;
class ResumeController extends CommonController {
    private $resume_part = 'resume_part';
    private $resume_full = 'resume_full';
    private $city = 'city';
    private $_pageNum = 10;
    public function _initialize(){
        parent::_initialize();
    }

    //全职简历列表
    public function full(){
        $get = I('get.');
        $params = [];
        if($get['cat']){
            $params['cat'] = $get['cat'];
        }
        if($get['subject']){
            $params['subject'] = $get['subject'];
        }
        if($get['salary']){
            $params['salary'] = $get['salary'];
        }
        //获取城市级联信息
        $map = [];
        $map['pid'] = 1;
        $province_list = M($this->city)
            ->where($map)
            ->select();
        $this->assign('province_list',$province_list);
        if($get['work_province']){
            $params['work_province'] = $get['work_province'];
            $_ajax = new AjaxController();
            $city_list = $_ajax->city($get['work_province']);
            $this->assign('city_list',$city_list);
        }
        if($get['work_city']){
            $params['work_city'] = $get['work_city'];
        }
        $params['status'] = 2;

        //分页
        $count=M($this->resume_full)
            ->where($params)
            ->count();
        $page = $this->Tpage($count,$this->_pageNum);
        $this->assign('page',$page);
        //end

        $resume_list = M($this->resume_full)
            ->where($params)
            ->page($page['page'])
            ->order('create_time desc')
            ->select();
        if(!$resume_list){
            $this->assign('get', $get);
            $this->assign('resume_list',$resume_list);
            $this->assign('cat', $this->cat);
            $this->assign('salary', $this->salary);
            $this->display();return ;
        }

        $city_id_arr = [];
        foreach($resume_list as $k=>$v){
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

        foreach($resume_list as $k=>$v){
            $resume_list[$k]['work_province'] = $key_city_list[$v['work_province']]['name'];
            $resume_list[$k]['work_city'] = $key_city_list[$v['work_city']]['name'];
        }

        $this->assign('get',$get);
        $this->assign('resume_list',$resume_list);
        $this->assign('cat',$this->cat);
        $this->assign('subject',$this->subject);
        $this->display();
    }

    public function part(){
        $get = I('get.');
        $params = [];
        if($get['cat_one']){
            $params['cat_one'] = $get['cat_one'];
            $this->assign('cat_two',$this->cat_two[$get['cat_one']]);
        }
        if($get['cat_two']){
            $params['cat_two'] = $get['cat_two'];
        }
        //获取城市级联信息
        $map = [];
        $map['pid'] = 1;
        $province_list = M($this->city)
            ->where($map)
            ->select();
        $this->assign('province_list',$province_list);
        if($get['cert_province']){
            $params['cert_province'] = $get['cert_province'];
            $_ajax = new AjaxController();
            $city_list = $_ajax->city($get['cert_province']);
            $this->assign('city_list',$city_list);
        }
        if($get['cert_city']){
            $params['cert_city'] = $get['cert_city'];
        }
        $params['status'] = 2;

        //分页
        $count=M($this->resume_part)
            ->where($params)
            ->count();
        $page = $this->Tpage($count,$this->_pageNum);
        $this->assign('page',$page);
        //end

        $resume_list = M($this->resume_part)
            ->where($params)
            ->page($page['page'])
            ->order('create_time desc')
            ->select();

        $this->assign('get',$get);
        $this->assign('resume_list',$resume_list);
        $this->assign('cat_one',$this->cat_one);
        $this->assign('cat_two',$this->cat_two);
        $this->assign('job_title',$this->job_title);
        $this->display();
    }

    //查看兼职简历
    public function look_part(){
        $id = I('get.id');

        $params = [];
        $params['id'] = $id;
        $params['status'] = 2;
        $resume_info = M($this->resume_part)
            ->where($params)
            ->find();

        if(!$resume_info){
            $this->error('数据有误');
        }

        $city_id_arr = [];
        $city_id_arr[] = $resume_info['cert_province'];
        $city_id_arr[] = $resume_info['cert_city'];

        //获取城市信息
        $params = [];
        $params['id'] = array('in',$city_id_arr);
        $city_list = M($this->city)
            ->field('id,name')
            ->where($params)
            ->select();
        $key_city_list = [];
        foreach($city_list as $k=>$v){
            $key_city_list[$v['id']] = $v;
        }

        $resume_info['cert_province'] = $key_city_list[$resume_info['cert_province']]['name'];
        $resume_info['cert_city'] = $key_city_list[$resume_info['cert_city']]['name'];

        $params = [];
        $params['id'] = $id;
        M($this->resume_part)
            ->where($params)
            ->setInc('scan');
        $this->assign('resume_info', $resume_info);
        $this->assign('cat_one', $this->cat_one);
        $this->assign('cat_two', $this->cat_two);
        $this->assign('job_title', $this->job_title);
        $this->display();
    }

    //查看全职简历
    public function look_full(){
        $id = I('get.id');

        $params = [];
        $params['id'] = $id;
        $params['status'] = 2;
        $resume_info = M($this->resume_full)
            ->where($params)
            ->find();

        if(!$resume_info){
            $this->error('数据有误');
        }

        $city_id_arr = [];
        $city_id_arr[] = $resume_info['work_province'];
        $city_id_arr[] = $resume_info['work_city'];

        //获取城市信息
        $params = [];
        $params['id'] = array('in',$city_id_arr);
        $city_list = M($this->city)
            ->field('id,name')
            ->where($params)
            ->select();
        $key_city_list = [];
        foreach($city_list as $k=>$v){
            $key_city_list[$v['id']] = $v;
        }

        $resume_info['work_province'] = $key_city_list[$resume_info['work_province']]['name'];
        $resume_info['work_city'] = $key_city_list[$resume_info['work_city']]['name'];

        $params = [];
        $params['id'] = $id;
        M($this->resume_full)
            ->where($params)
            ->setInc('scan');

        $this->assign('resume_info', $resume_info);
        $this->assign('cat', $this->cat);
        $this->display();
    }
}
