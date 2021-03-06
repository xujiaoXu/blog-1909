@extends('layouts.shop') 
@section('title','登录页面')
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>会员注册</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     <form action="{{url('/log_do')}}" method="get" class="reg-login">
      <h3>还没有三级分销账号？点此<a class="orange" href="{{url('/zhuce')}}">注册</a></h3>
      <input type="hidden" name="refer" value="{{request()->refer}}">
      <div class="lrBox">
       <div class="lrList"><input type="text" name="name" placeholder="输入手机号码或者邮箱号" /></div>
       <div class="lrList"><input type="password" name="password" placeholder="输入证码" /></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="button" value="立即登录" />
      </div>
     </form><!--reg-login/-->

@include('index.public.footer');
<script>
      $(document).on('click','input[type="button"]',function(){
          var name = $('input[name="name"]').val();
          var password = $('input[name="password"]').val();
          var refer = $('input[name="refer"]').val();
          // alert(refer);

          $.get(
            "{{url('/log_do')}}",
            {name:name,password:password,refer:refer},
            function(res){
              if(res.code=='00001'){
                alert(res.font);
              }else{
                alert(res.font);
                if(refer){
                  location.href=refer;
                }else{
                  location.href="{{url('/')}}";
                }
              }
            },'json'
          )
        })
     </script>
@endsection
     