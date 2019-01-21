<?php
// +----------------------------------------------------------------------
// | title < 基于Jpush推送接口的封装类   >
// +----------------------------------------------------------------------
// | Spitfire [ Nobody can stop us ! ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015 Weizhongliangpin's EC
// +----------------------------------------------------------------------
// | Licensed ( http://www.weizhongliangpin.com )
// +----------------------------------------------------------------------
// | Author: swift <swift_0606@163.com>
// +----------------------------------------------------------------------
// | Demo: igonre
// | 		
// +----------------------------------------------------------------------
namespace Vendor\Jpush;
require_once dirname(__FILE__).'/vendor/autoload.php';

use JPush\Model as M;
use JPush\JPushClient;
use JPush\JPushLog;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

use JPush\Exception\APIConnectionException;
use JPush\Exception\APIRequestException;

class Push{
	
	
	/* 发送推送信息
	 * $user      array    		推送的用户群       		 eg: array('tag'=>'t1,t2','alias'=>'a1,a2,a3')||'all'
	 * $title     string        推送通知栏显示的标题 
	 * $content   string        推送通知栏显示的内容
	 * $data      array         应用内的数据传输      	 eg: array('k1'=>'v1','k2'=>'v2')
	 * */
	
	public function send($user=array(),$title='唯众良品',$content='欢迎使用唯众良品APP应用，更多惊喜点击访问。',$data=array()){
		//查询Jpush  appkey & mastersecret
		$push=M('push_conf')->field('appkey,mastersecret')->where(array('status'=>'on'))->find();
		
		JPushLog::setLogHandlers(array(new StreamHandler('jpush.log', Logger::DEBUG)));
		$client = new JPushClient($push['appkey'], $push['mastersecret']);
		
		//目标用户tag表示群,alias表示单一用户别名(一个设备只有一个别名，一个别名可以用于多个设备)
		if($user['tag'] && $user['alias']){
			$audience=M\Audience( M\tag( $user['tag'] ),M\alias( $user['alias'] ) );
		}else if( !$user['tag'] && !$user['alias'] ){
			$audience=M\all;
		}else if( $user['tag'] ){
			$audience=M\Audience( M\tag( $user['tag'] ) );
		}else{
			$audience=M\Audience( M\alias( $user['alias'] ) );
		}
		
		try {
		    $result = $client->push()
		        ->setPlatform(M\all)
		        ->setAudience($audience)
        		->setNotification(M\notification(
		            M\android($content, $title), //安卓的(通知栏)
		            M\ios($content, "happy", "+1", true, $data, "Ios8 Category") //苹果的(通知栏&内部应用)
		        ))
		        ->setMessage(M\message('Adroid_data', 'none', 'none', $data )) //安卓的(内部应用)
		        ->send();
				
				$res['status']='1';
				$res['info']='success';
				$res['data']=$result->json;
			    
			} catch (APIRequestException $e) {
				$res['status']='0';
				$res['info']=$e->message;
				$res['data']=$e->json;

			} catch (APIConnectionException $e) {
				$res['status']='0';
				$res['info']=$e->getMessage();
				$res['data']=$e->isResponseTimeout;
			}
			
			return $res;
		
	}
	
	
	
	
	
	
	
}