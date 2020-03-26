<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title></title>
	<link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
	<script src="/static/admin/js/jquery.min.js"></script>
	<script src="/static/admin/js/bootstrap.min.js"></script>
</head>
<body>
<center><h3><font color='red'>品牌列表页</font></h3></center>
<center>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    跳转至 <a href="{{url('brand/create')}}">品牌添加页</a>
</center>


<form>
	<input type="text" name="name" placeholder="请输入品牌关键字" value="{{$query['name']??''}}">
	<input type="text" name="url" placeholder="请输入网址关键字" value="{{$query['url']??''}}">
	<button>搜索</button>
</form>

<table class="table table-striped">
	<thead>
		<tr>
			<th>品牌ID</th>
			<th>品牌名称</th>
			<th>品牌网址</th>
			<th>品牌LOGO</th>
			<th>品牌LOGO相册</th>
			<th>品牌描述</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
        @foreach ($brand as $v)
		<tr>
			<td>{{$v->brand_id}}</td>
			<td>{{$v->brand_name}}</td>
			<td>{{$v->brand_url}}</td>
			<td>@if($v->brand_logo)<img src="{{env('UPLOADS_URL')}}{{$v->brand_logo}}" width="35" height="35">@endif</td>

			<td>
				@if($v->brand_imgs)
				@php $brand_imgs = explode('|',$v->brand_imgs);@endphp
				@foreach($brand_imgs as $k => $vv)
				<img src="{{env('UPLOADS_URL')}}{{$vv}}" width="35" height="35">
				@endforeach
				@endif
			</td>
			<td>{{$v->brand_desc}}</td>
			<td>
            <a href="{{url('/brand/edit/'.$v->brand_id)}}" class="btn btn-primary">编辑</a>
            <a href="{{url('/brand/destroy/'.$v->brand_id)}}" class="btn btn-danger">删除</a>
            </td>
		</tr>
        @endforeach
        <tr>
        	<td colspan="6">{{$brand->appends(['query'=>$query])->links()}}
        	</td>
        </tr>
	</tbody>
</table>

<script src="/jquery.min.js"></script>
<script>

$(document).on('click','.pagination a',function(){
	// $('.pagination a').click(function(){
		// alert('ok');
		var url = $(this).attr('href');
		$.get(url,function(result){
			$('tbody').html(result);
		});
		return false;
	// })

});
	


</script>

</body>
</html>