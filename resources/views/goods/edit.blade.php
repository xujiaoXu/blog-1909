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
<center><h3><font color='red'>商品编辑页</font></h3></center>
<center>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    跳转至 <a href="{{url('goods/index')}}">商品列表页</a>
</center>

<!-- @if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif -->

<form class="form-horizontal" role="form" action="{{url('goods/update/'.$goods->goods_id)}}" method="post" enctype="multipart/form-data"
>
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品名称</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="goods_name"  value="{{$goods->goods_name}}" 
				   placeholder="请输入商品名称">
				   <b style="color: red">{{$errors->first('goods_name')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品分类</label>
		<div class="col-sm-8">
			<select name="cate_id">
				<option value="">--请选择--</option>
				<option value="鞋" {{$goods->goods_cate=='鞋' ? "selected" : ""}}>鞋</option>
				<option value="上衣" {{$goods->goods_cate=='上衣' ? "selected" : ""}}>上衣</option>
				<option value="裤子" {{$goods->goods_cate=='裤子' ? "selected" : ""}}>裤子</option>
				<option value="短裤" {{$goods->goods_cate=='短裤' ? "selected" : ""}}>短裤</option>
			</select>
				   <b style="color: red">{{$errors->first('cate_id')}}</b>

		</div>
	</div>
 <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品品牌</label>
		<div class="col-sm-8">
			<select name="brand_id">
				<option value="">--请选择--</option>
				<option value="耐克" {{$goods->goods_brand=='耐克' ? "selected" : ""}}>耐克</option>
				<option value="乔丹" {{$goods->goods_brand=='乔丹' ? "selected" : ""}}>乔丹</option>
				<option value="回力" {{$goods->goods_brand=='回力' ? "selected" : ""}}>回力</option>
				<option value="tiger" {{$goods->goods_brand=='tiger' ? "selected" : ""}}>tiger</option>
				<option value="安踏" {{$goods->goods_brand=='安踏' ? "selected" : ""}}>安踏</option>
			</select>
				   <b style="color: red">{{$errors->first('brand_id')}}</b>

		</div>
	</div>

<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品价格</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="goods_price"
				   placeholder="请输入商品价格" value="{{$goods->goods_price}}">
				   <b style="color: red">{{$errors->first('goods_price')}}</b>

		</div>
	</div>

<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品库存</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="goods_num"  value="{{$goods->goods_num}}" placeholder="请输入商品库存">
				   <b style="color: red">{{$errors->first('goods_num')}}</b>

		</div>
</div>

<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否显示</label>
		<div class="col-sm-8">
			<input type="radio" name="is_show" value="是"  {{$goods->is_show == '是' ? "checked" : ""}}>是
			<input type="radio" name="is_show" value="否" {{$goods->is_show == '否' ? "checked" : ""}}>否
		</div>
</div>

<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否新品</label>
		<div class="col-sm-8">
			<input type="radio" name="is_new" value="是" {{$goods->is_new == '是' ? "checked" : ""}}>是
			<input type="radio" name="is_new" value="否" {{$goods->is_new == '否' ? "checked" : ""}}>否
		</div>
</div>

<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否精品</label>
		<div class="col-sm-8">
			<input type="radio" name="is_jing" value="是" {{$goods->is_jing == '是' ? "checked" : ""}}>是
			<input type="radio" name="is_jing" value="否" {{$goods->is_jing == '否' ? "checked" : ""}}>否
		</div>
</div>

 <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品原图片</label>
		<div class="col-sm-8">
			@if($goods->pic)<img src="{{env('UPLOADS_URL')}}{{$goods->pic}}"  id="firstname" width="35" height="35">@endif
		</div>
	</div>

    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品主图</label>
		<div class="col-sm-8">
			<input type="file" class="form-control" id="firstname" name="pic">
		</div>
	</div>
	 <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品相册</label>
		<div class="col-sm-8">
			<input type="file" class="form-control" id="firstname" multiple name="pics[]">
		</div>
	</div>



    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌介绍</label>
		<div class="col-sm-8">
			<textarea type="text" class="form-control" id="firstname" name="goods_desc"
				   placeholder="请输入品牌介绍">{{$goods->goods_desc}}</textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">编辑</button>
		</div>
	</div>
</form>

</body>
</html>