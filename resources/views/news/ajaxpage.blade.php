
<form>
	<input type="text" name="name" placeholder="请输入新闻关键字" value="{{$query['name']??''}}">
	<button>搜索</button>
</form>
<table border="1">
	<thead>
		<tr>
			<th>新闻ID</th>
			<th>新闻名称</th>
			<th>新闻分类</th>
			<th>作者</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
        @foreach ($news as $v)
		<tr>
			<td>{{$v->nid}}</td>
			<td>{{$v->nname}}</td>
			<td>{{$v->tname}}</td>
			<td>{{$v->zuozhe}}</td>
			<td>
            <a  href="#" class="btn btn-primary">编辑</a>
            <a href="#" class="btn btn-danger">删除</a>
            </td>
		</tr>
        @endforeach
	</tbody>

</table>
{{$news->appends(['query'=>$query])->links()}}