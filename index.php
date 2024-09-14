<?php


	$dqid=isset($_GET['dqid'])?$_GET['dqid']:(isset($_COOKIE['cityid'])? $_COOKIE['cityid']:1);
	$time = 3600*24*30;
	setcookie("cityid",$dqid,time()+$time,"/");	




if(!isset($_COOKIE['cityid'])){
	header("Location:areaselection.html");
}
Require_once 'bbs/include/common.inc.php';
//session_start();
$databasepre = "discuz";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-cn" lang="zh-cn">
<head>
<meta http-equiv="pragma" content="no-cache" />
<!--缓存信息-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="utf-8"/>
<!--编码信息-->
<meta name="robots" content="all" />
<meta name="author" content="TwinsenLiang" />
<!--机器人爬虫-->
<meta name="Copyright" content="伙伴网版权所有©2006" />
<meta name="Description" content="伙伴网——您最忠实的伙伴门户" />
<meta name="Keywords" content="伙伴网,同城,都市,房屋出租,本地新闻,地图" />
<title>伙伴网</title>
<link rel="stylesheet" rev="stylesheet" href="style/index.css" type="text/css" media="screen" />
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
<script type="text/javascript" src="js/niftycube.js"></script>
<script type="text/javascript">
// <![CDATA[
window.onload=function(){
	Nifty("div#topmenu","transparent");
	Nifty("div#ad_250_220_out","transparent");
	Nifty("div#ad_250_220_in","transparent");
	Nifty("div#ad_220_110","transparent");
}
// ]]>
</script>
<?php
	require_once('header.php');
	foreach ($dqarr as $one){
	   $citys=$citys.$one.",";
	}
	$citys=substr($citys,0,strlen($citys)-1);
?>
<div class="clear"></div>
<!--主体内容开始-->
<div class="main">
  <div id="leftmenu">
    <ul>
      <li><a href="index.php" id="menu_default">首页</a></li>
      <li><a href="bbs/index.php?gid=3" target="_blank" id="menu_video">影音</a></li>
      <li><a href="bbs/index.php?gid=18" target="_blank" id="menu_pic">贴图</a></li>
      <li><a href="bbs/index.php?gid=8" target="_blank" id="menu_fun">休闲</a></li>
      <li><a href="bbs/index.php?gid=13" target="_blank" id="menu_hot">热门</a></li>
      <li><a href="bbs/index.php?gid=25" target="_blank" id="menu_pc">电脑</a></li>
      <li><a href="http://www.exue.com" target="_blank" id="menu_ctrl" title="本地热点">本地</a></li>
    </ul>
  </div>
  <div id="ad_250_220_out">
    <div id="ad_250_220_in">
	<script type="text/javascript" src="js/AC_RunActiveContent.js"></script>
	<?
	    $sql="select id,name,picture,titlepicture from renrenclone.article where checked=1 and picture<>\" \" order by publishdate desc limit 5";
		$query=$db->query($sql);
		 while ($rs=$db->fetch_array($query)) { 
				  $name=strlen($rs['name'])>16?mb_substr($rs['name'],0,16,'utf-8'):$rs['name'];
                  $pics=$pics.$rs['picture']."|";
				  $links=$links."newscontent.php?id=".$rs['id']."|";
				  $texts=$texts.$name."|";
               } 
		$pics=substr($pics,0,strlen($pics)-1);
		$links=substr($links,0,strlen($links)-1);
		$texts=substr($texts,0,strlen($texts)-1);
		$swf_height=$focus_height+$text_height;
		//$pics='pic/Maradona.jpg|pic/gymnasium.jpg|pic/zd.jpg';
		//$links='aaaa|aaaa|aaa';
		//$texts='aaa|bbb|ccc';
		echo "<script language=\"javascript\">\n";
		echo "var flash_pics='$pics'\n";
		echo "var flash_links='$links'\n";
		echo "var flash_texts='$texts'\n";
		echo "</script>\n";
	?>	
    <SCRIPT type=text/javascript>
	<!--	
	var focus_width=225
	var focus_height=174
	var text_height=16
	var swf_height = focus_height+text_height
	AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width',focus_width,'height',swf_height,'menu','false','quality','high','bgcolor','#fafafa','src','focus','wmode','transparent','allowScriptAccess','sameDomain','FlashVars','pics='+flash_pics+'&links='+flash_links+'&texts='+flash_texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','focus' ); 
	//-->
	</SCRIPT>
	</div>
  </div>
  <dl id="mode_tagnews">
  	<script language="javascript">
	function chgIndexDiv(num,total,linkName,divName){
		var linkobj=document.getElementById(linkName+num);		
		if(linkobj.className=='now'){
			return;
		}else{
			var divobj = document.getElementById(divName+num);
			for(i=1;i<total+1;i++){
				var looplinkobj=document.getElementById(linkName+i);
				if(looplinkobj.className=='now'){
					looplinkobj.className='';
					var loopdivobj=document.getElementById(divName+i);
					loopdivobj.style.display='none';
					linkobj.className='now';
					divobj.style.display='';
					break;
				}
			}
		}
	}
</script>
    <dt><span class="a">1.</span><a href="javascript:void(0)" hidefocus="true" class="now" id="index_news_link1" onclick="chgIndexDiv(1,3,'index_news_link', 'news_index')">国际新闻</a><span class="a">2.</span><a href="javascript:void(0)" hidefocus="true" id="index_news_link2" onclick="chgIndexDiv(2,3,'index_news_link', 'news_index')">体坛要闻</a><span class="a">3.</span><a href="javascript:void(0)" hidefocus="true" id="index_news_link3" onclick="chgIndexDiv(3,3,'index_news_link', 'news_index')">娱乐休闲</a> <span class="clear"></span> </dt>
    <dd id="news_index1">
	  <?
	  	$sql="SELECT id,name FROM renrenclone.article where type=2 order by id desc limit 5";
		$query =$db->query($sql);
		$i=0;
		while($newslist=$db->fetch_array($query)){							
			if($i==0){
				echo "<h3><a href=\"newscontent.php?id=".$newslist['id']."\" target='_blank'>".mb_strcut($newslist['name'],0,57,'utf-8')."</a></h3><ul>"; 
			}
			else{
				echo "<li><a href=\"newscontent.php?id=".$newslist['id']."\" class=\"left\" target='_blank'>".mb_strcut($newslist['name'],0,54,'utf-8')."</a>评论(2)</li>";				
			}
			$i+=1;
		}		
		echo "</ul>";
	?>	     
      <div class="right">更多：<a href="tagnews.php" target="_blank">大新闻</a>|<a href="tagnews.php" target="_blank">本地焦点</a></div>
    </dd>
	<dd id="news_index2" style="display:none">
	  <?
	  	$sql="SELECT id,name FROM renrenclone.article where type=6 order by id desc limit 5";
		$query =$db->query($sql);
		$i=0;
		while($newslist=$db->fetch_array($query)){							
			if($i==0){
				echo "<h3><a href=\"newscontent.php?id=".$newslist['id']."\">".mb_strcut($newslist['name'],0,54,'utf-8')."</a></h3><ul>"; 
			}
			else{
				echo "<li><a href=\"newscontent.php?id=".$newslist['id']."\" class=\"left\">".mb_strcut($newslist['name'],0,57,'utf-8')."</a>评论(2)</li>";				
			}
			$i+=1;
		}		
		echo "</ul>";
	?>
      <div class="right">更多：<a href="tagnews.php?typid=6" target="_blank">体坛要闻</a>|<a href="tagnews.php" target="_blank">本地焦点</a></div>
    </dd>
	<dd id="news_index3" style="display:none">
	  <?
	  	$sql="SELECT id,name FROM renrenclone.article where type=7 order by id desc limit 5";
		$query =$db->query($sql);
		$i=0;
		while($newslist=$db->fetch_array($query)){							
			if($i==0){
				echo "<h3><a href=\"newscontent.php?id=".$newslist['id']."\">".mb_strcut($newslist['name'],0,54,'utf-8')."</a></h3><ul>"; 
			}
			else{
				echo "<li><a href=\"newscontent.php?id=".$newslist['id']."\" class=\"left\">".mb_strcut($newslist['name'],0,57,'utf-8')."</a>评论(2)</li>";				
			}
			$i+=1;
		}		
		echo "</ul>";
	?>
      <div class="right">更多：<a href="tagnews.php?typid=7" target="_blank">娱乐休闲</a>|<a href="tagnews.php" target="_blank">本地焦点</a></div>
    </dd>
  </dl>
  <div id="flash_220_110">
	<!--object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="220" height="120">
      <param name="movie" value="menu.swf" />
      <param name="quality" value="high" />
      <embed src="menu.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="220" height="120"></embed>
    </object-->
    	<script type="text/javascript">
				AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','220','height','119','menu','false','quality','high','src','menu','wmode','transparent','allowScriptAccess','sameDomain','FlashVars','weatherXML=http://interface.renren.com/flash/002801.xml','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','menu' ); 
		</script>
  </div>
  <div id="act_220_100">
    <div>最新的新闻……<br />
      最新的发现……<br />
      朋友的分享……<br />
      尽在伙伴网！！！</div>
  </div>
  <div id="menu_120_260">
	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="120" height="258">
      <param name="movie" value="images/ad150260.swf" />
      <param name="quality" value="high" />
      <embed src="images/ad150260.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="120" height="258"></embed>
    </object>
  </div>
  <dl id="mode_classnews">
    <dt><span class="a">1.</span>
	<a href="javascript:void(0)" hidefocus="true" class="now" id="index_founds_link1" onclick="chgIndexDiv(1,5,'index_founds_link', 'founds_index')">每日抢新</a><span class="a">2.</span>
	<a href="javascript:void(0)" hidefocus="true" id="index_founds_link2" onclick="chgIndexDiv(2,5,'index_founds_link', 'founds_index')">现场目击</a><span class="a">3.</span>
	<a href="javascript:void(0)" hidefocus="true" id="index_founds_link3" onclick="chgIndexDiv(3,5,'index_founds_link', 'founds_index')">时尚导购</a><span class="a">4.</span>
	<a href="javascript:void(0)" hidefocus="true" id="index_founds_link4" onclick="chgIndexDiv(4,5,'index_founds_link', 'founds_index')">读报新闻</a><span class="a">5.</span>
	<a href="javascript:void(0)" hidefocus="true" id="index_founds_link5" onclick="chgIndexDiv(5,5,'index_founds_link', 'founds_index')">书影点评</a> <span class="clear"></span> </dt>
    <dd>
	<div id="founds_index1" style="width:100%">
<?php
	$sql = "SELECT id,title,summary FROM renrenclone.post where typeid=1 order by postdate desc limit 14";
	$query =$db->query($sql);
	$i=0;
	echo "<div class=\"half\">";
	while($found=$db->fetch_array($query)){
		if($i==0){			
			echo "<h3><a href=\"found.php?id=$found[id]\" target=\"_blank\">".mb_strcut($found[title],0,48,'utf-8')."</a></h3>\n";
			echo "<p>".mb_strcut($found[summary],0,210,'utf-8')."… </p>";
		}
		elseif($i==7){
			echo "</div><div class=\"halfright\">";
			echo "<h3><a href=\"found.php?id=$found[id]\" target=\"_blank\">".mb_strcut($found[title],0,48,'utf-8')."</a></h3>\n";
			echo "<p>".mb_strcut($found[summary],0,210,'utf-8')."… </p>";
		}
		elseif($i==1 or $i==8){
			echo "<ul>\n";
			echo "<li><a href=\"found.php?id=$found[id]\" target=\"_blank\">".mb_strcut($found[title],0,60,'utf-8')."</a></li>";
		}
		elseif($i==6){
			echo "<li><a href=\"found.php?id=$found[id]\" target=\"_blank\">".mb_strcut($found[title],0,60,'utf-8')."</a></li>";
			echo "</ul>";
		}
		else{
			echo "<li><a href=\"found.php?id=$found[id]\" target=\"_blank\">".mb_strcut($found[title],0,60,'utf-8')."</a></li>";
		}
		$i++;
	}
	if($i=7) echo "</div><div class=\"halfright\">";
?>
</ul>
      </div></div>
	<div id="founds_index2" style="display:none;width:100%">
<?php
	$sql = "SELECT id,title,summary FROM renrenclone.post where typeid=2 order by postdate desc limit 14";
	$query =$db->query($sql);
	$i=0;
	echo "<div class=\"half\">";
	while($found=$db->fetch_array($query)){
		if($i==0){			
			echo "<h3><a href=\"found.php?id=$found[id]\" target=\"_blank\">".mb_strcut($found[title],0,48,'utf-8')."</a></h3>\n";
			echo "<p>".mb_strcut($found[summary],0,210,'utf-8')."… </p>";
		}
		elseif($i==7){
			echo "</div><div class=\"halfright\">";
			echo "<h3><a href=\"found.php?id=$found[id]\" target=\"_blank\">".mb_strcut($found[title],0,48,'utf-8')."</a></h3>\n";
			echo "<p>".mb_strcut($found[summary],0,210,'utf-8')."… </p>";
		}
		elseif($i==1 or $i==8){
			echo "<ul>\n";
			echo "<li><a href=\"found.php?id=$found[id]\" target=\"_blank\">".mb_strcut($found[title],0,60,'utf-8')."</a></li>";
		}
		elseif($i==6){
			echo "<li><a href=\"found.php?id=$found[id]\" target=\"_blank\">".mb_strcut($found[title],0,60,'utf-8')."</a></li>";
			echo "</ul>";
		}
		else{
			echo "<li><a href=\"found.php?id=$found[id]\" target=\"_blank\">".mb_strcut($found[title],0,60,'utf-8')."</a></li>";
		}
		$i++;
	}
	if($i=7) echo "</div><div class=\"halfright\">";
?>
</ul>
    </div></div>
	<div id="founds_index3" style="display:none;width:100%">
<?php
	$sql = "SELECT id,title,summary FROM renrenclone.post where typeid=3 order by postdate desc limit 12";
	$query =$db->query($sql);
	$i=0;
	echo "<div class=\"half\">";
	while($found=$db->fetch_array($query)){
		if($i==0){			
			echo "<h3><a href=\"found.php?id=$found[id]\" target=\"_blank\">".mb_strcut($found[title],0,48,'utf-8')."</a></h3>\n";
			echo "<p>".mb_strcut($found[summary],0,210,'utf-8')."… </p>";
		}
		elseif($i==7){
			echo "</div><div class=\"halfright\">";
			echo "<h3><a href=\"found.php?id=$found[id]\" target=\"_blank\">".mb_strcut($found[title],0,48,'utf-8')."</a></h3>\n";
			echo "<p>".mb_strcut($found[summary],0,210,'utf-8')."… </p>";
		}
		elseif($i==1 or $i==8){
			echo "<ul>\n";
			echo "<li><a href=\"found.php?id=$found[id]\" target=\"_blank\">".mb_strcut($found[title],0,60,'utf-8')."</a></li>";
		}
		elseif($i==6){
			echo "<li><a href=\"found.php?id=$found[id]\" target=\"_blank\">".mb_strcut($found[title],0,60,'utf-8')."</a></li>";
			echo "</ul>";
		}
		else{
			echo "<li><a href=\"found.php?id=$found[id]\" target=\"_blank\">".mb_strcut($found[title],0,60,'utf-8')."</a></li>";
		}
		$i++;
	}
	if($i=7) echo "</div><div class=\"halfright\">";
?>
		</ul>
    </div></div>
	<div id="founds_index4" style="display:none;width:100%">
<?php
	$sql = "SELECT id,title,summary FROM renrenclone.post where typeid=4  order by postdate desc limit 12";
	$query =$db->query($sql);
	$i=0;
	echo "<div class=\"half\">";
	while($found=$db->fetch_array($query)){
		if($i==0){			
			echo "<h3><a href=\"found.php?id=$found[id]\" target=\"_blank\">".mb_strcut($found[title],0,48,'utf-8')."</a></h3>\n";
			echo "<p>".mb_strcut($found[summary],0,210,'utf-8')."… </p>";
		}
		elseif($i==7){
			echo "</div><div class=\"halfright\">";
			echo "<h3><a href=\"found.php?id=$found[id]\" target=\"_blank\">".mb_strcut($found[title],0,48,'utf-8')."</a></h3>\n";
			echo "<p>".mb_strcut($found[summary],0,210,'utf-8')."… </p>";
		}
		elseif($i==1 or $i==8){
			echo "<ul>\n";
			echo "<li><a href=\"found.php?id=$found[id]\" target=\"_blank\">".mb_strcut($found[title],0,60,'utf-8')."</a></li>";
		}
		elseif($i==6){
			echo "<li><a href=\"found.php?id=$found[id]\" target=\"_blank\">".mb_strcut($found[title],0,60,'utf-8')."</a></li>";
			echo "</ul>";
		}
		else{
			echo "<li><a href=\"found.php?id=$found[id]\" target=\"_blank\">".mb_strcut($found[title],0,60,'utf-8')."</a></li>";
		}
		$i++;
	}
	if($i=7) echo "</div><div class=\"halfright\">";
?>
</ul>
    </div></div>
	<div id="founds_index5" style="display:none;width:100%">
<?php
	$sql = "SELECT id,title,summary FROM renrenclone.post where typeid=5 order by postdate desc limit 12";
	$query =$db->query($sql);
	$i=0;
	echo "<div class=\"half\">";
	while($found=$db->fetch_array($query)){
		if($i==0){			
			echo "<h3><a href=\"found.php?id=$found[id]\" target=\"_blank\">".mb_strcut($found[title],0,48,'utf-8')."</a></h3>\n";
			echo "<p>".mb_strcut($found[summary],0,210,'utf-8')."… </p>";
		}
		elseif($i==7){
			echo "</div><div class=\"halfright\">";
			echo "<h3><a href=\"found.php?id=$found[id]\" target=\"_blank\">".mb_strcut($found[title],0,48,'utf-8')."</a></h3>\n";
			echo "<p>".mb_strcut($found[summary],0,210,'utf-8')."… </p>";
		}
		elseif($i==1 or $i==8){
			echo "<ul>\n";
			echo "<li><a href=\"found.php?id=$found[id]\" target=\"_blank\">".mb_strcut($found[title],0,60,'utf-8')."</a></li>";
		}
		elseif($i==6){
			echo "<li><a href=\"found.php?id=$found[id]\" target=\"_blank\">".mb_strcut($found[title],0,60,'utf-8')."</a></li>";
			echo "</ul>";
		}
		else{
			echo "<li><a href=\"found.php?id=$found[id]\" target=\"_blank\">".mb_strcut($found[title],0,60,'utf-8')."</a></li>";
		}
		$i++;
	}
	if($i=7) echo "</div><div class=\"halfright\">";
?>
</ul>
    </div></div>
    </dd>
  </dl>
  <dl id="mode_class_shoping">
    <dt><span class="a">1.</span><a href="javascript:void(0)" hidefocus="true" id="index_ad_link1" class="now" style="border-right:none" onclick="chgIndexDiv(1,2,'index_ad_link', 'ad_index')">热门分类</a>
<span class="a">2.</span><a href="javascript:void(0)" hidefocus="true" id="index_ad_link2" class="" style="border-right:none" onclick="chgIndexDiv(2,2,'index_ad_link', 'ad_index')">跳蚤市场</a> 
<span class="clear"></span></dt>
    <dd>
	<div id="ad_index2" style="display:none">
      <ul id="shoping">
        <li><a href="classlist.php?typeid=43" target="_blank" id="shop_home">居家用品</a><span class="num">(
<?php
	$sql="SELECT count(id) FROM renrenclone.advertisement where typeid=43";
	$query = $db->query($sql);
	if($db->num_rows($query)){
		$count = $db->result($query, 0);
	}
	else{
		$count = 0;
	}
	echo $count;
?>)</span></li>
        <li><a href="classlist.php?typeid=44" target="_blank" id="shop_pc">电脑配件</a><span class="num">(
<?php
	$sql="SELECT count(id) FROM renrenclone.advertisement where typeid=44";
	$query = $db->query($sql);
	if($db->num_rows($query)){
		$count = $db->result($query, 0);
	}
	else{
		$count = 0;
	}
	echo $count;
?>)</span></li>
        <li><a href="classlist.php?typeid=45" target="_blank" id="shop_office">办公用品</a><span class="num">(
<?php
	$sql="SELECT count(id) FROM renrenclone.advertisement where typeid=45";
	$query = $db->query($sql);
	if($db->num_rows($query)){
		$count = $db->result($query, 0);
	}
	else{
		$count = 0;
	}
	echo $count;
?>)</span></li>
        <li><a href="classlist.php?typeid=46" target="_blank" id="shop_mobile">数码手机</a><span class="num">(
<?php
	$sql="SELECT count(id) FROM renrenclone.advertisement where typeid=46";
	$query = $db->query($sql);
	if($db->num_rows($query)){
		$count = $db->result($query, 0);
	}
	else{
		$count = 0;
	}
	echo $count;
?>)</span></li>
        <li><a href="classlist.php?typeid=47" target="_blank" id="shop_face">美容护肤</a><span class="num">(
<?php
	$sql="SELECT count(id) FROM renrenclone.advertisement where typeid=47";
	$query = $db->query($sql);
	if($db->num_rows($query)){
		$count = $db->result($query, 0);
	}
	else{
		$count = 0;
	}
	echo $count;
?>)</span></li>
        <li><a href="classlist.php?typeid=48" target="_blank" id="shop_book">影音书籍</a><span class="num">(
<?php
	$sql="SELECT count(id) FROM renrenclone.advertisement where typeid=48";
	$query = $db->query($sql);
	if($db->num_rows($query)){
		$count = $db->result($query, 0);
	}
	else{
		$count = 0;
	}
	echo $count;
?>)</span></li>
        <li><a href="classlist.php?typeid=49" target="_blank" id="shop_cloth">服装饰品</a><span class="num">(
<?php
	$sql="SELECT count(id) FROM renrenclone.advertisement where typeid=49";
	$query = $db->query($sql);
	if($db->num_rows($query)){
		$count = $db->result($query, 0);
	}
	else{
		$count = 0;
	}
	echo $count;
?>)</span></li>
        <li><a href="classlist.php?typeid=50" target="_blank" id="shop_second">二手转让</a><span class="num">(
<?php
	$sql="SELECT count(id) FROM renrenclone.advertisement where typeid=50";
	$query = $db->query($sql);
	if($db->num_rows($query)){
		$count = $db->result($query, 0);
	}
	else{
		$count = 0;
	}
	echo $count;
?>)</span></li>
        <li><a href="classlist.php?typeid=51" target="_blank" id="shop_other">其他买卖</a><span class="num">(
<?php
	$sql="SELECT count(id) FROM renrenclone.advertisement where typeid=51";
	$query = $db->query($sql);
	if($db->num_rows($query)){
		$count = $db->result($query, 0);
	}
	else{
		$count = 0;
	}
	echo $count;
?>)</span></li>
        <li><a href="classlist.php?typeid=52" target="_blank" id="shop_electricity">家具电器</a><span class="num">(
<?php
	$sql="SELECT count(id) FROM renrenclone.advertisement where typeid=52";
	$query = $db->query($sql);
	if($db->num_rows($query)){
		$count = $db->result($query, 0);
	}
	else{
		$count = 0;
	}
	echo $count;
?>)</span></li>
      </ul></div><div id="ad_index1">
      <ul id="class">
        <li><a href="classlist.php?typeid=13" target="_blank" id="class_tour">旅游活动</a><span class="num">(
<?php
	$sql="SELECT count(id) FROM renrenclone.advertisement where typeid=13";
	$query = $db->query($sql);
	if($db->num_rows($query)){
		$count = $db->result($query, 0);
	}
	else{
		$count = 0;
	}
	echo $count;
?>)</span></li>
        <li><a href="classlist.php?typeid=12" target="_blank" id="class_eat">餐　　饮</a><span class="num">(<?php
	$sql="SELECT count(id) FROM renrenclone.advertisement where typeid=12";
	$query = $db->query($sql);
	if($db->num_rows($query)){
		$count = $db->result($query, 0);
	}
	else{
		$count = 0;
	}
	echo $count;
?>)</span></li>
        <li><a href="classlist.php?typeid=10" target="_blank" id="class_shop">打折信息</a><span class="num">(<?php
	$sql="SELECT count(id) FROM renrenclone.advertisement where typeid=10";
	$query = $db->query($sql);
	if($db->num_rows($query)){
		$count = $db->result($query, 0);
	}
	else{
		$count = 0;
	}
	echo $count;
?>)</span></li>
        <li><a href="classlist.php?typeid=14" target="_blank" id="class_pet">宠物天地</a><span class="num">(<?php
	$sql="SELECT count(id) FROM renrenclone.advertisement where typeid=14";
	$query = $db->query($sql);
	if($db->num_rows($query)){
		$count = $db->result($query, 0);
	}
	else{
		$count = 0;
	}
	echo $count;
?>)</span></li>
        <li><a href="classlist.php?typeid=19" target="_blank" id="class_lend">出租求租</a><span class="num">(<?php
	$sql="SELECT count(id) FROM renrenclone.advertisement where typeid=19 or typeid=20";
	$query = $db->query($sql);
	if($db->num_rows($query)){
		$count = $db->result($query, 0);
	}
	else{
		$count = 0;
	}
	echo $count;
?>)</span></li>
        <li><a href="classlist.php?typeid=18" target="_blank" id="class_house">买房卖房</a><span class="num">(<?php
	$sql="SELECT count(id) FROM renrenclone.advertisement where typeid=18";
	$query = $db->query($sql);
	if($db->num_rows($query)){
		$count = $db->result($query, 0);
	}
	else{
		$count = 0;
	}
	echo $count;
?>)</span></li>
        <li><a href="classlist.php?typeid=21" target="_blank" id="class_office">商铺楼宇</a><span class="num">(<?php
	$sql="SELECT count(id) FROM renrenclone.advertisement where typeid=21";
	$query = $db->query($sql);
	if($db->num_rows($query)){
		$count = $db->result($query, 0);
	}
	else{
		$count = 0;
	}
	echo $count;
?>)</span></li>
        <li><a href="classlist.php?typeid=17" target="_blank" id="class_job">招聘求职</a><span class="num">(<?php
	$sql="SELECT count(id) FROM renrenclone.advertisement where typeid=17";
	$query = $db->query($sql);
	if($db->num_rows($query)){
		$count = $db->result($query, 0);
	}
	else{
		$count = 0;
	}
	echo $count;
?>)</span></li>
        <li><a href="classlist.php?typeid=29" target="_blank" id="class_ticket">买票卖票</a><span class="num">(<?php
	$sql="SELECT count(id) FROM renrenclone.advertisement where typeid=29";
	$query = $db->query($sql);
	if($db->num_rows($query)){
		$count = $db->result($query, 0);
	}
	else{
		$count = 0;
	}
	echo $count;
?>)</span></li>
        <li><a href="classlist.php?typeid=44" target="_blank" id="class_pc">电脑配件</a><span class="num">(<?php
	$sql="SELECT count(id) FROM renrenclone.advertisement where typeid=44";
	$query = $db->query($sql);
	if($db->num_rows($query)){
		$count = $db->result($query, 0);
	}
	else{
		$count = 0;
	}
	echo $count;
?>)</span></li>
      </ul></div>
    </dd>
  </dl>
  <dl id="mode_hotpart">
    <dt class="title">热门板块 <span class="clear"></span> </dt>
    <dd>
      <ul>
        <li><a href="bbs/forumdisplay.php?fid=47" target="_blank">流行时尚</a></li>
        <li><a href="bbs/forumdisplay.php?fid=41" target="_blank">影视天堂</a></li>
        <li><a href="bbs/forumdisplay.php?fid=42" target="_blank">流行音乐</a></li>        
        <li><a href="bbs/forumdisplay.php?fid=43" target="_blank">动漫世家</a></li>
        <li><a href="bbs/forumdisplay.php?fid=48" target="_blank">汽车之家</a></li>
        <li><a href="bbs/forumdisplay.php?fid=49" target="_blank">美女贴图</a></li>
        <li><a href="bbs/forumdisplay.php?fid=53" target="_blank">小说之家</a></li>
		<li><a href="bbs/forumdisplay.php?fid=51" target="_blank">女生世界</a></li>
		<li><a href="bbs/forumdisplay.php?fid=56" target="_blank">美食</a></li>
        <li><a href="bbs/forumdisplay.php?fid=62" target="_blank">数码</a></li>
      </ul>
    </dd>
  </dl>
  <dl id="mode_movie">
    <dt><strong>影视 Movie</strong><span class="a">1.</span>
	<a href="bbs/forumdisplay.php?fid=4&filter=type&typeid=11" target="_blank">影评</a><span class="a">2.</span>
	<a href="bbs/forumdisplay.php?fid=4&filter=type&typeid=10" target="_blank">综艺</a><span class="a">3.</span>
	<a href="bbs/forumdisplay.php?fid=4&filter=type&typeid=9" target="_blank">连续剧</a><span class="a">4.</span>
    <a href="bbs/forumdisplay.php?fid=4&filter=type&typeid=8" target="_blank">动漫</a><span class="a">5.</span>
	<a href="bbs/forumdisplay.php?fid=4&filter=type&typeid=7" target="_blank">电影</a> <span class="clear"></span> </dt>
    <dd><a href="bbs/forumdisplay.php?fid=4" target="_blank" class="pic_157_146"><img src="images/movie.jpg" width="155" height="144"/></a>
      <ul class="fixtable">
	  <?
	  	$sql="SELECT ttype.name,t.subject,t.tid,t.dateline FROM {$databasepre}.cdb_threads t left outer join {$databasepre}.cdb_threadtypes ttype on t.typeid=ttype.typeid  where fid=4 limit 7";
		$query=$db->query($sql);
		while($movie=$db->fetch_array($query)){
			$postdate = date('Y-m-d',$movie[dateline]);
			echo "<li><a href=\"bbs/viewthread.php?tid=$movie[tid]\" class=\"left\" target=\"_blank\">";
			echo "[$movie[name]]  $movie[subject]</a>$postdate</li>";
		}
	  ?>
      </ul>
    </dd>
  </dl>
  <dl id="mode_house">
    <dt><span class="a">1.</span><a href="javascript:void(0)" hidefocus="true" class="now" style="border-right:none" id="index_house_link1" onclick="chgIndexDiv(1,2,'index_house_link', 'house_index')"><img src="images/house_menu_icon.gif" />&nbsp;&nbsp;出租房屋</a>
	    <span class="a">2.</span><a href="javascript:void(0)" hidefocus="true" class="" style="border-right:none" id="index_house_link2" onclick="chgIndexDiv(2,2,'index_house_link', 'house_index')"><img src="images/house_menu_icon.gif" />&nbsp;&nbsp;求租房屋</a> <span class="clear"></span> </dt>
    <dd>
      <table id="house_index1" cellspacing="0" class="fixtable">
        <tr>
          <th>城区</th>
          <th>面积</th>
       <!--   <th>房型</th>-->
          <th>租金</th> 
        </tr>
		<?php 
			$querybuild="SELECT * FROM renrenclone.advertisement where typeid=19 ORDER BY postdate DESC limit 0,4";
			$resultbuild=$db->query($querybuild); 
			$i=0;
			while($rowbuild=$db->fetch_array($resultbuild)){
				$querybuild="SELECT * FROM renrenclone.advertisecolumnvalue where advertiseid=".$rowbuild['id'];
				$resultbuildcol=$db->query($querybuild);
				$i=$i+1;
				if($i==1){
					echo '<tr class="od">';
				}else{
					echo "<tr>";
					$i=0;
				}
				$location=$rowbuild['title'];
				$adid=$rowbuild['id'];
				$area="";
				$type="";
				$hire="";
				while($rowbuildcol=$db->fetch_array($resultbuildcol)){
					switch($rowbuildcol['columnid']){
						case 32:
							$area=$rowbuildcol['columnvalue'];
							break;
						case 38:
							$hire=$rowbuildcol['columnvalue'];
							break;
					}
				}
				echo "<td><a href='classcontent.php?id=".$adid."' target='_blank'>".$location."</a></td>";
				echo "<td>".$area."</td>";
				//echo "<td>".$type."</td>";
				echo "<td>".$hire."</td>";
				echo "</tr>";
		}
		?>
      
      </table>
	  <table id="house_index2" cellspacing="0" class="fixtable" style="display:none">
	  	  <tr>
          <th>城区</th>
          <th>面积</th>
         <!-- <th>房型</th>-->
          <th>租金</th>
        </tr>
       <?php 
			$querybuild="SELECT * FROM renrenclone.advertisement where typeid=20 ORDER BY postdate DESC limit 0,4";
			$resultbuild=$db->query($querybuild);
			$i=0;
			while($rowbuild=$db->fetch_array($resultbuild)){
				$querybuild="SELECT * FROM renrenclone.advertisecolumnvalue where advertiseid=".$rowbuild['id'];
				$resultbuildcol=$db->query($querybuild);
				$i=$i+1;
				if($i==1){
					echo '<tr class="od">';
				}else{
					echo "<tr>";
					$i=0;
				}
				$location=$rowbuild['title'];
				$adid=$rowbuild['id'];
				$area="1";
				$type="";
				$hire="2";
				while($rowbuildcol=$db->fetch_array($resultbuildcol)){
					switch($rowbuildcol['columnid']){
						case 33:
							$area=$rowbuildcol['columnvalue'];
							break;
						case 39:
							$hire=$rowbuildcol['columnvalue'];
							break;
					}
				}
				echo "<td><a href='classcontent.php?id=".$adid."' target='_blank'>".$location."</a></td>";
				echo "<td>".$area."</td>";
				//echo "<td>".$type."</td>";
				echo "<td>".$hire."</td>";
				echo "</tr>";
		}
		?>
	  </table>
    </dd>
  </dl>
  <dl id="mode_posttop">
    <dt class="title">发贴排行榜 <span class="clear"></span> </dt>
    <dd>
      <ol class="fixtable">
<?
	$postsrank = '';
	$statvars = array();
	$query = $db->query("SELECT * FROM {$databasepre}.cdb_statvars WHERE type='postsrank'");
	while($variable = $db->fetch_array($query)) {
		$statvars[$variable['variable']] = $variable['value'];
	}
	$posts = array();

	if(isset($statvars['posts'])) {
		$posts = unserialize($statvars['posts']);
	} else {
		$query = $db->query("SELECT username, uid, posts FROM {$databasepre}.cdb_members ORDER BY posts DESC LIMIT 0, 20");
		while($member = $db->fetch_array($query)) {
			$posts[] = $member;
		}
		$db->query("REPLACE INTO {$databasepre}.cdb_statvars (type, variable, value)
			VALUES ('postsrank', 'posts', '".addslashes(serialize($posts))."')");
	}
	for($i = 0; $i < 9; $i++) {
		if(isset($posts[$i]['username'])){
		$query = $db->query("select avatar from {$databasepre}.cdb_memberfields where uid=".$posts[$i][uid]);
		echo "<li><a href=\"bbs/viewpro.php?uid=".$posts[$i][uid]."\" class=\"pic_35_33\" target=\"_blank\">";
		$picaddr="";
		if($db->num_rows($query)){
			$picaddr = $db->result($query, 0);
		}
		if($picaddr==""){
			$picaddr="images/no_photo.gif";
		}
		else{
			$picaddr="bbs/".$picaddr;
		}
		echo "<img src=\"".$picaddr."\" width=33 height=31/>";
		echo "</a><a href=\"bbs/viewpro.php?username=";
		echo rawurlencode($posts[$i]['username'])."\" class=\"username\" target=\"_blank\">";
		echo $posts[$i][username]."</a>\n";
		echo "<p>发表了<span>".$posts[$i][posts]."篇帖子</span></p></li>";}
	}	
?>       
      </ol>
    </dd>
  </dl>
  <dl id="mode_music">
    <dt><strong>音乐 Music</strong><span class="a">1.</span>
	<a href="bbs/forumdisplay.php?fid=5&filter=type&typeid=6" target="_blank">其他</a><span class="a">2.</span>
	<a href="bbs/forumdisplay.php?fid=5&filter=type&typeid=5" target="_blank">MTV</a><span class="a">3.</span>
	<a href="bbs/forumdisplay.php?fid=5&filter=type&typeid=4" target="_blank">流行</a><span class="a">4.</span>
	<a href="bbs/forumdisplay.php?fid=5&filter=type&typeid=1" target="_blank">日韩</a><span class="a">5.</span>
	<a href="bbs/forumdisplay.php?fid=5&filter=type&typeid=2" target="_blank">欧美</a><span class="a">6.</span>
	<a href="bbs/forumdisplay.php?fid=5&filter=type&typeid=3" target="_blank">华语</a> <span class="clear"></span> </dt>
    <dd><a href="bbs/forumdisplay.php?fid=5" target="_blank" class="pic_157_146"><img src="images/music.jpg" width="155" height="144"/></a>
      <ul class="fixtable">
	   <?
	  	$sql="SELECT ttype.name,t.subject,t.tid,t.dateline FROM {$databasepre}.cdb_threads t left outer join {$databasepre}.cdb_threadtypes ttype on t.typeid=ttype.typeid  where fid=5 order by t.tid DESC limit 7";
		$query=$db->query($sql);
		while($music=$db->fetch_array($query)){
			$postdate = date('Y-m-d',$music[dateline]);
			echo "<li><a href=\"bbs/viewthread.php?tid=$music[tid]\" class=\"left\" target=\"_blank\">";
			echo "[$music[name]]  $music[subject]</a>$postdate</li>";
		}
	  ?>        
      </ul>
    </dd>
  </dl>
  <dl id="mode_secondhand">
    <dt class="title">最新二手信息 <span class="clear"></span> </dt>
    <dd>
      <ul class="fixtable">
      	<?php
      		$sql = "SELECT id,title FROM renrenclone.advertisement where typeid in (select typeid from renrenclone.advertisetype where lasttype=7) limit 6";
      		$query = $db->query($sql);
      		$countcontrol=0;
      		while($oldhand = $db->fetch_array($query)){
      			if($countcontrol==0){
      				echo "<li><a href=\"classcontent.php?id=".$oldhand['id']."\" target='_blank'>".$oldhand['title']."</a></li>";
      				$countcontrol=1;
      			}
      			else{
      				echo "<li class='od'><a href=\"classcontent.php?id=".$oldhand['id']."\" target='_blank'>".$oldhand['title']."</a></li>";
      				//echo "<li class='od'><a href=\"classcontent.php?id=$oldhand['id']\" target='_blank'> $oldhand['title']</a></li>";
      				$countcontrol=0;
      			}
      		}
      	?>       
      </ul>
    </dd>
  </dl>
  <dl id="mode_photo">
    <dt><strong>贴图 Photo</strong><span class="a">1.</span>
	<a href="bbs/forumdisplay.php?fid=22" target="_blank">流行时尚</a><span class="a">2.</span>
	<a href="bbs/forumdisplay.php?fid=19" target="_blank">汽车之家</a><span class="a">3.</span>
	<a href="bbs/forumdisplay.php?fid=24" target="_blank">美女贴图</a><span class="a">4.</span>
	<a href="bbs/forumdisplay.php?fid=21" target="_blank">真实自我</a><span class="a">5.</span>
	<a href="bbs/forumdisplay.php?fid=20" target="_blank">旅游摄影</a> <span class="clear"></span> </dt>
    <dd>
      <div class="half"> <a href="bbs/index.php?gid=18" target="_blank" class="pic_157_94"><img src="images/photo.jpg" width="155" height="92" /></a>
        <ul class="fixtable">
		<?php
			$sql = "SELECT t.tid tid,t.subject subject,t.attachment attachment,t.dateline dateline,f.name fname  FROM {$databasepre}.cdb_threads t left outer join {$databasepre}.cdb_forums f on t.fid= f.fid where f.fup=18 order by t.tid DESC limit 7";			
			$query = $db->query($sql);
			$arrtietu = array();
			$count=1;
			while($tietu=$db->fetch_array($query)){
				$postdate = date('Y-m-d',$tietu['dateline']);
				if($tietu['attachment']>0 and $count<3){
					$tietu['postdate'] = $postdate;
					$arrtietu[]=$tietu;
					$count+=1;
				}
				else{
					echo "<li><a href=\"bbs/viewthread.php?tid=".$tietu['tid']."\" class=\"left\" target='_blank'>[".$tietu['fname']."]".$tietu['subject']."</a>".$postdate."</li>";
				}
			}
		?>          
        </ul>
        <span class="clear"></span> </div>
      <div class="halfbottom">
        <ul class="half">
		<?php
			foreach($arrtietu as $tietudes){
				$sql = "SELECT message FROM {$databasepre}.cdb_posts where tid=".$tietudes['tid'];
				$textpost = $db->result($db->query($sql), 0);				
				$pos2 = 0;
				$pos1=strpos($textpost ,"[img]");
				while(!($pos1===false)){
					$pos2= strpos($textpost ,"[/img]");
					if($pos2){
						$textpost  = substr($textpost ,0,$pos1).substr($textpost ,$pos2+1);
					}
					else{
						$textpost  = substr($textpost ,0,$pos1);
					}
					$pos1=strpos($textpost ,"[img]");
				}
				$textpost = mb_strcut($textpost,0,54,'utf-8');
				$sql = "SELECT attachment FROM {$databasepre}.cdb_attachments where tid=".$tietudes['tid'];
				$attachment = $db->result($db->query($sql), 0);					
				echo "<li><a href=\"bbs/viewthread.php?tid=".$tietudes['tid']."\" class=\"pic_72_74\" target='_blank'><img src=\"bbs/attachments/".$attachment."\" height='72' width='70'></img></a>";
				$title = mb_strcut($tietudes['subject'],0,24,'utf-8');
				echo "<h4><a href=\"bbs/viewthread.php?tid=".$tietudes['tid']."\" target='_blank'>《".$title."》</a></h4>";
				echo "<p>".$textpost."… </p></li>";
			}
			unset($arrtietu);
		?>          
        </ul>
      </div>
    </dd>
  </dl>
  <dl id="mode_hot">
    <dt class="title">热门 <span class="clear"></span> </dt>
    <dd><a href="bbs/index.php?gid=13" class="pic_56_54" target="_blank"><img src="images/remen.jpg" alt="热门" width="56" height="56" /></a>
	  <?php
			$sql = "SELECT t.tid tid,t.subject subject,f.name fname  FROM {$databasepre}.cdb_threads t left outer join {$databasepre}.cdb_forums f on t.fid= f.fid where f.fup=13 order by t.tid DESC limit 6";			
			$query = $db->query($sql);
			$arrremen = array();
			$count=1;
			while($remen=$db->fetch_array($query)){				
				if($count==1){
					echo "<h4><a href=\"bbs/viewthread.php?tid=".$remen['tid']."\" target='_blank'>".$remen['subject']."</a></h4>";	
				}
				else{
					$arrremen[]=$remen;
				}
				$count+=1;
			}
			echo "<ul class=\"fixtable\">";
			foreach($arrremen as $remendes){
				echo " <li><a href=\"bbs/viewthread.php?tid=".$remendes['tid']."\" target='_blank'>" . $remendes['subject']. "</a></li>";
			}
			echo "</ul>";
			unset($arrremen);
	  ?> 
      <!--<h3><a href="#">《依然饭特稀》</a></h3>
      <p>万众瞩目的周杰伦最新专辑《依然范特西》创造无尽多变的新元素，“想像依然无限大、感觉依然说不完、音… </p>
      <ul class="fixtable">      
      </ul><-->
      <div class="center"><a href="bbs/forumdisplay.php?fid=16" target="_blank">新闻</a><a href="bbs/forumdisplay.php?fid=17" target="_blank">美食</a><a href="bbs/forumdisplay.php?fid=15" target="_blank">英语学习</a><a href="bbs/forumdisplay.php?fid=14" target="_blank">军事</a> </div>
    </dd>
  </dl>
  <dl id="mode_link">
    <dt class="title">友情连接 <span class="clear"></span> </dt>
    <dd><a href="#" class="pic_88_31"></a><a href="#" class="pic_88_31"></a>
      <ul>
        <li><a href="#">热门板块</a></li>
        <li><a href="#">热门板块</a></li>
        <li><a href="#">影视天地</a></li>
        <li><a href="#">影视天地</a></li>
        <li><a href="#">流行音乐</a></li>
        <li><a href="#">流行音乐</a></li>
        <li><a href="#">动漫之家</a></li>
        <li><a href="#">动漫之家</a></li>
        <li><a href="#">美女贴图</a></li>
        <li><a href="#">美女贴图</a></li>
      </ul>
    </dd>
  </dl>
  <dl id="mode_fun">
    <dt><strong>休闲</strong><span class="a">1.</span>
	<a href="bbs/forumdisplay.php?fid=9" target="_blank">笑林寺</a><span class="a">2.</span>
	<a href="bbs/forumdisplay.php?fid=12" target="_blank">小说之家</a><span class="a">3.</span>
	<a href="bbs/forumdisplay.php?fid=11" target="_blank">男生世界</a><span class="a">4.</span>
	<a href="bbs/forumdisplay.php?fid=10" target="_blank">女生世界</a> <span class="clear"></span> </dt>
    <dd>
      <div class="half"> <a href="bbs/index.php?gid=8" class="pic_157_94" target="_blank"></a>
        <ul class="fixtable">
          <?php
			$sql = "SELECT t.tid tid,t.subject subject,t.attachment attachment,t.dateline dateline,f.name fname  FROM {$databasepre}.cdb_threads t left outer join {$databasepre}.cdb_forums f on t.fid= f.fid where f.fup=8 order by t.tid DESC limit 7";			
			$query = $db->query($sql);
			$arrxiuxian = array();
			$count=1;
			while($xiuxian=$db->fetch_array($query)){
				$postdate = date('Y-m-d',$xiuxian['dateline']);
				if($xiuxian['attachment']>0 and $count<3){
					$xiuxian['postdate'] = $postdate;
					$arrxiuxian[]=$xiuxian;
					$count+=1;
				}
				else{
					echo "<li><a href=\"bbs/viewthread.php?tid=".$xiuxian['tid']."\" class=\"left\" target='_blank'>[".$xiuxian['fname']."]".$xiuxian['subject']."</a>".$postdate."</li>";
				}
			}
		?>  
        </ul>
        <span class="clear"></span> </div>
      <div class="halfbottom">
        <ul class="half">
         <?php
			foreach($arrxiuxian as $xiuxiandes){
				$sql = "SELECT message FROM {$databasepre}.cdb_posts where tid=".$xiuxiandes['tid'];
				$textpost = $db->result($db->query($sql), 0);				
				$pos2 = 0;
				$pos1=strpos($textpost ,"[img]");
				while(!($pos1===false)){
					$pos2= strpos($textpost ,"[/img]");
					if($pos2){
						$textpost  = substr($textpost ,0,$pos1).substr($textpost ,$pos2+1);
					}
					else{
						$textpost  = substr($textpost ,0,$pos1);
					}
					$pos1=strpos($textpost ,"[img]");
				}
				$textpost = mb_strcut($textpost,0,54,'utf-8');
				$sql = "SELECT attachment FROM {$databasepre}.cdb_attachments where tid=".$xiuxiandes['tid'];
				$attachment = $db->result($db->query($sql), 0);					
				echo "<li><a href=\"bbs/viewthread.php?tid=".$xiuxiandes['tid']."\" class=\"pic_72_74\" target='_blank'><img src=\"bbs/attachments/".$attachment."\" height='72' width='70'></img></a>";
				$title = mb_strcut($xiuxiandes['subject'],0,24,'utf-8');
				echo "<h4><a href=\"bbs/viewthread.php?tid=".$xiuxiandes['tid']."\" target='_blank'>《".$title."》</a></h4>";
				echo "<p>".$textpost."… </p></li>";
			}
			unset($arrxiuxian);
		?>  
        </ul>
      </div>
    </dd>
  </dl>
  <dl id="mode_pc">
    <dt class="title">电脑 <span class="clear"></span> </dt>
    <dd><a href="bbs/index.php?gid=25" class="pic_56_54" target="_blank"><img src="images/game.jpg" alt="电脑" width="54" height="52" /></a>
      <?php
			$sql = "SELECT t.tid tid,t.subject subject,f.name fname  FROM {$databasepre}.cdb_threads t left outer join {$databasepre}.cdb_forums f on t.fid= f.fid where f.fup=25 order by t.tid DESC limit 6";			
			$query = $db->query($sql);
			$arrdiannao = array();
			$count=1;
			while($diannao=$db->fetch_array($query)){				
				if($count==1){
					echo "<h4><a href=\"bbs/viewthread.php?tid=".$remen['tid']."\" target='_blank'>".$diannao['subject']."</a></h4>";	
				}
				else{
					$arrdiannao[]=$diannao;
				}
				$count+=1;
			}
			echo "<ul class=\"fixtable\">";
			foreach($arrdiannao as $diannaodes){
				echo " <li><a href=\"bbs/viewthread.php?tid=".$diannaodes['tid']."\" target='_blank'>" . $diannaodes['subject']. "</a></li>";
			}
			echo "</ul>";
			unset($arrdiannao);
	  ?>
      <div class="center">
	  	<a href="bbs/forumdisplay.php?fid=30" target="_blank">游戏</a>
	  	<a href="bbs/forumdisplay.php?fid=28" target="_blank">软件</a>
	  	<a href="bbs/forumdisplay.php?fid=27" target="_blank">闪客</a>
	  	<a href="bbs/forumdisplay.php?fid=29" target="_blank">数码</a> </div>
    </dd>
  </dl>
  <div class="clear"></div>
</div>
<!--主体内容结束-->
<!--版权开始-->
<div id="copyright">
  <div class="menu"><a href="#" target="new">关于伙伴网</a> | <a href="#" target="new">广告服务</a> | <a href="#" target="new">合作方式</a> | <a href="#" target="new">免责声明</a></div>
 <div align="center"><br />
       <span><a href="http://www.exue.com" target="_blank">www.exue.com</a></span><span>由<a href="http://www.exue.com" target="_blank">E学网</a>提供技术支持</span><span>鲁ICP证010217号</span><br />
	   </div>
<!--版权结束-->
</body>
</html>
