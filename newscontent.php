<?php
Require_once 'bbs/include/common.php';
session_start();
$databasepre = "discuz";
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
<link rel="stylesheet" rev="stylesheet" href="style/newscontent.css" type="text/css" media="screen" />
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
	Nifty("div#aboutcomment","transparent");
}
// ]]>
</script>
<script language="javascript" type="text/javascript">
function check(){
  if (comment.user.value==""){
   return false;
  }
  else if (comment.content.value==""){
   return false;
  }
}

</script>

<?php
	require_once('header.php');
	
	if ($_GET['cityid']){
	    $sql="select id from renrenclone.city where dqid in (select dqid from renrenclone.city where id=".$_GET['cityid'].")";
		$query=$db->query($sql);
		while($rs=$db->fetch_array($query)){
		    $citys=$citys.$rs['id'].",";
		}	
	}
	else{
	  foreach ($dqarr as $one){
	    $citys=$citys.$one.",";
	   }
	}
	$citys=substr($citys,0,strlen($citys)-1);
	$id=$_GET[id];
    $sql="select type from renrenclone.article where id=".$id;
    $rs=$db->fetch_array($db->query($sql));
    $typeid=$rs['type'];//根据id得到新闻类型id
    $cityids=$typeid==1?"1,".$citys:0;
    $sqltype="select name from renrenclone.articletype where id=".$typeid;
    //$sqltype="select name from renrenclone.articletype where id= (select type from renrenclone.article where id=".$id.")";
    $rstype=$db->fetch_array($db->query($sqltype));
    $type=mb_substr($rstype['name'],0,6);//存放新闻的类型
    $sqladd="update renrenclone.article set click=click+1 where id=".$id;	   
    $db->query($sqladd);//使本条新闻点击数加1
?>
<div class="clear"></div>
<!--主体内容开始-->
<div class="main">
  <!--左方内容开始-->
  <div class="leftpart">
    <dl id="leftmenu">
      <dt class="title">大事通道 <span class="clear"></span> </dt>
      <dd>
          <ul class="fixtable">
		  <?php
			  $addsql=" ";
			  $da=date('Y-m-d');
			  if (isset($_GET['dateid']) and $_GET['dateid']!=$da){
			    $da=$_GET['dateid'];
			    $addsql=" and date(publishdate)=\"".$da."\"";
				
			  }
	          $sql="select * from articletype ";
	          $db->select_db("renrenclone");
	          $query=$db->query($sql);
	          while ($rs=$db->fetch_array($query)) {
			    if ($rs['id']==1){
				  $totsql="select count(id) as c from renrenclone.article where type=1 and cityid in(1,".$citys.")".$addsql;
				  //echo $totsql;
				}
				else{
				  $totsql="select count(id) as c from renrenclone.article where type=".$rs['id'].$addsql;
				}
			    $totquery=$db->query($totsql);
				$totrs=$db->fetch_array($totquery);
	            echo ("<li><a href=\"tagnews.php?typeid=".$rs['id']."\" class=\"now\">".$rs['name']."<span class=\"num\">".$totrs['c']."</span></a></li>");	
	          }
          ?>
        </ul>
      </dd>
    </dl>
    <dl id="herenews">
      <dt class="title">今日<?=$type?>大事速递 <span class="clear"></span> </dt>
      <dd>
        <ul class="fixtable">
		  <?php
            $sqltoday="select name,id,type,cityid from article where cityid in (".$cityids.") and type=".$typeid." and date(publishdate)=\"".date('Y-m-d')."\" order by click desc limit 10";
			//echo $sqltoday;
           $querytoday=$db->query($sqltoday);//显示的是根据进入本页时所选择的新闻类型，当天按点击次数降序排列的前10条
           while($rst=$db->fetch_array($querytoday)){
  	         echo ("<li><a href=\"newscontent.php?id=".$rst['id']."\" target=\"_blank\" title=\"".$rst['name']."\">".$rst['name']."</a></li>");
           }
         ?>
        </ul>
      </dd>
    </dl>
    <dl id="newsreview">
      <dt class="title">大事7天回顾 <span class="clear"></span> </dt>
      <dd>
        <ul class="fixtable">
		 <?php
               $beforeday= date("Y-m-d",mktime(0, 0, 0, date("m") , date("d")-7, date("Y")));
               $endday=date("Y-m-d",mktime(0, 0, 0, date("m") , date("d")-1, date("Y")));
               $sql="select name,id,type from article where type<>1 and date(publishdate) between \"".                       $beforeday."\" and \"".$endday."\" order by click desc limit 7";
			   $query=$db->query($sql);
               while ($rs=$db->fetch_array($query)) { 
       	          echo ("<li><a href=\"newscontent.php?id=".$rs['id']."\"target=\"_blank\" title=\"".$rs['name']."\">".$rs['name']."</a></li>");
               }       
        ?>     
        </ul>
      </dd>
    </dl>
    <div class="clear"></div>
  </div>
  <!--左方内容结束-->
  <!--中部内容开始-->
  <div class="midpart">
    <dl id="content">
      <dt class="title"><b class="left">大新闻</b><a href="tagnews.php?typeid=<?=$typeid?>"  class="noborder">查看<?=$type?>今日所有大事</a> <span class="clear"></span> </dt>
      <dd>
	  <?php
           $sql1="select * from article where id=".$id;
           $query1=$db->query($sql1);
           $rs1=$db->fetch_array($query1);
           $publishtime=explode(" ",$rs1["publishdate"]);
           $pictures=explode("|",$rs1['picture']);
           echo ("<h2>".$rs1[name]."</h2>");
           echo ("<h4>".$rs1['sourcename']."—".$publishtime[0])."<span class=\"blue\"><a href=\"#comment\">评论</a></span></h4>";
		   echo ("<div id=\"contentone\">");
           for ($ii=1;$ii<count($pictures); $ii++){
   	         echo("<img style=\"margin:10px 0px 10px 60px;display:block;width:380px\" src=\"".$pictures[$ii]."\">");
           }  
           echo ("<p>".$rs1['content']."</p></div>");
         ?>
        
        <form id="comment" action="newsinsertcomment.php" method="POST" onSubmit="return check()">
          <h3 class="blue">评论：</h3>
          <div id="aboutcomment">
            <p class="left">我们将置顶受欢迎的评论，关闭大家反对的讨论。<br />
              这一切都取决与您和其他网友对评论的投票。</p></div>
            <span class="clear"></span>
            <div id="comment">
		    <?php
             $sql2="select user,date,content from renrenclone.comment where articleid=".$id;
             $query2=$db->query($sql2);
               while ($rs2=$db->fetch_array($query2)) {
       	          if ($rs2){
       	   	        echo ("<div style=\"border-bottom-style:none;height:100px;\">");
       	   	        echo ("<p style=\"color:#CC3300; text-align:left;       background-repeat:no-repeat;background-position:top;background-image:url(incoming\comment_bg.gif)\">家人：".$rs2[user]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;发表时间：".$rs2[date]);
       	   	       echo ("<br><br><span style=\"padding:0px 10px 10px 0px;color:black\">".$rs2['content']."</span></p></div>"); 	
       	            }  
               }
			   $sql="select name from renrenclone.city where id=".$dqid;
			   $query=$db->query($sql);
			   $rs=$db->fetch_array($query);
           ?></div>
		   <div id="commenttitle">
            <h3 class="left"><a href="#comment">添加我的评论：</a></h3>
            <a href="bbs/logging.php?action=login" target="_blank">登陆伙伴</a><a href="bbs/register.php" target="_blank">注册伙伴</a></div>
          <span class="black">您的昵称：</span>
          <input type="text" name="user" class="text-input" />
          <br />
          <div class="blue">您要为您所发表言论的后果负责，请注意遵纪守法并用语文明。</div>
          <textarea name="content" rows="7"></textarea>
          <div class="center">
            <input type="checkbox" name="checkbox" value="OK" />
            匿名发表
			<input type="hidden" name="articleid"   value="<?=$id?>">
			<input type="hidden" name="city"   value="<?=$rs['name']?>">
            <input type="image" name="imageField" src="images/send_bt.gif" />
          </div>
        </form>
        <div class="clear"></div>
      </dd>
    </dl>
    <dl id="newfound">
      <dt class="title">新发现 <span class="clear"></span> </dt>
      <dd>
	  <ul class="fixtable">
	    <?
		  $sql="select title from renrenclone.post order by id desc limit 9";
		  $query=$db->query($sql);
		  while($rs=$db->fetch_array($query)){
		    echo ("<li><a href=\"#\" title=\"".$rs['title']."\" >".$rs['title']."</a></li>");
		  }
		?>
        </ul>
      </dd>
    </dl>
    <dl id="herepeople">
      <dt class="title">本地人 <span class="clear"></span> </dt>
      <dd>
        <ul class="fixtable">
		 <?
	  	    $sql="SELECT subject,tid FROM {$databasepre}.cdb_threads order by tid desc limit 9";
		    $query=$db->query($sql);
		    while($music=$db->fetch_array($query)){
			   $postdate = date('Y-m-d',$music[dateline]);
			   echo "<li><a href=\"bbs/viewthread.php?tid=$music[tid]\" title=\"".$music['subject']."\" target=\"_blank\">";
			   echo $music['subject']."</a></li>";
		     }
	  ?>        
         
        </ul>
      </dd>
    </dl>
    <div class="clear"></div>
  </div>
  <!--中部内容结束-->
  <!--右方内容开始-->
  <div class="rightpart">
    <dl id="h24news">
      <dt class="title">24小时大事排行 <span class="clear"></span> </dt>
      <dd>
        <ul class="fixtable">
		   <?php
                $sql="select name,id,type from renrenclone.article where type<>1 and date(publishdate)=\"".date("Y-m-d")."\" order                     by click desc limit 10";
                $query=$db->query($sql);//显示的是不为本地新闻的所有新闻类型，当天新闻并按照降序排列的前10条
                while($rs=$db->fetch_array($query)){
      	             echo("<li><a href=\"newscontent.php?id=".$rs['id']." target=\"_blank\" title=\"".$rs[name]."\">".$rs[name]."                          </a></li>");
                }
          ?>
        </ul>
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
