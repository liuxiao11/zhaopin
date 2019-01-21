<?php
namespace Home\Controller;
use Think\Controller;
use Admin\Controller\AjaxController;
class PersonController extends CommonController {
    private $person = 'person'; //兼职简历表
    private $user = 'user'; //兼职简历表
    private $resume_part = 'resume_part'; //兼职简历表
    private $resume_full = 'resume_full'; //全职简历表
    private $resume_full_two = 'resume_full_two'; //全职简历-工作经验
    private $resume_full_thress = 'resume_full_thress'; //全职简历-教育经历
    private $city = 'city'; //城市表
    private $_pageNum = 10;
    public function _initialize(){
        parent::_initialize();
    }

    //个人中心首页
    public function index(){
        $user_info = session('user');
        if(!$user_info || $user_info['type'] != 1){
            $this->error('请登录');
        }

        $this->assign('user_info',$user_info);
        $this->display();
    }

    //个人中心-兼职简历-我的简历
    public function resume_part_list(){
        $user_info = session('user');
        if(!$user_info || $user_info['type'] != 1){
            $this->error('请登录');
        }
        $this->assign('user_info',$user_info);

        $params = [];
        $params['user_id'] = $user_info['id'];

        //分页
        $count=M($this->resume_part)
            ->where($params)
            ->count();
        $page = $this->Tpage($count,$this->_pageNum);
        $this->assign('page',$page);
        //end

        $resume_list = M($this->resume_part)
            ->field('id,cert_province,cert_city,salary,cat_one,cat_two,status,create_time')
            ->where($params)
            ->page($page['page'])
            ->select();
        if(!$resume_list){
            $this->assign('cat_one',$this->cat_one);
            $this->assign('cat_two',$this->cat_two);
            $this->assign('status',$this->status);
            $this->assign('resume_list',$resume_list);
            $this->display();return ;
        }

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

        $this->assign('cat_one',$this->cat_one);
        $this->assign('cat_two',$this->cat_two);
        $this->assign('status',$this->status);
        $this->assign('resume_list',$resume_list);
        $this->display();
    }

    //创建兼职简历
    public function resume_part(){
        $get = I('get.');
        $post = I('post.');
        $user_info = session('user');
        if(!$get['type']){
            $this->error('数据有误');
        }
        if(!$post){
            //获取城市级联信息
            $params = [];
            $params['pid'] = 1;
            $province_list = M($this->city)
                ->where($params)
                ->select();
            $this->assign('province_list',$province_list);
            $this->assign('get',$get);
            $this->assign('user_info',$user_info);
            $this->assign('job_title',$this->job_title);
            $this->display();return ;
        }

        $tmp = explode('-',$get['type']);
        if(!$tmp[0] || !$tmp[1]){
            $this->error('分类没选');
        }
        $add_info = [];
        $add_info['type'] = 1;
        $add_info['title'] = $post['title'];
        $add_info['user_id'] = $user_info['id'];
        $add_info['name'] = $post['name'];
        $add_info['phone'] = $post['phone'];
        $add_info['cert_province'] = $post['cert_province'];
        $add_info['cert_city'] = $post['cert_city'];
        $add_info['salary'] = $post['salary'];
        $add_info['job_title'] = $post['job_title'];
        $add_info['cat_one'] = $tmp[0];
        $add_info['cat_two'] = $tmp[1];
        $add_info['intro'] = $post['intro'];
        $add_info['update_time'] = time();
        $add_info['create_time'] = time();
        $result = M($this->resume_part)
            ->add($add_info);
        if($result){
            $this->success('添加成功','/home/person');return ;
        }else{
            $this->error('添加失败');
        }
    }

    //修改兼职简历
    public function edit_resume_part(){
        $get = I('get.');
        $post = I('post.');
        $user_info = session('user');
        if(!$post && $get['id']){
            $resume_info = M($this->resume_part)
                ->find($get['id']);

            //获取城市级联信息
            $params = [];
            $params['pid'] = 1;
            $province_list = M($this->city)
                ->where($params)
                ->select();
            $_ajax = new AjaxController();
            $city_list = $_ajax->city($resume_info['cert_province']);

            $this->assign('city_list',$city_list);
            $this->assign('province_list',$province_list);
            $this->assign('get',$get);
            $this->assign('resume_info',$resume_info);
            $this->assign('job_title',$this->job_title);
            $this->display();return ;
        }

        if(!$get['id']){
            $this->error('参数有误');
        }
        $params = [];
        $params['id'] = $get['id'];
        $save = [];
        $save['type'] = 1;
        $save['title'] = $post['title'];
        $save['user_id'] = $user_info['id'];
        $save['name'] = $post['name'];
        $save['phone'] = $post['phone'];
        $save['cert_province'] = $post['cert_province'];
        $save['cert_city'] = $post['cert_city'];
        $save['salary'] = $post['salary'];
        $save['job_title'] = $post['job_title'];
        $save['intro'] = $post['intro'];
        $save['status'] = 1;
        $save['update_time'] = time();
        $result = M($this->resume_part)
            ->where($params)
            ->save($save);
        if($result){
            $this->success('修改成功');return ;
        }else{
            $this->error('修改失败');
        }
    }

    //删除兼职简历
    public function del_part(){
        $id = I('get.resume_id');
        if(!$id){
            $this->error('参数有误');
        }

        $result = M($this->resume_part)
            ->delete($id);
        if($result){
            $this->success('操作成功');
        }else{
            $this->error('操作失败');
        }
    }

    //个人中心-全职简历-我的简历
    public function resume_full_list(){
        $user_info = session('user');
        if(!$user_info || $user_info['type'] != 1){
            $this->error('请登录');
        }
        $this->assign('user_info',$user_info);

        $params = [];
        $params['user_id'] = $user_info['id'];

        //分页
        $count=M($this->resume_full)
            ->where($params)
            ->count();
        $page = $this->Tpage($count,$this->_pageNum);
        $this->assign('page',$page);
        //end

        $resume_list = M($this->resume_full)
            ->field('id,cat,work_province,work_city,salary,status,create_time')
            ->where($params)
            ->page($page['page'])
            ->select();
        if(!$resume_list){
            $this->assign('cat',$this->cat);
            $this->assign('status',$this->status);
            $this->assign('resume_list',$resume_list);
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

        $this->assign('cat',$this->cat);
        $this->assign('status',$this->status);
        $this->assign('resume_list',$resume_list);
        $this->display();
    }

    //创建全职简历
    public function resume_full(){
        $user_info = session('user');
        if(!$user_info || $user_info['type'] != 1){
            $this->error('请登录');
        }

        $post = I('post.');

        if(!$post){
            //获取城市级联信息
            $params = [];
            $params['pid'] = 1;
            $province_list = M($this->city)
                ->where($params)
                ->select();
            $this->assign('province_list',$province_list);
            $this->assign('user_info',$user_info);
            $this->assign('cat',$this->cat);
            $this->display();return ;
        }

        $add_info = [];
        $add_info['type'] = 1;
        $add_info['title'] = $post['title'];
        $add_info['user_id'] = $user_info['id'];
        $add_info['cat'] = $post['cat'];
        $add_info['work_province'] = $post['work_province'];
        $add_info['work_city'] = $post['work_city'];
        $add_info['salary'] = $post['salary'];
        $add_info['name'] = $post['name'];
        $add_info['phone'] = $post['phone'];
        $add_info['intro'] = $post['intro'];
        $add_info['update_time'] = time();
        $add_info['create_time'] = time();
        $result = M($this->resume_full)
            ->add($add_info);
        if($result){
            //todo 后期再加
            $this->success('添加成功','/person/');
//            $this->success('添加成功','/person/full_resume_two/resume_id/'.$result);
        }else{
            $this->error('添加失败');
        }
    }

    //修改全职简历
    public function edit_resume_full(){
        $user_info = session('user');
        if(!$user_info || $user_info['type'] != 1){
            $this->error('请登录');
        }

        $post = I('post.');
        $get = I('get.');

        if(!$post && $get['id']){
            $resume_info = M($this->resume_full)
                ->find($get['id']);

            //获取城市级联信息
            $params = [];
            $params['pid'] = 1;
            $province_list = M($this->city)
                ->where($params)
                ->select();
            $_ajax = new AjaxController();
            $city_list = $_ajax->city($resume_info['work_province']);

            $this->assign('city_list',$city_list);
            $this->assign('province_list',$province_list);
            $this->assign('resume_info',$resume_info);
            $this->assign('cat',$this->cat);
            $this->display();return ;
        }

        if(!$get['id']){
            $this->error('参数有误');
        }
        $params = [];
        $params['id'] = $get['id'];
        $save = [];
        $save['type'] = 1;
        $save['title'] = $post['title'];
        $save['user_id'] = $user_info['id'];
        $save['cat'] = $post['cat'];
        $save['work_province'] = $post['work_province'];
        $save['work_city'] = $post['work_city'];
        $save['salary'] = $post['salary'];
        $save['name'] = $post['name'];
        $save['phone'] = $post['phone'];
        $save['intro'] = $post['intro'];
        $save['status'] = 1;
        $save['update_time'] = time();
        $save['create_time'] = time();
        $result = M($this->resume_full)
            ->where($params)
            ->save($save);
        if($result){
            //todo 后期再加
            $this->success('修改成功');
//            $this->success('添加成功','/person/full_resume_two/resume_id/'.$result);
        }else{
            $this->error('修改失败');
        }
    }

    //删除全职简历
    public function del_full(){
        $id = I('get.resume_id');
        if(!$id){
            $this->error('参数有误');
        }

        $result = M($this->resume_full)
            ->delete($id);
        if($result){
            $this->success('操作成功');
        }else{
            $this->error('操作失败');
        }
    }

    //个人中心-账号管理-实名认证
    public function info(){
        $user_info = session('user');
        if(!$user_info || $user_info['type'] != 1){
            $this->error('请登录');
        }

        $post = I('post.');
        if(!$post){
            $params = [];
            $params['user_id'] = $user_info['id'];
            $person_info = M($this->person)
                ->where($params)
                ->find();
            if(!$person_info){
                $add_info = [];
                $add_info['user_id'] = $user_info['id'];
                $add_info['create_time'] = time();
                $result = M($this->person)
                    ->add($add_info);
                $person_info = [];
                $person_info['id'] = $result;
                $person_info['user_id'] = $user_info['id'];
            }

            //获取城市级联信息
            $params = [];
            $params['pid'] = 1;
            $province_list = M($this->city)
                ->where($params)
                ->select();
            $_ajax = new AjaxController();
            $city_list = $_ajax->city($person_info['province']);

            $this->assign('user_info',$user_info);
            $this->assign('province_list',$province_list);
            $this->assign('city_list',$city_list);
            $this->assign('person_info',$person_info);
            $this->display();return ;
        }

        $params = [];
        $params['id'] = $post['id'];
        $save_info = [];
        $save_info['name'] = $post['name'];
        $save_info['sex'] = $post['sex'];
        $save_info['id_card'] = $post['id_card'];
        $save_info['province'] = $post['province'];
        $save_info['city'] = $post['city'];
        $save_info['address'] = $post['address'];
        $save_info['intro'] = $post['intro'];
        $save_info['update_time'] = time();
        $result = M($this->person)
            ->where($params)
            ->save($save_info);
        if($result){
            $this->success('操作成功');
        }else{
            $this->error('操作失败');
        }
    }

    //修改密码
    public function update_pwd(){
        $user_info = session('user');
        if(!$user_info || $user_info['type'] != 1){
            $this->error('请登录');
        }

        $post = I('post.');
        if(!$post){
            $this->assign('user_info',$user_info);
            $this->display();return ;
        }

        $user = M($this->user)
            ->field('id,password')
            ->find($user_info['id']);
        if(md5($post['old_pwd']) != $user['password']){
            $this->error('原密码错误');
        }

        $save = [];
        $save['password'] = md5($post['password']);
        $params = [];
        $params['id'] = $user_info['id'];
        $result = M($this->user)
            ->where($params)
            ->save($save);
        if($result){
            $this->success('修改成功');
        }else{
            $this->error('修改失败');
        }
    }




























    public function del_resume_part(){
        $user_info = session('user');
        if(!$user_info || $user_info['type'] != 1){
            $this->error('请登录');
        }

        $id = I('get.resume_id');
        if(!$id){
            $this->error('参数有误');
        }

        $result = M($this->resume_part)
            ->delete($id);
        if($result){
            $this->success('删除成功');return ;
        }else{
            $this->error('删除失败');
        }
    }

    //查看兼职简历详情并修改
    public function resume_part_info(){
        $user_info = session('user');
        if(!$user_info || $user_info['type'] != 1){
            $this->error('请登录');
        }

        $id = I('get.resume_id');
        $post = I('post.');
        if(!$post){
            $resume_info = M($this->resume_part)
                ->field('id,name,sex,birthday,certificate_province,certificate_city,salary,phone,job_title,position_one,position_two')
                ->find($id);
            $this->assign('resume_info',$resume_info);
            $this->assign('user_info',$user_info);
            $this->assign('sex',$this->sex);
            $this->assign('job_title',$this->job_title);
            $this->assign('position_one',$this->position_one);
            $this->assign('position_two',$this->position_two[$resume_info['position_one']]);
            $this->display();return ;
        }

        $params = [];
        $params['id'] = $post['id'];
        $save_info = [];
        $save_info['name'] = $post['name'];
        $save_info['sex'] = $post['sex'];
        $save_info['phone'] = $post['phone'];
        $save_info['birthday'] = $post['birthday'];
        $save_info['certificate_province'] = $post['certificate_province'];
        $save_info['certificate_city'] = $post['certificate_city'];
        $save_info['salary'] = $post['salary'];
        $save_info['position_one'] = $post['position_one'];
        $save_info['position_two'] = $post['position_two'];
        $result = M($this->resume_part)
            ->where($params)
            ->save($save_info);
        if($result){
            $this->success('修改成功');return ;
        }else{
            $this->error('修改失败');
        }
    }

    //创建兼职简历
    public function create_resume_part(){
        $user_info = session('user');
        if(!$user_info || $user_info['type'] != 1){
            $this->error('请登录');
        }

        $post = I('post.');

        if(!$post){
            $this->assign('user_info',$user_info);
            $this->assign('sex',$this->sex);
            $this->assign('education',$this->education);
            $this->assign('job_title',$this->job_title);
            $this->assign('position_one',$this->position_one);
            $this->assign('position_two',$this->position_two);
            $this->display();return ;
        }

        $add_info = [];
        $add_info['user_id'] = $user_info['id'];
        $add_info['name'] = $post['name'];
        $add_info['sex'] = $post['sex'];
        $add_info['birthday'] = $post['birthday'];
        $add_info['education'] = $post['education'];
        $add_info['graduation_time'] = $post['graduation_time'];
        $add_info['phone'] = $post['phone'];
        $add_info['certificate_province'] = $post['certificate_province'];
        $add_info['certificate_city'] = $post['certificate_city'];
        $add_info['salary'] = $post['salary'];
        $add_info['job_title'] = $post['job_title'];
        $add_info['position_one'] = $post['position_one'];
        $add_info['position_two'] = $post['position_two'];
        $add_info['position_desc'] = $post['position_desc'];
        $add_info['create_time'] = time();
        $result = M($this->resume_part)
            ->add($add_info);
        if($result){
            $this->success('添加成功');return ;
        }else{
            $this->error('添加失败');
        }
    }

    //创建全职简历第二步
    public function full_resume_two(){
        $get = I('get.');
        $user_info = session('user');
        if(!$get){
            $this->error('参数有误');
        }

        $this->assign('user_info',$user_info);
        $this->assign('full_position',$this->full_position);
        $this->assign('subject',$this->subject);
        $this->assign('salary',$this->salary);
        $this->assign('education',$this->education);
        $this->assign('sex',$this->sex);
        $resume_info = M($this->resume_full)
            ->field("id,full_position,subject,work_province,work_city,salary,name,phone,sex,birthday,education")
            ->find($get['resume_id']);
        $this->assign('resume_info',$resume_info);
        $this->display();
    }

    //添加工作经验
    public function add_work_experience(){
        $post = I('post.');
        $user_info = session('user');
        $add_info = [];
        $add_info['user_id'] = $user_info['id'];
        $add_info['resume_id'] = $post['resume_id'];
        $add_info['company_name'] = $post['company_name'];
        $add_info['positio_name'] = $post['positio_name'];
        $add_info['salary'] = $post['salary'];
        $add_info['start_time'] = $post['start_time'];
        $add_info['end_time'] = $post['end_time'];
        $add_info['work_content'] = $post['work_content'];
        $add_info['create_time'] = time();
        $result = M($this->resume_full_two)
            ->add($add_info);
        if($result){
            $this->success('添加成功');
            return ;
        }else{
            $this->error('添加失败');
        }
    }

    //添加教育经历
    public function add_educational_experience(){
        $post = I('post.');
        $user_info = session('user');
        $add_info = [];
        $add_info['user_id'] = $user_info['id'];
        $add_info['resume_id'] = $post['resume_id'];
        $add_info['school_name'] = $post['school_name'];
        $add_info['positio_name'] = $post['positio_name'];
        $add_info['education'] = $post['education'];
        $add_info['subject'] = $post['subject'];
        $add_info['start_time'] = $post['start_time'];
        $add_info['end_time'] = $post['end_time'];
        $add_info['create_time'] = time();
        $result = M($this->resume_full_thress)
            ->add($add_info);
        if($result){
            $this->success('添加成功');
            return ;
        }else{
            $this->error('添加失败');
        }
    }

    //查看全职简历详情并修改基本信息
    public function resume_full_info(){
        $user_info = session('user');
        if(!$user_info || $user_info['type'] != 1){
            $this->error('请登录');
        }
        $id = I('get.resume_id');
        $post = I('post.');
        if(!$post){
            //基本信息
            $resume_info = M($this->resume_full)
                ->field('id,full_position,subject,work_province,work_city,salary,name,phone,sex,birthday,work_years,education,create_time')
                ->find($id);

            //工作经验
            $params = [];
            $params['resume_id'] = $id;
            $work_list = M($this->resume_full_two)
                ->where($params)
                ->select();

            //教育经历
            $params = [];
            $params['resume_id'] = $id;
            $education_list = M($this->resume_full_thress)
                ->where($params)
                ->select();

            $this->assign('resume_info',$resume_info);
            $this->assign('work_list',$work_list);
            $this->assign('education_list',$education_list);
            $this->assign('full_position',$this->full_position);
            $this->assign('subject',$this->subject);
            $this->assign('salary',$this->salary);
            $this->assign('work_years',$this->work_years);
            $this->assign('education',$this->education);
            $this->display();return ;
        }

        $params = [];
        $params['id'] = $post['id'];
        $save_info = [];
        $save_info['full_position'] = $post['full_position'];
        $save_info['subject'] = $post['subject'];
        $save_info['work_province'] = $post['work_province'];
        $save_info['work_city'] = $post['work_city'];
        $save_info['salary'] = $post['salary'];
        $save_info['sex'] = $post['sex'];
        $save_info['birthday'] = $post['birthday'];
        $save_info['work_years'] = $post['work_years'];
        $save_info['education'] = $post['education'];
        $result = M($this->resume_full)
            ->where($params)
            ->save($save_info);
        if($result){
            $this->success('修改成功');return ;
        }else{
            $this->error('修改失败');
        }
    }

    //修改工作经验
    public function save_work_experience(){
        $post = I('post.');
        $user_info = session('user');
        if(!$user_info || $user_info['type'] != 1){
            $this->error('请先登录');
        }
        $params = [];
        $params['id'] = $post['id'];
        $save_info = [];
        $save_info['company_name'] = $post['company_name'];
        $save_info['positio_name'] = $post['positio_name'];
        $save_info['salary'] = $post['salary'];
        $save_info['start_time'] = $post['start_time'];
        $save_info['end_time'] = $post['end_time'];
        $save_info['work_content'] = $post['work_content'];
        $result = M($this->resume_full_two)
            ->where($params)
            ->save($save_info);
        if($result){
            $this->success('修改成功');
            return ;
        }else{
            $this->error('修改失败');
        }
    }

    //修改教育经历
    public function save_educational_experience(){
        $post = I('post.');
        $user_info = session('user');
        if(!$user_info || $user_info['type'] != 1){
            $this->error('请先登录');
        }

        $params = [];
        $params['id'] = $post['id'];
        $save_info = [];
        $save_info['start_time'] = $post['start_time'];
        $save_info['end_time'] = $post['end_time'];
        $save_info['school_name'] = $post['school_name'];
        $save_info['education'] = $post['education'];
        $save_info['subject'] = $post['subject'];
        $result = M($this->resume_full_thress)
            ->where($params)
            ->save($save_info);
        if($result){
            $this->success('修改成功');
            return ;
        }else{
            $this->error('修改失败');
        }
    }

    //删除全职简历
    public function del_resume_full(){
        $id = I('get.resume_id');

        $params = [];
        $params['resume_id'] = $id;
        M($this->resume_full_two)
            ->where($params)
            ->delete();
        M($this->resume_full_thress)
            ->where($params)
            ->delete();
        $result = M($this->resume_full)
            ->delete($id);
        if($result){
            $this->success('删除成功');
            return ;
        }else{
            $this->error('删除失败');
        }
    }
}
