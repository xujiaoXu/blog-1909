<table>
	<thead>
		<tr>
			<th>管理员ID</th>
			<th>管理员</th>
			<th>邮箱</th>
			<th>手机号</th>
			<th>头像</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
        @foreach ($admin as $v)
		<tr>
			<td>{{$v->aid}}</td>
			<td>{{$v->aname}}</td>
			<td>{{$v->aemail}}</td>
			<td>{{$v->atel}}</td>
			<td>@if($v->pic)<img src="{{env('UPLOADS_URL')}}{{$v->pic}}" width="35" height="35">@endif</td>
			<td>
            <a  href="{{url('/admin/edit/'.$v->aid)}}" class="btn btn-primary">编辑</a>
            <a href="{{url('/admin/destroy/'.$v->aid)}}" class="btn btn-danger">删除</a>
            </td>
		</tr>
        @endforeach
	</tbody>
</table>