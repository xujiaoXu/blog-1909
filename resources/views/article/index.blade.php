<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title></title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<center><h3><font color='red'>文章列表页</font></h3></center>
<center>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    跳转至 <a href="{{url('article/create')}}">文章添加页</a>
</center>
<form>
	<input type="text" name="name" placeholder="请输入文章标题关键字">

	<select name="tid" id="fenlei">
				<option value="">--请选择--</option>
				@foreach($atype as $v)
				<option value="{{$v->tname}}">{{$v->tname}}</option>
				
				@endforeach
			</select>
	<button class="btn btn-primary">搜索</button>
</form>

<table class="table table-striped">
	<thead>
		<tr>
			<th>文章ID</th>
			<th>文章标题</th>
			<th>文章分类</th>
			<th>文章重要性</th>
			<th>是否显示</th>
			<th>文章作者</th>
			<th>作者emai</th>
			<th>关键字</th>
			<th>文章图片</th>
			<th>网页描述</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
        @foreach ($article as $v)
		<tr>
			<td>{{$v->aid}}</td>
			<td>{{$v->aname}}</td>
			<td>{{$v->tname}}</td>
			<td>{{$v->zhongyao}}</td>
			<td>{{$v->is_show}}</td>
			<td>{{$v->zuozhe}}</td>
			<td>{{$v->aemail}}</td>
			<td>{{$v->zi}}</td>
			<td>@if($v->pic)<img src="{{env('UPLOADS_URL')}}{{$v->pic}}" width="35" height="35">@endif</td>
			<td>{{$v->desc}}</td>
			<td>
            <a href="javascript:void(0)" aid="{{$v->aid}}" class="btn btn-danger del">删除</a>
            </td>
		</tr>
        @endforeach
        <!-- <tr>
        	</td>
        </tr> -->
        <tr>
        	<td colspan="11">
        		{{$article->appends($query)->links()}}
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
$(document).on('click','.del',function(){
	var aid = $(this).attr('aid');
	// alert(aid);
	if(confirm('确认删除当前记录吗？')){

		// get
		// $.get('/article/destroy/'+aid,function(result){
		// 	if(result.code=='00000'){
		// 		location.reload();
		// 	}
		// },'json');
		// post
		$.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});
		$.post('/article/destroy/'+aid,function(result){
			if(result.code=='00000'){
				location.reload();
			}
		},'json');




	}
})
	


</script>

</body>
</html>