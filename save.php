<?php
	include("conn.php");//引入链接数据库
  	$id=$_POST['id'];
	$title=$_POST['title'];
	$content=$_POST['content'];
	//如果有id则更新
	if(!empty($id)){
		$sql="update md_main set title='$title',content='$content' where id='$id' limit 1" ;
	}else{
		$sql="insert into md_main(title,content) value ('$title','$content')";
	}
	$query=mysql_query($sql);	
	$_id=mysql_insert_id();
	echo $_id;
?>
