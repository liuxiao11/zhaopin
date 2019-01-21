<?php
namespace Home\Controller;
use Think\Controller;
use Admin\Controller\AjaxController;
class CompanyController extends CommonController {
    private $invite_part = 'invite_part';
    private $invite_full = 'invite_full';
    private $company = 'company';
    private $user = 'user';
    private $city = 'city';
    private $_pageNum = 10;
    public function _initialize(){
        parent::_initialize();
    }

    public function index(){
        $user_info = session('user');
        if(!$user_info || $user_info['type'] != 2){
            $this->error('请登录');
        }

        $this->assign('user_info',$user_info);
        $this->display();
    }

    public function invite_part(){
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
            $this->assign('salary',$this->salary);
            $this->display();return ;
        }

        $tmp = explode('-',$get['type']);
        $add_info = [];
        $add_info['type'] = 2;
        $add_info['title'] = $post['title'];
        $add_info['user_id'] = $user_info['id'];
        $add_info['call'] = $post['call'];
        $add_info['company_name'] = $post['company_name'];
        $add_info['phone'] = $post['phone'];
        $add_info['company_province'] = $post['company_province'];
        $add_info['company_city'] = $post['company_city'];
        $add_info['salary'] = $post['salary'];
        $add_info['cat_one'] = $tmp[0];
        $add_info['cat_two'] = $tmp[1];
        $add_info['intro'] = $post['intro'];
        $add_info['update_time'] = time();
        $add_info['create_time'] = time();
        $result = M($this->invite_part)
            ->add($add_info);
        if($result){
            $this->success('添加成功','/home/company');return ;
        }else{
            $this->error('添加失败');
        }
    }

    public function invite_full(){
        $user_info = session('user');
        if(!$user_info || $user_info['type'] != 2){
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
            $this->assign('salary',$this->salary);
            $this->assign('work_years',$this->work_years);
            $this->assign('education',$this->education);
            $this->display();return ;
        }

        $add = [];
        $add['type'] = 2;
        $add['title'] = $post['title'];
        $add['user_id'] = $user_info['id'];
        $add['phone'] = $post['phone'];
        $add['cat'] = $post['cat'];
        $add['work_years'] = $post['work_years'];
        $add['education'] = $post['education'];
        $add['intro'] = $post['intro'];
        $add['work_province'] = $post['work_province'];
        $add['work_city'] = $post['work_city'];
        $add['salary'] = $post['salary'];
        $add['update_time'] = time();
        $add['create_time'] = time();

        $result = M($this->invite_full)
            ->add($add);
        if($result){
            $this->success('添加成功','/company');
        }else{
            $this->error('添加失败');
        }
    }

    public function edit_invite_full(){
        $user_info = session('user');
        if(!$user_info || $user_info['type'] != 2){
            $this->error('请登录');
        }

        $post = I('post.');
        $get = I('get.');

        if(!$post && $get){
            $invite_info = M($this->invite_full)
                ->find($get['id']);

            //获取城市级联信息
            $params = [];
            $params['pid'] = 1;
            $province_list = M($this->city)
                ->where($params)
                ->select();
            $_ajax = new AjaxController();
            $city_list = $_ajax->city($invite_info['work_province']);

            $this->assign('city_list',$city_list);
            $this->assign('province_list',$province_list);
            $this->assign('invite_info',$invite_info);
            $this->assign('cat',$this->cat);
            $this->assign('salary',$this->salary);
            $this->assign('work_years',$this->work_years);
            $this->assign('education',$this->education);
            $this->display();return ;
        }

        if(!$get['id']){
            $this->error('参数有误');
        }
        $params = [];
        $params['id'] = $get['id'];
        $save = [];
        $save['type'] = 2;
        $save['title'] = $post['title'];
        $save['user_id'] = $user_info['id'];
        $save['phone'] = $post['phone'];
        $save['cat'] = $post['cat'];
        $save['work_years'] = $post['work_years'];
        $save['education'] = $post['education'];
        $save['intro'] = $post['intro'];
        $save['work_province'] = $post['work_province'];
        $save['work_city'] = $post['work_city'];
        $save['salary'] = $post['salary'];
        $save['status'] = 1;
        $save['update_time'] = time();
        $save['create_time'] = time();

        $result = M($this->invite_full)
            ->where($params)
            ->save($save);
        if($result){
            $this->success('修改成功');
        }else{
            $this->error('修改失败');
        }
    }

    public function edit_invite_part(){
        $user_info = session('user');
        if(!$user_info || $user_info['type'] != 2){
            $this->error('请登录');
        }

        $post = I('post.');
        $get = I('get.');

        if(!$post && $get){
            $invite_info = M($this->invite_part)
                ->find($get['id']);

            //获取城市级联信息
            $params = [];
            $params['pid'] = 1;
            $province_list = M($this->city)
                ->where($params)
                ->select();
            $_ajax = new AjaxController();
            $city_list = $_ajax->city($invite_info['company_province']);

            $this->assign('city_list',$city_list);
            $this->assign('province_list',$province_list);
            $this->assign('invite_info',$invite_info);
            $this->assign('salary',$this->salary);
            $this->display();return ;
        }

        if(!$get['id']){
            $this->error('参数有误');
        }
        $params = [];
        $params['id'] = $get['id'];
        $save = [];
        $save['type'] = 2;
        $save['title'] = $post['title'];
        $save['user_id'] = $user_info['id'];
        $save['call'] = $post['call'];
        $save['company_name'] = $post['company_name'];
        $save['phone'] = $post['phone'];
        $save['company_province'] = $post['company_province'];
        $save['company_city'] = $post['company_city'];
        $save['salary'] = $post['salary'];
        $save['intro'] = $post['intro'];
        $save['status'] = 1;
        $save['update_time'] = time();
        $save['create_time'] = time();

        $result = M($this->invite_part)
            ->where($params)
            ->save($save);
        if($result){
            $this->success('修改成功');
        }else{
            $this->error('修改失败');
        }
    }

    //个人中心-兼职招聘-招聘信息
    public function invite_part_list(){
        $user_info = session('user');
        if(!$user_info || $user_info['type'] != 2){
            $this->error('请登录');
        }

        $params = [];
        $params['user_id'] = $user_info['id'];

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
            ->select();
        if(!$invite_list){
            $this->assign('cat_one',$this->cat_one);
            $this->assign('cat_two',$this->cat_two);
            $this->assign('status',$this->status);
            $this->assign('resume_list',$invite_list);
            $this->display();return ;
        }

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
        $this->assign('status',$this->status);
        $this->assign('invite_list',$invite_list);
        $this->display();
    }

    //删除兼职招聘
    public function del_part(){
        $id = I('get.invite_id');
        if(!$id){
            $this->error('参数有误');
        }

        $result = M($this->invite_part)
            ->delete($id);
        if($result){
            $this->success('操作成功');
        }else{
            $this->error('操作失败');
        }
    }

    //个人中心-全职招聘-招聘信息
    public function invite_full_list(){
        $user_info = session('user');
        if(!$user_info || $user_info['type'] != 2){
            $this->error('请登录');
        }

        $params = [];
        $params['user_id'] = $user_info['id'];

        //分页
        $count=M($this->invite_full)
            ->where($params)
            ->count();
        $page = $this->Tpage($count,$this->_pageNum);
        $this->assign('page',$page);
        //end

        $invite_list = M($this->invite_full)
            ->where($params)
            ->page($page['page'])
            ->select();

        $this->assign('cat',$this->cat);
        $this->assign('salary',$this->salary);
        $this->assign('status',$this->status);
        $this->assign('invite_list',$invite_list);
        $this->display();
    }

    //删除全职招聘
    public function del_full(){
        $id = I('get.invite_id');
        if(!$id){
            $this->error('参数有误');
        }

        $result = M($this->invite_full)
            ->delete($id);
        if($result){
            $this->success('操作成功');
        }else{
            $this->error('操作失败');
        }
    }

    //个人中心-账号管理-公司资料
    public function info(){
        $user_info = session('user');
        if(!$user_info || $user_info['type'] != 2){
            $this->error('请登录');
        }

        $post = I('post.');
        if(!$post){
            $params = [];
            $params['user_id'] = $user_info['id'];
            $company_info = M($this->company)
                ->where($params)
                ->find();
            if(!$company_info){
                $add_info = [];
                $add_info['user_id'] = $user_info['id'];
                $add_info['create_time'] = time();
                $result = M($this->company)
                    ->add($add_info);
                $company_info = [];
                $company_info['id'] = $result;
                $company_info['user_id'] = $user_info['id'];
            }

            //获取城市级联信息
            $params = [];
            $params['pid'] = 1;
            $province_list = M($this->city)
                ->where($params)
                ->select();
            $_ajax = new AjaxController();
            $city_list = $_ajax->city($company_info['province']);

            $this->assign('province_list',$province_list);
            $this->assign('city_list',$city_list);
            $this->assign('user_info',$user_info);
            $this->assign('company_info',$company_info);
            $this->assign('company_scale',$this->company_scale);
            $this->display();return ;
        }

        $params = [];
        $params['id'] = $post['id'];
        $save_info = [];
        $save_info['company_name'] = $post['company_name'];
        $save_info['company_scale'] = $post['company_scale'];
        $save_info['contact'] = $post['contact'];
        $save_info['tel'] = $post['tel'];
        $save_info['province'] = $post['province'];
        $save_info['city'] = $post['city'];
        $save_info['address'] = $post['address'];
        $save_info['intro'] = $post['intro'];
        $save_info['scale'] = $post['scale'];
        $result = M($this->company)
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
        if(!$user_info || $user_info['type'] != 2){
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













    //发布全职信息
    public function create_invite_full(){
        $user_info = session('user');
        if(!$user_info || $user_info['type'] != 2){
            $this->error('请登录');
        }
        $post = I('post.');

        if(!$post){
            $this->assign('user_info',$user_info);
            $this->assign('full_position',$this->full_position);
            $this->assign('work_years',$this->work_years);
            $this->assign('education',$this->education);
            $this->assign('salary',$this->salary);
            $this->display();return ;
        }

        $add_info = [];
        $add_info['user_id'] = $user_info['id'];
        $add_info['phone'] = $post['phone'];
        $add_info['work_name'] = $post['work_name'];
        $add_info['full_position'] = $post['full_position'];
        $add_info['work_years'] = $post['work_years'];
        $add_info['education'] = $post['education'];
        $add_info['content'] = $post['content'];
        $add_info['work_province'] = $post['work_province'];
        $add_info['work_city'] = $post['work_city'];
        $add_info['salary'] = $post['salary'];
        $add_info['create_time'] = time();
        $result = M($this->invite_full)
            ->add($add_info);
        if($result){
            $this->success('添加成功');return ;
        }else{
            $this->error('添加失败');
        }
    }

    //查看全职招聘详情并修改
    public function invite_full_info(){
        $user_info = session('user');
        if(!$user_info || $user_info['type'] != 2){
            $this->error('请登录');
        }

        $id = I('get.invite_id');
        $post = I('post.');
        if(!$post){
            $invite_info = M($this->invite_full)
                ->find($id);

            $this->assign('invite_info',$invite_info);
            $this->assign('user_info',$user_info);
            $this->assign('full_position',$this->full_position);
            $this->assign('work_years',$this->work_years);
            $this->assign('education',$this->education);
            $this->assign('salary',$this->salary);
            $this->display();return ;
        }

        $params = [];
        $params['id'] = $post['id'];
        $save_info = [];
        $save_info['work_name'] = $post['work_name'];
        $save_info['phone'] = $post['phone'];
        $save_info['full_position'] = $post['full_position'];
        $save_info['work_years'] = $post['work_years'];
        $save_info['education'] = $post['education'];
        $save_info['content'] = $post['content'];
        $save_info['work_province'] = $post['work_province'];
        $save_info['work_city'] = $post['work_city'];
        $save_info['salary'] = $post['salary'];
        $result = M($this->invite_full)
            ->where($params)
            ->save($save_info);
        if($result){
            $this->success('修改成功');return ;
        }else{
            $this->error('修改失败');
        }
    }

    //删除全职招聘信息
    public function del_invite_full(){
        $user_info = session('user');
        if(!$user_info || $user_info['type'] != 2){
            $this->error('请登录');
        }

        $id = I('get.invite_id');
        if(!$id){
            $this->error('参数有误');
        }

        $result = M($this->invite_full)
            ->delete($id);
        if($result){
            $this->success('删除成功');return ;
        }else{
            $this->error('删除失败');
        }
    }


    //发布兼职信息
    public function create_invite_part(){
        $user_info = session('user');
        if(!$user_info || $user_info['type'] != 2){
            $this->error('请登录');
        }
        $post = I('post.');

            if(!$post){
                $this->assign('user_info',$user_info);
                $this->assign('position_one',$this->position_one);
                $this->assign('position_two',$this->position_two);
                $this->display();return ;
            }

        $add_info = [];
        $add_info['user_id'] = $user_info['id'];
        $add_info['call'] = $post['call'];
        $add_info['position_one'] = $post['position_one'];
        $add_info['position_two'] = $post['position_two'];
        $add_info['salary'] = $post['salary'];
        $add_info['company_province'] = $post['company_province'];
        $add_info['company_city'] = $post['company_city'];
        $add_info['content'] = $post['content'];
        $add_info['phone'] = $post['phone'];
        $add_info['company_name'] = $post['company_name'];
        $add_info['create_time'] = time();
        $result = M($this->invite_part)
            ->add($add_info);
        if($result){
            $this->success('添加成功');return ;
        }else{
            $this->error('添加失败');
        }
    }

    //查看兼职招聘详情并修改
    public function invite_part_info(){
        $user_info = session('user');
        if(!$user_info || $user_info['type'] != 2){
            $this->error('请登录');
        }

        $id = I('get.invite_id');
        $post = I('post.');
        if(!$post){
            $invite_info = M($this->invite_part)
                ->find($id);

            $this->assign('invite_info',$invite_info);
            $this->assign('user_info',$user_info);
            $this->assign('position_one',$this->position_one);
            $this->assign('position_two',$this->position_two);
            $this->display();return ;
        }

        $params = [];
        $params['id'] = $post['id'];
        $save_info = [];
        $save_info['company_name'] = $post['company_name'];
        $save_info['call'] = $post['call'];
        $save_info['position_one'] = $post['position_one'];
        $save_info['position_two'] = $post['position_two'];
        $save_info['company_province'] = $post['company_province'];
        $save_info['company_city'] = $post['company_city'];
        $save_info['content'] = $post['content'];
        $result = M($this->invite_part)
            ->where($params)
            ->save($save_info);
        if($result){
            $this->success('修改成功');
        }else{
            $this->error('修改失败');
        }
    }

    //删除兼职招聘信息
    public function del_invite_part(){
        $user_info = session('user');
        if(!$user_info || $user_info['type'] != 2){
            $this->error('请登录');
        }

        $id = I('get.invite_id');
        if(!$id){
            $this->error('参数有误');
        }

        $result = M($this->invite_part)
            ->delete($id);
        if($result){
            $this->success('删除成功');return ;
        }else{
            $this->error('删除失败');
        }
    }
}
