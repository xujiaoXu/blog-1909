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
<center><h3><font color='red'>文章添加页</font></h3></center>
<center>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    跳转至 <a href="{{url('article/index')}}">文章列表页</a>
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

<form class="form-horizontal" role="form" action="{{url('article/store')}}" method="post" enctype="multipart/form-data"
>
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章标题</label>
		<div class="col-sm-8">
			<input type="text" class="form-control aname" id="firstname" name="aname"
				   placeholder="请输入文章标题">
				   <b style="color: red">{{$errors->first('aname')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章分类</label>
		<div class="col-sm-8">
			<select name="tid" id="fenlei">
				<option value="">--请选择--</option>
				@foreach($atype as $v)
				<option value="{{$v->tid}}">{{$v->tname}}</option>
				
				@endforeach
			</select>
				   <b style="color: red">{{$errors->first('tid')}}</b>

		</div>
	</div>

<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章重要性</label>
		<div class="col-sm-8">
			<input type="radio" name="zhongyao" value="普通">普通
			<input type="radio" name="zhongyao" value="置顶">置顶
				   <b style="color: red">{{$errors->first('zhongyao')}}</b>
		</div>
</div>




<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否显示</label>
		<div class="col-sm-8">
			<input type="radio" name="is_show" value="显示">显示
			<input type="radio" name="is_show" value="不显示">不显示
				   <b style="color: red">{{$errors->first('is_show')}}</b>
			
		</div>
</div>


<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章作者</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="zuozhe"
				   placeholder="请输入文章作者">
				   <!-- <b style="color: red">{{$errors->first('goods_price')}}</b> -->


		</div>
	</div>



<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">作者email</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="aemail"
				   placeholder="请输入文章作者">
				   <!-- <b style="color: red">{{$errors->first('goods_num')}}</b> -->

		</div>
</div>

<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">关键字</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="zi"
				   placeholder="请输入关键字">
		</div>
</div>

    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章图片</label>
		<div class="col-sm-8">
			<input type="file" class="form-control" id="firstname" name="pic">
		</div>
	</div>
	
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">网页描述</label>
		<div class="col-sm-8">
			<textarea type="text" class="form-control" id="firstname" name="desc"
				   placeholder="请输入网页描述"></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" id="btn_id" class="btn btn-default">添加</button>
		</div>
	</div>
</form>
<script src="/jquery.min.js"></script>
<script>

$(function(){

	$("#btn_id").click(function(){
		var aname = $('.aname').val();
		var reg = /^[a-zA-Z0-9_\u4e00-\u9fa5]+$/;
		var fenlei = $('#fenlei').val();
		if(aname ==''){
			alert('文章标题不能为空');;
			return false;
		}else if(!reg.test(aname)){
			alert('文章标题必须是中文字母数字下划线');
			return false;
		}
		if(fenlei ==''){
			alert('文章分类不能为空');;
			return false;
		}





	})
	
})
	// return false;


</script>
</body>
</html>