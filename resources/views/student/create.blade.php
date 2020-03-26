<form action="{{url('student/store')}}" method="post">
	@csrf
	学生姓名：<input type="text" name="sname"><hr/>
	学生性别：<input type="radio" name="sex" value="男">男
	         <input type="radio" name="sex" value="女">女<hr/>
	班级：<select name="banji">
		      <option value="1907">1907</option>
		      <option value="1908">1908</option>
		      <option value="1909">1909</option>
	    </select><hr/>
	<button>提交</button>
<form>