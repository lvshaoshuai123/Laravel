<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h3>文件上传</h3>
	<form action="/doupload" method='post' enctype='multipart/form-data'>
		{{ csrf_field()}}
		文件: 	<input type="file" name='mypic'>
		<!-- <input type="file" name='mypic[]'>
		<input type="file" name='mypic[]'> -->
		<input type="submit" value='上传'>
	</form>
</body>
</html>