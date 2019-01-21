<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Services\IndexServices;
class RuleController extends CommonController {
    private $auth_group = 'auth_group'; //分组表
    private $auth_rule = 'auth_rule'; //节点表
    private $member = 'member'; //管理员表
    private $auth_group_access = 'auth_group_access'; //关联表
    private $_pageNum = 2;

	public function _initialize(){
		$auth = session('auth');
        if($auth['account'] != 'admin'){
            $this->error('只有超级管理员可以操作');
        }
        $action = strtolower(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME);
        $this_rule = $auth['name_rules'][$action];
        if(!$this_rule){
            $this->error('没有这个模块');
        }

        if($this_rule['level'] < 3){
            $this->error('权限错误-1');
        }

        if($this_rule['level'] == 3){
            $this_rule['show_id'] = $this_rule['id'];
        }elseif($this_rule['level'] == 4){
            $this_rule['show_id'] = $this_rule['pid'];
        }

        $this->assign('this_rule',$this_rule);
        $this->assign('auth',$auth);
    }

    public function rule_list(){
        //获取顶层节点
        $params = [];
        $params['pid'] = 0;
        $params['level'] = 1;

        //分页
        $count=M($this->auth_rule)
            ->where($params)
            ->count();
        $page = $this->Tpage($count,$this->_pageNum);
        $this->assign('page',$page);
        //end

        $top_rule_list = M($this->auth_rule)
            ->field('id')
            ->where($params)
            ->order('sort desc')
            ->page($page['page'])
            ->select();
        if(!$top_rule_list){
            $this->assign('key_rule_list',[]);
            $this->display();return ;
        }

        $rid_arr = [];
        foreach($top_rule_list as $k=>$v){
            $rid_arr[] = $v['id'];
        }

        //获取所有节点
        $params = [];
        $params['top_id'] = array('in',$rid_arr);
        $rule_list = M($this->auth_rule)
            ->field('id,pid,sort,level,name,title,position')
            ->where($params)
            ->order('sort desc')
            ->select();

        $_index = new IndexServices();
        $key_rule_list = $_index->editor_rules($rule_list);

        $this->assign('key_rule_list',$key_rule_list);
        $this->display();
    }

    public function add_rule(){
        $post = I('post.');
        if(!$post){
            //获取1-3层的节点
            $params = [];
            $params['level'] = array('in','1,2,3');
            $rule_list = M($this->auth_rule)
                ->field('id,pid,level,title')
                ->where($params)
                ->order('sort desc')
                ->select();

            $_index = new IndexServices();
            $key_rule_list = $_index->editor_rules($rule_list);

            $this->assign('key_rule_list',$key_rule_list);
            $this->assign('get',I('get.'));
            $this->display();return ;
        }

        if(!$post['title']){
            $this->error('节点名称没填');
        }

        if(!$post['name']){
            $this->error('节点路径没填');
        }else{
            $post['name'] = strtolower($post['name']);
        }

        if(!$post['position']){
            $this->error('按钮位置没选');
        }

        //路径是否重复
        $params = [];
        $params['name'] = $post['name'];
        $count = M($this->auth_rule)
            ->field('id')
            ->where($params)
            ->count();
        if($count > 0){
            $this->error('路径不可重复');
        }

        $add_info = [];
        //获取上级目录信息
        if($post['pid'] != 0){
            $rule_info = M($this->auth_rule)
                ->field('id,top_id,level')
                ->find($post['pid']);
            if(!$rule_info){
                $this->error('数据有误');
            }
            if($rule_info['level'] > 3){
                $this->error('层级不能超过四层');
            }

            $add_info['top_id'] = $rule_info['top_id'];
            $add_info['level'] = $rule_info['level'] + 1;
        }else{
            $add_info['level'] = 1;
        }

        $add_info['pid'] = $post['pid'];
        if($post['sort']){
            $add_info['sort'] = $post['sort'];
        }else{
            $add_info['sort'] = 10;
        }
        $add_info['name'] = $post['name'];
        $add_info['title'] = $post['title'];
        $add_info['position'] = $post['position'];
        $result = M($this->auth_rule)
            ->add($add_info);
        if(!$result){
            $this->error('操作失败-1');
        }

        if($post['pid'] == 0){
            $params = [];
            $params['id'] = $result;
            $save_info = [];
            $save_info['top_id'] = $result;
            $result = M($this->auth_rule)
                ->where($params)
                ->save($save_info);
        }

        if(!$result){
            $this->error('操作失败-2');
        }else{
            $this->success('操作成功');
        }
    }

    public function edit_rule(){
        $post = I('post.');
        $get = I('get.');
        if(!$post){
            $rule_info = M($this->auth_rule)
                ->field('id,title,name,sort,position')
                ->find($get['rid']);
            if(!$rule_info){
                $this->error('数据有误');
            }

            $this->assign('rule_info',$rule_info);
            $this->display();return ;
        }

        if(!$post['id']){
            $this->error('数据有误');
        }

        if(!$post['title']){
            $this->error('节点名称没填');
        }

        if(!$post['name']){
            $this->error('节点路径没填');
        }else{
            $post['name'] = strtolower($post['name']);
        }

        if(!$post['sort']){
            $this->error('排序值没填');
        }

        if(!$post['position']){
            $this->error('按钮位置没选');
        }

        //路径是否重复
        $params = [];
        $params['id'] = array('neq',$post['id']);
        $params['name'] = $post['name'];
        $count = M($this->auth_rule)
            ->field('id')
            ->where($params)
            ->count();
        if($count > 0){
            $this->error('路径不可重复');
        }

        $params = [];
        $params['id'] = $post['id'];
        $save_info = [];
        $save_info['name'] = $post['name'];
        $save_info['title'] = $post['title'];
        $save_info['sort'] = $post['sort'];
        $save_info['position'] = $post['position'];
        $result = M($this->auth_rule)
            ->where($params)
            ->save($save_info);
        if(!$result){
            $this->error('操作失败');
        }else{
            $this->success('操作成功');
        }
    }

    public function del_rule(){
        $get = I('get.');

        //获取当前节点
        $rule_info = M($this->auth_rule)
            ->field('id,level')
            ->find($get['rid']);
        if(!$rule_info){
            $this->error('数据有误');
        }

        $params = [];
         //判断当前节点的层级
        if($rule_info['level'] == 1){ // 第一层，直接根据top_id删除所有节点
            $params['top_id'] = $get['rid'];
        }elseif($rule_info['level'] == 2){ //第二层，获取第三层和第四层的节点
            $rid_arr = [];
            $rid_arr[] = $get['rid'];
            $map = [];
            $map['pid'] = $get['rid'];
            $map['level'] = 3;
            $rule_list = M($this->auth_rule)
                ->field('id')
                ->where($map)
                ->select();
            if($rule_list){
                $tmp_rid_arr = [];
                foreach($rule_list as $k=>$v){
                    $rid_arr[] = $v['id'];
                    $tmp_rid_arr[] = $v['id'];
                }

                $map = [];
                $map['pid'] = array('in',$tmp_rid_arr);
                $map['level'] = 4;
                $rule_list2 = M($this->auth_rule)
                    ->field('id')
                    ->where($map)
                    ->select();
                if($rule_list2){
                    foreach($rule_list2 as $k=>$v){
                        $rid_arr[] = $v['id'];
                    }
                }
            }
            $params['id'] = array('in',$rid_arr);
        }elseif($rule_info['level'] == 3){ //第三层，获取第四层的节点
            $rid_arr = [];
            $rid_arr[] = $get['rid'];
            $map = [];
            $map['pid'] = $get['rid'];
            $map['level'] = 4;
            $rule_list = M($this->auth_rule)
                ->field('id')
                ->where($map)
                ->select();
            if($rule_list){
                foreach($rule_list as $k=>$v){
                    $rid_arr[] = $v['id'];
                }
            }

            $params['id'] = array('in',$rid_arr);
        }elseif($rule_info['level'] == 4){ //第四层
            $params['id'] = $get['rid'];
        }

        $result = M($this->auth_rule)
            ->where($params)
            ->delete();
        if($result){
            $this->success('操作成功');
        }else{
            $this->error('操作失败');
        }
    }

    public function group_list(){
        //分页
        $count=M($this->auth_group)
            ->count();
        $page = $this->Tpage($count,20);
        $this->assign('page',$page);
        //end

        $group_list = M($this->auth_group)
            ->field('id,title')
            ->page($page['page'])
            ->select();

        $this->assign('group_list',$group_list);
        $this->display();
    }

    public function add_group(){
        $post = I('post.');

        $params = [];
        $params['title'] = $post['value'];
        $count = M($this->auth_group)
            ->where($params)
            ->count();
        if($count > 0){
            bjw_json(1,'分组已存在');
        }

        $add_info = [];
        $add_info['title'] = $post['value'];
        $add_info['satatus'] = 'on';
        $add_info['sort'] = 10;
        $result = M($this->auth_group)
            ->add($add_info);
        if($result){
            bjw_json(0);
        }else{
            bjw_json(1);
        }
    }

    public function edit_group(){
        $post = I('post.');

        if(!$post['gid'] || !$post['value']){
            bjw_json(1,'参数不全');
        }

        $params = [];
        $params['title'] = $post['value'];
        $count = M($this->auth_group)
            ->where($params)
            ->count();
        if($count > 0){
            bjw_json(1,'分组已存在');
        }

        $params = [];
        $params['id'] = $post['gid'];
        $save_info = [];
        $save_info['title'] = $post['value'];
        $save_info['satatus'] = 'on';
        $save_info['sort'] = 10;
        $result = M($this->auth_group)
            ->where($params)
            ->save($save_info);
        if($result){
            bjw_json(0);
        }else{
            bjw_json(1);
        }
    }

    public function del_group(){
        $get = I('get.');

        if(!$get['gid']){
            $this->error('参数有误');
        }

        $result = M($this->auth_group)
            ->delete($get['gid']);

        if(!$result){
            $this->error('操作失败');
        }else{
            $this->success('操作成功');
        }
    }

    public function power(){
        $post = I('post.');
        $get = I('get.');
        if(!$post){
            //获取该组已有的权限
            $params = [];
            $params['id'] = $get['gid'];
            $group_info = M($this->auth_group)
                ->field('rules')
                ->where($params)
                ->find();
            if(!$group_info){
                $this->error('数据有误');
            }
            $gid_arr = explode(",", $group_info['rules']);

            //获取顶层节点
            $params = [];
            $params['pid'] = 0;
            $params['level'] = 1;
            $top_rule_list = M($this->auth_rule)
                ->field('id')
                ->where($params)
                ->order('sort desc')
                ->select();

            $rid_arr = [];
            foreach($top_rule_list as $k=>$v){
                $rid_arr[] = $v['id'];
            }

            //获取所有节点
            $params = [];
            $params['top_id'] = array('in',$rid_arr);
            $rule_list = M($this->auth_rule)
                ->field('id,pid,sort,level,name,title,position')
                ->where($params)
                ->order('sort desc')
                ->select();

            foreach($rule_list as $k=>$v){
                if(in_array($v['id'],$gid_arr)){
                    $v['is_have'] = 1;
                }else{
                    $v['is_have'] = 0;
                }
                $rule_list[$k] = $v;
            }

            $_index = new IndexServices();
            $key_rule_list = $_index->editor_rules($rule_list);

            $this->assign('get',$get);
            $this->assign('rule_list',$key_rule_list);
            $this->display();return ;
        }

        $rid_str = implode(",", $post['rule']);
        $params = [];
        $params['id'] = $post['gid'];
        $save_info = [];
        $save_info['rules'] = $rid_str;
        $result = M($this->auth_group)
            ->where($params)
            ->save($save_info);
        if(!$result){
            $this->error('操作失败');
        }else{
            $this->success('操作成功');
        }
    }

    public function member_list(){
        $params = [];

        //分页
        $count=M($this->member)
            ->where($params)
            ->count();
        $page = $this->Tpage($count,20);
        $this->assign('page',$page);
        //end

        //管理员列表
        $member_list = M($this->member)
            ->field('id,gid,nickname,account,status')
            ->where($params)
            ->page($page['page'])
            ->select();
        if(!$member_list){
            $this->assign('member_list',[]);
            $this->display();return ;
        }

        //获取分组
        $gid_arr = [];
        foreach($member_list as $k=>$v){
            $gid_arr[] = $v['gid'];
        }

        $params = [];
        $params['id'] = array('in',$gid_arr);
        $group_list = M($this->auth_group)
            ->field('id,title')
            ->where($params)
            ->select();

        $key_group_list = [];
        foreach($group_list as $k=>$v){
            $key_group_list[$v['id']] = $v;
        }

        foreach($member_list as $k=>$v){
            $member_list[$k]['group_name'] = $key_group_list[$v['gid']]['title'];
        }

        $this->assign('member_list',$member_list);
        $this->display();
    }

    public function member_power(){
        $get = I('get.');
        $post = I('post.');
        if(!$post){
            $member_info = M($this->member)
                ->find($get['mid']);
            if(!$member_info){
                $this->error('参数有误');
            }

            $group_list = M($this->auth_group)
                ->select();
            if(!$group_list){
                $this->error('还没有添加分组');
            }

            $this->assign('member_info',$member_info);
            $this->assign('group_list',$group_list);
            $this->display();return ;
        }

        if(!$post['mid'] || !$post['gid']){
            $this->error('参数不全');
        }

        $params = [];
        $params['id'] = $post['mid'];
        $save_info = [];
        $save_info['gid'] = $post['gid'];
        $result = M($this->member)
            ->where($params)
            ->save($save_info);
        if($result){
            $this->success('操作成功');
        }else{
            $this->error('操作失败');
        }
    }

    public function add_member(){
        $post = I('post.');
        if(!$post){
            $this->display();return ;
        }

        if(!$post['account'] || !$post['nickname'] || !$post['pass']){
            $this->error('信息不全');
        }

        //判断用户名是否存在
        $params = [];
        $params['account'] = $post['account'];
        $count = M($this->member)
            ->where($params)
            ->count();
        if($count > 0){
            $this->error('用户名已存在');
        }

        $add = [];
        $add['account'] = $post['account'];
        $add['nickname'] = $post['nickname'];
        $add['pass'] = md5($post['pass']);
        $result = M($this->member)
            ->add($add);
        if($result){
            $this->success('操作成功');
        }else{
            $this->error('操作失败');
        }
    }

    public function edit_member(){
        $post = I('post.');
        $get = I('get.');
        if(!$post){
            $member_info = M($this->member)
                ->field('id,account,nickname')
                ->find($get['mid']);
            if(!$member_info){
                $this->error('数据有误');
            }

            $this->assign('member_info',$member_info);
            $this->display();return ;
        }


        if(!$post['mid']){
            $this->error('信息不全');
        }

        $save = [];
        if($post['account']){
            //判断用户名是否存在
            $params = [];
            $params['account'] = $post['account'];
            $count = M($this->member)
                ->where($params)
                ->count();
            if($count > 0){
                $this->error('用户名已存在');
            }
            $save['account'] = $post['account'];
        }

        if($post['nickname']){
            $save['nickname'] = $post['nickname'];
        }

        if($post['pass']){
            $save['pass'] = md5($post['pass']);
        }

        if(!$save){
            $this->error('信息不全-2');
        }

        $params = [];
        $params['id'] = $post['mid'];
        $result = M($this->member)
            ->where($params)
            ->save($save);
        if($result){
            $this->success('操作成功');
        }else{
            $this->error('操作失败');
        }
    }

    public function del_member(){
        $get = I('get.');

        if(!$get['mid']){
            $this->error('参数有误');
        }

        $result = M($this->member)
            ->delete($get['mid']);

        if(!$result){
            $this->error('操作失败');
        }else{
            $this->success('操作成功');
        }
    }





















	
	/**
	 * 节点显示，采用递归模式
	 * @author dadong <turn8888@163.com>
	 */
    public function index(){
		$_authRule=D($this->rule);
		$where['pid']=0;
		$count=$_authRule->where($where)->count();
		$page = $this->Tpage($count,$this->_pageNum);
		$field='*';
		$list=$this->unlimit($this->rule,$field,0,0,array(),$page->limit);
		$this->assign('list',$list);
		$this->display('rule');
    }




	/**
	 * 递归列表
	 * @author dadong <turn8888@163.com>
	 */
	private function publicSelec($id){
		$_authRule=D($this->rule);
		$field='id,title,pid';
		$select=$this->unlimit($this->rule,$field,'','','','',$id);
		$this->assign('select',$select);
		$get=I('get.');
		if(!empty($id)){
			$get['id']=$id;//修改
		}else{
			$get['pid']=$get['id'];//添加
			$get['id']='';
		}
		$this->assign('gets',$get);
	}




	/**
	 * 节点创建
	 * @author dadong <turn8888@163.com>
	 */
	public function create(){
		if(IS_AJAX && IS_POST){
			$this->publicFun($this->rule,'add');
			$msg="添加节点：".I('post.title');
			$this->userBehavior($msg);
			$this->success('操作成功');
			exit;
		}
		if(IS_AJAX && IS_GET){
			$this->publicSelec();
			$this->success($this->fetch('ruleae'));
		}
	}



	/**
	 * 节点修改
	 * @author dadong <turn8888@163.com>
	 */

	 public function update(){
		if(IS_AJAX && IS_POST){
			$this->publicFun($this->rule,'save');
			$msg="修改节点：".I('post.title');
			$this->userBehavior($msg);
			$this->success('操作成功');
			exit;
		}
		if(IS_AJAX && IS_GET){
			$_authRule=D($this->rule);
			$id=I('get.id');
			$where['id']=$id;
			$data=$_authRule->where($where)->find();
			$this->assign('val',$data);
			$this->publicSelec($id);
		}
		$this->success($this->fetch('ruleae'));
	}


	/**
	 * 更新节点
	 * @author dadong <turn8888@163.com>
	 */
	public function updatesort(){
		$this->publicSort($this->rule);
	}


		/**
	 * 删除
	 * @author dadong <turn8888@163.com> 15/3/17
	 */
	public function del(){
		$this->publicDel($this->rule);
	}
}
