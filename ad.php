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
<link rel="stylesheet" rev="stylesheet" href="style/ad.css" type="text/css" media="screen" />
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
<script type="text/javascript">
// <![CDATA[
window.onload=function(){
	Nifty("div#topmenu","transparent");
	Nifty("div#aboutinfo","transparent");
	Nifty("div#reports_s","transparent");
	inregArea();
}
function submitad(){	
	if(uid==0){
		window.location.href="bbs/logging.php?action=login";
		return;
	}
	inregArea();
	document.getElementById('backgray').style.display='';
	document.getElementById('reg-area').style.display='';
	group.first.style.display='none';
	group.second.style.display='none';
}
function submitadsec(){
	document.getElementById('reg-area').style.display='none';
	document.getElementById('frame1').width=506;
	document.getElementById('frame1').height=370;
	document.getElementById('frame1').top=0;
	document.getElementById('reg-area').style.display='';
}
function closepopup(){	
	document.getElementById('reg-area').style.display= 'none';
	document.getElementById('backgray').style.display= 'none';
	group.first.style.display='';
	group.second.style.display='';	
}
function refreshme(){
	window.location.reload();
}
function inregArea(){
	var regAreaHTML='<iframe id="frame1" src="selectarea.php" width="506px" height="250px"\ frameborder="0" scrolling="no" >'
	document.getElementById('reg-area').innerHTML=regAreaHTML;
}
function setcity() { 

switch (document.group.first.value) { 

case '同城生活' :        

var labels = new Array("聚会/活动","演出/赛事","打折信息","其它","餐饮","旅游活动","宠物天地"); 

var values = new Array("聚会/活动","演出/赛事","打折信息","其它","餐饮","旅游活动","宠物天地"); 

break; 

case '招聘求职' :  

var labels = new Array("家政/家教","兼职/钟点工","招聘/求职"); 

var values = new Array("家政/家教","兼职/钟点工","招聘/求职"); 

break 
case '房屋相关' :      

var labels = new Array("买房/卖房","出租","求租","商铺/办公楼","二手房专区","其它"); 

var values = new Array("买房/卖房","出租","求租","商铺/办公楼","二手房专区","其它");  

break 
case '服务信息' :       

var labels = new Array("搬家/快递","健康/美容","金融/保险","考研出国","其它服务","买票/卖票"); 

var values = new Array("搬家/快递","健康/美容","金融/保险","考研出国","其它服务","买票/卖票"); 

break 
case '汽车频道' :         

var labels = new Array("二手汽车","摩托单车","汽车配件","汽车修理","带车求职","其它","买卖汽车","租车/顺风车"); 

var values = new Array("二手汽车","摩托单车","汽车配件","汽车修理","带车求职","其它","买卖汽车","租车/顺风车"); 

break 
case '同城寻缘' :      

var labels = new Array("寻人/找物","真情告白","同乡会","其它","交友/征婚"); 

var values = new Array("寻人/找物","真情告白","同乡会","其它","交友/征婚");

break 
case '跳蚤市场' :           

var labels = new Array("居家用品","电脑/配件","办公用品","数码/手机","美容/护肤","影音/图书","服装饰品","二手/转让","其它买卖","家俱电器"); 

var values = new Array("居家用品","电脑/配件","办公用品","数码/手机","美容/护肤","影音/图书","服装饰品","二手/转让","其它买卖","家俱电器"); 

break 

} 

// 清空市列表选择框的内容 

document.group.second.options.length = 0; 

// 从数组中添加内容 
var sockStr="";
var navigatorName = window.navigator.appName
if(navigatorName=="Microsoft Internet Explorer"){
	for(var i = 0; i < labels.length; i++) { 
		document.group.second.add(document.createElement("OPTION")); 
		document.group.second.options[i].text=labels[i]; 
		document.group.second.options[i].value=values[i]; 
	} 
}
else{
	for(var i = 0; i < labels.length; i++) { 
		sockStr = sockStr + "<option value=\"" + values[i] + "\">" + labels[i] + "</option>";
	} 
	document.group.second.innerHTML = sockStr;
}
// 选择第一个选项 

document.group.second.selectedIndex = 0; 

} 

// ]]>
</script>
<?php
	require_once('header.php');
	$location=$cityname;
	echo "<script type=\"text/javascript\">var uid=".$discuz_uid."</script>";
	//date_default_timezone_set('Asia/Chongqing');
?>
<dl id="reg-area" style="display:none;"></dl>
<div class="clear"></div>
<!--主体内容开始-->
<div class="main">
  <!--左方内容开始-->
  <div class="leftpart">
    <form id="search" name="group" method="post" action="Searchclasslist.php">
      <h3>搜索您要的信息：</h3>
      <select name="first" onchange="setcity()">
        <option selected="selected" value="同城生活">同城生活</option>
		<option value="招聘求职">招聘求职</option>
		<option value="房屋相关">房屋相关</option>
		<option value="服务信息">服务信息</option>
		<option value="汽车频道">汽车频道</option>
		<option value="同城寻缘">同城寻缘</option>
		<option value="跳蚤市场">跳蚤市场</option>
      </select>
      <select name="second">        
      </select>
      <input type="text" name="title" class="text-input" />
      <input type="image" name="imageField" src="images/search_bt.gif" />
    </form>
    <ol id="classlist">
      <li>
	  	<?php
			$total=0;
			$query="select * from renrenclone.advertisetype where lasttype = 1";
			$result = $db->query($query);
			while($row=mysql_fetch_array($result))
			{
				$querynum="select * from renrenclone.advertisement where typeid = ".$row['typeid'];
				$resultnum = $db->query($querynum);
				$total=$total+mysql_num_rows($resultnum);
			}
		?>
        <h3><a  id="class_city">同城生活</a><span class="num">(<?php echo $total ?>)</span></h3>
        <ul>
			<LI><A href="classlist.php?typeid=8&pageline=20&page=1">聚会/活动</A> </LI>
			<LI><A href="classlist.php?typeid=9&pageline=20&page=1">演出/赛事</A> </LI>
			<LI><A href="classlist.php?typeid=10&pageline=20&page=1">打折信息</A> </LI>
			<LI><A href="classlist.php?typeid=11&pageline=20&page=1">其它</A> </LI>
			<LI><A href="classlist.php?typeid=12&pageline=20&page=1">餐饮</A> </LI>
			<LI><A href="classlist.php?typeid=13&pageline=20&page=1">旅游活动</A> </LI>
			<LI><A href="classlist.php?typeid=14&pageline=20&page=1">宠物天地</A> </LI>
        </ul>
      </li>
      <li>
	  	<?php
			$total=0;
			$query="select * from renrenclone.advertisetype where lasttype = 5";
			$result = $db->query($query);
			while($row=mysql_fetch_array($result))
			{
				$querynum="select * from renrenclone.advertisement where typeid = ".$row['typeid'];
				$resultnum = $db->query($querynum);
				$total=$total+mysql_num_rows($resultnum);
			}
		?>
        <h3><a  id="class_car">汽车频道</a><span class="num">(<?php echo $total ?>)</span></h3>
        <ul>
		  <LI><A href="classlist.php?typeid=30&pageline=20&page=1">二手汽车</A> </LI>
		  <LI><A href="classlist.php?typeid=31&pageline=20&page=1">摩托单车</A> </LI>
		  <LI><A href="classlist.php?typeid=32&pageline=20&page=1">汽车配件</A> </LI>
		  <LI><A href="classlist.php?typeid=33&pageline=20&page=1">汽车修理</A> </LI>
		  <LI><A href="classlist.php?typeid=34&pageline=20&page=1">带车求职</A> </LI>
		  <LI><A href="classlist.php?typeid=35&pageline=20&page=1">其它</A> </LI>
		  <LI><A href="classlist.php?typeid=36&pageline=20&page=1">买卖汽车</A> </LI>
		  <LI><A href="classlist.php?typeid=37&pageline=20&page=1">租车/顺风车</A></LI>
        </ul>
      </li>
      <li>
	  	<?php
			$total=0;
			$query="select * from renrenclone.advertisetype where lasttype = 2";
			$result = $db->query($query);
			while($row=mysql_fetch_array($result))
			{
				$querynum="select * from renrenclone.advertisement where typeid = ".$row['typeid'];
				$resultnum = $db->query($querynum);
				$total=$total+mysql_num_rows($resultnum);
			}
		?>
        <h3><a  id="class_work">招聘求职</a><span class="num">(<?php echo $total ?>)</span></h3>
        <ul>
		  <LI><A href="classlist.php?typeid=15&pageline=20&page=1">家政/家教</A> </LI>
		  <LI><A href="classlist.php?typeid=16&pageline=20&page=1">兼职/钟点工</A> </LI>
		  <LI><A href="classlist.php?typeid=17&pageline=20&page=1">招聘/求职</A></LI>
        </ul>
      </li>
      <li>
	  	<?php
			$total=0;
			$query="select * from renrenclone.advertisetype where lasttype = 6";
			$result = $db->query($query);
			while($row=mysql_fetch_array($result))
			{
				$querynum="select * from renrenclone.advertisement where typeid = ".$row['typeid'];
				$resultnum = $db->query($querynum);
				$total=$total+mysql_num_rows($resultnum);
			}
		?>
        <h3><a  id="class_love">同城寻缘</a><span class="num">(<?php echo $total ?>)</span></h3>
        <ul>
		  <LI><A href="classlist.php?typeid=38&pageline=20&page=1">寻人/找物</A> </LI>
		  <LI><A href="classlist.php?typeid=39&pageline=20&page=1">真情告白</A> </LI>
		  <LI><A href="classlist.php?typeid=40&pageline=20&page=1">同乡会</A> </LI>
		  <LI><A href="classlist.php?typeid=41&pageline=20&page=1">其它</A> </LI>
		  <LI><A href="classlist.php?typeid=42&pageline=20&page=1">交友/征婚</A></LI>
        </ul>
      </li>
      <li>
	  	<?php
			$total=0;
			$query="select * from renrenclone.advertisetype where lasttype = 3";
			$result = $db->query($query);
			while($row=mysql_fetch_array($result))
			{
				$querynum="select * from renrenclone.advertisement where typeid = ".$row['typeid'];
				$resultnum = $db->query($querynum);
				$total=$total+mysql_num_rows($resultnum);
			}
		?>
        <h3><a  id="class_house">房屋相关</a><span class="num">(<?php echo $total ?>)</span></h3>
        <ul>
		  <LI><A href="classlist.php?typeid=18&pageline=20&page=1">买房/卖房</A> </LI>
		  <LI><A href="classlist.php?typeid=19&pageline=20&page=1">出租</A> </LI>
		  <LI><A href="classlist.php?typeid=20&pageline=20&page=1">求租</A> </LI>
		  <LI><A href="classlist.php?typeid=21&pageline=20&page=1">商铺/办公楼</A> </LI>
		  <LI><A href="classlist.php?typeid=22&pageline=20&page=1">二手房专区</A> </LI>
		  <LI><A href="classlist.php?typeid=23&pageline=20&page=1">其它</A> </LI>
        </ul>
      </li>
      <li>
	  	<?php
			$total=0;
			$query="select * from renrenclone.advertisetype where lasttype = 7";
			$result = $db->query($query);
			while($row=mysql_fetch_array($result))
			{
				$querynum="select * from renrenclone.advertisement where typeid = ".$row['typeid'];
				$resultnum = $db->query($querynum);
				$total=$total+mysql_num_rows($resultnum);
			}
		?>
        <h3><a  id="class_shop">跳蚤市场</a><span class="num">(<?php echo $total ?>)</span></h3>
        <ul>
		  <LI><A href="classlist.php?typeid=43&pageline=20&page=1">居家用品</A> </LI>
		  <LI><A href="classlist.php?typeid=44&pageline=20&page=1">电脑/配件</A> </LI>
		  <LI><A href="classlist.php?typeid=45&pageline=20&page=1">办公用品</A> </LI>
		  <LI><A href="classlist.php?typeid=46&pageline=20&page=1">数码/手机</A> </LI>
		  <LI><A href="classlist.php?typeid=47&pageline=20&page=1">美容/护肤</A> </LI>
		  <LI><A href="classlist.php?typeid=48&pageline=20&page=1">影音/图书</A> </LI>
		  <LI><A href="classlist.php?typeid=49&pageline=20&page=1">服装饰品</A> </LI>
		  <LI><A href="classlist.php?typeid=50&pageline=20&page=1">二手/转让</A> </LI>
		  <LI><A href="classlist.php?typeid=51&pageline=20&page=1">其它买卖</A> </LI>
		  <LI><A href="classlist.php?typeid=52&pageline=20&page=1">家俱电器</A></LI>
        </ul>
      </li>
      <li>
	  	<?php
			$total=0;
			$query="select * from renrenclone.advertisetype where lasttype = 4";
			$result = $db->query($query);
			while($row=mysql_fetch_array($result))
			{
				$querynum="select * from renrenclone.advertisement where typeid = ".$row['typeid'];
				$resultnum = $db->query($querynum);
				$total=$total+mysql_num_rows($resultnum);
			}
		?>
        <h3><a  id="class_service">服务信息</a><span class="num">(<?php echo $total ?>)</span></h3>
        <ul>
		  <LI><A href="classlist.php?typeid=24&pageline=20&page=1">搬家/快递</A> </LI>
		  <LI><A href="classlist.php?typeid=25&pageline=20&page=1">健康/美容</A> </LI>
		  <LI><A href="classlist.php?typeid=26&pageline=20&page=1">金融/保险</A> </LI>
		  <LI><A href="classlist.php?typeid=27&pageline=20&page=1">考研出国</A> </LI>
		  <LI><A href="classlist.php?typeid=28&pageline=20&page=1">其它服务</A> </LI>
		  <LI><A href="classlist.php?typeid=29&pageline=20&page=1">买票/卖票</A></LI>
        </ul>
      </li>
    </ol>
    <div class="clear"></div>
  </div>
  <!--左方内容结束-->
  <!--右方内容开始-->
  <div class="rightpart">
  	<?php
		$query="select * from newdiscuz.cdb_memberfields where uid =".$discuz_uid;
		$result = $db->query($query);
		$row=mysql_fetch_array($result);
	?>
    <div id="reportdiv"><a  class="pic_97_91"><img src="bbs/<?php echo $row['avatar'] ?>" alt="" width="95" height="88" /></a>
	<a href="javascript:submitad();"  class="button" id="reports_s">我要发布</a>
	
<?php 
	if ($discuz_uid==0)
	{
		echo '<a  class="icon">';
		echo "未登录状态";
	}
	else
	{
		$query="select * from renrenclone.advertisement where ownerid =".$discuz_uid;
		$result = $db->query($query);
		echo '<a href="bbs/my.php?item=advertiments&type=post" class="icon">';
		echo "您发布过".mysql_num_rows($result)."条信息！";
	}
	
?></a>
<a href="#" class="icon">如何发小广告</a>
<span class="clear"></span></div>
    <dl id="topnews">
      <dt class="title">最新消息 <span class="clear"></span> </dt>
      <dd>
        <ul class="fixtable">
			<?php
	
/*				date_default_timezone_set('Asia/Chongqing');
				require_once('bbs/include/db_mysql.class.site.php');
				$db = new dbstuff();
				$dbuser="root";
				$dbpassword="eteda";
				$dbhost="172.16.70.25:3306"; 
				$dbname='renrenclone';
				$db->connect($dbhost,$dbuser,$dbpassword,$dbname);*/
				
				$query="select * from renrenclone.advertisement  ORDER BY postdate DESC limit 0,10";
				$result = $db->query($query);
				while($row=mysql_fetch_array($result))
				{
					$query="SELECT * FROM renrenclone.advertisetype where typeid=".$row['typeid'];
					$resulttype=$db->query($query);
					$rowtype=mysql_fetch_array($resulttype);
					echo '<LI><a href="'.htmlspecialchars("./classcontent.php?id=".urlencode($row['id'])).'">['.$rowtype['typename'].']'.$row['title'].'</a></LI>';
				}
			?>
       
        </ul>
      </dd>
    </dl>
    <div class="clear"></div>
  </div>
  <!--右方内容结束-->
  <div class="clear"></div>
</div>
<!--主体内容结束-->
<!--版权开始-->
<div id="copyright">
  <div class="menu"><a href="#" target="new">关于伙伴网</a> | <a href="#" target="new">广告服务</a> | <a href="#" target="new">合作方式</a> | <a href="#" target="new">免责声明</a></div>
   <span><a href="http://www.exue.com" target="_blank">www.exue.com</a></span><span>由<a href="http://www.exue.com" target="_blank">E学网</a>提供技术支持</span><span>鲁ICP证010217号</span><br />
  建议使用1024x768以上分辨率 </div>
<!--版权结束-->
<script>
	setcity();
</script>
</body>
</html>
