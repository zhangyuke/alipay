<?php
namespace alipay;
class Config
{
    public static function config()
    {
        return $config = array(
         # appid
        'app_id'=>'2018012502069769',
        # 异步通知地址
        'notify_url'=> "",
        # 同步跳转
        'return_url' => "",
        # 编码格式
        'charset'=>'UTF-8',
        # 签名方式
        'sign_type' => 'RSA2',
        # 支付宝网关
        'gatewayUrl'=>"https://openapi.alipay.com/gateway.do",
        # 商户私钥，您的原始格式RSA私钥
        'merchant_private_key'=>"MIIEowIBAAKCAQEAtCgHsPl59KJXTMeJNQCWwMRQq+lsfHO8ZHzSFK8QunjudQ058fDMNFY28TLZcVKUFAN7Mp90MIW56hvO7bhjjBLhPWAubUnoJCkcLDCQ2+bpoPgRk9719BkNPMoEUGZzunanN6TSHC/LJ8iGdtYtveHaDYuzcTcJZTYCeBrCrQGftuRXbHlUYwgEfPVhqOYKg6U83Y1UltTVOPL+8IRkafp1LRnm8lMlsdjJ2fPrAxu+WpTkM5bVOXxfRTmCedtZMma9EzAJxdnNDdyAD5McFC2G74uS3yxIvXk+uFIyc8MgbkukMzQemu1AeFL+UCrw2GMB6py7DVqM2jPZCo5aVwIDAQABAoIBAQCXikCF/iQ2wkO64vEoM1mbxsaxBMVrnhLvWAuCuIvSvxyeO0TtnYa303mdxA8iArtqZk9AEt6yXho3sbKLRhn+Xnc2oGwNJCjwGeCHz0Zao08MRv7KKrcq39PBuZCNbNCWHW6lILBYY195FHT/C0QowA0ibcvARPJTP24uRxxQV28NHhMaEXiXrtjN9yWwS6F9m8ZAr8Q+RLWzAm2LeYNmYKZOSyPk90owZo0ZTqK8F4NH1eyemAwjSX7CcnTrrLBd3S7hegIyBD5uJB5TOutwXUdsiTAdGTZ7P/XYHDQ2JJXAoacKERj9ij2tDit6vYRF6FjV0NoQKMfyyRnBSZCRAoGBANdhZDkgJHyXzAhNv4gBjqayB4HJxmnLqIp2PUjcdVaC+PjKNCHGFGRWVNvCifClarko+Nh9MBWJbtkCjRXKsP5Wp+1l5tH0qnzbgBDPyi96eEhA+EBlgMMKYS3ttV0+wd4bLokknGAe0DO1FQ3f4J0JQzkXh9WqtsweRKwriHqJAoGBANYiA4maMRUbBb40RbhCBV34m+zKuGahWwlyT4tpT1DsKjRS4QE4u0T3AELs62pBaNIwZrWXJTUFiIsydNAlH/++d9h0jr4Cccc5s03saJXDpv1CuEiy3c/qPfMPtmVFT3Fl6PY0dmWCx+sVk+AUMH5lRk5hTza2Z9jYy5/Sk3XfAoGAURNKRO7CjVwe4+lQdgQQDNPrW4H2/JA7a5PC0hCa4uv+iLilEymbN4IAA5Ghl0LNf9HairPlS9YmMe5x6YgZRESehhDb6KDvJH0EIk/1zhWN/bTnPmZ3J/RaTI20vdsH43Hb/KgZbV1sBmrd+BEUXkjEU1N2QIo4sXGbbCwe/fECgYBQ/Bg+aHR7uPaZEwfzQfTpr2a5TYokNo5JqlPvM+rtfgQQOfAjGCOrV4dfyF7Ylthf9jJCJ2HJBci4bGLFfeT2QkDtOlfqAN6rLGVl6S08xvxW+G7d/9foFH1NefnPn0EGcDaFNx44EhguDsEYlEoq436Nkjv1Q1NPLd8FGQzwHQKBgBgVPpgwf36HXeTfPYGGsblKD3BY0MFy0IXPgap1RAt+2wUSBRZZCqlAN/is3PnHWTfvLgaYDVDp7phu5Hrj3e8zlGEEYhI1MXR2p7jKHjdp6+f55iUcrjSq/QPnAVkSAYk5efjphpHuPh2MnCmHA91utaxHTQd7A4vuGZJyfjX4",
        # 支付宝公钥
        'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEApZTdIc/MzEFyHi2SZaWO+bZvteWOsfXP2yusVh/JGmcnzujad0nkksPu9EiYmKu0DdsqWd5xZM1h7Q89QEAT2b+vkgiGDZqm7wyJBb546Owp+DZ+iG3OMUPwO7vNGwSTnkB8G+eZowVmEWx7WlohDwCH5lHxvT+k4+Gi+kfJVp4gen7mowr1nLkBWDLUpSL3l1cufvF0iW3GZ8SyXHyHzOrPOv92VWup7RmhvdF6J2iZfC/M5KnjxIPLtM9nLMt1rz7bHsjYJodvNvcba92rPy0+nDvHcLTqSfElT0hhj4QrYFRSS5i64AP4KMK/C6OtTmV6GkJYDQqYnzPWVODglwIDAQAB"
        );

    }

}
