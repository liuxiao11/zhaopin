<?php 
namespace Vendor\AliSms;
/*
 * 发送短信工具
 */
use Vendor\AliSms\Taobao\Sms AS TaobaoSms;
use Think\Log;
class Sms {


	 ///////////////// * 淘宝大鱼短信平台
	/*
	 * 用户注册验证码
	 */
	public static  function sendRegisterCode($tel, $code){
		try{
			$sms = new TaobaoSms();
			$param = '{"product":"唯众良品","code":"'.$code.'"}';
			$resp = $sms->send($tel, '唯众良品', 'SMS_5885221', $param);
			//$result = self::xml_to_json($resp);
//			debug($resp);
//			if($result['success']=='true'){
//				return true;
//			}
//			return false;

			$result = (array)$resp->result;
			if($result['success']=='true'){
				return true;
			}
			return false;

		}catch (\Exception $e){
			Log::write('用户注册验证码异常'.print_r($e));
		}
	}




	/*
	 * 模板名称: 下单提示
	 *	模板ID: SMS_7485939
	 *	模板内容:
	 *	亲爱的${name},您的唯众良品交易订单已经支付成功，订单号为${content},小唯将尽快为您发货，祝您购物愉快！
	 */
	public static  function sendTakeDelivery($tel,$out_trade_no){

		try{
			$sms = new TaobaoSms();
			$param = '{"product":"唯众良品","name":"顾客","content":"'.$out_trade_no.'"}';
			$resp = $sms->send($tel, '唯众良品', 'SMS_7485939', $param);
			//$result = self::xml_to_json($resp);
//			debug($resp);
//			if($result['success']=='true'){
//				return true;
//			}
//			return false;

			$result = (array)$resp->result;
			if($result['success']=='true'){
				return true;
			}
			return false;

		}catch (\Exception $e){
			Log::write('下单提示异常'.print_r($e));
		}
	}




	/*
	 * 中奖提醒
	 *
	 */
	public static  function sendWin($tel, $username){
		$sms = new TaobaoSms();
		$param = '{"name":"'.$username.'"}';
		$resp = $sms->send($tel, '夺宝会', 'SMS_2140879', $param);
		$result = (array)$resp->result;
		if($result['success']=='true'){
			return true;
		}
		return false;
	}

	/*
	 * 发货提醒 
	 * @express: 快递公司
	 * @express_number: 快递单号
	 */
	public static  function sendOutDelivery($tel, $username, $express, $express_number){
		//if(!$tel || !$username || $express || !$express_number){
		//	return false;
		//}
		$sms = new TaobaoSms();
		$param = '{"name":"'.$username.'","express":"'.$express.'", "express_number":"'.$express_number.'"}';
		$resp = $sms->send($tel, '夺宝会', 'SMS_2175771', $param);
		$result = (array)$resp->result;
		if($result['success']=='true'){
			return true;
		}
		return false;
	}


	/*
	 * 异常提示信息
	 */
	public static  function sendExceptionMsg($tel, $code){

		$sms = new TaobaoSms();
		$param = '{"product":"夺宝会","code":"'.$code.'"}';
		$resp = $sms->send($tel, '登录验证', 'SMS_2040104', $param);
		$result = (array)$resp->result;
		if($result['success']=='true'){
			return true;
		}

		return false;
	}


	/**
	 * xml转换为json格式
	 *
	 * @param $xmlInfo 传入xml文件或者xml字符串
	 * @return json格式
	 * @author liangfeng@shinc.net
	 */
	public static function xml_to_json($xmlInfo) {
		debug($xmlInfo);
		if(is_file($xmlInfo)){ //传的是文件，还是xml的string的判断
			$xml_array=simplexml_load_file($xmlInfo);
		}else{
			$xml_array=simplexml_load_string($xmlInfo);
		}
		$json = json_encode($xml_array); //php5，以及以上，如果是更早版本，请查看JSON.php
		return $json;
	}

}
