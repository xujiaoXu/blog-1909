<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// 模型
use App\IndexRegister;

// 短信
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
// 邮箱
use App\Mail\SendCode;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    //登录
    public function denglu(){
    	return view('index.login');
    }
    // 注册
      public function zhuce(){
    	return view('index.reg');
    }
      public function doRegister(){
      	 $all=request()->all();
        // dd($all);
        $telInfo=session('telInfo');
        // dd($telInfo);
        $where=[
            ["name","=",$all["name"]]
        ];
        $count = IndexRegister::where($where)->count();
        // echo $count;exit; 
        if($count>0){
    	 $this->fail('该手机号已被注册');
        }
        // 验证验证码
        if(empty($all["code"])){
    	 $this->fail('验证码不能为空');
        }else if($telInfo!=$all["code"]){
    	 $this->fail('验证码有误');
        }
        // 验证密码
        $pwd_reg="/^\w{6,16}$/";
        if(empty($all["password"])){
    	 $this->fail('密码不能为空');

           
        }else if(!preg_match($pwd_reg,$all["password"])){
    	 $this->fail('密码必须是由数字,字母,下划线组成6-16位');

        }
        //验证确认密码
        if($all['repassword']!=$all['password']){
    	 $this->fail('密码不一致');

        }
        //密码加密
        $all["password"]=encrypt($all['password']);
        // dd($all['password']);
        $all=request()->except(['code','repassword','_token']);
         // 时间处理
        $all["user_time"]=time();
        // dd($all);
        $res = IndexRegister::insert($all);
        // dump($res);
        if($res){
            $this->success('注册成功');
        }
      }

 //登录执行
    public function log_do(){
        // echo 'asd';exit;
        $name=request()->name;
        $password=request()->password;
        $res=IndexRegister::where('name',$name)->first();
        // dump($res);
        if($res){
            if($res->password!=$password){
                fail('账号或密码错误');
            }else{

              session(['user'=>$res]);
              request()->session()->save();
              $this->success('登录成功');

            }
        }else{
            fail('账号或密码错误');
        }
 
    }


    public function sendSMS(){
    	$name = request()->name;
    	// php 验证手机号
    	$reg = '/^1[3|5|6|7|8|9]\d{9}$/';
    	if(!preg_match($reg,$name)){
    	return json_encode(['code'=>'00001','msg'=>'请输入正确的手机号或者邮箱']);
    	}
    	$code=rand(100000,999999);
    	$result = $this->send($name,$code);
    	// 发送成功
    	if($result['Message']=='OK'){
    		session(['telInfo' => $code]);
    	    return json_encode(['code'=>'00000','msg'=>'发送成功']);
    	}
    	// 发送失败
    	return json_encode(['code'=>'00000','msg'=>$result['Message']]);

    }
    // 发送验证码 

    public function send($name,$code){


		// Download：https://github.com/aliyun/openapi-sdk-php
		// Usage：https://github.com/aliyun/openapi-sdk-php/blob/master/README.md

		AlibabaCloud::accessKeyClient('LTAI4Fcg3nzXSjq5SdPrCc5o', 'pNzuR7C6WTeEylELwRD3G1In6j0o8N')
		                        ->regionId('cn-hangzhou')
		                        ->asDefaultClient();

		try {
		    $result = AlibabaCloud::rpc()
		                          ->product('Dysmsapi')
		                          // ->scheme('https') // https | http
		                          ->version('2017-05-25')
		                          ->action('SendSms')
		                          ->method('POST')
		                          ->host('dysmsapi.aliyuncs.com')
		                          ->options([
		                                        'query' => [
		                                          'RegionId' => "cn-hangzhou",
		                                          'PhoneNumbers' => $name,
		                                          'SignName' => "乐柠教育",
		                                          'TemplateCode' => "SMS_183241266",
		                                          'TemplateParam' => "{code:$code}",
		                                        ],
		                                    ])
		                          ->request();
		    return $result->toArray();
		} catch (ClientException $e) {
		    return $e->getErrorMessage() . PHP_EOL;
		} catch (ServerException $e) {
		    return $e->getErrorMessage() . PHP_EOL;
		}


    }


    //成功的json
    public function success($font){
            $arr=['font'=>$font,'code'=>'00000'];
            echo json_encode($arr);
            exit;
    }

     //失败的json
    public function fail($font){
        $arr=['font'=>$font,'code'=>'00001'];
        echo json_encode($arr);
        exit;
    }

    public function sendEmail(){
        $name = request()->name;
        // php 验证邮箱
        $reg = ' /^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/';
        // dd(preg_match($reg,$name));
        if(!preg_match($reg,$name)){
        return json_encode(['code'=>'00001','msg'=>'请输入正确的手机号或者邮箱']);
        }
        // 随机生成验证码
        $code=rand(100000,999999);
        // 发送邮件
        Mail::to($name)->send(new SendCode($code));
        // 发送成功存入session
        session(['telInfo' => $code]);
        return json_encode(['code'=>'00000','msg'=>'发送成功']);
    }



}
