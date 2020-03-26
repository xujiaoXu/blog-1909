<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016101900723538",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "MIIEowIBAAKCAQEAr8feNB046rKEracOcUPhMtglqPOc4fcJvjcBl+HLPWAep0nZ/zhJIQpxkmKh8OzXvATKRqpZMhdrjueJEBkmUJckqY4ePXNvlvO0vA+ds/WXbd8GbyhujcVdfIhtBuLF/YITjfiVkyLru1pll0iu7riDbssdMkWcZJFL0eBh9GUVS5Z99ImQ9UDcF2RvLNG4LfvOr48NEXTrZZ7mWN4jmTltYSHyZ0yvr6hvPR6Kks6ZeYpVSJ8onZpXBn+3OyvLMwSuKlPBu6yUtXOGXllSbKdyvQcUY6EfMtu/r0wbdEOZxgY2sYQXfPsDKvwAeqbJRDAppQ64dlNja2y0hN0tGQIDAQABAoIBAGZFUSDdB6p1ZwBpu9tmdPXSEEc2Rcaqpn6HHmQxuL/i1rLaIv18z/9rRhy3SiUUh4ga+V0X64FbYvbn+zTkjQhCh9Amoa17Jiebb0Iji8uSTiJcqi+uRHQzqmq0LUreUfdm4N2vDcdnf+OneogEf9Lgg4fIoRoIqi9Q4d4gQJ2h4YIPpkxB7OAD+H7Y8EiQ2/z8Ll2B2u+aaT/qcbwpa9R1k/8du2wox1P18EGcfZUM3j7BjOXdZ1b2ijTMl3n4URUGLoFBq4MVacWtcaSswZEvSWuAFGQXV3WUrXM6GpAKvQZQxs0yqD1CBuIR3G90j4atCOf6YCKmHjCYkymybyECgYEA7/7PtKego0wYVG/fA4bSgLZHuuSIwmTnqXMrTXx0K98f4MdufIMMTwhYXL0ZP+olj2FlQEVIw6DbCkTgcP7I5GaxZApXCgxnWjxfaFcpS4vEIxp0MOQCOkuqgeOtV9jc4cWY4ZKzAgx4XO6e2/7mOotjFmbz+Mt3aYUWNgJzGiUCgYEAu4DJry8gKZpGUpiKI7S0wY9BKsGw2RQ0d7WnG7lHeMuWMijsVjrOLZHHk+gDeItl8hn47xjVUaKsvB35DOi4LJK5qnWZ8BbtKdsDLRD8t8M4Zg3Z9mPk6NFboDiu7rj5TWRG8tDmLrl5la3BlCPEUvk5QHy/76NMOfxQX2wgguUCgYAz8foxBus9DRZjCEfD8qWTWGDUMezr7n057wSbY+mdKVE0DNZ8Or0qSgseH4vciqiQjSsmKxjhxupCIcBWlL8UuKmClr5aHW8tV83qvprgkCLm2i31+xQEXCZOsOHvFrBQab16bY8zTVGsA7X8tgJM/6h1y9jYq+lvvG+fRw50xQKBgCfHmwJfrSMmZ+T+F9Cbdf3atqirjyl+7+K11046cL9f8e2SYRGqSDPCyeTHRHU+ndJPUFDpo9g9+weuFDh45xoNxvYzHQWi144ZuQLGp9cUw9Ji/esYJmh+gkHrxLFA7SNOMv8w8qTXFMR8qKUVMYGo/kyAKvhcXL+wmBymg/9BAoGBANqt/vAB0R0U2OM7AaTbIyAE90XQobImetmUlfxeXQnxHHkRvGRdW2ONq/diuBiddnqlEsCsoEzOGjcDJwBM7ZGFVNeG8JmwkLxZ4v1PNcj9WHi3vKm2w7Rytls/heqEe5OQ/bhk+aSs0MeGEBoz24gpzTNVqrZvxierns1JXm0Z",
		
		//异步通知地址
		'notify_url' => "http://工程公网访问地址/alipay.trade.wap.pay-PHP-UTF-8/notify_url.php",
		
		//同步跳转
		'return_url' => "http://localhost/alipei/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAqe/GoHTDjWwam9DFara+xnbu8bUNH+j3K2fYf9PFruN1nK7X4bBvlmJlQKEwh3Zi39NGHMNjDoPsdFkifBAc1MOPqVaqY68IZOunTxYcy1aLq6keGXadU7huoac1pFRHszANKj3HirSontzsMaM4qg+Khb/GeGiOJ6fV3/VT0D2c0VpiBa4ten1YMSFVUOiSLEkzDQFFbbZ8xTaOAO1KiLhLu4HBtzuiiiA+lvfV16W7MgmnNmotb8GDEofHc+2R20D3ovcVNIm5X7Gp2cxcmJiUd0DBmOqNdO0vCYlzHTDHMfBmeFMTV0CaQn422i+BOHA5KCwoRgqqYvOR3xt8LwIDAQAB",
		
	
);