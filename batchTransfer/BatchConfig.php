<?php
namespace alipay\batchTransfer;

class BatchConfig
{

    public static function config()
    {
        return $config = [
            //合作身份者id，以2088开头的16位纯数字
            'partner'      => '2088921958488080',
            //安全检验码，以数字和字母组成的32位字符
            'key'          => 'ralbc35s8oatojuxxwf1ka3ufclpdngz',
            //签名方式 不需修改 
            'sign_type'    => strtoupper('MD5'), //strtoupper('RSA2'),   
            //字符编码格式 目前支持 gbk 或 utf-8
            'input_charset'=> strtolower('utf-8'),
            //ca证书路径地址，用于curl中ssl校验
            //请保证cacert.pem文件在当前文件夹目录中
            'cacert'    => getcwd().'..'.DIRECTORY_SEPARATOR.'/extend/alipay/cert'.DIRECTORY_SEPARATOR .'\\cacert.pem',
            //'cacert'    => getcwd().DIRECTORY_SEPARATOR.'cacert.pem',
            //访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
            'transport'    => 'http'
        ];
    }
}