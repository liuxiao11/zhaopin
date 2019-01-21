<?php
// +----------------------------------------------------------------------
// | 会员管理
// +----------------------------------------------------------------------
// | 时间：15/3/08
// +----------------------------------------------------------------------
// | Author: midadong <turn8888@163.com>
// +----------------------------------------------------------------------
namespace Admin\Controller;
use Think\Controller;
use Admin\Services\IndexServices;
class SignController extends CommonController {
	private $auth_group = 'auth_group';
	private $auth_rule = 'auth_rule';

	public function _initialize(){
		$this->st=86400*1;
		$this->table='auth_group_access'; //关联表
    }
	
	public function bjw(){
        echo $_GET["echostr"];exit;
    }
	/**
	 * 登录
	 * @author dadong <turn8888@163.com>
	 */
    public function index(){
        $admin_user = session('admin_user');
    	if($admin_user){
    		redirect(U('index/index'));
    	}
        $post = I('post.');
		if($post){
			$_member = M('member');
			if(empty($post['account'])){
				$this->error('请填写账号');
			}
			if(empty($post['pass'])){
				$this->error('请填写密码');
			}

            $params = [];
            $params['account'] = $post['account'];
            $params['pass'] = md5($post['pass']);
			$member_info = $_member
                ->field('id,gid,account,tel,nickname,status')
                ->where($params)
                ->find();
            if(!$member_info){
                $this->error('账号或密码错误');
            }

            if($member_info['status']=='off'){
                $this->error('您的账户不可用');
            }

            $auth = array(
                'uid' => $member_info['id'],
                'nickname' => $member_info['nickname'],
                'account' => $member_info['account'],
                'gid' => $member_info['gid'],
            );

            //获取分组的权限
            $group_info = M($this->auth_group)
                ->field('id,rules')
                ->find($member_info['gid']);
            if(!$group_info){
                $this->error('账户还没有分组，请联系管理员');
            }

            //获取节点信息
            $params = [];
            $params['id'] = array('in',$group_info['rules']);
            $rule_list = M($this->auth_rule)
                ->field('id,pid,top_id,sort,level,name,title,position')
                ->where($params)
                ->order('sort desc')
                ->select();
            if($rule_list){
                $_index = new IndexServices();
                $key_rule_list = $_index->editor_rules($rule_list);
                $name_rule_list = [];
                foreach($rule_list as $k=>$v){
                    $name_rule_list[$v['name']] = $v;
                }
                $auth['name_rules'] = $name_rule_list;
                $auth['rules'] = $key_rule_list;
            }

            session('auth_sign',data_auth_sign($auth));
            session('auth',$auth);

            $this->success('操作成功',U('index/index'));return ;
		}

		$this->display();
    }
	
	
	/**
	 * 退出登陆
	 * @author dadong <turn8888@163.com>
	 */
	public function logout(){
        session('auth_sign',null);
        session('auth',null);
		redirect('/admin/sign');
	}
	
	public function s(){
		$se=session();
		p($se);
		
		$se1=s($se['user_auth']['uid']);
		p($se1);
		
	}
	
}












