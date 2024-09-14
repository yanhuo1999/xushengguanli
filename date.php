<?php
Require_once 'bbs/include/common.php';
session_start();
$GMT = 0;
$dateid=$_GET['dateid'];
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
<link href="./includes/calendar/style_1.css" rel="stylesheet" type="text/css" id="css"/>
<script type="text/javascript" src="./includes/calendar/common.js"></script>
<script src="./includes/calendar/calendar.js" type="text/javascript"></script>
<title>伙伴网</title>
<link rel="stylesheet" rev="stylesheet" href="style/classnews.css" type="text/css" media="screen" />
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
window.onload=function(){
	Nifty("div#topmenu","transparent");
	Nifty("div#aboutinfo","transparent");
}
function closeaboutinfo(){
	var obj=document.getElementById('aboutinfo');
	obj.style.display='none';
}

function copyToClipBoard(title){
   var clipBoardContent=title;
   clipBoardContent+='\r\n' + document.location.href;
   window.clipboardData.setData("Text",clipBoardContent);
   alert("复制成功，请粘贴到你的QQ/MSN上推荐给你的好友!");
}
</script>
</head>
<?php
	require_once('header.php');
?>
<div class="clear"></div>
<!--主体内容开始-->
<form id="typechange" method="post" action="classnews.php">
	<input type="hidden" id="posttype" name="posttype" value="1"/>
</form>
<div class="main">
  <!--左方内容开始-->
  <div class="leftpart">
    <div id="aboutinfo">
      <p class="left"><span class="blue">您对<span class="red"> “最新爆料” </span>的 <span class="red">支持</span></span> 直接决定 <span class="red">“每日抢鲜”</span> 的内容,人人新发现由您一手主宰!</p>
      <a href="javascript:closeaboutinfo()"><img src="images/close_bt.gif" alt="关闭" width="15" height="15" />关闭</a></div>
    <dl id="content">
      <dt><span class="clear"></span><span class="a">1.</span><a href="?posttype=1&dateid=<?=$dateid?>" class="now">每日抢新</a><span class="a">2.</span><a href="?posttype=2&dateid=<?=$dateid?>" >现场目击</a><span class="a">3.</span><a href="?posttype=3&dateid=<?=$dateid?>" >时尚导购</a><span class="a">4.</span><a href="?posttype=4&dateid=<?=$dateid?>" >读报新闻</a><span class="a">5.</span><a href="?posttype=5&dateid=<?=$dateid?>" >书影点评</a> <span class="a">操作：</span>
	   <?php
  if($discuz_uid==0){
		
		echo ("<a href=\"bbs/logging.php?action=login\" class=\"ctrl\" target=\"_blank\">");
	}else{
		echo ("<a href=\"addfound.php\" class=\"ctrl\">");
	}
	?>
	  <span>发布我的报道</span></a> <span class="clear"></span></dt>
      <dd>
        <ul>
<?php
	$rowperpage = 10;
    $page=isset($_GET[page])?$_GET[page]:1;
	$typeid = isset($_GET['posttype'])?$_GET['posttype']:1;
	$sqlpanded = " and p.typeid=$typeid";
	$sql = "select count(*) from renrenclone.post p where date(p.postdate)=\"".$dateid."\"";
	$query = $db->query($sql);
	$rowcount = $db->result($query, 0);
	$sql="SELECT p.id id,p.title title,p.typeid typeid,p.keyword keyword,p.postdate postdate,p.summary summary,m.username username,p.owner uid, type.name name FROM renrenclone.post p left outer join newdiscuz.cdb_members m on p.owner = m.uid left outer join renrenclone.posttype type on p.typeid=type.id where date(p.postdate)=\"".$dateid."\"".$sqlpanded." order by p.postdate desc limit ".trim(($page-1)*$rowperpage).",$rowperpage";
	//date_default_timezone_set('Asia/Chongqing');
	$query=$db->query($sql);
	while($post=$db->fetch_array($query)){
	   $sql = "select count(*) cnt from renrenclone.postsuppert where postid=".$post['id'];
		$querytemp = $db->query($sql);
		$cnt=0;
		if($cntarray=$db->fetch_array($querytemp)){
			$cnt=$cntarray['cnt'];
		}
		$is_supported = 0;
		$sql="select * from renrenclone.postsuppert where postid=".$post['id']." and uid=".$discuz_uid;
		$querytemp = $db->query($sql);			
		if($db->num_rows($querytemp)){
			$is_supported = 1;
		}
		else{
			$is_supported = 0;
		}
		
?>
             <li><div class="aboutuser"><a class="pic_60_57" style="text-align:center; "><div style="font-size:20px;padding-top:16px;color:#000000; font-weight:500"><?=$cnt?></div><span style="color:#666666">人支持</span></a>
			 <?
			 	if($is_supported){			 
			 		echo "<div class=\"supme\">已支持</div>";
			 	}else{	
				    if($discuz_uid==0){
					   echo "<a href=\"bbs/logging.php?action=login\" class=\"supme\">支持</a>";
					}
					else{
					  echo "<a href=\"support.php?id=".$post['id']."\" class=\"supme\">支持</a>";
					}		 
			 		
			 	}
			 ?>			
			 </div>
            <div class="content">
              <h3><a href="<?="found.php?id=".$post[id]?>" target="_blank"><?=$post[title]?></a></h3>
              <h4><a href="bbs/viewpro.php?uid=<?=$post[uid]?>" class="user" target="new"><?=$post[username]?></a>在 <span class="time">
<?
			$differ = time()-strtotime($post['postdate']);
			$seconds = $differ%60;
			$differ = ($differ-$seconds)/60;
			$minutes = $differ%60;
			$differ =($differ - $minutes)/60;
			$hours = $differ%24;			
			$days = ($differ-$hours)/24;
			//echo $day;
			if($days>0){
				$days=$days."天";
			}
			else{
				$days="";
			}
			if($hours>0){
				$hours=$hours."小时";
			}
			else{
				$hours="";
			}
			echo $days.$hours.$minutes."分钟";
?>		
			</span> 前发布</h4>
              <p><?=$post['summary']?></p>
              <div class="tag">关键字：
<?
	$keywords = split(" ",$post['keyword']);
	foreach($keywords as $keyword){
		echo "<a href=\"search.php?typeid=0&keywords=".$post['keyword']."\">$keyword</a>&nbsp;&nbsp;";
	}
?>
			</div>
			  <div class="ctrl"><a href="found.php?id=<?=$post['id']?>" target="_blank" class="comment">评论</a> | <a href="javascript:copyToClipBoard('<?=$post['title']?>')" class="copylink">复制这个连接发送给朋友</a> | 所属分类：<a href="classnews.php?typeid=<?=$post['typeid']?>" class="class"><?=$post['name']?></a>
			 </div>
            </div>
            <span class="clear"></span></li>
<?
	}
?>
        </ul>
        <div class="clear"></div>
      </dd>
    </dl>
	<?
		   require_once("includes/pagebar.php");
           $multipage = multipage($rowcount, $rowperpage, $page, "date.php?dateid=".$dateid);
           echo $multipage;
    ?>
    <div class="clear"></div>
  </div>
  <!--左方内容结束-->
  <!--右方内容开始-->
  <div class="rightpart"> 
   <?php
  if($discuz_uid==0){
		
		echo ("<a href=\"bbs/logging.php?action=login\" id=\"reports\" class=\"button\"  target=\"_blank\">");
	}else{
		echo ("<a href=\"addfound.php\" id=\"reports\" class=\"button\">");
	}
	?>
  <span>发布报道 <strong class="num">my reports</strong></span></a>    
    <dl id="hotcomment">
      <dt class="title">每日热评 <span class="clear"></span> </dt>
      <dd>
        <div class="center"><a href="#" class="pic_166_105"></a></div>
        <ul class="fixtable">
          <?php
              $sql="select pc.postid postid,count(pc.id) c,p.title title from renrenclone.postcomment pc left outer join  renrenclone.post p on p.id=pc.postid group by pc.postid order by c desc limit 5";
              $query=$db->query($sql);
              while ($rs=$db->fetch_array($query)){      	             
      	          echo ("<li><a href=\"found.php?id=".$rs['postid']."\" title=\"".$rs['title']."\">".$rs['title']."</a></li>");
              } 
      
         ?>
        </ul>
      </dd>
    </dl>
    <dl id="newfound">
      <dt class="title">新发现分类 <span class="clear"></span> </dt>
      <dd>
        <ul>
          <li><a href="classnews.php?posttype=2" target="_parent">现场目击</a></li>
          <li><a href="classnews.php??posttype=4" target="_parent">读报新闻</a></li>
          <li><a href="classnews.php??posttype=3" target="_parent">时尚导购</a></li>
          <li><a href="classnews.php??posttype=5" target="_parent">书影点评</a></li>
          <li><a href="classnews.php??posttype=1" target="_parent">每日抢新</a></li>
        </ul><span class="clear"></span>
		<form action="search.php" method="get" name="frm">
	      <select name="typeid">
	      <option value="0">全部分类</option>>
	      <?php
	         $sql="select * from renrenclone.posttype ";
             $query=$db->query($sql);
               while ($rs=$db->fetch_array($query)){
          	   echo ("<option value=".$rs['id'].">".$rs['name']."</option>");
               }
	      ?>
	     </select>
		 <input type="text" name="keywords" class="text-input"  value="请输入关键字" onfocus="javascript:this.value='';"><br>
	     <input type="image" src="images/search_bt.gif" name="btn" class="right" >
	  </form></span>
      </dd>
    </dl>   
    <dl id="calendar">
      <dt class="title">往日回顾 <span class="clear"></span> </dt>
      <dd>
       <input type="hidden" name="bdaynew" size="25" value="null">
	    <script>showcalendar('',document.getElementById("bdaynew"));</script>
      </dd>
    </dl>
    <dl id="support">
      <dt class="title">赞助商连接 <span class="clear"></span> </dt>
      <dd>
        <ul>
          <?php
              $sqlsupport="select * from renrenclone.supporter";
              $query=$db->query($sqlsupport);
              while($rs=$db->fetch_array($query)){
			   $site=strlen($rs['siteurl'])>26?substr($rs['siteurl'],0,23)."...":$rs['siteurl'];
   	           echo ("<li><a href=\"".$rs['siteurl']."\" target=\"_blank\">".$rs['title']."</a>");
   	           echo ("<p>".$rs['summary']."<br />");
   	           echo ("<a href=\"".$rs['siteurl']."\"  target=\"_blank\" title=\"".$rs['siteurl']."\">".$site."</a></p></li>");
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
</body>
</html>