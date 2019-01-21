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
class IndexController extends CommonController {
    private $auth_group = 'auth_group'; //组表
    private $auth_rule = 'auth_rule'; //节点表
    private $member = 'member'; //管理员表
    private $auth_group_access = 'auth_group_access'; //关联表
    private $_pageNum = 2;
	
	public function _initialize(){
        $auth = session('auth');
        if(!$auth){
            redirect(U('sign/index'));
        }

        $one = reset($auth['rules']);
        $this_rule['top_id'] = $one['top_id'];
        $this->assign('this_rule',$this_rule);
        $this->assign('auth',$auth);
    }
	
	public function index(){
        $member = session('member');
        $this->assign('member',$member);
        $this->display();
    }

    public function upload_img(){
        $this->display();
    }

    public function upload(){
        $post = I('post.');
        dd($post);
        $file = $_FILES['file'];//得到传输的数据

//得到文件名称
        $name = $file['name'];
        $type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
        $allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
//判断文件类型是否被允许上传
        if(!in_array($type, $allow_type)){
            //如果不被允许，则直接停止程序运行
            return ;
        }
//判断是否是通过HTTP POST上传的
        if(!is_uploaded_file($file['tmp_name'])){
            //如果不是通过HTTP POST上传的
            return ;
        }
        $upload_path = "./public/"; //上传文件的存放路径
//开始移动文件到相应的文件夹
        if(move_uploaded_file($file['tmp_name'],$upload_path.$file['name'])){
            echo "Successfully!";
        }else{
            echo "Failed!";
        }
    }
}
