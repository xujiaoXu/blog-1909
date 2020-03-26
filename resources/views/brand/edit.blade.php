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
<center><h3><font color='red'>品牌编辑页</font></h3></center>
<center>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    跳转至 <a href="{{url('brand/index')}}">品牌列表页</a>
</center>
<form class="form-horizontal" role="form" action="{{url('brand/update/'.$brand->brand_id)}}" method="post" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌名称</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="brand_name" value="{{$brand->brand_name}}" 
				   placeholder="请输入品牌名称">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌网址</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="brand_url" value="{{$brand->brand_url}}"
				   placeholder="请输入品牌网址">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌logo</label>
		<div class="col-sm-8">
			<input type="file" class="form-control" id="firstname" name="brand_logo">
		</div>
	</div>
	 <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌原图片</label>
		<div class="col-sm-8">
			@if($brand->brand_logo)<img src="{{env('UPLOADS_URL')}}{{$brand->brand_logo}}"  id="firstname" width="35" height="35">@endif
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌介绍</label>
		<div class="col-sm-8">
			<textarea type="text" class="form-control" id="firstname" name="brand_desc"
				   placeholder="请输入品牌介绍">{{$brand->brand_desc}}</textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">修改</button>
		</div>
	</div>
</form>

</body>
</html>