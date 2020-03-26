<h1 style="color: pink">展示</h1>
<table border="1">
	<thead>
		<tr>
			<th>房屋ID</th>
			<th>小区名称</th>
			<th>导购人</th>
			<th>导购联系方式</th>
			<th>房屋面积</th>
			<th>房屋图片</th>
			<th>房屋相册</th>
			<th>售价</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
        @foreach ($floor as $v)
		<tr>
			<td>{{$v->fid}}</td>
			<td>{{$v->fname}}</td>
			<td>{{$v->fman}}</td>
			<td>{{$v->ftel}}</td>
			<td>{{$v->farea}}</td>
			<td><img src="{{env('UPLOADS_URL')}}{{$v->pic}}" width="35" height="35"></td>

			<td>
				@if($v->pics)
				@php $pics = explode('|',$v->pics);@endphp
				@foreach($pics as $k => $vv)
				<img src="{{env('UPLOADS_URL')}}{{$vv}}" width="35" height="35">
				@endforeach
				@endif
			</td>

			<td>{{$v->fprice}}</td>
			<td>
            <a  href="#" class="btn btn-primary">编辑</a>
            <a href="#" class="btn btn-danger">删除</a>
            </td>
		</tr>
        @endforeach
	</tbody>
</table>