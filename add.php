<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>添加测试</title>
</head>
<body>
<?php
  include("conn.php");//引入链接数据库
  if(!empty($_POST['sub'])){
	$title=$_POST['title'];
	$content=$_POST['content'];
	echo $sql="insert into md_main(title,content) value ('$title','$content')" ;
	mysql_query($sql);
	echo "<script> alert('更新成功'); location.href='index.php'</script>";
	echo"插入成功";
  }
?>
<form action="add.php" method="post">
   	标题: <input type="text" name="title"><br>
  	内容: <textarea rows="5" cols="50" name="content"></textarea><br>
	<input type="submit" name="sub" value="发表">
</form>
</body>
</html>
