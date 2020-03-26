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
<center><h3><font color='red'>品牌添加页</font></h3></center>
<center>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    跳转至 <a href="{{url('brand/index')}}">品牌列表页</a>
</center>

@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<form class="form-horizontal" role="form" action="{{url('brand/store')}}" method="post" enctype="multipart/form-data"
>
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌名称</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="brand_name"
				   placeholder="请输入品牌名称">
				   <b style="color: red">{{$errors->first('brand_name')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌网址</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="brand_url"
				   placeholder="请输入品牌网址">
				   <b style="color: red">{{$errors->first('brand_url')}}</b>

		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌logo</label>
		<div class="col-sm-8">
			<input type="file" class="form-control" id="firstname" name="brand_logo">
		</div>
	</div>
	 <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌logo相册</label>
		<div class="col-sm-8">
			<input type="file" class="form-control" id="firstname" multiple name="brand_imgs[]">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌介绍</label>
		<div class="col-sm-8">
			<textarea type="text" class="form-control" id="firstname" name="brand_desc"
				   placeholder="请输入品牌介绍"></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">添加</button>
		</div>
	</div>
</form>

</body>
</html>