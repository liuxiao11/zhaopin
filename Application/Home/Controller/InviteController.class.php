<?php
namespace Home\Controller;
use Think\Controller;
use Admin\Controller\AjaxController;
class InviteController extends CommonController
{
    private $invite_part = 'invite_part';
    private $invite_full = 'invite_full';
    private $company = 'company';
    private $headhunt = 'headhunt';
    private $city = 'city';
    private $user = 'user';
    private $_pageNum = 10;

    public function _initialize(){
        parent::_initialize();
    }

    //招聘全职列表
    public function full(){
        $get = I('get.');

        $params = [];
        if($get['cat']){
            $params['cat'] = $get['cat'];
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
        $count=M($this->invite_full)
            ->where($params)
            ->count();
        $page = $this->Tpage($count,$this->_pageNum);
        $this->assign('page',$page);
        //end

        $invite_list = M($this->invite_full)
            ->field('id,type,user_id,cat,title,work_province,work_city,salary,create_time')
            ->where($params)
            ->page($page['page'])
            ->order('create_time desc')
            ->select();

        if(!$invite_list){
            $this->assign('get', $get);
            $this->assign('invite_list', $invite_list);
            $this->assign('cat', $this->cat);
            $this->assign('salary', $this->salary);
            $this->display();return ;
        }

        $company_id_arr = [];
        $headhunt_id_arr = [];
        $city_id_arr = [];
        foreach($invite_list as $k=>$v){
            if($v['type'] == 2){
                $company_id_arr[] = $v['user_id'];
            }
            if($v['type'] == 3){
                $headhunt_id_arr[] = $v['user_id'];
            }

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

        if($company_id_arr){
            $params = [];
            $params['user_id'] = array('in',array_unique($company_id_arr));
            $company_list = M($this->company)
                ->field('id,user_id,company_name')
                ->where($params)
                ->select();

            if($company_list){
                $key_company_list = [];
                foreach($company_list as $k=>$v){
                    $key_company_list[$v['user_id']] = $v;
                }
                foreach($invite_list as $k=>$v){
                    if($key_company_list[$v['user_id']]){
                        $invite_list[$k]['company_info'] = $key_company_list[$v['user_id']];
                    }
                }
            }
        }

        if($headhunt_id_arr){
            $params = [];
            $params['user_id'] = array('in',array_unique($headhunt_id_arr));
            $company_list = M($this->headhunt)
                ->field('id,user_id,company_name')
                ->where($params)
                ->select();

            if($company_list){
                $key_company_list = [];
                foreach($company_list as $k=>$v){
                    $key_company_list[$v['user_id']] = $v;
                }
                foreach($invite_list as $k=>$v){
                    if($key_company_list[$v['user_id']]){
                        $invite_list[$k]['company_info'] = $key_company_list[$v['user_id']];
                    }
                }
            }
        }



        $this->assign('get', $get);
        $this->assign('invite_list', $invite_list);
        $this->assign('cat', $this->cat);
        $this->assign('salary', $this->salary);
        $this->display();
    }

    //招聘兼职列表
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
        if($get['company_province']){
            $params['company_province'] = $get['company_province'];
            $_ajax = new AjaxController();
            $city_list = $_ajax->city($get['company_province']);
            $this->assign('city_list',$city_list);
        }
        if($get['company_city']){
            $params['company_city'] = $get['company_city'];
        }
        $params['status'] = 2;

        //分页
        $count=M($this->invite_part)
            ->where($params)
            ->count();
        $page = $this->Tpage($count,$this->_pageNum);
        $this->assign('page',$page);
        //end

        $invite_list = M($this->invite_part)
            ->where($params)
            ->page($page['page'])
            ->order('create_time desc')
            ->select();

        if(!$invite_list){
            $this->assign('get', $get);
            $this->assign('invite_list', $invite_list);
            $this->assign('cat_one',$this->cat_one);
            $this->assign('cat_two',$this->cat_two);
            $this->assign('salary',$this->salary);
            $this->display();return ;
        }

        $uid_arr = [];
        $city_id_arr = [];
        foreach($invite_list as $k=>$v){
            $uid_arr[] = $v['user_id'];
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

        if(!$uid_arr){
            $this->assign('get', $get);
            $this->assign('invite_list', $invite_list);
            $this->assign('cat_one',$this->cat_one);
            $this->assign('cat_two',$this->cat_two);
            $this->assign('salary',$this->salary);
            $this->display();return ;
        }

        $params = [];
        $params['user_id'] = array('in',array_unique($uid_arr));
        $user_list = M($this->company)
            ->field('id,user_id,company_name')
            ->where($params)
            ->select();
        if($user_list){
            $key_user_list = [];
            foreach($user_list as $k=>$v){
                $key_user_list[$v['user_id']] = $v;
            }
            foreach($invite_list as $k=>$v){
                $invite_list[$k]['company_info'] = $key_user_list[$v['user_id']];
            }
        }

        $this->assign('get', $get);
        $this->assign('invite_list', $invite_list);
        $this->assign('cat_one',$this->cat_one);
        $this->assign('cat_two',$this->cat_two);
        $this->assign('salary',$this->salary);
        $this->display();
    }

    //查看全职招聘
    public function look_full(){
        $id = I('get.id');

        $params = [];
        $params['id'] = $id;
        $params['status'] = 2;
        $invite_info = M($this->invite_full)
            ->where($params)
            ->find();

        if(!$invite_info){
            $this->error('数据有误');
        }

        //用户信息
        $user_info = M($this->user)
            ->field('id,type,nickname')
            ->find($invite_info['user_id']);

        //获取公司名称
        if($user_info['type'] == 2){
            $params = [];
            $params['user_id'] = $invite_info['user_id'];
            $company_info = M($this->company)
                ->field('id,company_name,tel,province,city')
                ->where($params)
                ->find();
        }elseif($user_info['type'] == 3){
            $params = [];
            $params['user_id'] = $invite_info['user_id'];
            $company_info = M($this->headhunt)
                ->field('id,company_name,tel,province,city')
                ->where($params)
                ->find();
        }
        $city_id_arr = [];
        $city_id_arr[] = $invite_info['work_province'];
        $city_id_arr[] = $invite_info['work_city'];

        if($company_info['province'] && $company_info['city']){
            $city_id_arr[] = $company_info['province'];
            $city_id_arr[] = $company_info['city'];
        }

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

        $company_info['province'] = $key_city_list[$company_info['province']]['name'];
        $company_info['city'] = $key_city_list[$company_info['city']]['name'];
        $invite_info['work_province'] = $key_city_list[$invite_info['work_province']]['name'];
        $invite_info['work_city'] = $key_city_list[$invite_info['work_city']]['name'];

        $params = [];
        $params['id'] = $id;
        M($this->invite_full)
            ->where($params)
            ->setInc('scan');

        $this->assign('user_info', $user_info);
        $this->assign('company_info', $company_info);
        $this->assign('invite_info', $invite_info);
        $this->assign('salary', $this->salary);
        $this->assign('cat', $this->cat);
        $this->assign('education', $this->education);
        $this->assign('work_years', $this->work_years);
        $this->display();
    }

    //查看兼职招聘
    public function look_part(){
        $id = I('get.id');

        $params = [];
        $params['id'] = $id;
        $params['status'] = 2;
        $invite_info = M($this->invite_part)
            ->where($params)
            ->find();

        if(!$invite_info){
            $this->error('数据有误');
        }

        //用户信息
        $user_info = M($this->user)
            ->field('id,type,nickname')
            ->find($invite_info['user_id']);

        //获取公司名称
        if($user_info['type'] == 2){
            $params = [];
            $params['user_id'] = $invite_info['user_id'];
            $company_info = M($this->company)
                ->field('id,company_name,tel,province,city')
                ->where($params)
                ->find();
        }elseif($user_info['type'] == 3){
            $params = [];
            $params['user_id'] = $invite_info['user_id'];
            $company_info = M($this->headhunt)
                ->field('id,company_name,tel,province,city')
                ->where($params)
                ->find();
        }
        $city_id_arr = [];
        $city_id_arr[] = $invite_info['company_province'];
        $city_id_arr[] = $invite_info['company_city'];

        if($company_info['province'] && $company_info['city']){
            $city_id_arr[] = $company_info['province'];
            $city_id_arr[] = $company_info['city'];
        }

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

        $company_info['province'] = $key_city_list[$company_info['province']]['name'];
        $company_info['city'] = $key_city_list[$company_info['city']]['name'];
        $invite_info['company_province'] = $key_city_list[$invite_info['company_province']]['name'];
        $invite_info['company_city'] = $key_city_list[$invite_info['company_city']]['name'];

        $params = [];
        $params['id'] = $id;
        M($this->invite_part)
            ->where($params)
            ->setInc('scan');

        $this->assign('user_info', $user_info);
        $this->assign('company_info', $company_info);
        $this->assign('invite_info', $invite_info);
        $this->assign('salary', $this->salary);
        $this->assign('cat_one', $this->cat_one);
        $this->assign('cat_two', $this->cat_two);
        $this->display();
    }
}
