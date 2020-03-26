 <table border="1">
                        
                        <tr>
                            <th>分类ID</th>
                            <th>分类名称</th>
                            <th>是否展示</th>
                            <th>是否展示在导航栏上</th>
                            <th>操作</th>
                        </tr> 
                        
                        @foreach ($info as $v)
                        <tr style="{{$v->pid == 0 ? '' : 'display: none;'}}" pid="{$v.pid}" cate-id="{{$v->cate_id}}">
                            <td>
                                <a href="javascript:void(0);" cate-id="{{$v->cate_id}}" class="isShow">+</a>
                                {{$v->cate_id}}
                            </td>
                            <td>{{$v->cate_name}}</td>
                            <td>{{$v->cate_show == 1 ? '√' : '×'}}</td>
                            <td>{{$v->cate_nav_show == 1 ? '√' : '×'}}</td>
                            <td>
                               <a href="{{url('/cate/edit/'.$v->cate_id)}}" class="btn btn-primary">编辑</a>
                               <a href="{{url('/cate/destroy/'.$v->cate_id)}}" class="btn btn-danger">删除</a>
                            </td>

                        </tr>
                        @endforeach
                        
</table>
<script src="/jquery.min.js"></script>
<script type="text/javascript">
    $(function(){
         $(".isShow").click(function () {
           var _this = $(this);
           var cate_id = _this.attr('cate-id');
           var stata = _this.text();

           if(stata == "+"){
                var children = $("#cate-id");
                
                if(children.length > 0){
                    children.show();
                    _this.text('-');
                }else{
                    _this.text('');
                }
           }else{
               $("tr[pid="+cate_id+"]").hide();
               _this.text('+');
           }
        });
    });
</script>