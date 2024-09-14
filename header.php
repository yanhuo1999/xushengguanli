<?php
	$dqid=isset($_GET['dqid'])?$_GET['dqid']:(isset($_COOKIE['cityid'])? $_COOKIE['cityid']:1);
	$time = 3600*24*30;
	setcookie("cityid",$dqid,time()+$time,"/");	
?>

<link rel="stylesheet" href="style/head.css" type="text/css" />
</head>
<!--顶部开始-->
<body onclick="hideareamenu(event);">
<div id="backgray" style="display:none;"> </div>
<dl id="reg-msn" name="reg-msn" style="display:none;">
</dl>
<script type="text/javascript">
<!--
inimsn();
function showareamenu(event){
	var menu = document.getElementById("areaList");
	menu.style.display="block";
}
function hideareamenu(event){
		var menu = document.getElementById("areaList");
		menu.style.display="none";
}
function submitmsn(){	
	//inimsn();	
	document.getElementById('backgray').style.display='';
	document.getElementById('reg-msn').style.display='';
	//document.group.first.style.display='none';
	//document.group.second.style.display='none';
}
function submitmsnsec(){
	document.getElementById('reg-msn').style.display='none';
	document.getElementById('reg-msn').style.top="25%";
	document.getElementById('framemsn').width=500;
	document.getElementById('framemsn').height=550;
	document.getElementById('framemsn').top=0;
	document.getElementById('reg-msn').style.display='';
}
function success(){
	document.getElementById('reg-msn').style.display='none';
}
function closemsn(){
	inimsn();
	document.getElementById('reg-msn').style.display="none";
	document.getElementById('backgray').style.display= 'none';	
	//document.group.first.style.display='';
	//document.group.second.style.display='';
}
function inimsn(){
	var obj = document.getElementById('reg-msn');
	obj.innerHTML = '<iframe id="framemsn" src="LoginMsn.php" width="420px" height="250px" frameborder="0" scrolling="no"></iframe>';	
	document.getElementById('reg-msn').style.top="50%";
	//alert("abc");
}
// -->
</script>

<div id="topbanner">
<?php
	if(!$discuz_uid){
?>
<span class="menu left"><span class="bold"><?=$cityname?>&nbsp;欢迎您&nbsp</span><a href="./bbs/logging.php?action=login">登陆</a> | <a href="./bbs/register.php">注册</a>
| <a href="index.php">返回首页</a>
<?php
	}else{
?>
<span class="menu left"><span class="bold"><?=$cityname?>&nbsp;欢迎您&nbsp</span><?php echo $discuz_user;?> | <a href="bbs/<?=$link_logout?>">退出</a>| <a href="bbs/my.php">个人中心</a>| <a href="index.php">返回首页</a> 
<?
	}
?>
|<a href="javascript:void(0);" onClick="submitmsn()">伙伴推荐</a>
</span> 
<span class="menu" id="area">
<a href="javascript:void(0);" id="gqhdq" onMouseOver="showareamenu(event);">切换地区</a>
</span>
</div>
<div class="headermenu_popup" id="areaList" style="display: none">
<table width="260" border="0" align="center" cellpadding="1" cellspacing="0" class="arealistTable">
      	<?
      		$sql = "SELECT id,name FROM renrenclone.city where id>1";
      		$query = $db->query($sql);
      		$count = 1;
  				while($rs=$db->fetch_array($query)){
  					if(($count+3)%4==0){
  						echo "<tr height=\"18\">";
  					}
  					
  					$strpanded="dqid=".$rs['id'];
if($_SERVER['QUERY_STRING']!=""){
  	if(strpos($_SERVER['QUERY_STRING'],"dqid")===false){
  		$strurl=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."&";
  	}
  	else{
  		$strstpos=strpos($_SERVER['QUERY_STRING'],"dqid");
  		$strendpos=strpos($_SERVER['QUERY_STRING'],"&",$strstpos);
  		if($strendpos!=false){
  			$strurl=substr($_SERVER['QUERY_STRING'],0,$strstpos-1).substr($_SERVER['QUERY_STRING'],strendpos+1);
  		}
  		else{
  			$strurl=substr($_SERVER['QUERY_STRING'],0,$strstpos-1);
  		}
  		$strurl=$_SERVER['PHP_SELF']."?".$strurl."&";
  	}
}
else{
  	$strurl=$_SERVER['PHP_SELF']."?";
}
  					$strurl = $strurl.$strpanded;
  					echo "<td width=\"25%\" class=\"popupmenu_option\"><a href=\"".$strurl."\">".$rs['name']."</a></td>";
  					if(($count+3)%4==3){
  						echo "</tr>";
  					}
  					$count+=1;
  				}
  				if(($count+3)%4==0){
  					echo "</tr>";
  				}
				while(($count+3)%4!=0){
					echo "<td width=\"52\"  class=\"popupmenu_option\"></td>";
					$count+=1;
				}
      	?>				
				</table>
</div>
<!--顶部结束-->
<!--顶部菜单开始-->
<div id="topmenu">
<h1><a href="index.php" id="logo"><span>伙伴网</span></a></h1>
  <ul>
    <li><a href="tagnews.php" id="menu_even"><span>大新闻</span></a></li>
    <li><a href="ad.php" id="menu_ad"><span>小广告</span></a></li>
    <li><a href="classnews.php" id="menu_found"><span>新发现</span></a></li>
    <li><a href="bbs/index.php" id="menu_ren"><span>本地人</span></a></li>
    <li><a href="http://site.huoban.com" id="menu_direct"><span>本地导航</span></a></li>
  </ul>
  <div class="clear"></div>
</div>
<!--顶部菜单结束-->