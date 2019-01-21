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
class ResumeController extends CommonController {
    private $resume_part = 'resume_part';
    private $resume_full = 'resume_full';
    private $city = 'city';

	public function _initialize(){
		parent::_initialize();
        $this->_pageNum='20';//每页显示数量
    }

    //兼职列表
    public function part(){
        $params = [];

        //分页
        $count=M($this->resume_part)
            ->where($params)
            ->count();
        $page = $this->Tpage($count,$this->_pageNum);
        $this->assign('page',$page);
        //end

        $resume_list = M($this->resume_part)
            ->field('id,name,phone,cert_province,cert_city,salary,job_title,cat_one,cat_two,status,create_time')
            ->where($params)
            ->page($page['page'])
            ->order('id desc')
            ->select();

        $city_id_arr = [];
        foreach($resume_list as $k=>$v){
            $city_id_arr[] = $v['cert_province'];
            $city_id_arr[] = $v['cert_city'];
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
            $resume_list[$k]['cert_province'] = $key_city_list[$v['cert_province']]['name'];
            $resume_list[$k]['cert_city'] = $key_city_list[$v['cert_city']]['name'];
        }

        $this->assign('job_title',$this->job_title);
        $this->assign('cat_one',$this->cat_one);
        $this->assign('cat_two',$this->cat_two);
        $this->assign('resume_list',$resume_list);
        $this->display();
    }

    //全职简历列表
    public function full(){
        $params = [];

        //分页
        $count=M($this->resume_full)
            ->where($params)
            ->count();
        $page = $this->Tpage($count,$this->_pageNum);
        $this->assign('page',$page);
        //end

        $resume_list = M($this->resume_full)
            ->field('id,name,phone,cat,work_province,work_city,salary,status,create_time')
            ->where($params)
            ->page($page['page'])
            ->order('id desc')
            ->select();

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

        $this->assign('cat',$this->cat);
        $this->assign('resume_list',$resume_list);
        $this->display();
    }
}
