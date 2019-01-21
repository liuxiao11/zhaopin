<?php
// +----------------------------------------------------------------------
// | 公用的服务器
// +----------------------------------------------------------------------
// | 时间：15/3/14
// +----------------------------------------------------------------------
// | Author: midadong <turn8888@163.com>
// +----------------------------------------------------------------------
namespace Admin\Controller;
use Think\Controller;
use Think\Log;      //引入静态日记类
use Vendor\AliSms\Sms;
class CommonController extends Controller {
    public $news_type = array(
        '1' => '政策解读',
        '2' => '资质行情',
        '3' => '职场资讯',
    );

    public $company_scale = array(
        '1' => '0-20人',
        '2' => '20-99人',
        '3' => '100-499人',
        '4' => '500-599人',
        '5' => '1000-9999人',
        '6' => '10000人以上',
    );

    public $job_title = array(
        '无',
        '初级',
        '中级',
        '副高',
        '高级',
    ); //职称类型

    public $cat_one = array(
        1=>'一级建造师',
        '二级建造师',
        '公用设备工程师',
        '电气工程师',
        '监理工程师',
        '造价工程师',
        '结构工程师',
        '注册咨询师',

    ); //兼职职位类别第一层

    public $cat_two = array(
        1=>array(1=>'建筑工程','市政公用','机电工程','公路工程','水利水电','矿业工程','港口与航道','通信与广电','铁路工程','民航机场'),
        array(1=>'建筑工程','机电工程','市政公用工程','水利水电工程','公路工程','矿业工程'),
        array(1=>'动力','暖通空调','给水排水'),
        array(1=>'供配电','发输变电'),
        array(1=>'建设部','水利部','交通部'),
        array(1=>'一级结构师','二级结构师'),
        array(1=>'环境工程','城市规划','市政公用工程','火电/水电/核电','建筑工程/建筑材料'),
    ); //兼职职位类别第二层

    public $cat = array(
        1=>'总经理/副总经理',
        '项目经理',
        '项目总工',
        '工程师',
        '高级工程师',
        '助理工程师',
        '建造师',
    ); //全职职位类别

    public $salary = array(
        '未选择',
        '面议',
        '1000元以下',
        '1000-2000元',
        '3000-5000元',
        '5000-8000元',
        '8000-12000元',
        '12000-20000元',
        '25000元以上',
    ); //全职期望薪资

    public $work_years = array(
        '未选择',
        '无经验',
        '应届毕业生',
        '1年以下',
        '1 - 2年',
        '3 - 5年',
        '6 - 10年',
        '10年以上',
    ); //全职工作年限

    public $education = array(
        '未选择',
        '高中及以下',
        '中专/技校',
        '大专',
        '本科',
        '硕士',
        '博士',
    ); //学历类型

    public function _initialize(){
        $auth = session('auth');
        if(!$auth){
            redirect(U('sign/index'));
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
    public function _initialize_bak(){
		define(UID, is_login());
    	if(!UID){
    		if(IS_AJAX){
    			$arr['is_login']=false;
    			$this->ajaxReturn($arr);
				exit;
    		}
			redirect(U('sign/index'));
		}
		//超级管理员
		define(IS_ADMINISTRATOR, is_administrator());
	    define(IS_PATH, is_path());
		if(!IS_ADMINISTRATOR && !IS_PATH){
	    	 $auth=new \Think\Auth();
			 $rule  = strtolower(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME);
			 $rule1  = strtolower(CONTROLLER_NAME.'/'.ACTION_NAME);
		  	 if(!$auth->check(array($rule,$rule1),UID)){
		  	 	 $this->error('你没有权限');
				 exit;
	       	 }
		}
		$this->_AUTH_GROUP='auth_group'; //组表
		$this->_AUTH_RULE='auth_rule'; //节点表
		$this->_AUTH_GROUP_ACCESS='auth_group_access'; //关联表
		
		//获取按钮权限
		if(strtolower(CONTROLLER_NAME)!='index'){
			$this->_button();
		}

		//缩略图的规则  key=>em  缩略图后缀名=>缩略倍数 
		$this->thumb_rule=array(
			's'=>3,
			'm'=>2
		);
		//商品上传默认状态(上架)
		$this->goods_state=1;
    }
	
	
	
	/**
	 * 写入文件
	 * @param string/array $data 写入文件数据
	 * @author swift <swift_0606@163.com>
	 */
	 public function fw($data){
	 	$fh = fopen('./file.html', "a+");
		fwrite($fh, dispose($data)); 
		fclose($fh);
	 }
	
	/**
	 * 无限级分类
	 * @param string $table 数据表名
	 * @param string $field 查询的字段
	 * @param int $pid 父亲的ID
	 * @param int $level 层级
	 * @param array $w where条件
	 * @param int $limit 查询分页数量
	 * @param int $id 当前ID
	 * @author dadong <turn8888@163.com>
	 */
	// unlimted search  无限查询(不分层)
	protected function unlimit($table,$field='*',$pid=0,$level=0,$w=array(),$limit='0,',$id){
		$_table=D($table);
		$w['pid']=$pid; 
		if($level==0){
			$limit=$limit;
		}else{
			$limit='0,';
		}
		$data=$_table->field($field)->where($w)->order('sort asc')->limit($limit)->select();
		//非递归
		if($data['0']['pid']==''){
			return;
		}
		//结束
		if($data){
			foreach ($data as $k => $v){
				//判断是否查询子类
				if($id && $id==$v['id']){
					
				}else{
					$v['level']=$level;
					$arr[]=$v;
					$arr2=$this->unlimit($table,$field,$v['id'],$level+1,'','',$id);
					if($arr2){ $arr=array_merge($arr,$arr2); }
				}
			}
		}else{
			$arr=$data;
		}
		return $arr;
	}
	
	/**
	 * 无限查询  (分层显示)
	 * @param string $table 数据表名
	 * @param string $field 查询的字段
	 * @param int $pid 父亲的ID
	 * @param int $level 层级
	 * @param array $w where条件
	 * @param int $limit 查询分页数量
	 * @param int $id 当前ID
	 * @author swift <swift_0606@163.com>
	 */
	final protected function unlimited($table,$field='*',$pid=0,$level=0,$w=array(),$limit='0,'){
		$_table=M($table);
		$w['pid']=$pid;
		
		if($level==0){
			$limit=$limit;
		}else{
			$limit='0,';
		}

		$data=$_table->field($field)->where($w)->order('sort asc')->limit($limit)->select();
		if($data){
			foreach ($data as $k => $v){
				$v['level']=$level;
				$v['son']=$this->unlimited($table,$field,$v['id'],$level+1,$w,$v['c']);
				$arr[]=$v;
			}
		}else{
			$arr=$data;
		}
		
		return $arr;
	}

	/**
	 * 批量真实的删除
	 * @param string $table 数据表名
	 * @param int $id 删除的数据ID
	 * @author Swift <swift_0606@163.com>
	 */
	protected function publicDel($table){
		if(IS_POST && IS_AJAX){
			$id=I('get.id');
			$data=$this->unlimit($table,'id',$id);
			$data=array_map('array_shift', $data);
			$data[]=$id;
			$where['id']=array('in',$data);

			if(M($table)->where($where)->delete()){
				$msg="删除 [".$table."] 表中的：".count($data)."条数据";
			    $this->userBehavior($msg);
				$this->success('删除成功');
			}else{
				$this->success('删除失败');
			}
			$this->ajaxReturn($arr);
		}

		exit;
	}
	
	
	//公用的分页
	protected function Tpage($count,$num){
        $get = I('get.');
        $p = $get['page'];
        $page = [];


        $page['max_page'] = ceil($count/$num);
        $page['count'] = $count;


        if($p > $page['max_page']){
            $p = $page['max_page'];
        }

        if($p < 1){
            $p = 1;
        }

        $page['p'] = $p;
        $page['page'] = $p.','.$num;

        if($page['p']-1 > 2){ // 是否存在首页
            $page['is_index'] = 1;
        }else{
            $page['is_index'] = 0;
        }

        if($page['p'] > 1){ // 是否存在上一页
            $page['is_last'] = 1;
        }else{
            $page['is_last'] = 0;
        }

        if($page['max_page'] - $page['p'] > 2){ // 是否存在尾页
            $page['is_end'] = 1;
        }else{
            $page['is_end'] = 0;
        }

        if($page['max_page'] > $page['p']){ // 是否存在下一页
            $page['is_next'] = 1;
        }else{
            $page['is_next'] = 0;
        }

        //显示5页
        $start = 1;
        if($page['p'] > 2){
            $start = $page['p'] - 2;
        }

        if($page['p'] > $page['max_page'] - 2){
            $start = $page['max_page'] - 4;
        }

        for($i=$start;$i<=$start+4;$i++){
            if($i >= 1 && $i <= $page['max_page']){
                $page['page_list'][] = $i;
            }
        }

        $page['link'] = strtolower('/'.MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME);

        if(!$get){
            return $page;
        }

        foreach($get as $k=>$v){
            if($k != 'page'){
                $page['link'] .= '/'.$k.'/'.$v;
            }
        }

        return $page;
	}
	
	
	
	
	
	/**
	 * 公用的添加修改方法
	 * @param string $str  添加/修改  add/save
	 * @author dadong <turn8888@163.com>
	 */
	protected function publicFun($table,$str){
		    $_table=D($table);
			if(!$_table->create()){
				$this->error($_table->getError());
			}else{
				$ret=$_table->$str();
				if($ret){
					return true;
				}else{
					$this->error('操作失败');
				}
			}
	}
	
	
	
	
	/**
	 * 批量修改排序
	 * @author Swift <swift_0606@163.com>
	 */
	public function publicSort($table){
		if(IS_AJAX && IS_POST){
			$id=I('post.id');
			$sort=I('post.sort');
			
			$ids = implode(',', $id);
			$sql = "UPDATE __".strtoupper($table)."__ SET sort = CASE id ";
			foreach ($id as $k => $v) {
			    $sql .= sprintf("WHEN %d THEN %d ", $v, $sort[$k]);
			}
			$sql .= "END WHERE id IN ($ids)";
			
			$_db=D();
			$return=$_db->execute($sql);
			if($return){
				$msg="更新 [".$table."] 表";
			    $this->userBehavior($msg);
				$this->success('操作成功');
			}else{
				$this->error('操作失败');
			}
		}
	}
	
	
	
	/**
	 * 公用的用户行为
	 * @param string $title 标题样式
	 * @param string $msg 详细信息
	 * @author dadong <turn8888@163.com>
	 */
	protected function userBehavior($msg,$user,$account){
		if($user==''){
			$user=session('user_auth.nickname');
		}
		if($account==''){
			$account=session('user_auth.account');
		}
		$_table=M('memberBehavior');
		$data['user']=$user;
		$data['ip']=$_SERVER["REMOTE_ADDR"];
		$data['account']=$account;
		$data['msg']=$msg;
		$data['time']=time();
		$_table->add($data);
	}
	
	/**
	 * 权限菜单
	 * @author dadong <turn8888@163.com>
	 */
	final protected function menu($tables,$pid=0,$str){
		$where['pid']=$pid;
		$where['status']='on';
		$data=$tables->field('id,name,title')->where($where)->order('sort asc')->select();
		if($data){
			foreach($data as $k=>$v){
				//权限显示规则
				$v['url']=U($v['name'],array('id'=>$v['id']));
				if(!$str || IS_ADMINISTRATOR){
					$v['son']=$this->menu($tables,$v['id'],$str);
					$arr[]=$v;
				}else{
					if(in_array($v['id'], $str)){
						$v['son']=$this->menu($tables,$v['id'],$str);
						$arr[]=$v;
				    }
				}
			}
		}
		return $arr;
	}
	
	
	/**
	 * 判断按钮权限
	 * @author dongdong <turn8888@163.com>  15/3/17
	 * */
	final private function _button(){
			$id=I('get.id');
			if($id){
				if(!IS_ADMINISTRATOR){
					$uid=is_login();
					$where['b.status']='on';
					$rules=M($this->_AUTH_GROUP_ACCESS)->alias('a')->join('__'.strtoupper($this->_AUTH_GROUP).'__ b ON a.group_id = b.id and a.uid ='.$uid)->where($where)->getfield('b.rules');
					$find=" and FIND_IN_SET(id,'".$rules."')";
				}else{
					$find='';
				}
				$where='';
				$where="pid='".$id."'and status = 'on'".$find;
				$order='sort asc';
				$field='name as url,position,title';
				$data=M($this->_AUTH_RULE)->field($field)->order($order)->where($where)->select();
				$arr=arrMerge($data,'right');
 

				$this->assign('button',$arr);
			}	
	}
			
	public function cacheclear() {
		
	  	//清文件缓存
	   	 $temppath=RUNTIME_PATH.'Cache/';
	 	 $dirs = array($temppath);
	 	 $dirs[]=RUNTIME_PATH.'Data/';
	 	 $dirs[]=RUNTIME_PATH.'Logs/'; 
	 	 //@mkdir($temppath,0777,true);
	     //清理缓存
		  foreach($dirs as $value) {
		  	$this->rmdirr($value);
		  }
	}

	/**
	 * 上传图片文件
	 * @param string $path upload 下面的路径名称  
	 * @author swift <swift_0606@163.com>
	 */
	protected function uploadfile($path='',$thumb=false){
		
		$upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 200000000 ;// 设置附件上传大小
        $upload->exts = array('jpeg','jpg','png','gif');// 设置附件上传类型
        $upload->rootPath = './upload/'; // 设置附件上传根目录
        $upload->autoSub = false;
        $upload->savePath = ($path?'/':'').$path.'/'.date('Ymd').'/'; // 设置附件上传（子）目录
        //$upload->saveName=time().mt_rand(100000,999999);
        
        // 上传文件
        $info = $upload->upload();
		if($info){
			
			//$app='/upload/'.$info['file']['savepath'].$info['file']['savename'];
			$arr=array();
			//session('thumb_img',null);
			foreach($info as $file){
				$img='/upload'.$file['savepath'].$file['savename'];
				$key=is_numeric($file['key'])?$file['key']:0;
				$arr[$key]=$img;
			}
			
			$res['status']='1';
			$res['info']=$upload->getError()?$upload->getError():'success';
			ksort($arr);
			//生成缩略图
			$arr2=array();
			if($thumb){
				foreach($arr as $k=>$v){
					$arr2=$this->thumb($v,array(),$arr2,false);
				}
			}
			$res['data']=$arr;
			$res['thumb']=$arr2;//session('thumb_img');
		}else{
			$res['status']='0';
			$res['info']=$upload->getError();
			$res['data']=array();
			$res['thumb']=array();			
		}
		
		/*$f=fopen('1.php', 'w+');
		
		fwrite($f, var_export($res,true));
		
		fclose($f);
		
		exit;*/

		return $res;
	 }
	
	
	/**
	 * 生成缩略图
	 * @param	$img	string	要生成的缩略图路径 '/upload/1.jpg'
	 * @param	$thumb_rule		string	缩略图尺寸 array('s'=>4,'m'=>2); 后缀名是_s,_m原图宽度缩小等比例4,2倍
	 * @param	$water	bool	是否添加水印
	 * @author swift <swift_0606@163.com>
	 */
	 protected function thumb($img,$thumb_rule=array(),$arr=array(),$water=false){
	 	if(!$thumb_rule){
	 		$thumb_rule=$this->thumb_rule;
	 	}
	 	$root=rtrim(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']),'/');
		
	    $image = new \Think\Image(); 
		foreach ($thumb_rule as $pre => $em) {
			$image->open($root.$img);
			$ow=$image->width();  //原图宽度
	    	//详情查看Image类的参数
	    	$image->thumb($ow/$em,999999,1);
	    	if($water){
	    		$source=$root.$this->water;
	    		$image->water($source,9,$alpha=60);
	    	}
			$pathinfo=pathinfo($img);
			$thumb_img=$pathinfo['dirname'].'/'.$pathinfo['filename'].'_'.$pre.'.'.$pathinfo['extension'];
	    	$image->save($root.$thumb_img);
			$arr[$pre][]=$thumb_img;
			//商品&动态上传，方便存储数据库
			/*$thumbs=session('thumb_img')?session('thumb_img'):array();
			$thumbs[$pre][]=$thumb_img;
			session('thumb_img',$thumbs);*/
		}
		
		return $arr;
	 }
	
	
	/**
	 * 批量删除垃圾文件
	 * string  $files array('1.jpg','2.jpg')
	 * @author swift <swift_0606@163.com>
	 */
	 protected function deletefiles($files){
	 	if(is_array($files)){
	 		foreach ($files as $k => $v) {
				$this->deletefile($v);
			}
	 	}
	 }
	 /**
	 * 删除垃圾文件
	 * string  $file eg : /upload/20150330/5518b955795bc.jpg
	 * @author swift <swift_0606@163.com>
	 */
	 protected function deletefile($file){
	 	if(!$file){
	 		return ;
	 	}
	 	$root=rtrim(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']),'/');
		$file='/'.ltrim(str_replace('\\', '/', $file),'/');
		$pathinfo=pathinfo($root.$file);
		$dirname=$pathinfo['dirname'];
		//$basename=$pathinfo['basename'];
		$ext=$pathinfo['extension'];
		$extension=array('jpg','png','gif');
		if( file_exists($root.$file) && in_array($ext,$extension) ){
			if($file!=$this->photo){
				unlink($root.$file);// 删除单个图片
				$arr=$this->getdir($dirname);
				if(!$arr){
					rmdir($dirname); // 删除空的文件夹
				}
			}
			
		}
		
	 }
	 
	 /**
	 * 获取文件目录中的文件名
	 * string $path 目录路径
	 * string $save 
	 * @author swift <swift_0606@163.com>
	 */
	protected function getdir($path,$save=false){
		$arr=array();
		if(is_dir($path)){
			
			$path=str_replace('\\', '/', $path);
			$path=rtrim($path,'/');
			
			$dir = opendir($path);
			$ar=array('.','..');
			while(($file=readdir($dir))!==false){
				if(!in_array($file,$ar)){
					if($save){
						$save=rtrim($save,'/');
						//$save=ltrim($save,'/');
						$arr[]=$save.'/'.$file;
					}else{
						$arr[]=$file;
					}
				}
			}
			closedir($dir);
		}
		return $arr;
	}
	 
	 
	 protected function csspath(){
		 
		//$style=substr(MODULE_PATH,'1',strlen(MODULE_PATH)).'View/Style';
		$style='/Public'; 
		$this->assign('style',$style);
		//C('TMPL_PARSE_STRING.__STYLE__',$style);
	}
	 
	 
	 
	 
	 /**
	 * 发送验证短信
	 * @param string $tel 手机号
	 * @param number $activeTime 验证码有效时间，默认5分钟
	 * @param number $codeLen 验证码长度，默认6位
	 * @return boolean
	 */
	public function sendVerifyCode($tel, $code) {
		//生成验证
		if(empty($tel)){
			return array('status' => '0', 'info' => '请先输入手机号');
		}

		//发送短信
		$res =  Sms::sendRegisterCode($tel, $code);
		//Log::write('验证码发送:'.print_r($res,1));
		if(!$res){
			return array('status' => '0', 'info' => '两次发送验证码时间小于60秒');
		}

		//有效时间5分钟
		$liveTime = time() + $activeTime * 60;

		//将验证码写入数据库
		$data = $this->writeVerify($tel, $code, $liveTime);

		if ($data) return array('status' => '1', 'info' => '发送成功');
		else array('status' => '0', 'info' => '发送失败');
	}

	/**
	 * 验证码入库
	 * @param string $tel 电话号
	 * @param string $code 验证码
	 * @param integer $liveTime 存活最大期限
	 * @return boolean
	 */
	private function writeVerify($tel, $code, $liveTime) {

		$post = array(
			'tel' => $tel,
			'vertify_code' => $code,
			'live_time' => $liveTime
		);
		$data =  M('user_vertify_code')->add($post);
//		Log::write('user_vertify_code:'.print_r($data,1));

		if($data){
			return true;
		}else{
			return false;
		}

	}


	/**
	 * Desc:  	上传商品图片
	 * @param 	$path_name	上传目录
	 * @param 	$url		上传url
	 * User:    lianger  <sexyphp.com>
	 * CrDt:	2016-06-02
	 * UpDt:
	 */
	public function uploaders($path_name,$url){

		$res=$this->uploadfile($path_name);
		$data['path']=$res['data'][0];
		$data['uri']=U($url);
		$res['data']=$data;
		echo dispose($res);
		exit;
	}

	/**
	 * Desc:	删除上传的图片
	 * User:    lianger  <sexyphp.com>
	 * CrDt:	2016-06-02
	 * UpDt:
	 */
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