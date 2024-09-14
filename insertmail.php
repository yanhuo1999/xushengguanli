<?php
 Require_once 'bbs/include/common.php';
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-cn" lang="zh-cn">
<head>
<meta http-equiv="pragma" content="no-cache" />
<!--缓存信息-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="utf-8" />
<!--编码信息-->
<meta name="robots" content="all" />
<meta name="author" content="TwinsenLiang" />
<!--机器人爬虫-->
<meta name="Copyright" content="伙伴网版权所有©2006" />
<meta name="Description" content="伙伴网——您最忠实的伙伴门户" />
<meta name="Keywords" content="伙伴网,同城,都市,房屋出租,本地新闻,地图" />
<title>伙伴网</title>
</head>
 <?
 foreach ($_POST['address'] as $one){
 	$friend=$friend.";".$one;
 }
 //echo $friend;
 $sql="insert into renrenclone.msninvest (username,contacts,msg,link) values 
 	    ('" .$_POST['username']. "','".$friend."','".$_POST[message]."','".$_POST['url']."')" ;
 $db->query($sql);
 $db->close();
 ?> 
<script type="text/javascript" >
function closemsn(){
	parent.closemsn();
}
function success(){
	parent.success();
}
success();
alert ("发送成功！");
closemsn();
</SCRIPT>
</html>