<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
	<h3>添加用户</h3>
	@include('stu.menu')
	@if(session('info'))
		<script>
			alert("{{ session('info') }}");
		</script>
	@endif
	<form action="/stu" method='post'>
	{{ csrf_field() }}
		<table width="280">
			<tr>
				<td>姓名</td>
				<td><input type="text" name='name'></td>
			</tr>
			<tr>
				<td>年龄</td>
				<td><input type="text" name='age'></td>
			</tr>
			<tr>
				<td>性别</td>
				<td><input type="radio" name='sex' value='1'>男
				<input type="radio" name='sex' value='2'>女</td>
			</tr>
			<tr>
				<td colspan='2' align='center'><input type="submit" value='添加'><input type="reset"></td>
			</tr>
		</table>
	</form>
	<center>
</body>
</html>