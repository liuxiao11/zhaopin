<?php
// +----------------------------------------------------------------------
// | 会员组管理
// +----------------------------------------------------------------------
// | 时间：15/3/09
// +----------------------------------------------------------------------
// | Author: midadong <turn8888@163.com>
// +----------------------------------------------------------------------
namespace Admin\Controller;
use Think\Controller;
class GroupController extends CommonController {
	
	public function _initialize(){
		parent::_initialize();
		$this->_pageNum='11';//每页显示数量
		$this->group='auth_group';
		$this->rule='auth_rule';
    }
	
	
	/**
	 * 组列表
	 * @author dadong <turn8888@163.com>
	 */
    public function index(){
    	$_table=D($this->group);
		$order['sort']='asc';
		//分页
		$count=$_table->where($where)->count();
		$page = $this->Tpage($count,$this->_pageNum);
		//end
		$list=$_table->where($where)->order($order)->limit($page->limit)->select();
		
		$this->assign('list',$list);
		$this->assign('table',$this->group);
		$this->display('group');

    }
	
	
	
	/**
	 * 创建组
	 * @author dadong <turn8888@163.com>
	 */
	public function create(){
		if(IS_AJAX && IS_POST){
			$this->publicFun($this->group,'add');
			$msg="添加组：".I('post.title');
			$this->userBehavior($msg);
			$this->success('操作成功');
			exit;
		}
		$this->success($this->fetch('groupae'));
	}
	
	
	
	
	/**
	 * 修改组
	 * @author dadong <turn8888@163.com>
	 */
	public function update(){
		if(IS_AJAX && IS_POST){
			$this->publicFun($this->group,'save');
			$msg="修改组：".I('post.title');
			$this->userBehavior($msg);
			$this->success('操作成功');
			exit;
		}
		if(IS_AJAX && IS_GET){
			$_table=D($this->group);
			$id=I('get.id');
			$where['id']=$id;
			$data=$_table->where($where)->find();
			$this->assign('val',$data);
		}
		$this->success($this->fetch('groupae'));
}
	
	
	/**
	 * 排序
	 * @author dadong <turn8888@163.com>
	 */
	public function updatesort(){
		$this->publicSort($this->group);
	}


	/**
	 * 授权
	 * @author dadong <turn8888@163.com> 15/3/15
	 */
	public function power(){
		if(IS_AJAX && IS_POST){
			$this->publicFun($this->group,'save');
			$msg="修改组权限ID：".I('post.title');
			$this->userBehavior($msg);
			$this->success('操作成功');
			exit;
		}
		if(IS_AJAX && IS_GET){
			$authgroup=M($this->rule);
			$list=$this->menu($authgroup);
			$get=I('get.');
			$_table=D($this->group);
			$data=$_table->where($where)->field('id,rules')->find($get['id']);
			$this->assign('val',$data);
			$this->assign('list',$list);
			$this->success($this->fetch('power'));
		}
	}	
	
	/**
	 * 删除
	 * @author dadong <turn8888@163.com> 15/3/17
	 */	
	public function del(){
		$this->publicDel($this->group);
	}
}