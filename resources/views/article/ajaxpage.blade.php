 @foreach ($article as $v)
		<tr>
			<td>{{$v->aid}}</td>
			<td>{{$v->aname}}</td>
			<td>{{$v->tname}}</td>
			<td>{{$v->zhongyao}}</td>
			<td>{{$v->is_show}}</td>
			<td>{{$v->zuozhe}}</td>
			<td>{{$v->aemail}}</td>
			<td>{{$v->zi}}</td>
			<td>@if($v->pic)<img src="{{env('UPLOADS_URL')}}{{$v->pic}}" width="35" height="35">@endif</td>
			<td>{{$v->goods_desc}}</td>
			<td>
             <a href="javascript:void(0)" aid="{{$v->aid}}" class="btn btn-danger del">删除</a>
            </td>
		</tr>
        @endforeach
        <!-- <tr>
        	</td>
        </tr> -->
        <tr>
        	<td colspan="11">
        		{{$article->appends(['query'=>$query])->links()}}
        	</td>
        </tr>

