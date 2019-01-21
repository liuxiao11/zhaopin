<?php
namespace Home\Controller;
use Think\Controller;
class PublishController extends CommonController {
    private $resume_part = 'resume_part';

    public function _initialize(){
        $this->_user = session('user');
        parent::_initialize();
    }

    public function index(){
        $this->assign('user',$this->_user);
        $this->display();
    }

    public function resume_part_type(){
        $user = $this->_user;
        if($user['type'] != 1){
            $this->error('你的身份必须是人才');
        }

        $this->assign('cat_one',$this->cat_one);
        $this->assign('cat_two',$this->cat_two);
        $this->assign('user',$this->_user);
        $this->display();
    }

    public function invite_part_type(){
        $user = $this->_user;
        if($user['type'] != 2){
            $this->error('你的身份必须是建企');
        }

        $this->assign('cat_one',$this->cat_one);
        $this->assign('cat_two',$this->cat_two);
        $this->assign('user',$this->_user);
        $this->display();
    }

    public function resume_full(){
        $get = I('get.');
        $post = I('post.');
        $user = $this->_user;
        if($user['type'] != 1){
            $this->error('你的身份必须是人才');
        }

        if(!$post){
            $this->display();return ;
        }
    }

    public function invite_head_type(){
        $user = $this->_user;
        if($user['type'] != 3){
            $this->error('你的身份必须是猎头');
        }

        $this->assign('cat_one',$this->cat_one);
        $this->assign('cat_two',$this->cat_two);
        $this->assign('user',$this->_user);
        $this->display();
    }

    public function resume_head_type(){
        $user = $this->_user;
        if($user['type'] != 3){
            $this->error('你的身份必须是猎头');
        }

        $this->assign('cat_one',$this->cat_one);
        $this->assign('cat_two',$this->cat_two);
        $this->assign('user',$this->_user);
        $this->display();
    }
}
