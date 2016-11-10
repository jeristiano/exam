<?php

require_once "lib/include/alipay.func.php";
require_once "lib/include/alipay_submit.class.php";
require_once "lib/include/alipay_notify.class.php";

class alipay
{
	public $G;

	public $config = array();

	private $table;

    public function __construct()
    {
    	$this->setDefaultConfig();
    }

    private function setDefaultConfig()
    {
    	$this->config['partner'] = '2088202660912640';
		//安全检验码，以数字和字母组成的32位字符
		$this->config['key'] = 'ibojap3s7a7nm3v9t9i4zc18j9s9can2';
		//签名方式 不需修改
		$this->config['sign_type'] = strtoupper('MD5');
		//字符编码格式 目前支持 gbk 或 utf-8
		$this->config['input_charset'] = strtolower('utf-8');
		//ca证书路径地址，用于curl中ssl校验
		$this->config['cacert'] = 'cacert.pem';
		//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
		$this->config['transport'] = 'http';
		//支付宝收款帐号
		$this->config['account'] = 'lzjwql814@tom.com';
    }

    public function setConfig($config)
    {
    	foreach($config as $key => $v)
    	$this->config[$key] = $v;
    }

    public function alireturn()
    {
    	$alinotify = new AlipayNotify($this->config);
    	return $alinotify->verifyReturn();
    }

    public function alinotify()
    {
    	$alinotify = new AlipayNotify($this->config);
    	return $alinotify->verifyNotify();
    }

    public function outPayForUrl($order,$notify_url,$return_url)
    {
    	$alipaySubmit = new AlipaySubmit($this->config);
    	//支付类型
        $payment_type = "1";

        //卖家支付宝帐户
        $seller_email = $this->config['account'];
        //必填
        //商户订单号
        $out_trade_no = $order['ordersn'];
        //商户网站订单系统中唯一订单号，必填

        //订单名称
        $subject = $order['ordertitle'];
        //必填

        //付款金额
        $total_fee = $order['orderprice'];
        //必填

        //订单描述
        $body = $order['orderdescribe'];
        //商品展示地址
        $show_url = 'index.php?item-app-order&ordersn='.$order['ordersn'];;
        //需以http://开头的完整路径，例如：http://www.xxx.com/myorder.html

        //防钓鱼时间戳
        $anti_phishing_key = "";
        //若要使用请调用类文件submit中的query_timestamp函数

        //客户端的IP地址
        $exter_invoke_ip = "";
        //非局域网的外网IP地址，如：221.0.0.1


		//构造要请求的参数数组，无需改动
		$parameter = array(
				"service" => "create_direct_pay_by_user",
				//"service" => "trade_create_by_buyer",
				"partner" => trim($this->config['partner']),
				"payment_type"	=> $payment_type,
				"notify_url"	=> $notify_url,
				"return_url"	=> $return_url,
				"seller_email"	=> $seller_email,
				"out_trade_no"	=> $out_trade_no,
				"subject"	=> $subject,
				"logistics_type" => 'EXPRESS',
				"logistics_fee" => 0,
				"logistics_payment" => 'SELLER_PAY',
				//"total_fee"	=> $total_fee,
				"price" => $total_fee,
				"quantity" => 1,
				"body"	=> $body,
				"show_url"	=> $show_url,
				"anti_phishing_key"	=> $anti_phishing_key,
				"exter_invoke_ip"	=> $exter_invoke_ip,
				"_input_charset"	=> trim(strtolower($this->config['input_charset']))
		);
		$url = $alipaySubmit->alipay_gateway_new.$alipaySubmit->buildRequestParaToString($parameter);
		unset($alipaySubmit);
		return $url;
    }
}

?>