<?php
/* *
 * 功能：支付宝服务器异步通知页面
 * 版本：3.3
 * 日期：2012-07-23
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。


 *************************页面功能说明*************************
 * 创建该页面文件时，请留心该页面文件中无任何HTML代码及空格。
 * 该页面不能在本机电脑测试，请到服务器上做测试。请确保外部可以访问该页面。
 * 该页面调试工具请使用写文本函数logResult，该函数已被默认关闭，见alipay_notify_class.php中的函数verifyNotify
 * 如果没有收到该页面返回的 success 信息，支付宝会在24小时内按一定的时间策略重发通知
 */
namespace Vendor\Alipay;
use Vendor\Alipay\Alipay_notify;

//require_once("alipay.config.php");
require_once("lib/alipay_notify.class.php");
require_once("lib/alipay_submit.class.php");

class Alipay{
	
	public function __construct(){
		//↓↓↓↓↓↓↓↓↓↓请在这里配置您的基本信息↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
		//合作身份者id，以2088开头的16位纯数字
		$this->alipay_config['partner']		= '2088302040077456';
		//商户的私钥（后缀是.pen）文件相对路径
		$this->alipay_config['private_key_path']	= str_replace('\\', '/', dirname(__FILE__)).'/key/rsa_private_key.pem';
		//支付宝公钥（后缀是.pen）文件相对路径
		$this->alipay_config['ali_public_key_path']= str_replace('\\', '/', dirname(__FILE__)).'/key/alipay_public_key.pem';
		//↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
		//签名方式 不需修改
		$this->alipay_config['sign_type']    = strtoupper('RSA');
		//字符编码格式 目前支持 gbk 或 utf-8
		$this->alipay_config['input_charset']= strtolower('utf-8');
		//ca证书路径地址，用于curl中ssl校验
		//请保证cacert.pem文件在当前文件夹目录中
		$this->alipay_config['cacert']    = str_replace('\\', '/', dirname(__FILE__)).'/cacert.pem';
		//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
		$this->alipay_config['transport']    = 'http';
		
	}
	
	
	
	/**
 	* 	wap支付宝 支付 
 	* @author  swift <swift_0606@163.com>
	*/
	public function pay($body,$out_trade_no,$total_fee){
		
		//构造要请求的参数数组，无需改动
		$parameter = array(
				"service" => "alipay.wap.create.direct.pay.by.user",
				"partner" => trim($this->alipay_config['partner']),
				"seller_id" => trim($this->alipay_config['partner']),
				"payment_type"	=> '1',

				"notify_url"	=> 'http://www.ainongtian.com/Mobile/Pay/alipay_notify',
				"return_url"	=> 'http://www.ainongtian.com/Mobile/Alist/index',

				"out_trade_no"	=> $out_trade_no,
				"subject"	=> '测试一下',
				"total_fee"	=> $total_fee,
				"show_url"	=> '',
				"body"	=> $body,
				"it_b_pay"	=> '',
				"extern_token"	=> '',
				"_input_charset"	=> trim(strtolower($this->alipay_config['input_charset']))
		);
		
		//建立请求
		$alipaySubmit = new Alipay_submit\AlipaySubmit($this->alipay_config);
		$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
		
		echo $html_text;
		
		
	}
	
	
	
	/**
 	* 移动支付 目前不用写..
 	* @author  swift <swift_0606@163.com>
	*/
	public function notify(){
		//var_dump(is_file($this->alipay_config['cacert']));
		//p($this->alipay_config);
		//计算得出通知验证结果
		$alipayNotify = new Alipay_notify\AlipayNotify($this->alipay_config);
		$verify_result = $alipayNotify->verifyNotify();
		return $verify_result;
	}
	


	

}