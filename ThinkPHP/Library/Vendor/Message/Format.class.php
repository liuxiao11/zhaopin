<?php
// +----------------------------------------------------------------------
// | Easemob for PHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) http://huhuo.net
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: swift <swift_0606@163.com>
// +----------------------------------------------------------------------
/**
 * 环信-服务器端REST API
 * @author    swift <swift_0606@163.com>
 */
namespace Vendor\Message;
class Format{
	
	private $fromer;
	private $logo;
	public  $extension;
	/**
	 * 服务大使身份更新
	 * @param $param['fromer']
	 * @param $param['logo']	
	 */
	public function _initialize($param=array()){
		
		$this->fromer=$param['fromer']?$param['fromer']:'唯众良品';
		$this->logo=$param['logo']?$param['logo']:'/upload/default/_logo.png';
		
	}
	
	
	/**
	 * 服务大使身份更新
	 *
	 * @param array $options   
	 * @param $options['push_id']    	
	 * @param $options['and_version'] 
	 * @param $options['ios_version']
	 * @param $options['content']
	 * @param $options['status']	申请服务大使成功:"on"	 失败:"off" 禁止申请:"ban" 重新申请:"none"	
	 */
	public function server_text($options=array()){
		
		$ext['fromer']=$this->fromer;
		$ext['logo']=$this->logo;
		
		$ext['push_id']=$options['push_id']?$options['push_id']:'0';
		$ext['time']=time();
		$ext['and_version']=$options['and_version']?$options['and_version']:'0';
		$ext['ios_version']=$options['ios_version']?$options['ios_version']:'0';
		$ext['state']='1';  	//0 普通 	 1.服务大使身份变更  2.强制更新  3.兼顾
		$ext['category']='0';		//0.文本  1.单图文  2.多图文
		//$ext['body']=array();
		$ext['body'][0]['img']='';
		$ext['body'][0]['text']='';
		$ext['body'][0]['action']='0';
		$ext['body'][0]['param']='0'; 
		
		$ext['content']=$options['content']?$options['content']:'';
		$ext['status']=$options['status']?$options['status']:'off';
		$extension['data']=$ext;
		$this->extension=$extension;
		return $this;
	}
	
	/**
	 * 提示更新/强制更新
	 * @param array $options   
	 * @param $options['push_id']    	
	 * @param $options['and_version'] 
	 * @param $options['ios_version']
	 * @param $options['content']		
	 */
	public function update_text($options=array()){
		
		$ext['fromer']=$this->fromer;
		$ext['logo']=$this->logo;
		
		$ext['push_id']=$options['push_id']?$options['push_id']:'0';
		$ext['time']=time();
		$ext['and_version']=$options['and_version']?$options['and_version']:'0';
		$ext['ios_version']=$options['ios_version']?$options['ios_version']:'0';
		
		$ext['state']='2';  	//0 普通 	 1.服务大使身份变更  2.强制更新  3.兼顾
		$ext['category']='0';		//0.文本  1.单图文  2.多图文
		$ext['body'][0]['img']='';
		$ext['body'][0]['text']='';
		$ext['body'][0]['action']='6';
		$ext['body'][0]['param']=''; 
				
		$ext['content']=$options['content']?$options['content']:'当前版本较低，可能会影响部分功能，请尽快更新新版本！';
		$extension['data']=$ext;		
		$this->extension=$extension;
		return $this;
	}
	
	
	/**
	 * 文本消息
	 * @param array $options   
	 * @param $options['push_id']    	
	 * @param $options['and_version'] 
	 * @param $options['ios_version']
	 * @param $options['content']	//文本内容
	 * @param $options['action']	//0.无动作	1. 链接	2. 商品	3. 订单	4.物流	5.用户     6.检查更新    7.服务大使订单    8.退款
	 * @param $options['param']	    //对应操作参数
	 */
	public function text($options=array()){
		
		$ext['fromer']=$this->fromer;
		$ext['logo']=$this->logo;
		
		$ext['push_id']=$options['push_id']?$options['push_id']:'0';
		$ext['time']=time();
		$ext['and_version']=$options['and_version']?$options['and_version']:'0';
		$ext['ios_version']=$options['ios_version']?$options['ios_version']:'0';
		$ext['state']='0';  		//0 普通 	 1.服务大使身份变更  2.强制更新  3.兼顾
		$ext['category']='0';		//0.文本  1.单图文  2.多图文
		$ext['content']=$options['content']?$options['content']:'你好! ^^ ';
		
		$ext['body'][0]['img']='';
		$ext['body'][0]['text']='';
		$ext['body'][0]['action']=$options['action']?$options['action']:'0';
		$ext['body'][0]['param']=$options['param']?$options['param']:'0';
		
		$extension['data']=$ext;
		$this->extension=$extension;
		return $this;
	}
	
	/**
	 * 单图文消息
	 * @param array $options   
	 * @param $options['push_id']    	
	 * @param $options['and_version'] 
	 * @param $options['ios_version']
	 * @param $options['img']	
	 * @param $options['text']	
	 * @param $options['action']	//0.无动作	1. 链接	2. 商品	3. 订单	4.物流	5.用户     6.检查更新    7.服务大使订单    8.退款
	 * @param $options['param']	   	//参数	
	 */
	public function picture_text($options=array()){
		
		$ext['fromer']=$this->fromer;
		$ext['logo']=$this->logo;
		
		$ext['push_id']=$options['push_id']?$options['push_id']:'0';
		$ext['time']=time();
		$ext['and_version']=$options['and_version']?$options['and_version']:'0';
		$ext['ios_version']=$options['ios_version']?$options['ios_version']:'0';
		$ext['state']='0';  	//0 普通 	 1.服务大使身份变更  2.强制更新  3.兼顾
		$ext['category']='1';		//0.文本  1.单图文  2.多图文
		
		$ext['body'][0]['img']=$options['img']?$options['img']:'';
		$ext['body'][0]['text']=$options['text']?$options['text']:'';
		$ext['body'][0]['action']=$options['action']?$options['action']:'0';	
		$ext['body'][0]['param']=$options['param']?$options['param']:'';
		
		$extension['data']=$ext;
		$this->extension=$extension;
		return $this;
	}
	
	/**
	 * 多图文消息
	 * @param array $options   
	 * @param $options['push_id']    	
	 * @param $options['and_version'] 
	 * @param $options['ios_version']
	 * @param array $options['body']
	 * @param $options['body'][0]['img']	
	 * @param $options['body'][0]['text']	
	 * @param $options['body'][0]['action']	//0.无动作	1. 链接	2. 商品	3. 订单	4.物流	5.用户     6.检查更新    7.服务大使订单    8.退款
	 * @param $options['body'][0]['param']	   	//参数	  		
	 */
	public function multi_picture_text($options=array()){
		
		$ext['fromer']=$this->fromer;
		$ext['logo']=$this->logo;
		
		$ext['push_id']=$options['push_id']?$options['push_id']:'0';
		$ext['time']=time();
		$ext['and_version']=$options['and_version']?$options['and_version']:'0';
		$ext['ios_version']=$options['ios_version']?$options['ios_version']:'0';
		
		$ext['state']='0';  	//0 普通 	 1.服务大使身份变更  2.强制更新  3.兼顾
		$ext['category']='2';		//0.文本  1.单图文  2.多图文
		
		
		$ext['body']=$options['body']?$options['body']:array(array('img'=>'','text'=>'','action'=>'0','param'=>''));
		
		/*$ext['body'][0]['img']='/upload/_banner.png';
		$ext['body'][0]['text']='无动作无动作无动作无动作无动作无动作无动作无动作无动作无动作无动作无动作无动作无动作无动作无动作无动作无动作无动作无动作无动作无动作无动作无动作无动作无动作无动作无动作(多图文)';
		$ext['body'][0]['action']='0';	//0.无动作	1. 链接	2. 商品	3. 订单	4.物流	5.用户     6.检查更新    7.服务大使订单    8.退款
		$ext['body'][0]['param']='http://baidu.com';
		
		$ext['body'][1]['img']='/upload/_banner.png';
		$ext['body'][1]['text']='链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接链接';
		$ext['body'][1]['action']='1';	//0.无动作	1. 链接	2. 商品	3. 订单	4.物流	5.用户     6.检查更新    7.服务大使订单    8.退款
		$ext['body'][1]['param']='http://baidu.com';
		
		$ext['body'][2]['img']='/upload/_banner.png';
		$ext['body'][2]['text']='商品(多图文)';
		$ext['body'][2]['action']='2';	//0.无动作	1. 链接	2. 商品	3. 订单	4.物流	5.用户     6.检查更新    7.服务大使订单    8.退款
		$ext['body'][2]['param']='292';
		
		$ext['body'][3]['img']='/upload/_banner.png';
		$ext['body'][3]['text']='订单(多图文)';
		$ext['body'][3]['action']='3';	//0.无动作	1. 链接	2. 商品	3. 订单	4.物流	5.用户     6.检查更新    7.服务大使订单    8.退款
		$ext['body'][3]['param']='322';
		
		$ext['body'][4]['img']='/upload/_banner.png';
		$ext['body'][4]['text']='物流(多图文)';
		$ext['body'][4]['action']='4';	//0.无动作	1. 链接	2. 商品	3. 订单	4.物流	5.用户     6.检查更新    7.服务大使订单    8.退款
		$ext['body'][4]['param']='123456789';
		
		$ext['body'][5]['img']='/upload/_banner.png';
		$ext['body'][5]['text']='用户(多图文)';
		$ext['body'][5]['action']='5';	//0.无动作	1. 链接	2. 商品	3. 订单	4.物流	5.用户     6.检查更新    7.服务大使订单    8.退款
		$ext['body'][5]['param']='10000005';*/
		
		$extension['data']=$ext;
		$this->extension=$extension;
		return $this;
	}
	

}