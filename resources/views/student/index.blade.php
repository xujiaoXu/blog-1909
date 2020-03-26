<table>
	<thead>
		<tr>
			<th>学生ID</th>
			<th>学生名称</th>
			<th>学生性别</th>
			<th>学生班级</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
        @foreach ($student as $v)
		<tr>
			<td>{{$v->sid}}</td>
			<td>{{$v->sname}}</td>
			<td>{{$v->sex}}</td>
			<td>{{$v->banji}}</td>
			<td>
            <a  href="{{url('/student/edit/'.$v->sid)}}" class="btn btn-primary">编辑</a>
            <a href="{{url('/student/destroy/'.$v->sid)}}" class="btn btn-danger">删除</a>
            </td>
		</tr>
        @endforeach
	</tbody>
</table>