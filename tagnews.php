<?php
Require_once 'bbs/include/common.php';
session_start();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-cn" lang="zh-cn">
<head>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="utf-8" />
<meta name="robots" content="all" />
<meta name="author" content="TwinsenLiang" />
<meta name="Copyright" content="伙伴网版权所有©2006" />
<meta name="Description" content="伙伴网——您最忠实的伙伴门户" />
<meta name="Keywords" content="伙伴网,同城,都市,房屋出租,本地新闻,地图" />
<title>伙伴网</title>
<link href="./includes/calendar/style_1.css" rel="stylesheet" type="text/css" id="css"/>
<script type="text/javascript" src="./includes/calendar/common.js"></script>
<script src="./includes/calendar/calendar.js" type="text/javascript"></script>
<link rel="stylesheet" rev="stylesheet" href="style/tagnews.css" type="text/css" media="screen" />
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
}
// ]]>
</script>

<?php
	require_once('header.php');
    //$truecityid=$dqid;
	foreach ($dqarr as $one){
	   $citys=$citys.$one.",";
	}
	$citys=substr($citys,0,strlen($citys)-1);
?>
<div class="clear"></div>
<!--主体内容结束-->
<div class="main">
  <!--左方内容开始-->
  <div class="leftpart">
    <dl id="leftmenu">
      <dt class="title">大事通道 <span class="clear"></span> </dt>
      <dd>
        <ul class="fixtable">
		  <?php
		     /*if (isset($_GET['dateid'])){
			  $startday= date("Y-m-d",mktime(0, 0, 0, date("m",strtotime($_GET['dateid'])), date("d",strtotime($_GET['dateid']))-2, 
			            date("Y",strtotime($_GET['dateid']))));
			  $da=$_GET['dateid'];
			}
			else{
			  $startday= date("Y-m-d",mktime(0, 0, 0, date("m") , date("d")-2, date("Y")));
			  $da=date('Y-m-d');
			}*/
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
				  //$totsql="select count(id) as c from renrenclone.article where date(publishdate) between \"".$startday."\" and \"".$da."\" and type=1 and cityid in(1,".$citys.")";
				  $totsql="select count(id) as c from renrenclone.article where type=1 and cityid in(1,".$citys.")".$addsql;
				  //echo $totsql;
				}
				else{
				  //$totsql="select count(id) as c from renrenclone.article where date(publishdate) between \"".$startday."\" and \"".$da."\" and type=".$rs['id'];
				  $totsql="select count(id) as c from renrenclone.article where type=".$rs['id'].$addsql;
				  //echo $totsql;
				}
			    $totquery=$db->query($totsql);
				$totrs=$db->fetch_array($totquery);
	            echo ("<li><a href=\"tagnews.php?typeid=".$rs['id']."\" class=\"now\">".$rs['name']."<span class=\"num\">".$totrs['c']."</span></a></li>");	
	          }
          ?>
        </ul>
      </dd>
    </dl>
    <dl id="calendar">
      <dt class="title">大事日历 <span class="clear"></span> </dt>
	   <?php
       	 if ($_GET['typeid']==""){  
       	 	$typeid=1;
       	 }
       	 else{
       	 	$typeid=$_GET['typeid'];
       	 }
       	
       ?>
	   <input type="hidden" name="bdaynew" size="25" value=<?=$typeid?>>
	    <script>showcalendar('',document.getElementById("bdaynew"));</script>
    </dl>
    <dl id="herereview">
      <dt class="title">本地热事7天回顾 <span class="clear"></span> </dt>
      <dd>
        <ul class="fixtable">
		   <?php
               $beforeday= date("Y-m-d",mktime(0, 0, 0, date("m") , date("d")-7, date("Y")));
               $endday=date("Y-m-d",mktime(0, 0, 0, date("m") , date("d")-1, date("Y")));
               $sql="select name,id,type from article where type=1 and cityid in(1,".$citys.") and date(publishdate) between \"".                     $beforeday."\" and \"".$endday."\" order by click desc limit 7";
			   $query=$db->query($sql);
               while ($rs=$db->fetch_array($query)) { 
       	          echo ("<li><a href=\"newscontent.php?id=".$rs['id']."\"target=\"_blank\" title=\"".$rs['name']."\">".$rs['name']."</a></li>");
               }       
    ?>     
          
        </ul>
      </dd>
    </dl>
    <dl id="otherreview">
      <dt class="title">其他地区大新闻<span class="clear"></span> </dt>
      <dd>
        <ul class="fixtable">
		   <?php
               $sql="select cityid,name,id,type from article where type=1 and cityid not in(1,".$citys.") order by click desc limit 10";
               $query=$db->query($sql);
	           while ($rs=$db->fetch_array($query)){ 
	   	          $sqlcity="select name from city where id=".$rs['cityid'];
	   	          $rscity=$db->fetch_array($db->query($sqlcity));
	   	          echo ("<li><a href=\"newscontent.php?id=".$rs['id']."&cityid=".$rs['cityid']."\"target=\"_blank\" title=\"".$rs['name']."\">".$rs[name]."</a></li>");
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
	   <?php
	       
            $rowperpage =10;
            $page=isset($_GET[page])?$_GET[page]:1;
			$cityid = ($typeid==1)?"cityid in (1,".$citys.")":"cityid in (0) ";
            //$tsql="select count(*) as c from article where ".$cityid." and type=".$typeid." and date(publishdate) between                  \"".$startday."\" and \"".$da."\"";
			$tsql="select count(*) as c from article where ".$cityid." and type=".$typeid.$addsql;
			//echo $tsql;
            $tqr=$db->query($tsql);
	        $total=$db->fetch_array($tqr);
  	        if ($_GET['typeid']==""){
	           echo ("<dt class=\"title\">本地焦点<span class=\"clear\"></span></dt>");
	        }
	        else { 
			   switch($_GET['typeid']){
			     case 1:
				        $name="本地焦点";
						break;
				 case 2:
			            $name="国际焦点";
						break;
				 case 3:
			            $name="国内焦点";
						break;
				 case 4:
			            $name="社会焦点";
						break;
			     case 5:
			            $name="科技焦点";
						break;
                 case 6:
			            $name="体育焦点";
						break;
				 case 7:
			            $name="娱乐焦点";
						break;					   
			   }
               echo ("<dt class=\"title\">".$name."<span class=\"clear\"></span></dt>");
            }
		
		
	           //$sql1="select * from article where ".$cityid."and type=".$typeid." and date(publishdate) between \"".$startday."\" and \"".$da."\" order by id desc limit ".trim(($page-1)*$rowperpage).",$rowperpage";
			   $sql1="select * from article where ".$cityid."and type=".$typeid.$addsql." order by id desc limit ".trim(($page-1)*$rowperpage).",$rowperpage";
			   //echo $sql1;
              $query1=$db->query($sql1);
			  echo("<dd>");
	          while ($rs1=$db->fetch_array($query1)){
	            $publishtime=explode(" ",$rs1["publishdate"]);
	            $date=explode("-",$publishtime[0]);
	            $time=explode(":",$publishtime[1]);
	            //print_r($date)."<br>";
	            //print_r($time)."<br>";
	            $GMT=0;
	            $current=time()+$GMT*3600;
                $dd=round((mktime(0,0,0,date('m'),date('d'),date('Y'))-mktime(0,0,0,$date[1],$date[2],$date[0]))/3600/24); 
			    if ($dd==0){
				  $td=date("H:i:s",mktime(date('H',$current)-$time[0] , date("i",$current)-$time[1], date("s",$current)-$time[2])); 
				  $td=explode(":",$td);
	              $dd=(int)$td[0];
                  $str=$dd==0?" ":"发布时间：".$dd."小时前";	    
			   }		
			   else{
				  $str="发布时间：".$dd."天前";
			   }			
	           if($rs1['titlepicture']<>""){
			      echo ("<div style=\"margin-top:10px;\">");
		          echo("<a href=\"newscontent.php?id=".$rs1['id']."\" target=\"_blank\" class=\"pic_132_109\"><img src=\"".$rs1['titlepicture']."\" width=\"130\" height=\"107\"></a>");
				  echo ("<h3><a href=\"newscontent.php?id=".$rs1['id']."\" target=\"_blank\">".$rs1['name']."</a></h3>");
				  echo ("<p>".$rs1['articleabstract']."</p>");
				  echo ("<div class=\"ctrl\">".$rs1['sourcename']."&nbsp;&nbsp;".$str."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|<a href=\"newscontent.php?id=".$rs1['id']."\" target=\"_blank\"><span> 阅读全文</span></a>|<a href=\"newscontent.php?&id=".$rs1['id']."#comment\" target=\"_blank\"><span> 参与点评</span></a></span><span class=\"num\"></span></div>");
	             
                  echo("</div><br>");
				  echo ("<div style=\"border-bottom:1px dashed #BDDBF7;\"></div>");
 	        }
           else {
		          echo ("<div style=\"border-bottom:1px dashed #BDDBF7; margin-top:10px;\">");
				  echo ("<h3><a href=\"newscontent.php?id=".$rs1['id']."\" target=\"_blank\">".$rs1['name']."</a></h3>");
				  echo ("<p>".$rs1['articleabstract']."</p>");
				  echo ("<div class=\"ctrl\">".$rs1['sourcename']."&nbsp;&nbsp;".$str."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|<a href=\"newscontent.php?id=".$rs1['id']."\" target=\"_blank\"><span> 阅读全文</span></a>|<a href=\"newscontent.php?&id=".$rs1['id']."#comment\" target=\"_blank\"><span> 参与点评</span></a></span><span class=\"num\"></span></div>");
	              
                  echo("</div>");
	       }
	 }
    
?>	
      </dd>
	  <?php
        require_once("includes/pagebar.php");
        $multipage = multipage($total[c], $rowperpage, $page, "tagnews.php?typeid=".$typeid."&dateid=".$da);
        echo $multipage;
       ?>
    </dl>
    <div class="clear"></div>
  </div>
  <!--中部内容结束-->
  <!--右方内容开始-->
  <div class="rightpart"><a href="javascript:void(0)" id="setindexbt" class="button" onclick="this.style.behavior='url( #default#homepage)';this.sethomepage(document.location.href);"><span>设此页为首页</span></a> <a href="javascript:window,external.addfavorite(document.location.href,' 伙伴网——本地新闻')" id="favbt" class="button"><span>收藏本地新闻</span></a>
    <dl id="support">
      <dt class="title">赞助商连接<span class="clear"></span> </dt>
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
    <dl id="hottheme">
      <dt class="title"> 热门话题 <span class="clear"></span> </dt>
      <dd>
        <ul class="fixtable">
		  <?php
		  //echo $truecityid;
		     $sql="select id,name,articleabstract,titlepicture from renrenclone.article where type=1 and cityid in(1,".$citys.") and titlepicture<>\" \" order by id desc limit 5";
			 //echo $sql;
		     $query=$db->query($sql);
			 while($rs=$db->fetch_array($query)){
			    $abs=strlen($rs['articleabstract'])>140?substr($rs['articleabstract'],0,135).".....":$rs['articleabstract'];
			    echo ("<li><strong><a href=\"newscontent.php?id=".$rs['id']."\" target=\"_blank\" alt=\"".$rs['name']."\">".$rs['name']."</a></strong>");
				echo ("<a href=\"newscontent.php?id=".$rs['id']."\" target=\"_blank\" class=\"pic_57_50\"><img src=\"".$rs['titlepicture']."\" alt=\"".$rs['name']."\" style=\"height:60px;width:60px;\"></a>");
				echo ("<p style=\"display:inline;\">".$abs."</p></li>");
              }
			 
		  ?>
        </ul>
      </dd>
    </dl>
    <div class="clear"></div>
  </div>
  <!-- 右方内容结束-->
  <div class="clear"></div>
</div>
<!--主体内容结束-->
<!--版权开始-->
<div id="copyright">
  <div class="menu"><a href="#" target="new">关于伙伴网</a> | <a href="#" target="new">广告服务</a> | <a href="#" target="new"> 合作方式</a> | <a href="#" target="new">免责声明</a></div>
   <span><a href="http://www.exue.com" target="_blank">www.exue.com</a></span><span>由<a href="http://www.exue.com" target="_blank">E学网</a>提供技术支持</span><span>鲁ICP证010217号</span><br />
  建议使用1024x768以上分辨率 </div>
<!--版权结束-->
</body>
</html>
