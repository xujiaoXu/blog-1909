<h1>商品分类</h1><hr/>
<form action="{{url('cate/store')}}" method="post">
	@csrf

	

                   分类名称：<input type="text" name="cate_name" placeholder="分类名称"/><br>

                   分类： <select name="pid">
                                <option value="0">--请选择父类--</option>
       						 @foreach ($arr as $v)
                                <option value="{{$v->cate_id}}">{{$v->cate_name}}</option>
        					 @endforeach
                            </select><br>
                        
                    是否展示 :
                            <input type="radio" name="cate_show" checked value="1" />是
                            <input type="radio" name="cate_show" value="2" />否<br>
                      
                    是否展示在导航栏上: 
                            <input type="radio" name="cate_nav_show" checked value="1" />是
                            <input type="radio" name="cate_nav_show" value="2" />否<br>

			<button type="submit">添加</button>
                  
</form>