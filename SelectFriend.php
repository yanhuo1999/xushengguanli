<?php
Require_once 'bbs/include/common.php';
session_start();
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
<link rel="stylesheet" rev="stylesheet" href="style/global.css" type="text/css" media="screen" />
<!--[if IE 6]>
<link href="style/ie6.css" rel="stylesheet" type="text/css" media="screen" />
<![endif]-->
<!--[if lt IE 6]>
<link href="style/ie6lt.css" rel="stylesheet" type="text/css" media="screen" />
<![endif]-->
<link rel="Shortcut Icon" href="/favicon.ico" type="image/x-icon" />
<!--网站icon-->
<link rel="alternate" type="application/rss+xml" title="RSS news feed" href="rss.xml" />
<!--RSS连接-->
<script type="text/javascript" src="js/external.js"></script>
<script type="text/javascript" src="js/swfobject.js"></script>
<script type="text/javascript" src="js/niftycube.js"></script>
<!--link href="style/miniad.css" rel="stylesheet" type="text/css" /-->
<SCRIPT src="includes/validate.js" type=text/javascript></SCRIPT>
<SCRIPT type=text/javascript>
function closemsn(){
	parent.closemsn();
}
function nextstep(){
	parent.submitmsnsec();
}
function check(){
	if (form2.username.value==""){
		alert ("姓名不能为空！");
		return false;
	}
	else if (form2.message.innerText==""){
		alert ("留言不能为空！");
		return false;
	}
	else if (form2.url.value==""){
		alert ("网页链接不能为空！");
		return false;
	}
	var m=document.getElementsByName("address[]")
	for (i=0;i<m.length;i++){
		if (m[i].checked){
			return true;
		}
	}
	alert ("请选择好友！")
	return false;
}
</SCRIPT>
</head>

<body>
<?php
  Require_once "includes/msn.class.php";
  $email=$_POST['address'];
  $password=$_POST['pw'];
  echo $email;
  $msn = new MSNP9($email, $password);
  if ($msn->connect()){
	  $msn->sync();
	  echo "<SCRIPT type=\"text/javascript\">nextstep();</SCRIPT>"
?>
<dl id="reg-input" style="height:550px;top:125px; width:500px;margin-left: -250px; margin-right: auto;background-color:#DFEFFF; ">
  <dt><a href="javascript:closemsn();"><img src="images/close_bt.gif" alt="关闭" width="15" height="15" /></a> <span class="clear"></span> </dt>
    <form name="form2"action="insertmail.php" method="post" onsubmit="return check()"> 
		   <div style="margin:15px 10px 0px 10px;text-align:left;padding:10px 0px 0px 20px;font-size:13px; font-weight:bold;background-color:#DFEFFF;height:500px;">	  
			    <span style="color:red;">*</span>您的名字
			     <input type="text" name="username" id="username"><p>		 
				 <span style="color:red;">*</span>选择好友Email：			 
				   <div style='height:180px;overflow:auto;font-weight:normal;font-size:11px;margin-right:28px'>
                   <table  border="1" width="96%" bgcolor="White">
				 <?
	               foreach($msn->contacts as $value){
	  	              echo ("<tr>");
	                  echo ("<td width=\"10%\"><input type=\"checkbox\" name=\"address[]\" value=\"".$value['passport']."\"></th>");
		              echo ("<td>".$value['displayname']."</td>");
	                 }		 
				 ?>
				   <tr></table></div><p>		
				 <span style="color:red;">*</span>留言<br>
				 <textarea style="background-color:white;overflow:auto;width:425px"name="message" cols="60" rows="8" >我觉得这个不错，来看看吧</textarea><p>                                                                       			  
			     <span style="color:red">*</span>地址<br>
			     <input name="url" type="text" id="url" size="60" value="<?=$_SERVER['HTTP_REFERER']?>"/>		  
			  <p>
			  <div style="margin:20px 0px 0px 260px">
		        <input type="reset" value="重新设置"><input style="margin-left:17px;" type="submit" value="发送邀请"></div>
		   </div> 
    </form>

</dl>
<?
  }
  else {
  	
  	header("Location: ".$_SERVER['HTTP_REFERER']);
  }
?>
</body>
</html>
