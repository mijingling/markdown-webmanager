<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>删除测试</title>
</head>
<body>

<?php 
	include("conn.php");//引入链接数据库
	if(!empty($_GET['id'])){
	$id=$_GET['id']; 
	$sql="delete from md_main where id ='$id'"; 
} 
$query=mysql_query($sql); 
if($query){
	echo "<script> alert('删除成功'); location.href='index.php'</script>";
}else{
	echo "删除失败";
}
?>
<br>
</body>
</html>
