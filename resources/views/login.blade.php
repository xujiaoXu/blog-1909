<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>Bootstrap 实例 - 水平表单</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h3><font color='red'>后台登录</font></h3></center>
<center>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</center>

@if(session('msg'))
<div class="alert alert-danger">{{session('msg')}}</div>
@endif
<form class="form-horizontal" role="form" action="{{url('/logindo')}}" method="post" enctype="multipart/form-data"
>
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">登录名称</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="aname"
				   placeholder="请输入商品名称">
				   <!-- <b style="color: red">{{$errors->first('goods_name')}}</b> -->
		</div>
	</div><div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">密码</label>
		<div class="col-sm-8">
			<input type="password" class="form-control" id="firstname" name="pwd"
				   placeholder="请输入商品名称">
				   <!-- <b style="color: red">{{$errors->first('')}}</b> -->
		</div>
	</div>
   
	<div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <div class="checkbox">
	        <label>
	          <input name="rember" type="checkbox">七天免登录
	        </label>
	      </div>
	    </div>
	  </div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">登录</button>
		</div>
	</div>
</form>

</body>
</html>