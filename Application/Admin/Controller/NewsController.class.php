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
class NewsController extends CommonController {
    private $news = 'news';
    private $member = 'member';
	public function _initialize(){
		parent::_initialize();
        $this->_pageNum='20';//每页显示数量
    }

    //资讯列表
    public function news_list(){
        $get = I('get.');
        $params = [];
        if($get['type']){
            $params['type'] = $get['type'];
        }

        if(session('auth.account') != 'admin'){
            $params['mid'] = session('auth.uid');
        }

        //分页
        $count=M($this->news)
            ->where($params)
            ->count();
        $page = $this->Tpage($count,$this->_pageNum);
        $this->assign('page',$page);
        //end

        $new_list = M($this->news)
            ->field('id,mid,type,title,img,recommend,create_time')
            ->where($params)
            ->page($page['page'])
            ->order('id desc')
            ->select();

        if(!$new_list){
            $this->assign('get',$get);
            $this->assign('news_list',$new_list);
            $this->assign('news_type',$this->news_type);
            $this->display();return ;
        }

        $mid_arr = [];
        foreach($new_list as $k=>$v){
            $mid_arr[] = $v['mid'];
        }
        if($mid_arr){
            $params = [];
            $params['id'] = array('in',$mid_arr);
            $member_list = M($this->member)
                ->field('id,account')
                ->where($params)
                ->select();
            $key_member_list = [];
            foreach($member_list as $k=>$v){
                $key_member_list[$v['id']] = $v;
            }
            foreach($new_list as $k=>$v){
                $new_list[$k]['member'] = $key_member_list[$v['mid']]['account'];
            }
        }

        $this->assign('get',$get);
        $this->assign('news_list',$new_list);
        $this->assign('news_type',$this->news_type);
        $this->display();
    }

    //添加
    public function add_news(){
        $post = I('post.');
        if(!$post){
            $this->display();return ;
        }

        if(!$post['title']){
            $this->error('标题没填');
        }

        if(!$post['type']){
            $this->error('分类没选');
        }

        if(!$post['author']){
            $this->error('作者没填');
        }

        if(!$post['content']){
            $this->error('内容没填');
        }

        if(!$_FILES['file']){
            $this->error('文件没上传');
        }

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
        $upload_path = "./upload/news/"; //上传文件的存放路径
        //开始移动文件到相应的文件夹
        if(!move_uploaded_file($file['tmp_name'],$upload_path.$file['name'])){
            $this->error('上传失败-2');
        }

        $add_info = [];
        $add_info['mid'] = session('auth.uid');
        $add_info['img'] = trim($upload_path.$file['name'],'.');
        $add_info['title'] = $post['title'];
        $add_info['keywords'] = $post['keywords'];
        $add_info['description'] = $post['description'];
        $add_info['type'] = $post['type'];
        $add_info['author'] = $post['author'];
        $add_info['content'] = $post['content'];
        $add_info['create_time'] = time();

        $result = M($this->news)
            ->add($add_info);
        if($result){
            $this->success('添加成功');
        }else{
            $this->error('添加失败');
        }
    }

    //删除
    public function del_news(){
        $id = I('get.id');

        $news_info = M($this->news)
            ->find($id);
        if($news_info['mid'] != session('auth.uid')){
            $this->error('只能删除自己的文章');
        }

        $result = M($this->news)
            ->delete($id);
        if($result){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }

    //修改
    public function edit_news(){
        $id = I('get.id');
        $mid = session('auth.uid');
        $post = I('post.');
        if(!$post){
            $news_info = M($this->news)
                ->find($id);
            if($news_info['mid'] != $mid){
                $this->error('只能看自己的文章');
            }

            $this->assign('news_info',$news_info);
            $this->assign('news_type',$this->news_type);
            $this->display();return ;
        }

        if(!$post['id']){
            $this->error('参数有误');
        }

        if(!$post['title']){
            $this->error('标题没填');
        }

        if(!$post['type']){
            $this->error('分类没选');
        }

        if(!$post['author']){
            $this->error('作者没填');
        }

        if(!$post['content']){
            $this->error('内容没填');
        }

        $news_info = M($this->news)
            ->find($post['id']);
        if($news_info['mid'] != $mid){
            $this->error('只能修改自己的文章');
        }

        $params = [];
        $params['id'] = $post['id'];
        $save_info = [];
        $save_info['title'] = $post['title'];
        $save_info['keywords'] = $post['keywords'];
        $save_info['description'] = $post['description'];
        $save_info['type'] = $post['type'];
        $save_info['author'] = $post['author'];
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
            $upload_path = "./upload/news/"; //上传文件的存放路径
            //开始移动文件到相应的文件夹
            if(!move_uploaded_file($file['tmp_name'],$upload_path.$file['name'])){
                $this->error('上传失败-2');
            }else{
                $save_info['img'] = trim($upload_path.$file['name'],'.');
            }
        }

        $save_info['content'] = $post['content'];
        $result = M($this->news)
            ->where($params)
            ->save($save_info);
        if($result){
            $this->success('修改成功');
        }else{
            $this->error('修改失败');
        }
    }

    //推荐
    public function recommend(){
        $post = I('post.');
        if(!$post['news_id'] || !$post['value']){
            bjw_json(1,'参数不全');
        }

        $params = [];
        $params['id'] = $post['news_id'];
        $save = [];
        $save['recommend'] = $post['value'];
        $save['update_time'] = time();
        $result = M($this->news)
            ->where($params)
            ->save($save);
        if($result){
            bjw_json(0);
        }else{
            bjw_json(1);
        }
    }

    //上传图片
    public function upload(){
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
        $upload_path = "./upload/news/"; //上传文件的存放路径
        //开始移动文件到相应的文件夹
        if(!move_uploaded_file($file['tmp_name'],$upload_path.$file['name'])){
            $this->error('上传失败-2');
        }else{
            bjw_json(0,'11',trim($upload_path.$file['name'],'.'));
        }
    }
    //删除图片
    public function delete_uploader(){
        if(!IS_AJAX){
            $res['status']='0';
            $res['info']='错误请求';
            echo dispose($res);
            exit;
        }

        $path=I('post.path');

        if($path){
            $this->deletefile($path);
            $res['status']='1';
            $res['info']='删除成功';
        }else{
            $res['status']='0';
            $res['info']='删除失败';
        }

        echo dispose($res);
        exit;
    }
}
