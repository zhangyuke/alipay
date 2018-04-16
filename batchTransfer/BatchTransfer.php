<?php
namespace alipay\batchTransfer;
use alipay\batchTransfer\BatchConfig;
use alipay\batchTransfer\AlipaySubmit;
#批量付款到支付宝账号

class BatchTransfer{

	public function action($batch_fee,$batch_num,$detail_data,$batch_number)
	{
      
		$parameter = array(
                  "service" => "batch_trans_notify",
                  "partner" => "2088921958488080",    //合作身份者id，以2088开头的16位纯数字
                  "notify_url"    => 'http://admin.mcwh99.com/home/Alipay/notify_url.html',//$notify_url, //服务器异步通知页面路径
                  "email" => 'gzsmc2018@163.com',//$email, //付款账号
                  "account_name"  => '贵州省国之梦文化传媒有限公司',//$account_name, //付款账户名
                  "pay_date"  => date('Ymd'),//$pay_date, //付款当天日期  必填，格式：年[4位]月[2位]日[2位]，如：20100801
                  "batch_no"  => $batch_number,//$batch_no, //批次号  必填，格式：当天日期[8位]+序列号[3至16位]，如：201008010000001
                  "batch_fee" => $batch_fee, //付款总金额  必填，即参数detail_data的值中所有金额的总和
                  "batch_num" => $batch_num, //付款笔数  必填，即参数detail_data的值中，“|”字符出现的数量加1，最大支持1000笔（即“|”字符出现的数量999个）
                  "detail_data"   => $detail_data, //付款详细数据  必填，格式：流水号1^收款方帐号1^真实姓名^付款金额1^备注说明1|流水号2^收款方帐号2^真实姓名^付款金额2^备注说明2....
                  "_input_charset"    => strtolower('utf-8') //字符集
            );
		$alipay_config = BatchConfig::config();
		//建立请求
		$alipaySubmit = new AlipaySubmit($alipay_config);
		$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
		echo $html_text;
	}

}