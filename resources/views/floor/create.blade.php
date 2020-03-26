<h1 style="color: pink">房屋添加</h1>
<form action="{{url('floor/store')}}" method="post" enctype="multipart/form-data">
	@csrf
	<table>
		<tr>
			<td>小区名称</td>
			<td><input type="text" name="fname"></td>
		</tr>
		<tr>
			<td>导购人</td>
			<td><input type="text" name="fman"></td>
		</tr>
		<tr>
			<td>导购联系方式</td>
			<td><input type="text" name="ftel"></td>
		</tr>
		<tr>
			<td>房屋面积</td>
			<td><input type="text" name="farea"></td>
		</tr>
		<tr>
			<td>房屋图片</td>
			<td><input type="file" name="pic"></td>
		</tr>
		<tr>
			<td>房屋相册</td>
			<td><input type="file" name="pics[]"  multiple ></td>
		</tr>
		<tr>
			<td>售价</td>
			<td><input type="text" name="fprice"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="提交"></td>
		</tr>
	</table>
	
<form>