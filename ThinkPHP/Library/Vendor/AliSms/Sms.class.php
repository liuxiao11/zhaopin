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


	/**
	 * Text:	发货提示
	 * Desc:	您的订单已发货，物流单号为${code},详细物流信息可在商城订单中心查看，请留意查收您的快递哦！
	 * @param 	$tel	手机号
	 * @param 	$code	物流单号
	 * @return 	bool
	 * User:    lianger  <sexyphp.com>
	 * CrDt:	2016-06-12
	 * UpDt:
	 */
	public static  function sendOutDelivery($tel, $code){
		try{
			$sms = new TaobaoSms();
            $param = '{"product":"唯众良品","code":"'.$code.'","logistics_co":"申通快递"}';
			$resp = $sms->send($tel, '唯众良品', 'SMS_10640719', $param);
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
			Log::write('发货提示异常'.print_r($e));
		}
	}

    public static  function sendcuifukuan($tel){
        try{
            $sms = new TaobaoSms();
            $param = '{}';
            $resp = $sms->send($tel, '唯众良品', 'SMS_18330306', $param);
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
            Log::write('发货提示异常'.print_r($e));
        }
    }

	/**
	 * Text:	退货提示
	 * Desc:	顾客退货提示：订单号${order}已申请退货，请留意查看，避免重复发货哦
	 * @param 	$tel	手机号
	 * @param 	$code	物流单号
	 * @return 	bool
	 * User:    lianger  <sexyphp.com>
	 * CrDt:	2016-06-12
	 * UpDt:
	 */
	public static  function sendQuitGoods($tel, $order){
		try{
			$sms = new TaobaoSms();
			$param = '{"product":"唯众良品","order":"'.$order.'"}';
			$resp = $sms->send($tel, '唯众良品', 'SMS_10610660', $param);
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
			Log::write('退货提示异常'.print_r($e));
		}
	}




	/**
	 * Text:	退款提示
	 * Desc:	尊敬的${name},您申请的退款已原路返回到您的账户上，请留意查收。
	 * @param 	$tel	手机号
	 * @param 	$code	物流单号
	 * @return 	bool
	 * User:    lianger  <sexyphp.com>
	 * CrDt:	2016-06-12
	 * UpDt:
	 */
	public static  function sendQuitMoney($tel, $name){
		try{
			$sms = new TaobaoSms();
			$param = '{"product":"唯众良品","name":"'.$name.'"}';
			$resp = $sms->send($tel, '唯众良品', 'SMS_10655725', $param);
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
			Log::write('退款提示异常'.print_r($e));
		}
	}




	/**
	 * Text:	用户反馈提示
	 * Desc:	最新接到用户反馈意见，请到后台系统留意查看，并请及时给予顾客回复哦！
	 * @param 	$tel	手机号
	 * @param 	$code	物流单号
	 * @return 	bool
	 * User:    lianger  <sexyphp.com>
	 * CrDt:	2016-06-12
	 * UpDt:
	 */
	public static  function sendUserFeedback($tel){
		try{
			$sms = new TaobaoSms();
			$param = '{"product":"唯众良品"}';
			$resp = $sms->send($tel, '唯众良品', 'SMS_10675645', $param);
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
			Log::write('退款提示异常'.print_r($e));
		}
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
