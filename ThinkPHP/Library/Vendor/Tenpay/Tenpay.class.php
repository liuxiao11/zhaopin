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
 * 微信APP支付类
 * @author    swift <swift_0606@163.com>
 */
namespace Vendor\Tenpay;

class Tenpay{


	/**
	 * 初始化 微信APP支付 配置(默认APP支付)
	 * @author swift <swift_0606@163.com>
	 */
  	public function __construct($pay_type='APP',$notify_url=''){
  		$this->uri='https://api.mch.weixin.qq.com/pay/unifiedorder'; //统一下单
  		$this->pay_type=$pay_type;
        $web_info = M('web_config')
            ->field('id,values')
            ->where(array('id'=>1))
            ->find();
        $save_info['values'] = $web_info['values'] + 1;
        M('web_config')
            ->where(array('id'=>1))
            ->save($save_info);
  		//配置微信支付的参数
		if($this->pay_type=='APP'){
			//APP
			//账号	2060669562@qq.com
	  		$this->appid = 'wx5eac2fcc8c9e022e';  //微信开放平台  appid
			$this->appsecret = '8a23f77af580112a7c3ae172f55c001c'; //微信开放平台  appsecret
			$this->mchid = '1241288302';  //微信商户平台 id
			$this->key = '818056dbd7e201243206b9c7cd88481c'; //微信商户平台  api秘钥  md5('swift')
			//$this->notify_url=rtrim(HOST,'/').'/api/shopII/tenpay_notify';  //异步通知
			$this->notify_url=$notify_url?$notify_url:rtrim(HOST,'/').'/api2/shop/tenpay_notify';  //异步通知
		}else{
			//JSAPI
			/*$this->appid = 'wxb23a795e3a115132';  //微信开放平台  appid
			$this->appsecret = '686122d8e48c0fbec5571946a459aaed'; //微信开放平台  appsecret
			$this->mchid = '1219320701';  //微信商户平台 id
			$this->key = '818056dbd7e201243206b9c7cd88481c'; //微信商户平台  api秘钥  md5('swift')
			$this->notify_url=rtrim(HOST,'/').'/mobile/pay/tenpay_notify';  //异步通知*/
//			$this->appid = 'wx46e26bbe47f35fb4';  //微信开放平台  appid
//			$this->appsecret = '683409b3ea9c9a5faf3ca42436782c54'; //微信开放平台  appsecret
//			$this->mchid = '1304249601';  //微信商户平台 id
//			$this->key = '818056dbd7e201243206b9c7cd88481c'; //微信商户平台  api秘钥  md5('swift')
			//$this->notify_url=$notify_url?$notify_url:rtrim(HOST,'/').'/mobile/pay/tenpay_notify';
//			$this->notify_url=$notify_url?$notify_url:rtrim(HOST,'/').'/mobile2/pay/tenpay_notify';


            $this->appid = 'wxb23a795e3a115132';  //微信开放平台  appid
            $this->appsecret = '686122d8e48c0fbec5571946a459aaed'; //微信开放平台  appsecret
            $this->mchid = '1219320701';  //微信商户平台 id
            $this->key = '818056dbd7e201243206b9c7cd88481c'; //微信商户平台  api秘钥  md5('swift')
            $this->notify_url=$notify_url?$notify_url:rtrim(HOST,'/').'/mobile2/pay/tenpay_notify';



//          测试
            $this->test_appid = 'wx73cbde76543fb106';  //微信开放平台  appid
            $this->test_appsecret = 'ce4f3c51eae7dd3e29699f9cdf032bef'; //微信开放平台  appsecret
            $this->test_mchid = '1435150602';  //微信商户平台 id
            $this->test_key = '686122d8e48c0fbec5571946a459asdf'; //微信商户平台  api秘钥  md5('swift')
		}


  	}


	/**
	 * 微信支付-预支付订单
	 * @author swift <swift_0606@163.com>
	 */
	public function getprepay($body,$out_trade_no,$total_fee){

		$nonce_str=md5(time().mt_rand(100000, 999999)); //随机生成 32字符内
		$spbill_create_ip=$_SERVER['SERVER_ADDR']; //支付ip  REMOTE_ADDR

		//微信支付 APP,JSAPI
		$order['appid']=$this->appid;
		$order['body']=$body;
		$order['fee_type']='CNY';
		$order['mch_id']=$this->mchid;
		$order['nonce_str']=$nonce_str;
		$order['notify_url']=$this->notify_url;
		if($this->pay_type=='JSAPI'){
			$order['openid']=$this->get_openid();
		}
		$order['out_trade_no']=$out_trade_no;
		$order['spbill_create_ip']=$spbill_create_ip;
		$order['total_fee']=$total_fee;
		$order['trade_type']=$this->pay_type;
		$order['sign']=$this->MakeSign($order);
		//转换成xml格式
		$xml_data=$this->ToXml($order);
		//发送curl并回调结果
		$prepay_xml=$this->SendCurl($this->uri,$xml_data);


		if($this->pay_type=='JSAPI'){
			//解析微信支付xml数据
			$postObj = simplexml_load_string($prepay_xml, 'SimpleXMLElement', LIBXML_NOCDATA);
			$return=(array)$postObj;
			//var_dump($arr);
			$parameters = json_encode($this->jsapiParams($return));

			return $parameters;
		}else{
			return 	$prepay_xml;
		}

	}

    public function getprepay_test($body,$out_trade_no,$total_fee){
        $nonce_str=md5(time().mt_rand(100000, 999999)); //随机生成 32字符内
        $spbill_create_ip=$_SERVER['SERVER_ADDR']; //支付ip  REMOTE_ADDR

        //微信支付 APP,JSAPI
        $order['appid']=$this->test_appid;
        $order['body']=$body;
        $order['fee_type']='CNY';
        $order['mch_id']=$this->test_mchid;
        $order['nonce_str']=$nonce_str;
        $order['notify_url']=$this->notify_url;
        if($this->pay_type=='JSAPI'){
            $order['openid']=$this->get_openid_test();
        }
        dd($order);
    }

	/**
	 * JSAPI 发起微信-支付请求参数
	 */
	public function jsapiParams($return){

		$arr['appId']=$return['appid'];
		$arr['timeStamp']=''.time();
		$arr['nonceStr']=md5(time().mt_rand(100000, 999999));;
		$arr['package']='prepay_id='.$return['prepay_id'];
		$arr['signType']='MD5';
		$arr['paySign']=$this->MakeSign($arr);
		return $arr;

	}


	/**
	 * 格式化参数格式化成url参数
	 */
	public function ToUrlParams($arr){
		$buff = "";
		foreach ($arr as $k => $v)
		{
			if($k != "sign" && $v != "" && !is_array($v)){
				$buff .= $k . "=" . $v . "&";
			}
		}

		$buff = trim($buff, "&");
		return $buff;
	}


	/**
	 * 输出xml字符
	 * @throws WxPayException
	**/
	public function ToXml($arr){

    	$xml = "<xml>";
    	foreach ($arr as $key=>$val)
    	{
    		if (is_numeric($val)){
    			$xml.="<".$key.">".$val."</".$key.">";
    		}else{
    			$xml.="<".$key."><![CDATA[".$val."]]></".$key.">";
    		}
        }
        $xml.="</xml>";
        return $xml;
	}

	/**
	 * 生成签名
	 * @return 签名，本函数不覆盖sign成员变量，如要设置签名需要调用SetSign方法赋值
	 */
	public function MakeSign($arr){
		//签名步骤一：按字典序排序参数
		ksort($arr);

		$string = $this->ToUrlParams($arr);
		//签名步骤二：在string后加入KEY
		$string = $string . "&key=".$this->key;
		//签名步骤三：MD5加密
		$string = md5($string);
		//签名步骤四：所有字符转为大写
		$result = strtoupper($string);
		return $result;
	}

	/**
	 * 发送curl请求
	 * @return curl请求的结果
	 */
	public function SendCurl($uri,$xml=''){

		//开启curl
		$ch = curl_init();
		$header[] = "Content-type: text/xml";//定义content-type为xml
		curl_setopt($ch, CURLOPT_URL, $uri);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		$response = curl_exec($ch);

		curl_close($ch);

		return $response;
	}


	/**
	 * 微信    获取微信用户的openid
	 * @return openid
	 */
	 public function get_openid($scope='snsapi_base'){


	 	//通过code获得openid
		if (!isset($_GET['code'])){
			//触发微信返回code码
			$baseUrl = urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
			$url = $this->__CreateOauthUrlForCode(strtolower($baseUrl),$scope);
			Header("Location: $url");
			exit();
		} else {
			//获取code码，以获取openid
		    $code = $_GET['code'];
			$openid = $this->GetOpenidFromMp($code);
			return $openid;
		}

		return $openId;
	 }

    /**
     * 微信    获取微信用户的openid
     * @return openid
     */
    public function get_openid_test($scope='snsapi_base'){


        //通过code获得openid
        if (!isset($_GET['code'])){
            //触发微信返回code码
            $baseUrl = urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
            $url = $this->__CreateOauthUrlForCode_test(strtolower($baseUrl),$scope);
            Header("Location: $url");
            exit();
        } else {
            //获取code码，以获取openid
            $code = $_GET['code'];
            $openid = $this->GetOpenidFromMp($code);
            return $openid;
        }

        return $openId;
    }


	/**
	 *
	 * 构造获取open和access_toke的url地址
	 * @param string $code，微信跳转带回的code
	 *
	 * @return 请求的url
	 */
	private function __CreateOauthUrlForOpenid($code)
	{
		$urlObj["appid"] = $this->appid;
		$urlObj["secret"] = $this->appsecret;
		$urlObj["code"] = $code;
		$urlObj["grant_type"] = "authorization_code";
		$bizString = $this->ToUrlParams($urlObj);
		return "https://api.weixin.qq.com/sns/oauth2/access_token?".$bizString;
	}


	/**
	 *
	 * 构造获取code的url连接
	 * @param string $redirectUrl 微信服务器回跳的url，需要url编码
	 *
	 * @return 返回构造好的url
	 */
	private function __CreateOauthUrlForCode($redirectUrl,$scope)
	{
		$urlObj["appid"] = $this->appid;
		$urlObj["redirect_uri"] = "$redirectUrl";
		$urlObj["response_type"] = "code";
		$urlObj["scope"] = $scope;
		//$urlObj["scope"] = "snsapi_userinfo";
		$urlObj["state"] = "STATE"."#wechat_redirect";
		$bizString = $this->ToUrlParams($urlObj);

		return "https://open.weixin.qq.com/connect/oauth2/authorize?".$bizString;
	}

    /**
     *
     * 构造获取code的url连接
     * @param string $redirectUrl 微信服务器回跳的url，需要url编码
     *
     * @return 返回构造好的url
     */
    private function __CreateOauthUrlForCode_test($redirectUrl,$scope)
    {
        $urlObj["appid"] = $this->test_appid;
        $urlObj["redirect_uri"] = "$redirectUrl";
        $urlObj["response_type"] = "code";
        $urlObj["scope"] = $scope;
        //$urlObj["scope"] = "snsapi_userinfo";
        $urlObj["state"] = "STATE"."#wechat_redirect";
        $bizString = $this->ToUrlParams($urlObj);

        return "https://open.weixin.qq.com/connect/oauth2/authorize?".$bizString;
    }


	/**
	 *
	 * 通过code从工作平台获取openid机器access_token
	 * @param string $code 微信跳转回来带上的code
	 *
	 * @return openid
	 */
	public function GetOpenidFromMp($code)
	{
		$url = $this->__CreateOauthUrlForOpenid($code);
		$res=$this->SendCurl($url);
		//取出openid
		$data = json_decode($res,true);
		$openid = $data['openid'];
		//echo $openid.'<br>';
		return $openid;
	}



	/**
	 *
	 * 获取用户微信资料
	 * @return access_token
	 */
	public function getUserInfo() {
		//snsapi_userinfo snsapi_base
		$openid=$this->get_openid();
		$access_token=$this->getToken();
		$url='https://api.weixin.qq.com/cgi-bin/user/info';
		$url.='?access_token='.$access_token;
		$url.='&openid='.$openid.'&lang=zh_CN';

		$res=$this->SendCurl($url);
		return json_decode($res,true);
	}

	/**
	 *
	 * 获取access_token
	 * @return access_token
	 */
	public function getToken() {
		$file=dirname(__FILE__)."/access_token.txt";
		$url='https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential';
		$url.='&appid='.$this->appid;
		$url.='&secret='.$this->appsecret;

		$fp = @fopen ( $file, 'r' );
		if ($fp) {
			$arr = unserialize ( fgets ( $fp ) );
			if ($arr ['expires_in'] < time ()) {
				$result = $this->SendCurl ( $url );
				$result = json_decode($result,true);
				$result ['expires_in'] = $result ['expires_in'] + time ();
				$fp = @fopen ( $file, 'w' );
				@fwrite ( $fp, serialize ( $result ) );
				fclose ( $fp );
				return $result ['access_token'];
			}
			fclose ( $fp );
			return $arr ['access_token'];
		}

		$result = $this->SendCurl ( $url);
		$result = json_decode($result,true);
		$result ['expires_in'] = $result ['expires_in'] + time ();
		$fp = @fopen ( $file , 'w' );
		@fwrite ( $fp, serialize ( $result ) );
		fclose ( $fp );
		return $result ['access_token'];
	}



}
