@extends('layouts.shop') 
@section('title','首页')
@section('content')
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
      <dl>
       <dt><a href="user.html"><img src="/static/index/images/touxiang.jpg" /></a></dt>
       <dd>
        <h1 class="username">三级分销终身荣誉会员</h1>
        <ul>

         <li><a href="{{url('/prolist')}}"><strong>34</strong><p>全部商品</p></a></li>

         <li><a href="javascript:;"><span class="glyphicon glyphicon-star-empty"></span><p>收藏本店</p></a></li>
         <li style="background:none;"><a href="javascript:;"><span class="glyphicon glyphicon-picture"></span><p>二维码</p></a></li>
         <div class="clearfix"></div>
        </ul>
       </dd>
       <div class="clearfix"></div>
      </dl>
     </div><!--head-top/-->
     <form action="#" method="get" class="search">
      <input type="text" class="seaText fl" />
      <input type="submit" value="搜索" class="seaSub fr" />
     </form><!--search/-->
     <ul class="reg-login-click">
      @if(request()->session()->has('user'))
      <li><a href="{{url('/denglu')}}">欢迎登录</a></li>
      <li><a href="{{url('/zhuce')}}" class="rlbg">注册</a></li>
      @else
      <li><a href="{{url('/denglu')}}">登录</a></li>
      <li><a href="{{url('/zhuce')}}" class="rlbg">注册</a></li>
      @endif
      <div class="clearfix"></div>
     </ul><!--reg-login-click/-->



     <div id="sliderA" class="slider">
     @foreach($res as $v)
    <dt><a href="{{url('/goods/'.$v->goods_id)}}"> <img src="{{env('UPLOADS_URL')}}{{$v->pic}}"></a>
     @endforeach
     </div><!--sliderA/-->



     <ul class="pronav">
      @foreach($res2 as $vv)
      <li><a href="prolist.html">{{$vv->cate_name}}</a></li>
      @endforeach
      <div class="clearfix"></div>
     </ul><!--pronav/-->
     <div class="index-pro1">
      <div class="index-pro1-list">
       <dl>
          @foreach($res3 as $k=>$vvv)
        <dt>
          <a href="proinfo.html"><img src="{{env('UPLOADS_URL')}}{{$vvv->pic}}" /></a>
        </dt>
        <dd class="ip-text"><a href="proinfo.html">{{$vvv->goods_name}}</a><span>已售：488</span></dd>
        <dd class="ip-price"><strong>{{$vvv->goods_price}}</strong> <span>¥599</span></dd>
          @endforeach
       </dl>
      </div>
    
      <div class="clearfix"></div>
     </div><!--index-pro1/-->
     <div class="prolist">
      <dl>
        @foreach($res4 as $vvvv)
       <dt><a href="proinfo.html"><img src="{{env('UPLOADS_URL')}}{{$vvvv->pic}}" width="100" height="100" /></a></dt>
       <dd>
        <h3><a href="proinfo.html">{{$vvvv->goods_name}}</a></h3>
        <div class="prolist-price"><strong>¥{{$vvvv->goods_price}}</strong> <span>¥599</span></div>
        <div class="prolist-yishou"><span>5.0折</span> <em>已售：{{$vvvv->goods_num}}</em></div>
       </dd>
       <div class="clearfix"></div>
       @endforeach
      </div>
      </dl>
     </div><!--prolist/-->
     <div class="joins"><a href="fenxiao.html"><img src="/static/index/images/jrwm.jpg" /></a></div>
     <div class="copyright">Copyright &copy; <span class="blue">这是就是三级分销底部信息</span></div>

@include('index.public.footer');
@endsection