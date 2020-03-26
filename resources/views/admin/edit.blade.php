<h1>编辑</h1>

@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif


<form action="{{url('admin/update/'.$admin->aid)}}" method="post" enctype="multipart/form-data">
	@csrf
	管理员：<input type="text" id="aname" name="aname" value="{{$admin->aname}}"><br/>
	<b style="color: red">{{$errors->first('aname')}}</b><br/>

	邮箱：<input type="text" name="aemail" value="{{$admin->aemail}}"><br/>
	<b style="color: red">{{$errors->first('aemail')}}</b><br/>

	手机号：<input type="text" name="atel" value="{{$admin->atel}}"><br/>
	<b style="color: red">{{$errors->first('atel')}}</b><br/>

	原头像：	@if($admin->pic)<img src="{{env('UPLOADS_URL')}}{{$admin->pic}}"  width="35" height="35">@endif<br>
	图片<input type="file" name="pic"><br/>
	
	<button id="button">编辑</button>
<form>
