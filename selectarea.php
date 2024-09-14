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
<script type="text/javascript">
// <![CDATA[
window.onload=function(){
	Nifty("div#topmenu","transparent");
	Nifty("div#ad_250_220_out","transparent");
	Nifty("div#ad_250_220_in","transparent");
	Nifty("div#ad_220_110","transparent");
}
function setcity() { 

switch (document.group.first.value) { 

case '同城生活' :        

var labels = new Array("聚会/活动","演出/赛事","打折信息","其它","餐饮","旅游活动","宠物天地"); 

var values = new Array("聚会/活动","演出/赛事","打折信息","其它","餐饮","旅游活动","宠物天地"); 
document.group.second.selectedIndex = 1; 

break; 

case '招聘求职' :  

var labels = new Array("家政/家教","兼职/钟点工","招聘/求职"); 

var values = new Array("家政/家教","兼职/钟点工","招聘/求职"); 
document.group.second.selectedIndex = 2; 
break 
case '房屋相关' :      

var labels = new Array("买房/卖房","出租","求租","商铺/办公楼","二手房专区","其它"); 

var values = new Array("买房/卖房","出租","求租","商铺/办公楼","二手房专区","其它");  
document.group.second.selectedIndex = 3; 
break 
case '服务信息' :       

var labels = new Array("搬家/快递","健康/美容","金融/保险","考研出国","其它服务","买票/卖票"); 

var values = new Array("搬家/快递","健康/美容","金融/保险","考研出国","其它服务","买票/卖票"); 
document.group.second.selectedIndex = 4; 
break 
case '汽车频道' :         

var labels = new Array("二手汽车","摩托单车","汽车配件","汽车修理","带车求职","其它","买卖汽车","租车/顺风车"); 

var values = new Array("二手汽车","摩托单车","汽车配件","汽车修理","带车求职","其它","买卖汽车","租车/顺风车"); 
document.group.second.selectedIndex = 5; 
break 
case '同城寻缘' :      

var labels = new Array("寻人/找物","真情告白","同乡会","其它","交友/征婚"); 

var values = new Array("寻人/找物","真情告白","同乡会","其它","交友/征婚");
document.group.second.selectedIndex = 6; 
break 
case '跳蚤市场' :           

var labels = new Array("居家用品","电脑/配件","办公用品","数码/手机","美容/护肤","影音/图书","服装饰品","二手/转让","其它买卖","家俱电器"); 

var values = new Array("居家用品","电脑/配件","办公用品","数码/手机","美容/护肤","影音/图书","服装饰品","二手/转让","其它买卖","家俱电器"); 
document.group.second.selectedIndex = 7; 
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
function closepopup(){
	parent.closepopup();
}
function nextstep(){
	parent.submitadsec();
}
function settype(type){
	var i=0;
	//alert(document.group.second.options.length);
	for(i=1;i<document.group.second.options.length;i++){
		//alert(document.group.second.ooptions[i].value);
		if(document.group.second.options[i].value==type){
			document.group.second.selectedIndex = i;
			break;
		}
	}
}
// ]]>
</script>
</head>
<body>
<?php $discuz_uid=$_GET['userid'];?>
<dl id="reg-area">
  <dt><a href="javascript:closepopup();"><img src="images/close_bt.gif" alt="关闭" width="15" height="15" /></a> <span class="clear"></span> </dt>
  <dd>
    <form name="group" id="group" method="post" action="addminiad.php">
      <h4>你将在<?php
	$cityid = isset($_COOKIE['cityid'])?$_COOKIE['cityid']:2;
	$sql = "select name from renrenclone.city where id=".$cityid;
	$query = $db->query($sql);
	$city = '';
	if($db->num_rows($query)){
		$city = $db->result($query, 0);
	}
	echo $city;
?>分类发帖</h4>
	  <?php
	$typeid = isset($_GET['typeid'])?$_GET['typeid']:8;
	$sql = "select typename from renrenclone.advertisetype where typeid in (SELECT lasttype FROM renrenclone.advertisetype where typeid=".$typeid.")";
	$query = $db->query($sql);
	$type = '';
	if($db->num_rows($query)){
		$type = $db->result($query, 0);
	}
?>
      <ul>
        <li>
		  <select name="first" id="first" size="6" class="GroupLeft" onchange="setcity()">
		  <option <?php
		  	if($type=="同城生活") echo "selected=\"selected\"";
		  ?>selected="selected" value="同城生活">同城生活</option>
		  <option <?php
		  	if($type=="招聘求职") echo "selected=\"selected\"";
		  ?>value="招聘求职">招聘求职</option>
		  <option <?php
		  	if($type=="房屋相关") echo "selected=\"selected\"";
		  ?>value="房屋相关">房屋相关</option>
		  <option <?php
		  	if($type=="服务信息") echo "selected=\"selected\"";
		  ?>value="服务信息">服务信息</option>
		  <option <?php
		  	if($type=="汽车频道") echo "selected=\"selected\"";
		  ?>value="汽车频道">汽车频道</option>
		  <option <?php
		  	if($type=="同城寻缘") echo "selected=\"selected\"";
		  ?>value="同城寻缘">同城寻缘</option>
		  <option <?php
		  	if($type=="跳蚤市场") echo "selected=\"selected\"";
		  ?>value="跳蚤市场">跳蚤市场</option>
		</select>
        </li>
        <li>
		<select name="second" id="second" size="6" class="GroupRight">
		</select>
        </li>
      </ul>
	  
      <span class="clear"></span>
      <div class="center">
        <!--<p>您当前选择的是：同城生活>>聚会/活动</p>-->
        <p>
		  <input name="location" type="hidden" value="<?php echo $_GET['location']; ?>" />
	      <input type="hidden" name="USER" value="<?php echo $discuz_uid; ?>" />
          <input type="image" name="imageField" src="images/choice-ok.gif" onclick="nextstep();"/>
        </p>
      </div>
    </form>
  </dd>
</dl>
<?php
	$typeid = isset($_GET['typeid'])?$_GET['typeid']:8;
	$sql = "select typename from renrenclone.advertisetype where typeid=".$typeid;
	$query = $db->query($sql);
	$type = '';
	if($db->num_rows($query)){
		$type = $db->result($query, 0);
	}
?>
<SCRIPT LANGUAGE="JavaScript"> 
	setcity();
	<?
		echo "settype('".$type."');";
	?>
</SCRIPT>
</body>
</html>
