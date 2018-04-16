<?php
namespace alipay; 
use think\Exception;
use alipay\Config;
use alipay\lib\AopClient;
use alipay\lib\AlipayTradeService;
use alipay\lib\AlipayTradeRefundRequest;
use alipay\lib\AlipayTradeWapPayContentBuilder;
use alipay\lib\AlipayFundTransToaccountTransferRequest;
class Test{

    public function webPay(){             //支付宝支付
    	# 获取订单信息
    	$config = Config::config();
        $out_trade_no = '151313515135123135';	//商户网站唯一订单号
        $body ='测试商品' ;	//对一笔交易的具体描述信息。如果是多种商品，请将商品描述字符串累加传给body。
        $subject ='季利亚平台';  // 商品的标题/交易标题/订单标题/订单关键字等
        $total_amount = 0.01;  	//订单总金额，单位为元，精确到小数点后两位，取值范围[0.01,100000000]
        $timeout_express = '1m'; //该笔订单允许的最晚付款时间，逾期将关闭交易。取值范围：1m～15d。m-分钟，h-小时，d-天

        $payRequestBuilder =new AlipayTradeWapPayContentBuilder();
        $payRequestBuilder->setBody($body);
        $payRequestBuilder->setSubject($subject);
        $payRequestBuilder->setOutTradeNo($out_trade_no);
        $payRequestBuilder->setTotalAmount($total_amount);
        $payRequestBuilder->setTimeExpress($timeout_express);
        $payResponse = new AlipayTradeService($config);	//注入配置,创建统一下单
        $payResponse->wapPay($payRequestBuilder,$config['return_url'],$config['notify_url']);

    }

    public function Withdraw($id){ //支付宝转账

        $config = Config::config();
        $aop = new AopClient ($config);
        $aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
        $aop->appId = $config['app_id'];
        $aop->rsaPrivateKey = $config['merchant_private_key'];
        $aop->alipayrsaPublicKey=$config['alipay_public_key'];
        $aop->apiVersion = '1.0';
        $aop->signType = 'RSA2';
        $aop->postCharset='UTF-8';
        $aop->format='json';
        #查询用户提现数据 <---->


        $out_biz_no = '151351351531';	//	商户转账唯一订单号。发起转账来源方定义的转账单据ID，用于将转账回执通知给来源方
        $payee_account = '18000000000';	// 提现账号
        $txmoney = 0.01;	//	提现金额
        $payer_show_name = ""; //收款方真实姓名（最长支持100个英文/50个汉字）。 如果本参数不为空，则会校验该账户在支付宝登记的实名是否与收款方真实姓名一致。
        $remark = "备注";
        $request = new AlipayFundTransToaccountTransferRequest();
        $request->setBizContent("{" .
            "\"out_biz_no\":\"".$out_biz_no."\"," .
            "\"payee_type\":\"ALIPAY_LOGONID\"," .
            "\"payee_account\":\"".$payee_account."\"," .
            "\"amount\":\"".$txmoney."\"," .
            "\"payer_show_name\":\"" .$payer_show_name. "\"," .
            "\"payee_real_name\":\"\"," .
            "\"remark\":\"" .$remark. "\"" .
            "  }");
        $result = $aop->execute ( $request );
        $responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";
        $resultCode = $result->$responseNode->code;
        if(!empty($resultCode) && $resultCode == 10000){
            return true;
        } else {
            throw new Exception("$result->$responseNode->sub_msg", 1);
        }
    }


    #退款
    #退款订单号  $order_num
    public function refund($order_num='')
    {

        $returnMoney = 0.01;    //退款金额
        $config = Config::config();
        $aop = new AopClient ();
        $aop->appId =  $config['app_id'];
        $aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
        $aop->rsaPrivateKey = $config['merchant_private_key'];
        $aop->alipayrsaPublicKey=$config['alipay_public_key'];
        $aop->apiVersion = '1.0';
        $aop->signType = 'RSA2';
        $aop->postCharset='UTF-8';
        $aop->format='json';
        $request = new AlipayTradeRefundRequest();
        $request->setBizContent("{" .
        "\"out_trade_no\":\"$order_num\"," .
        "\"refund_amount\":\"$returnMoney\"," .
        "\"refund_reason\":\"正常退款\"," .
        "\"out_request_no\":\"$order_num\"" .
        "  }");
        $result = $aop->execute ( $request); 
        $responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";
        if(!empty($result->$responseNode->code) && $result->$responseNode->code == '10000'){
            // return json(['code'=>1,'msg'=>'退款成功'])->send(); 
        } else {
            // return json(['code'=>-2,'msg'=>$result->$responseNode->sub_msg])->send(); 
            throw new Exception("$result->$responseNode->sub_msg", 1);
        }
    }

    public static function toArray($data)
    {
        dump(json_decode(json_encode($data),true));
    }
}
