<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
	<form action="/stu" method="post" name='myform'>
		{{ csrf_field() }}
		{{ method_field('DELETE')}}
	</form>
	<h3>浏览用户信息</h3>
	@include('stu.menu')
	@if(session('info'))
		<script>
			alert("{{ session('info') }}");
		</script>
	@endif
	<table width='700' border='1'>
		<tr>
			<th>学号</th>
			<th>姓名</th>
			<th>性别</th>
			<th>年龄</th>
			<th>操作</th>
		</tr>
		@foreach($list as $v)
		<tr>
			<td>{{ $v->uid }}</td>
			<td>{{ $v->name }}</td>
			<td>@if($v->sex==1)男@else女@endif</td>
			<td>{{ $v->age }}</td>
			<td>
				<a href="javascript:doDel({{ $v->uid}})">删除</a>
				<a href="/stu/{{ $v->uid }}/edit">修改</a>
			</td>
		</tr>
		@endforeach
	</table>
	</center>
</body>
<script type="text/javascript">
		function doDel(id)
		{
			var form=document.myform;
			form.action='/stu/'+id;
			form.submit();
		}
</script>
</html>