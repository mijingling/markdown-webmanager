<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="zh">
	<?php
		 include("../conn.php");//引入链接数据库
		 if(!empty ($_GET['id'])){
			 $sql="select * from md_main where id='".$_GET['id']."'";
			 $query=mysql_query($sql);
			 $rs=mysql_fetch_array($query);
		 }else{
		 	 $rs['id']='';
		 	 $rs['title']='';
		 	 $rs['content']='';
		 }
	?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $rs['title']?></title>
        <link rel="stylesheet" href="css/editormd.min.css" />
        <script src="./lib/jquery.min.js"></script>
        <script src="./editormd.min.js"></script>    
    </head>
    <body>
		 <input type="hidden" id="id" name="hid" value="<?php echo $rs['id']?>"/>
		   标题: <input type="text" id="title" name="title" value="<?php echo $rs['title']?>">
		 <input type="button" value="保存" onclick="setContent()"/><input type="button" value="预览" onclick="setPreview()"/><br/>
		   内容:<input id="content" name="content" type="hidden" value="<?php echo $rs['content']?>" />
		<div id="test-editormd"></div>
        <script type="text/javascript" src="md.js"></script>
    </body>
</html>