
<form>
	<input type="text" name="name" placeholder="请输入图书关键字" value="{{$query['name']??''}}">
	<button>搜索</button>
</form>
<table border="1">
	<thead>
		<tr>
			<th>ID</th>
			<th>图片名称</th>
			<th>作者</th>
			<th>图书图片</th>
			<th>图书价格</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
        @foreach ($book as $v)
		<tr>
			<td>{{$v->bid}}</td>
			<td>{{$v->bname}}</td>
			<td>{{$v->zuozhe}}</td>
			<td>{{$v->price}}</td>
			<td><img src="{{env('UPLOADS_URL')}}{{$v->pic}}" width="35" height="35"></td>
			<td>
	            <a  href="#" class="btn btn-primary">编辑</a>
	            <a href="#" class="btn btn-danger">删除</a>
            </td>
		</tr>
        @endforeach
	</tbody>
</table>
        {{$book->appends(['query'=>$query])->links()}}
