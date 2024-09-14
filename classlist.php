<?php
Require_once 'bbs/include/common.php';
//session_start();
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
<link rel="stylesheet" rev="stylesheet" href="style/classlist.css" type="text/css" media="screen" />
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
	searchfound1.first.style.display='none';
	searchfound1.second.style.display='none';
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
	searchfound1.first.style.display='';
	searchfound1.second.style.display='';	
}
function refreshme(){
	window.location.href=window.location;
}
function inregArea(){
	var regAreaHTML='<iframe id="frame1" src="selectarea.php?typeid=' + typeid + '" width="506px" height="250px"\ frameborder="0" scrolling="no" >'
	document.getElementById('reg-area').innerHTML=regAreaHTML;
}
// ]]>
</script>
<script type="text/javascript">

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

//document.group.second.selectedIndex = 0; 

} 

// ]]>
</script>
<?php
//date_default_timezone_set('Asia/Chongqing');
	require_once('header.php');
	$location=$cityname;
	echo "<script type=\"text/javascript\"> var uid=".$discuz_uid." </script>";
?>
<dl id="reg-area" style="display:none;"></dl>
<?php 
	
	$page = isset($_GET['page'])?$_GET['page']:1;
	$pageline = isset($_GET['pageline'])?$_GET['pageline']:20;
	if (isset($_GET['typeid'])) {
		$typeid = $_GET['typeid'];
	}else if (isset($_POST['typeid'])){
		$typeid = $_POST['typeid'];
	}else{
		$typeid=8;
	}
	echo "<script type=\"text/javascript\"> var typeid=".$typeid." </script>";
	//require_once('bbs/include/db_mysql.class.site.php');
	$db->select_db("renrenclone");
	
	$query="SELECT * FROM city where id=".$dqid ;
	$result = $db->query($query);
	$row=mysql_fetch_array($result);
	$location=$row['name'];
	
	
	$query="SELECT * FROM advertisetype where typeid=".$typeid ;
	$result = $db->query($query);
	$row=mysql_fetch_array($result);
	$second=$row['typename'];
	$lasttype=$row['lasttype'];
	$query="SELECT * FROM advertisetype where typeid=".$row['lasttype'];
	$result = $db->query($query);
	$row=mysql_fetch_array($result);
	$first=$row['typename'];
?>
<div class="clear"></div>
<!--主体内容开始-->
<div class="main">
  <!--左方内容开始-->
  <div class="leftpart">
    <dl id="leftmenu">
      <dt class="title">热门分类 <span class="clear"></span> </dt>
      <dd>
        <ul>
	<?php 		
		$total=0;
		$querynum="select * from renrenclone.advertisement where typeid = 13";
		$resultnum = $db->query($querynum);
		$total=$total+mysql_num_rows($resultnum);
	?>
          <li><a href="classlist.php?typeid=13" id="class_tour">旅游活动</a><span class="num">(<?php echo $total ?>)</span></li>
	<?php 		
		$total=0;
		$querynum="select * from renrenclone.advertisement where typeid = 12";
		$resultnum = $db->query($querynum);
		$total=$total+mysql_num_rows($resultnum);
	?>
          <li><a href="classlist.php?typeid=12" id="class_eat">餐　　饮</a><span class="num">(<?php echo $total ?>)</span></li>
 	<?php 		
		$total=0;
		$querynum="select * from renrenclone.advertisement where typeid = 10";
		$resultnum = $db->query($querynum);
		$total=$total+mysql_num_rows($resultnum);
	?>
          <li><a href="classlist.php?typeid=10" id="class_shop">打折信息</a><span class="num">(<?php echo $total ?>)</span></li>
  	<?php 		
		$total=0;
		$querynum="select * from renrenclone.advertisement where typeid = 14";
		$resultnum = $db->query($querynum);
		$total=$total+mysql_num_rows($resultnum);
	?>
         <li><a href="classlist.php?typeid=14" id="class_pet">宠物天地</a><span class="num">(<?php echo $total ?>)</span></li>
   	<?php 		
		$total=0;
		$querynum="select * from renrenclone.advertisement where typeid = 19";
		$resultnum = $db->query($querynum);
		$total=$total+mysql_num_rows($resultnum);
	?>
        <li><a href="classlist.php?typeid=19" id="class_lend">出租</a><span class="num">(<?php echo $total ?>)</span></li>
 	<?php 		
		$total=0;
		$querynum="select * from renrenclone.advertisement where typeid = 20";
		$resultnum = $db->query($querynum);
		$total=$total+mysql_num_rows($resultnum);
	?>
		  <li><a href="classlist.php?typeid=20" id="class_lend">求租</a><span class="num">(<?php echo $total ?>)</span></li>
 	<?php 		
		$total=0;
		$querynum="select * from renrenclone.advertisement where typeid = 18";
		$resultnum = $db->query($querynum);
		$total=$total+mysql_num_rows($resultnum);
	?>
          <li><a href="classlist.php?typeid=18" id="class_house">买房卖房</a><span class="num">(<?php echo $total ?>)</span></li>
 	<?php 		
		$total=0;
		$querynum="select * from renrenclone.advertisement where typeid = 21";
		$resultnum = $db->query($querynum);
		$total=$total+mysql_num_rows($resultnum);
	?>
          <li><a href="classlist.php?typeid=21" id="class_office">商铺楼宇</a><span class="num">(<?php echo $total ?>)</span></li>
 	<?php 		
		$total=0;
		$querynum="select * from renrenclone.advertisement where typeid = 17";
		$resultnum = $db->query($querynum);
		$total=$total+mysql_num_rows($resultnum);
	?>
          <li><a href="classlist.php?typeid=17" id="class_job">招聘求职</a><span class="num">(<?php echo $total ?>)</span></li>
 	<?php 		
		$total=0;
		$querynum="select * from renrenclone.advertisement where typeid = 29";
		$resultnum = $db->query($querynum);
		$total=$total+mysql_num_rows($resultnum);
	?>
          <li><a href="classlist.php?typeid=29" id="class_ticket">买票卖票</a><span class="num">(<?php echo $total ?>)</span></li>
 	<?php 		
		$total=0;
		$querynum="select * from renrenclone.advertisement where typeid = 44";
		$resultnum = $db->query($querynum);
		$total=$total+mysql_num_rows($resultnum);
	?>
          <li><a href="classlist.php?typeid=44" id="class_pc">电脑配件</a><span class="num">(<?php echo $total ?>)</span></li>
        </ul>
        <span class="clear"></span></dd>
    </dl>
    <dl id="classsearch">
      <dt class="title">分类搜索 <span class="clear"></span> </dt>
      <dd>
        <form id="searchfound1" name="group" method="post" action="Searchclasslist.php">
          <select name="first" onchange="setcity()">
           <?php 
		   		for($i=0;$i<7;$i++)
				{
					switch ($i){
						case 0:
							if ($first=="同城生活"){
								echo  '<option selected="selected" value="同城生活">同城生活</option>';
							}else{
								echo  '<option value="同城生活">同城生活</option>';
							}
							break;
						case 1:
							if ($first=="招聘求职"){
								echo  '<option selected="selected" value="招聘求职">招聘求职</option>';
							}else{
								echo  '<option value="招聘求职">招聘求职</option>';
							}
							break;
						case 2:
							if ($first=="房屋相关"){
								echo  '<option selected="selected" value="房屋相关">房屋相关</option>';
							}else{
								echo  '<option value="房屋相关">房屋相关</option>';
							}
							break;
						case 3:
							if ($first=="服务信息"){
								echo  '<option selected="selected" value="服务信息">服务信息</option>';
							}else{
								echo  '<option value="服务信息">服务信息</option>';
							}
							break;
						case 4:
							if ($first=="汽车频道"){
								echo  '<option selected="selected" value="汽车频道">汽车频道</option>';
							}else{
								echo  '<option value="汽车频道">汽车频道</option>';
							}
							break;
						case 5:
							if ($first=="同城寻缘"){
								echo  '<option selected="selected" value="同城寻缘">同城寻缘</option>';
							}else{
								echo  '<option value="同城寻缘">同城寻缘</option>';
							}
							break;
						case 6:
							if ($first=="跳蚤市场"){
								echo  '<option selected="selected" value="跳蚤市场">跳蚤市场</option>';
							}else{
								echo  '<option value="跳蚤市场">跳蚤市场</option>';
							}
							break;
					}		
				}
		   ?>
          </select>
          <select name="second">
            
          </select>
          <input type="hidden" name="hidtext" value="<?php echo $second ?>" />
          <input type="text" name="title" class="text-input" />
          <div class="center">
            <input type="image" name="imageField" src="images/classsearch_bt.gif" />
          </div>
        </form>
        <span class="clear"></span> </dd>
    </dl>
    <dl id="classset">
      <dt class="title">筛选信息 <span class="clear"></span> </dt>
      <dd>
        <form id="searchfound2" name="filter" method="post" action="classlist.php">
          <div>时间：
            <select name="time">
				<option value="">请选择时间</option>
				<option value="30" >30分钟内</option>
				<option value="120" >2小时内</option>
				<option value="480" >8小时内</option>
				<option value="2880" >2天内</option>
				<option value="4320" >3天内</option>
				<option value="7200" >5天内</option>
				<option value="10080" >1周内</option>
				<option value="30240" >3周内</option>
				<option value="43200" >1月内</option>
            </select>
            <input type="hidden" name="typeid" value=<?php echo $typeid ?> />
			
          </div>
	    </form> 
           <div align="center">
			 <a href="javascript:searchfound2.submit();" ><img src="images/searchset_bt.gif"/></a> 
              <a href="javascript:void(0);" onclick="searchfound2.reset();"><img src="images/reset_bt.gif" alt="请空筛选条件"/></a> 
          </div>
       
        <span class="clear"></span> </dd>
    </dl>
    <dl id="nexttitle">
      <dt class="title"><span class="left">最近浏览主题</span> <a href="#">清除</a><span class="clear"></span> </dt>
      <dd>
        <ul class="fixtable">
          <li><a href="#">中央亲自指导穗首批房价块中央亲自指导穗首批房价块</a></li>
          <li><a href="#">中央亲自指导穗首批房价块</a></li>
          <li><a href="#">中央亲自指导穗首批房价块</a></li>
          <li><a href="#">中央亲自指导穗首批房价块</a></li>
          <li><a href="#">中央亲自指导穗首批房价块</a></li>
        </ul>
      </dd>
    </dl>
    <div class="clear"></div>
  </div>
  <!--左方内容结束-->
  <!--右方内容开始-->
  <div class="rightpart">
    <dl id="content">
      <dt><a href="ad.php">所有分类</a>&gt;&gt;<?php echo $first;?>&gt;&gt;<a href="classlist.php?typeid=
		  <?php echo $typeid ; ?>"><?php echo $second;?></a>
		  <a href="javascript:submitad();" style="margin-left:360px">在本类中发布</a>
		  
<span class="clear"></span></dt>
      <dd>
        <div id="classlist">
          <h4><?php echo  $first;?></h4>
          <ul>
		   <?php
  $query="SELECT * FROM advertisetype where lasttype=".$lasttype;
  $result = $db->query($query);
 while($row=mysql_fetch_array($result))
 {

	$total=0;
	
	$querynum="select * from renrenclone.advertisement where typeid = ".$row['typeid'];
	$resultnum = $db->query($querynum);
	$total=$total+mysql_num_rows($resultnum);
	
		
 	echo '<li><a href="classlist.php?typeid='.$row['typeid'].'">'.$row['typename'].'</a><span class="num">('.$total.')</span></li>' ;
 }?>
           <!-- <li><a href="#">二手汽车</a><span class="num">(10)</span></li>
            <li><a href="#">摩托单车</a><span class="num">(10)</span></li>
            <li><a href="#">汽车配件</a><span class="num">(10)</span></li>
            <li><a href="#">汽车修理</a><span class="num">(10)</span></li>
            <li><a href="#">带车求职</a><span class="num">(10)</span></li>
            <li><a href="#">其　　它</a><span class="num">(10)</span></li>
            <li><a href="#">买卖汽车</a><span class="num">(10)</span></li>
            <li><a href="#">租车/顺风车</a><span class="num">(10)</span></li>-->
          </ul>
          <span class="clear"></span> </div>
		  <?PHP
		  //get row num
		  	if(isset($_POST['time'])){
				$date=date("Y-m-d H:i:s",mktime(date("H"),date("i")-$_POST['time'],date("s"),date("m"),date("d"),date("Y")));
				$query="select * from renrenclone.advertisement where typeid=".$typeid ." and postdate>'".$date."' ORDER BY postdate DESC";
				
				$result = $db->query($query);
				$rowcount =mysql_num_rows($result);
				
				$query="select * from renrenclone.advertisement where typeid=".$typeid ." and postdate>'".$date."' ORDER BY postdate DESC limit ".(($page-1)*$pageline).",".$pageline;
				
				$result = $db->query($query);
				
			}else{
				$query="select * from renrenclone.advertisement where typeid=".$typeid ." ORDER BY postdate DESC";				
				$result = $db->query($query);
				$rowcount =mysql_num_rows($result);
				
				$query="select * from renrenclone.advertisement where typeid=".$typeid ." ORDER BY postdate DESC limit ".(($page-1)*$pageline).",".$pageline;
				
				$result = $db->query($query);
				
			}
			
				?>
				
        <div class="page"><?php require_once('includes/pagebar.php');
	$pageURL="classlist.php?typeid=".$typeid."&pageline=".$pageline ;
	$multipage =multipage($rowcount,$pageline,$page,$pageURL);
	echo $multipage;?>每页显示数量：<a href="<?php echo "classlist.php?typeid=".$_GET['typeid']."&pageline=20 "?>"><img src="images/page_20_bt.gif" alt="20" width="21" height="16" /></a><a href="<?php echo "classlist.php?typeid=".$_GET['typeid']."&pageline=40 "?>"><img src="images/page_40_bt.gif" alt="40" width="21" height="16" /></a> 排序方式： <a href="#" class="blue">按发布时间</a></div>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th class="pic">&nbsp;</th>
            <th class="title">主体</th>
            <th class="space">地段</th>
            <th class="time">发布日期</th>
          </tr>
          <!--循环部分开始-->
          <?PHP
			while ($row=mysql_fetch_array($result))
			{
		?>
          <tr>
            <td rowspan="2" class="pic"><a href=<?php  echo  htmlspecialchars("./classcontent.php?id=".urlencode($row['id']))?>> <img src="<?php echo $row['picture']; ?> " width="80" height="80" class="pic_90_90"/></a></td>
            <td class="title"><a href=<?php  echo  htmlspecialchars("./classcontent.php?id=".urlencode($row['id']))?>><?php echo $row['title'] ?> </a></td>
            <td class="space">未知</td>
            <?php 
			//date_default_timezone_set('Asia/Chongqing');
			list($postdate,$posttime)=explode(" ", $row['postdate']);
			list($postyear, $postmonth, $postday) = explode("-", $postdate);
			list($posthour, $postmin, $postsec) = explode(":", $posttime);
			$postdate=mktime($posthour,$postmin,$postsec,$postmonth,$postday,$postyear);
			$year=date("Y")-date("Y",$postdate);
			$month=date("m")-date("m",$postdate);
			$day=date("d")-date("d",$postdate);
			$hour=date("H")-date("H",$postdate);
		?>
            <td class="time"><?php echo date("Y-m-d",$postdate); ?></td>
          </tr>
          <tr>
            <td colspan="3" valign="top" class="info"><?php echo '<p>'.$row['content'].'</p>' ?></td>
          </tr>
          <!--循环部分结束-->
          <?php
			}
		?>
        </table>
        <div class="page"><?php require_once('includes/pagebar.php');
	$pageURL="classlist.php?typeid=".$typeid."&pageline=".$pageline ;
	$multipage =multipage($rowcount,$pageline,$page,$pageURL);
	echo $multipage;?>每页显示数量：<a href="<?php echo "classlist.php?typeid=".$_GET['typeid']."&pageline=20 "?>"><img src="images/page_20_bt.gif" alt="20" width="21" height="16" /></a><a href="<?php echo "classlist.php?typeid=".$_GET['typeid']."&pageline=40 "?>"><img src="images/page_40_bt.gif" alt="40" width="21" height="16" /></a> 排序方式： <a href="#" class="blue">按发布时间</a></div>
        <div class="clear"></div>
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
