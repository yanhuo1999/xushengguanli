<?php
Require_once 'bbs/include/common.php';
$db->select_db('renrenclone');
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
<link rel="stylesheet" rev="stylesheet" href="style/classcontent.css" type="text/css" media="screen" />
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

for(var i = 0; i < labels.length; i++) { 

document.group.second.add(document.createElement("OPTION")); 

document.group.second.options[i].text=labels[i]; 

document.group.second.options[i].value=values[i]; 
	if(document.group.hidtext.value==values[i]){
		document.group.second.selectedIndex = i;
	}
} 

// 选择第一个选项 

//document.group.second.selectedIndex = 0; 

} 

// ]]>
</script>
<?php
	require_once('header.php');
		//require_once('bbs/include/db_mysql.class.php');
	//	$db = new dbstuff();
//		$dbuser="root";
//		$dbpassword="eteda";
//		$dbhost="172.16.70.25:3306";
//		
//		$dbname='renrenclone';
//		$db->connect($dbhost,$dbuser,$dbpassword,$dbname);
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
        <form id="searchfound" name="group" method="post" action="Searchclasslist.php">
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

  <div> 
    <div class="rightpart">
	  <?PHP
	
		//$db = mysql_connect($dbhost,$dbuser,$dbpassword);
		$query="select * from renrenclone.advertisement where id=".$_GET['id'];
		$result = $db->query($query);
		$row=mysql_fetch_array($result);
		
		$query="select * from renrenclone.advertisetype where typeid=".$row['typeid'];
		$typeid=$row['typeid'];
		$resulttype = $db->query($query);
		$rowsecond=mysql_fetch_array($resulttype);
		$second=$rowsecond['typename'];
		$query="select * from renrenclone.advertisetype where typeid=".$rowsecond['lasttype'];
		$resulttype = $db->query($query);
		$rowfirst=mysql_fetch_array($resulttype);
		$first=$rowfirst['typename'];
	?>
    <dl id="content">
       <dt><a href="ad.php">所有分类</a>&gt;&gt;
	   <?php echo $first;?>&gt;&gt;<a href="classlist.php?typeid=<?php echo $typeid;?>"><?php echo $second;?></a><span class="clear"></span></dt>
      <dd>
        <h2><?php echo $row['title']?></h2>
        <div id="contentinfo"><a href="#" class="pic_214_196"><img src="<?php echo $row['picture']; ?>" alt="" width="213" height="195" /></a>
          <ul>
            <li class="man"><strong>发 布 者：</strong> <?php 
		$query="SELECT username FROM newdiscuz.cdb_members where uid=".$row['ownerid'];
		$resultuser = $db->query($query);
		//SELECT username FROM newdiscuz.cdb_members where uid=1
		$rowuser=mysql_fetch_array($resultuser);
		echo $rowuser['username']; ?></li>
            <li class="time"><strong>发布时间：</strong> <?php 
		//date_default_timezone_set('Asia/Chongqing');
		list($postdate,$posttime)=explode(" ", $row['postdate']);
		list($postyear, $postmonth, $postday) = explode("-", $postdate);
		list($posthour, $postmin, $postsec) = explode(":", $posttime);
		$postdate=mktime($posthour,$postmin,$postsec,$postmonth,$postday,$postyear);
		echo date("Y-m-d",$postdate); ?></li>
           
            <li><strong>联系方式：</strong><?php echo $row['contact']; ?></li>
          </ul>
          <div class="blue"><a href="#">推荐给好友</a><a href="#">收藏</a></div>
          <p><?php echo $row['content']; ?></p>
          <form id="error" method="post" action="">
            <span class="orange">举报该信息为：</span>
            <input name="radiobutton" type="radio" value="radiobutton" />
            分类错误
            <input name="radiobutton" type="radio" value="radiobutton" />
            垃圾
            <input name="radiobutton" type="radio" value="radiobutton" />
            违禁
            <input type="image" name="imageField" src="images/error_bt.gif" />
          </form>
          <form id="leavewordform" method="post" action="ad/savecomment.php">
            <div class="blue">我要留言<span class="gray">(留言字数不要超过 500 字)</span></div>
            <textarea name="comment" rows="7"></textarea>
            <div class="center">
              <input type="image" name="imageField" src="images/send_bt.gif" />
            </div>
			<input type="hidden" name="ADid" value="<?php echo $_GET['id']?>">

      		<input type="hidden" name="postuserid" value="<?php echo $discuz_uid?>">
          </form>
        </div>

        <ul id="leaveword">		
<?php 
  //Get All comment
  $query="SELECT * FROM advertisecritique where advertiseid=".$_GET['id'] ;
//  echo $query;
  $result = $db->query($query);
  while($row=mysql_fetch_array($result))
  { 
	   $date = $row['postdate'];
	  $comment=$row['comment'];
	  $query="SELECT username FROM newdiscuz.cdb_members where uid=".$row['postuserid'];
	  $resultuser = $db->query($query);
	  $rowuser=mysql_fetch_array($resultuser);
?>
          <li><a href="#" class="user"><?php echo $rowuser['username'] ?></a> <span class="num"><?php echo $date ?></span>
            <p><?php 
 
  //get username

  
 
  echo $comment;?></p>
          </li>
<?php }?>

         
        </ul>
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
