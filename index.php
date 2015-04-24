<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>MarkDown-首页</title>
<link href="./style/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div>
<form>
     <input type="text" name="keys" />
	 <input type="submit" name="subs" value="搜索"/>
</form>
<hr/>
</div>
<div>
<a href="./mdeditor/md.php" target="_blank">新增</a><hr/>
</div>
<div>
<strong>MarkDown列表:</strong>
<ul> 
<?php
  include("conn.php");//引入链接数据库

  if(!empty($_GET['keys'])){
     $w="  title like '%".$_GET['keys']."%'";
  }else{
    $w="1=1";
  }

  $sql="select id,title from md_main where $w order by id desc";
  $query=mysql_query($sql);
  while($rs=mysql_fetch_array($query)){
?>
<li><a href="./mdeditor/md.php?preview=1&id=<?php echo $rs['id'] ?>" target='_blank'><?php echo $rs['title'] ?></a>
<span class="operate"><a href="./mdeditor/md.php?id=<?php echo $rs['id'] ?>" target='_blank'>编辑</a>｜<a href="del.php?id=<?php echo $rs['id'] ?>">删除</a></span>
</li>
<?php
}
?>
</ul> 
</div>
</body>
</html>