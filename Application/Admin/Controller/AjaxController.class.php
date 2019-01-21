<?php
// +----------------------------------------------------------------------
// | 会员管理
// +----------------------------------------------------------------------
// | 时间：15/3/09
// +----------------------------------------------------------------------
// | Author: midadong <turn8888@163.com>
// +----------------------------------------------------------------------
namespace Admin\Controller;
use Think\Controller;
class AjaxController extends CommonController {
    private $user = 'user'; //用户表
    private $resume_part = 'resume_part'; //兼职简历表
    private $resume_full = 'resume_full'; //全职简历表
    private $invite_part = 'invite_part'; //全职简历表
    private $invite_full = 'invite_full'; //全职简历表
    private $city = 'city';
    private $_pageNum = 2;
	
	public function _initialize(){
    }

    //修改商品单个字段
    public function edit_user_field(){
        $post = I('post.');

        if($post['params'] == 'status'){
            $params = [];
            $params['id'] = $post['user_id'];
            $save = [];
            $save[$post['params']] = $post['value'];
            $save['update_time'] = time();

            $result = M($this->user)
                ->where($params)
                ->save($save);
            if($result){
                bjw_json(0);
            }else{
                bjw_json(1);
            }
        }


    }

    //修改简历
    public function edit_resume(){
        $post = I('post.');

        if($post['type'] == 1){
            $params = [];
            $params['id'] = $post['resume_id'];
            $save = [];
            $save[$post['params']] = $post['value'];
            $save['update_time'] = time();

            $result = M($this->resume_part)
                ->where($params)
                ->save($save);
            if($result){
                bjw_json(0);
            }else{
                bjw_json(1);
            }
        }

        if($post['type'] == 2){
            $params = [];
            $params['id'] = $post['resume_id'];
            $save = [];
            $save[$post['params']] = $post['value'];
            $save['update_time'] = time();

            $result = M($this->resume_full)
                ->where($params)
                ->save($save);
            if($result){
                bjw_json(0);
            }else{
                bjw_json(1);
            }
        }
    }

    //修改招聘
    public function edit_invite(){
        $post = I('post.');

        if($post['type'] == 1){
            $params = [];
            $params['id'] = $post['invite_id'];
            $save = [];
            $save[$post['params']] = $post['value'];
            $save['update_time'] = time();

            $result = M($this->invite_part)
                ->where($params)
                ->save($save);
            if($result){
                bjw_json(0);
            }else{
                bjw_json(1);
            }
        }

        if($post['type'] == 2){
            $params = [];
            $params['id'] = $post['invite_id'];
            $save = [];
            $save[$post['params']] = $post['value'];
            $save['update_time'] = time();

            $result = M($this->invite_full)
                ->where($params)
                ->save($save);
            if($result){
                bjw_json(0);
            }else{
                bjw_json(1);
            }
        }
    }

    //ajax获取城市信息
    public function ajax_city(){
        $post = I('post.');

        if($post['province'] == 0){
            bjw_json(1,'参数有误');
        }
        $params = [];
        $params['pid'] = $post['province'];
        $params['type'] = 2;
        $city_list = M($this->city)
            ->field('id,name')
            ->where($params)
            ->select();

        bjw_json(0,'操作成功',$city_list);
    }

    //获取城市信息
    public function city($pid){
        $post = I('post.');

        if(!$pid){
            return [];
        }
        $params = [];
        $params['pid'] = $pid;
        $params['type'] = 2;
        $city_list = M($this->city)
            ->field('id,name')
            ->where($params)
            ->select();

        return $city_list;
    }
}
