<form action="{{url('book/store')}}" method="post" enctype="multipart/form-data">
	@csrf
	图书名：<input type="text" name="bname"><br/>
	作者：<input type="text" name="zuozhe"><br/>
	价格：<input type="text" name="price"><br/>
	图片<input type="file" name="pic"><br/>
	<button>提交</button>
<form>
@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif