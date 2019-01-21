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
use Admin\Controller\AjaxController;
class UserController extends CommonController {
    private $city = 'city';
    private $user = 'user';
    private $person = 'person';
    private $company = 'company';
    private $headhunt = 'headhunt';
	public function _initialize(){
		parent::_initialize();
        $this->_pageNum='20';//每页显示数量
    }

    //人才列表
    public function person(){
        $params = [];
        $params['type'] = 1;
        //分页
        $count=M($this->user)
            ->where($params)
            ->count();
        $page = $this->Tpage($count,$this->_pageNum);
        $this->assign('page',$page);
        //end

        $user_list = M($this->user)
            ->where($params)
            ->page($page['page'])
            ->order('id desc')
            ->select();

        $this->assign('user_list',$user_list);
        $this->display();
    }

    public function del_person(){
        $id = I('get.id');

        if(!$id){
            $this->error('参数不全');
        }

        M($this->user)->startTrans();
        $result = M($this->user)
            ->delete($id);
        if(!$result){
            M($this->user)->rollback();
            $this->error('操作失败');
        }

        $params = [];
        $params['user_id'] = $id;
        $result = M($this->person)
            ->where($params)
            ->delete();
        if(!$result){
            M($this->user)->rollback();
            $this->error('操作失败-2');
        }else{
            M($this->user)->commit();
            $this->success('操作成功');
        }
    }

    public function add_person(){
        $post = I('post.');

        if(!$post){
            //获取城市级联信息
            $params = [];
            $params['pid'] = 1;
            $province_list = M($this->city)
                ->where($params)
                ->select();
            $this->assign('province_list',$province_list);
            $this->display();return ;
        }

        if(!$post['phone'] || !$post['nickname'] || !$post['password']){
            $this->error('参数不全');
        }

        //判断账号是否存在
        $params = [];
        $params['phone'] = $post['phone'];
        $params['type'] = 1;
        $count = M($this->user)
            ->field('id')
            ->where($params)
            ->count();
        if($count > 0){
            $this->error('账号已存在');
        }

        M($this->user)->startTrans();
        //用户表
        $add = [];
        $add['type'] = 1;
        $add['phone'] = $post['phone'];
        $add['nickname'] = $post['nickname'];
        $add['password'] = md5($post['password']);
        $add['update_time'] = time();
        $add['create_time'] = time();
        $result = M($this->user)
            ->add($add);
        if(!$result){
            M($this->user)->rollback();
            $this->error('操作失败-1');
        }

        //人才信息表
        $add = [];
        $add['user_id'] = $result;
        if($post['sex']){
            $add['sex'] = $post['sex'];
        }
        if($post['name']){
            $add['name'] = $post['name'];
        }
        if($post['id_card']){
            $add['id_card'] = $post['id_card'];
        }
        if($post['province']){
            $add['province'] = $post['province'];
        }
        if($post['city']){
            $add['city'] = $post['city'];
        }
        if($post['intro']){
            $add['intro'] = $post['intro'];
        }
        $add['update_time'] = time();
        $add['create_time'] = time();
        $result = M($this->person)
            ->add($add);
        if(!$result){
            M($this->user)->rollback();
            $this->error('操作失败-2');
        }else{
            M($this->user)->commit();
            $this->success('操作成功');
        }
    }

    public function edit_person(){
        $get = I('get.');
        $post = I('post.');
        if(!$post){
            $params = [];
            $params['id'] = $get['id'];
            $params['type'] = 1;
            $user_info = M($this->user)
                ->field('id,phone,nickname')
                ->where($params)
                ->find();
            if(!$user_info){
                $this->error('用户不存在');
            }

            $params = [];
            $params['user_id'] = $get['id'];
            $person_info = M($this->person)
                ->field('id,name,sex,id_card,province,city,intro')
                ->where($params)
                ->find();

            //获取城市级联信息
            $params = [];
            $params['pid'] = 1;
            $province_list = M($this->city)
                ->where($params)
                ->select();
            $_ajax = new AjaxController();
            $city_list = $_ajax->city($person_info['province']);
            $this->assign('province_list',$province_list);
            $this->assign('city_list',$city_list);

            $this->assign('user_info',$user_info);
            $this->assign('person_info',$person_info);
            $this->display();return ;
        }

        if(!$post['phone'] || !$post['nickname']){
            $this->error('参数不全');
        }

        //判断账号是否存在
        $params = [];
        $params['phone'] = $post['phone'];
        $params['type'] = 1;
        $params['id'] = array('neq',$post['id']);
        $count = M($this->user)
            ->field('id')
            ->where($params)
            ->count();
        if($count > 0){
            $this->error('账号已存在');
        }

        M($this->user)->startTrans();
        //用户表
        $params = [];
        $params['id'] = $post['id'];
        $save = [];
        $save['phone'] = $post['phone'];
        $save['nickname'] = $post['nickname'];
        if($post['password']){
            $save['password'] = md5($post['password']);
        }
        $save['update_time'] = time();
        $save['create_time'] = time();
        $result = M($this->user)
            ->where($params)
            ->save($save);
        if(!$result){
            M($this->user)->rollback();
            $this->error('操作失败-1');
        }

        //人才信息表
        $params = [];
        $params['user_id'] = $post['id'];
        $save = [];
        if($post['name']){
            $save['name'] = $post['name'];
        }
        if($post['sex']){
            $save['sex'] = $post['sex'];
        }
        if($post['id_card']){
            $save['id_card'] = $post['id_card'];
        }
        if($post['province']){
            $save['province'] = $post['province'];
        }
        if($post['city']){
            $save['city'] = $post['city'];
        }
        if($post['intro']){
            $save['intro'] = $post['intro'];
        }
        $save['update_time'] = time();
        $save['create_time'] = time();
        $result = M($this->person)
            ->where($params)
            ->save($save);
        if(!$result){
            M($this->user)->rollback();
            $this->error('操作失败-2');
        }else{
            M($this->user)->commit();
            $this->success('操作成功');
        }
    }

    //公司列表
    public function company(){
        $params = [];
        $params['type'] = 2;
        //分页
        $count=M($this->user)
            ->where($params)
            ->count();
        $page = $this->Tpage($count,$this->_pageNum);
        $this->assign('page',$page);
        //end

        $user_list = M($this->user)
            ->where($params)
            ->page($page['page'])
            ->order('id desc')
            ->select();

        $this->assign('user_list',$user_list);
        $this->display();
    }

    public function del_company(){
        $id = I('get.id');

        if(!$id){
            $this->error('参数不全');
        }

        M($this->user)->startTrans();
        $result = M($this->user)
            ->delete($id);
        if(!$result){
            M($this->user)->rollback();
            $this->error('操作失败');
        }

        $params = [];
        $params['user_id'] = $id;
        $result = M($this->company)
            ->where($params)
            ->delete();
        if(!$result){
            M($this->user)->rollback();
            $this->error('操作失败-2');
        }else{
            M($this->user)->commit();
            $this->success('操作成功');
        }
    }

    public function add_company(){
        $post = I('post.');
        if(!$post){
            //获取城市级联信息
            $params = [];
            $params['pid'] = 1;
            $province_list = M($this->city)
                ->where($params)
                ->select();
            $this->assign('province_list',$province_list);
            $this->assign('company_scale',$this->company_scale);
            $this->display();return ;
        }

        if(!$post['phone'] || !$post['nickname'] || !$post['password']){
            $this->error('参数不全');
        }

        //判断账号是否存在
        $params = [];
        $params['phone'] = $post['phone'];
        $params['type'] = 2;
        $count = M($this->user)
            ->field('id')
            ->where($params)
            ->count();
        if($count > 0){
            $this->error('账号已存在');
        }

        if($_FILES['file']['name']){
            $file = $_FILES['file'];//得到传输的数据

            //得到文件名称
            $name = $file['name'];
            $type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
            $allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
            //判断文件类型是否被允许上传
            if(!in_array($type, $allow_type)){
                //如果不被允许，则直接停止程序运行
                $this->error('文件类型不符合');
            }
            //判断是否是通过HTTP POST上传的
            if(!is_uploaded_file($file['tmp_name'])){
                //如果不是通过HTTP POST上传的
                $this->error('上传失败-1');
            }
            $upload_path = "./upload/user/"; //上传文件的存放路径
            //开始移动文件到相应的文件夹
            if(!move_uploaded_file($file['tmp_name'],$upload_path.$file['name'])){
                $this->error('上传失败-2');
            }else{
                $img_path = trim($upload_path.$file['name'],'.');
            }
        }

        M($this->user)->startTrans();
        //用户表
        $add = [];
        $add['type'] = 2;
        $add['phone'] = $post['phone'];
        $add['nickname'] = $post['nickname'];
        $add['password'] = md5($post['password']);
        $add['update_time'] = time();
        $add['create_time'] = time();
        $result = M($this->user)
            ->add($add);
        if(!$result){
            M($this->user)->rollback();
            $this->error('操作失败-1');
        }

        //公司信息表
        $add = [];
        $add['user_id'] = $result;
        if($post['company_name']){
            $add['company_name'] = $post['company_name'];
        }
        if($post['company_scale']){
            $add['company_scale'] = $post['company_scale'];
        }
        if($post['contact']){
            $add['contact'] = $post['contact'];
        }
        if($post['tel']){
            $add['tel'] = $post['tel'];
        }
        if($post['province']){
            $add['province'] = $post['province'];
        }
        if($post['city']){
            $add['city'] = $post['city'];
        }
        if($post['address']){
            $add['address'] = $post['address'];
        }
        if($post['intro']){
            $add['intro'] = $post['intro'];
        }
        if($img_path){
            $add['img'] = $img_path;
        }
        $add['update_time'] = time();
        $add['create_time'] = time();
        $result = M($this->company)
            ->add($add);
        if(!$result){
            M($this->user)->rollback();
            $this->error('操作失败-2');
        }else{
            M($this->user)->commit();
            $this->success('操作成功');
        }
    }

    public function edit_company(){
        $get = I('get.');
        $post = I('post.');
        if(!$post){
            $params = [];
            $params['id'] = $get['id'];
            $params['type'] = 2;
            $user_info = M($this->user)
                ->field('id,phone,nickname')
                ->where($params)
                ->find();
            if(!$user_info){
                $this->error('用户不存在');
            }

            $params = [];
            $params['user_id'] = $get['id'];
            $company_info = M($this->company)
                ->field('id,company_name,company_scale,contact,tel,province,city,address,intro,img')
                ->where($params)
                ->find();

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

        if(!$post['phone'] || !$post['nickname']){
            $this->error('参数不全');
        }

        //判断账号是否存在
        $params = [];
        $params['phone'] = $post['phone'];
        $params['type'] = 2;
        $params['id'] = array('neq',$post['id']);
        $count = M($this->user)
            ->field('id')
            ->where($params)
            ->count();
        if($count > 0){
            $this->error('账号已存在');
        }

        if($_FILES['file']['name']){
            $file = $_FILES['file'];//得到传输的数据

            //得到文件名称
            $name = $file['name'];
            $type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
            $allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
            //判断文件类型是否被允许上传
            if(!in_array($type, $allow_type)){
                //如果不被允许，则直接停止程序运行
                $this->error('文件类型不符合');
            }
            //判断是否是通过HTTP POST上传的
            if(!is_uploaded_file($file['tmp_name'])){
                //如果不是通过HTTP POST上传的
                $this->error('上传失败-1');
            }
            $upload_path = "./upload/user/"; //上传文件的存放路径
            //开始移动文件到相应的文件夹
            if(!move_uploaded_file($file['tmp_name'],$upload_path.$file['name'])){
                $this->error('上传失败-2');
            }else{
                $img_path = trim($upload_path.$file['name'],'.');
            }
        }

        M($this->user)->startTrans();
        //用户表
        $params = [];
        $params['id'] = $post['id'];
        $save = [];
        $save['phone'] = $post['phone'];
        $save['nickname'] = $post['nickname'];
        if($post['password']){
            $save['password'] = md5($post['password']);
        }
        $save['update_time'] = time();
        $save['create_time'] = time();
        $result = M($this->user)
            ->where($params)
            ->save($save);
        if(!$result){
            M($this->user)->rollback();
            $this->error('操作失败-1');
        }

        //公司信息表
        $params = [];
        $params['user_id'] = $post['id'];
        $save = [];
        if($post['company_name']){
            $save['company_name'] = $post['company_name'];
        }
        if($post['company_scale']){
            $save['company_scale'] = $post['company_scale'];
        }
        if($post['contact']){
            $save['contact'] = $post['contact'];
        }
        if($post['tel']){
            $save['tel'] = $post['tel'];
        }
        if($post['province']){
            $save['province'] = $post['province'];
        }
        if($post['city']){
            $save['city'] = $post['city'];
        }
        if($post['address']){
            $save['address'] = $post['address'];
        }
        if($post['intro']){
            $save['intro'] = $post['intro'];
        }
        if($img_path){
            $save['img'] = $img_path;
        }
        $save['update_time'] = time();
        $save['create_time'] = time();
        $result = M($this->company)
            ->where($params)
            ->save($save);
        if(!$result){
            M($this->user)->rollback();
            $this->error('操作失败-2');
        }else{
            M($this->user)->commit();
            $this->success('操作成功');
        }
    }

    //猎头列表
    public function headhunt(){
        $params = [];
        $params['type'] = 3;
        //分页
        $count=M($this->user)
            ->where($params)
            ->count();
        $page = $this->Tpage($count,$this->_pageNum);
        $this->assign('page',$page);
        //end

        $user_list = M($this->user)
            ->where($params)
            ->page($page['page'])
            ->order('id desc')
            ->select();

        $this->assign('user_list',$user_list);
        $this->display();
    }

    public function del_headhunt(){
        $id = I('get.id');

        if(!$id){
            $this->error('参数不全');
        }

        M($this->user)->startTrans();
        $result = M($this->user)
            ->delete($id);
        if(!$result){
            M($this->user)->rollback();
            $this->error('操作失败');
        }

        $params = [];
        $params['user_id'] = $id;
        $result = M($this->company)
            ->where($params)
            ->delete();
        if(!$result){
            M($this->user)->rollback();
            $this->error('操作失败-2');
        }else{
            M($this->user)->commit();
            $this->success('操作成功');
        }
    }

    public function edit_headhunt(){
        $get = I('get.');
        $post = I('post.');
        if(!$post){
            //获取城市级联信息
            $params = [];
            $params['pid'] = 1;
            $province_list = M($this->city)
                ->where($params)
                ->select();
            $this->assign('province_list',$province_list);
            $this->assign('company_scale',$this->company_scale);

            $params = [];
            $params['id'] = $get['id'];
            $params['type'] = 3;
            $user_info = M($this->user)
                ->field('id,phone,nickname')
                ->where($params)
                ->find();
            if(!$user_info){
                $this->error('用户不存在');
            }

            $params = [];
            $params['user_id'] = $get['id'];
            $headhunt_info = M($this->headhunt)
                ->field('id,company_name,company_scale,contact,tel,province,city,address,intro,img')
                ->where($params)
                ->find();

            //获取城市级联信息
            $params = [];
            $params['pid'] = 1;
            $province_list = M($this->city)
                ->where($params)
                ->select();
            $_ajax = new AjaxController();
            $city_list = $_ajax->city($headhunt_info['province']);
            $this->assign('province_list',$province_list);
            $this->assign('city_list',$city_list);

            $this->assign('user_info',$user_info);
            $this->assign('headhunt_info',$headhunt_info);
            $this->assign('company_scale',$this->company_scale);
            $this->display();return ;
        }

        if(!$post['phone'] || !$post['nickname']){
            $this->error('参数不全');
        }

        //判断账号是否存在
        $params = [];
        $params['phone'] = $post['phone'];
        $params['type'] = 3;
        $params['id'] = array('neq',$post['id']);
        $count = M($this->user)
            ->field('id')
            ->where($params)
            ->count();
        if($count > 0){
            $this->error('账号已存在');
        }

        if($_FILES['file']['name']){
            $file = $_FILES['file'];//得到传输的数据

            //得到文件名称
            $name = $file['name'];
            $type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
            $allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
            //判断文件类型是否被允许上传
            if(!in_array($type, $allow_type)){
                //如果不被允许，则直接停止程序运行
                $this->error('文件类型不符合');
            }
            //判断是否是通过HTTP POST上传的
            if(!is_uploaded_file($file['tmp_name'])){
                //如果不是通过HTTP POST上传的
                $this->error('上传失败-1');
            }
            $upload_path = "./upload/user/"; //上传文件的存放路径
            //开始移动文件到相应的文件夹
            if(!move_uploaded_file($file['tmp_name'],$upload_path.$file['name'])){
                $this->error('上传失败-2');
            }else{
                $img_path = trim($upload_path.$file['name'],'.');
            }
        }

        M($this->user)->startTrans();
        //用户表
        $params = [];
        $params['id'] = $post['id'];
        $save = [];
        $save['phone'] = $post['phone'];
        $save['nickname'] = $post['nickname'];
        if($post['password']){
            $save['password'] = md5($post['password']);
        }
        $save['update_time'] = time();
        $save['create_time'] = time();
        $result = M($this->user)
            ->where($params)
            ->save($save);
        if(!$result){
            M($this->user)->rollback();
            $this->error('操作失败-1');
        }

        //公司信息表
        $params = [];
        $params['user_id'] = $post['id'];
        $save = [];
        if($post['company_name']){
            $save['company_name'] = $post['company_name'];
        }
        if($post['company_scale']){
            $save['company_scale'] = $post['company_scale'];
        }
        if($post['contact']){
            $save['contact'] = $post['contact'];
        }
        if($post['tel']){
            $save['tel'] = $post['tel'];
        }
        if($post['province']){
            $save['province'] = $post['province'];
        }
        if($post['city']){
            $save['city'] = $post['city'];
        }
        if($post['address']){
            $save['address'] = $post['address'];
        }
        if($post['intro']){
            $save['intro'] = $post['intro'];
        }
        if($img_path){
            $save['img'] = $img_path;
        }
        $save['update_time'] = time();
        $save['create_time'] = time();
        $result = M($this->headhunt)
            ->where($params)
            ->save($save);
        if(!$result){
            M($this->user)->rollback();
            $this->error('操作失败-2');
        }else{
            M($this->user)->commit();
            $this->success('操作成功');
        }
    }

    public function add_headhunt(){
        $post = I('post.');
        if(!$post){
            //获取城市级联信息
            $params = [];
            $params['pid'] = 1;
            $province_list = M($this->city)
                ->where($params)
                ->select();
            $this->assign('province_list',$province_list);
            $this->assign('company_scale',$this->company_scale);
            $this->display();return ;
        }

        if(!$post['phone'] || !$post['nickname'] || !$post['password']){
            $this->error('参数不全');
        }

        //判断账号是否存在
        $params = [];
        $params['phone'] = $post['phone'];
        $params['type'] = 3;
        $count = M($this->user)
            ->field('id')
            ->where($params)
            ->count();
        if($count > 0){
            $this->error('账号已存在');
        }

        if($_FILES['file']['name']){
            $file = $_FILES['file'];//得到传输的数据

            //得到文件名称
            $name = $file['name'];
            $type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
            $allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
            //判断文件类型是否被允许上传
            if(!in_array($type, $allow_type)){
                //如果不被允许，则直接停止程序运行
                $this->error('文件类型不符合');
            }
            //判断是否是通过HTTP POST上传的
            if(!is_uploaded_file($file['tmp_name'])){
                //如果不是通过HTTP POST上传的
                $this->error('上传失败-1');
            }
            $upload_path = "./upload/user/"; //上传文件的存放路径
            //开始移动文件到相应的文件夹
            if(!move_uploaded_file($file['tmp_name'],$upload_path.$file['name'])){
                $this->error('上传失败-2');
            }else{
                $img_path = trim($upload_path.$file['name'],'.');
            }
        }

        M($this->user)->startTrans();
        //用户表
        $add = [];
        $add['type'] = 3;
        $add['phone'] = $post['phone'];
        $add['nickname'] = $post['nickname'];
        $add['password'] = md5($post['password']);
        $add['update_time'] = time();
        $add['create_time'] = time();
        $result = M($this->user)
            ->add($add);
        if(!$result){
            M($this->user)->rollback();
            $this->error('操作失败-1');
        }

        //公司信息表
        $add = [];
        $add['user_id'] = $result;
        if($post['company_name']){
            $add['company_name'] = $post['company_name'];
        }
        if($post['company_scale']){
            $add['company_scale'] = $post['company_scale'];
        }
        if($post['contact']){
            $add['contact'] = $post['contact'];
        }
        if($post['tel']){
            $add['tel'] = $post['tel'];
        }
        if($post['province']){
            $add['province'] = $post['province'];
        }
        if($post['city']){
            $add['city'] = $post['city'];
        }
        if($post['address']){
            $add['address'] = $post['address'];
        }
        if($post['intro']){
            $add['intro'] = $post['intro'];
        }
        if($img_path){
            $add['img'] = $img_path;
        }
        $add['update_time'] = time();
        $add['create_time'] = time();
        $result = M($this->headhunt)
            ->add($add);
        if(!$result){
            M($this->user)->rollback();
            $this->error('操作失败-2');
        }else{
            M($this->user)->commit();
            $this->success('操作成功');
        }
    }
}
