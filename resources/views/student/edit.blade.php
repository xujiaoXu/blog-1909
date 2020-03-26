<form action="{{url('student/update/'.$student->sid)}}" method="post">
	@csrf
	学生姓名：<input type="text" name="sname" value="{{$student->sname}}" ><hr/>
	学生性别：<input type="radio" name="sex" value="男" {{$student->sex == '男' ? "checked" : ""}}>男
	         <input type="radio" name="sex" value="女" {{$student->sex =='女' ? "checked" : ""}}>女<hr/>
	班级：<select name="banji">
		      <option value="1907" {{$student->banji=='1909' ? "selected" : ""}}>1907</option>
		      <option value="1908" {{$student->banji=='1908' ? "selected" : ""}}>1908</option>
		      <option value="1909" {{$student->banji=='1909' ? "selected" : ""}}>1909</option>
	    </select><hr/>
	<button>提交</button>
<form>