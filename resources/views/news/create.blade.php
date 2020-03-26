<!-- <h1 style="color: pink">房屋添加</h1> -->
<form action="{{url('news/store')}}" method="post">
	@csrf


@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

	<table>
		<tr>
			<td>新闻名称</td>
			<td><input type="text" name="nname"></td>
		</tr>
		<tr>
			<td>分类</td>
			<td>
		<select name="tid">
				<option value="">--请选择--</option>
				@foreach ($Type as $v)
				<option value="{{$v->tid}}">{{$v->tname}}</option>
				@endforeach
			</select>
			</td>
		</tr>
		<tr>
			<td>作者</td>
			<td><input type="text" name="zuozhe"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="提交"></td>
		</tr>
	</table>
	
<form>