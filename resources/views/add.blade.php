<h1>控制器方法</h1><hr/>
<form action="{{url('add')}}" method="post">
	@csrf
	<input type="text" name="name">
	<button>提交</button>
<form>