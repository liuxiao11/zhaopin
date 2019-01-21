<?php
namespace Home\Controller;
use Think\Controller;
class SignController extends CommonController {
    private $user = 'user';
    public function _initialize(){
        parent::_initialize();
    }

    //获取验证码
    public function get_Verify_code(){
        session('user.verify_code',112112);
        $alive_time = time()+120;
        session('user.verify_code_time',$alive_time);
        json(0);
    }

    //注册
    public function register(){
        $get = I('get.');
        if(!$get){
            $this->display();
            return ;
        }

        if(!$get['phone']){
            $this->error('手机号没填');
        }

        if(!$get['password']){
            $this->error('密码没填');
        }

//        if(!$get['verify_code']){
//            $this->error('验证码没填');
//        }

        if(!$get['type']){
            $this->error('身份没有选');
        }

//        $alive_time = session('user.verify_code_time');
//        if($alive_time-time() < 0){
//            $this->error('超时了');
//        }
//
//        if(session('user.verify_code') != $get['verify_code']){
//            $this->error('验证码不正确');
//        }


        $params = [];
        $params['phone'] = $get['phone'];
        $params['type'] = $get['type'];
        $count = M($this->user)
            ->where($params)
            ->count();
        if($count > 0){
            $this->error('同一个身份不可以重复注册');
        }

        $add_info = [];
        $add_info['type'] = $get['type'];
        $add_info['phone'] = $get['phone'];
        $add_info['nickname'] = $this->user_type[$get['type']];
        $add_info['password'] = md5($get['password']);
        $add_info['status'] = 1;
        $add_info['update_time'] = time();
        $add_info['create_time'] = time();

        $result = M($this->user)
            ->add($add_info);
        if($result){
            $this->success('注册成功','/sign/login');
        }else{
            $this->error('注册失败');
        }
    }

    //登录
    public function login(){
        $get = I('get.');
        $this->assign('get',$get);
        $this->display();
    }

    //登录操作
    public function do_login(){
        $get = I('get.');

        if(!$get['phone'] || !$get['password'] || !$get['type']){
            $this->error('信息不全');
        }

        $params = [];
        $params['phone'] = $get['phone'];
        $params['password'] = md5($get['password']);
        $params['type'] = $get['type'];
        $user_info = M($this->user)
            ->field('id,type,phone,nickname,person,company,headhunting,delivery,status,create_time')
            ->where($params)
            ->find();
        if(!$user_info){
            $this->error('账号或密码错误');
        }

        if($user_info['status'] != 1){
            $this->error('账号不可用');
        }

        session('user',$user_info);
        if($user_info['type'] == 1){
            $this->success('登录成功','/home/person/index');
        }elseif($user_info['type'] == 2){
            $this->success('登录成功','/home/company/index');
        }elseif($user_info['type'] == 3){
            $this->success('登录成功','/home/headhunt/index');
        }

    }

    public function logout(){
        session('user',null);
        $this->success('退出成功','/sign/login');
    }
}
