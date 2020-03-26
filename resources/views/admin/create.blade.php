@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<form action="{{url('admin/store')}}" method="post" enctype="multipart/form-data">
	@csrf
	管理员：<input type="text" id="aname" name="aname"><br/>
	<b style="color: red">{{$errors->first('aname')}}</b><br/>
	密码：<input type="password" name="pwd"><br/>
	<b style="color: red">{{$errors->first('pwd')}}</b><br/>

	确认密码：<input type="password" name="rpwd"><br/>
	邮箱：<input type="text" name="aemail"><br/>
	<b style="color: red">{{$errors->first('aemail')}}</b><br/>

	手机号：<input type="text" name="atel"><br/>
	<b style="color: red">{{$errors->first('atel')}}</b><br/>

	图片<input type="file" name="pic"><br/>
	
	<button id="button">提交</button>
<form>
