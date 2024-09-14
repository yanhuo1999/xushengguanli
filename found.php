<?php
Require_once 'bbs/include/common.php';
$databasepre="discuz";
//session_start();
$id=$_GET[id];

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
<link rel="stylesheet" rev="stylesheet" href="style/found.css" type="text/css" media="screen" />
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
	//Nifty("div#aboutinfo","transparent");
}
function copyToClipBoard(title){
   var clipBoardContent=title;
   clipBoardContent+='\r\n' + document.location.href;
   window.clipboardData.setData("Text",clipBoardContent);
   alert("复制成功，请粘贴到你的QQ/MSN上推荐给你的好友!");
}
function check(){
  if (comment.content.value==""){
   return false;
  }
}
// ]]>
</script>
<?php
	require_once('header.php');
?>
<div class="clear"></div>
<!--主体内容开始-->
<div class="main">
  <!--左方内容开始-->
  <div class="leftpart">
    <dl id="content">
      <dt> <span class="clear"></span></dt>
      <dd>
        
		<?  
			$sql="SELECT p.id id,p.title title,p.content content,p.typeid typeid,p.keyword keyword,p.postdate postdate,p.summary summary,m.username username,p.owner uid, type.name name FROM renrenclone.post p left outer join discuz.cdb_members m on p.owner = m.uid left outer join renrenclone.posttype type on p.typeid=type.id where p.id=$id".$sqlpanded;
			//echo $sql;
			$query=$db->query($sql);
			if($post=$db->fetch_array($query)){
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
		   <li><div class="aboutuser"><a class="pic_60_57" style="text-align:center; "><div style="font-size:20px;padding-top:  16px;color:#000000; font-weight:500"><?=$cnt?></div><span style="color:#666666">人支持</span></a>
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
          <h3><?=$post[title]?></h3>
          <h4><a href="bbs/viewpro.php?uid=<?=$post[uid]?>" class="user"><?=$post[username]?></a>在 <span class="time">
		<?
			//date_default_timezone_set('Asia/Chongqing');
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
          <p><?=$post[content]?></p>
          <div class="tag">关键字：
		<?
			$keywords = split(" ",$post['keyword']);
			foreach($keywords as $keyword){
				echo "<a href=\"javascript:void(0)\">$keyword</a>&nbsp;&nbsp;";
			}
		?>
		  </div>
          <div class="ctrl">
		  <?
			 	if($is_supported){			 
			 		echo "<div style=\"float:right;margin-right:2px;padding:6px 20px 6px 20px;background:#e7f2fc; \">已支持</div>";
			 	}else{	
				    if($discuz_uid==0){
					  echo "<div style=\"float:right;margin-right:2px;padding:6px 20px 6px 20px;background:#e7f2fc; \"><a href=\"bbs/logging.php?action=login\" style=\"text-decoration:none;\">支 持</a></div>";
					}
					else{
					  echo "<div style=\"float:right;margin-right:2px;padding:6px 20px 6px 20px;background:#e7f2fc; \"><a href=\"support.php?id=".$post['id']."\" style=\"text-decoration:none;\">支 持</a></div>";
					}		 
			 		
			 	}
			 ?>
          </a><a href="#" class="comment">评论</a> | <a href="javascript:copyToClipBoard('<?=$post['title']?>')" class="copylink">复制这个连接发送给朋友</a> | 所属分类：<a href="classnews.php?posttype=<?=$post['typeid']?>" class="class"><?=$post['name']?></a> </div>
		<? }
		?>
        </div>
        <span class="clear"></span> </dd>
    </dl>
   
	   <?
     $sql2="select userid,postdate,content from renrenclone.postcomment where postid=".$_GET['id'];
     $query2=$db->query($sql2);
	 $rows=$db->num_rows($query2); 
	 echo ("<p>");
	 echo (" <span class=\"blue\">".$rows."条评论</span> </p>");
	 echo (" <ul id=\"commentlist\">");
       while ($rs2=$db->fetch_array($query2)) {
       	   if ($rs2){
       	   	 $sqluser="select username from discuz.cdb_members where uid=".$rs2['userid'];	
	         $queryuser=$db->query($sqluser);
	         $user=$db->fetch_array($queryuser);	
			 $GMT=0;
	         $differ = time()-strtotime($rs2['postdate'])+$GMT* 3600;
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
       	   	 echo ("<li><div class=\"title\"><a href=\"bbs/viewpro.php?uid=".$rs2[userid]."\" class=\"user\">".$user[username]."</a> <span class=\"gray\">在".$days.$hours.$minutes."分钟前发布</span>");
			 echo ("<span class=\"blue\">0次支持</span><a href=\"#\"><img src=\"images/down_bt.gif\" alt=\"砸\" width=\"15\" height=\"15\" /></a><a href=\"#\"><img src=\"images/up_bt.gif\" alt=\"顶\" width=\"15\" height=\"15\" /></a></div>");
       	   	 echo ("<p>".$rs2['content']."</p>"); 	
			 echo ("<a href=\"#\" class=\"pen\">回复</a> <span class=\"clear\"></span> </li>");
       	   }  
       }
   ?>
      </ul>
      <h3 class="blue">添加我的评论：</h3>
	  <?
     if ($discuz_uid!=0){
	 
     ?> 
	 <form id="comment" method="post" action="foundinsertcomment.php" onSubmit="return check()">   
       <textarea name="content" rows="7"></textarea><input type="image" name="imageField" class="right" src="images/send_bt.gif" />
       <input type="hidden"  name="postid" value="<?=$_GET['id']?>">
     </form>
	  <?
	  }
	  else{
	   ?>
	    <div style="padding:40px 0px 40px 100px;font-size:14px; background: #e7f2fc;">若要向此网站发布评论，您必须用伙伴网通行证登录!
        <a href="bbs/logging.php?action=login">登陆</a>
        </div>   
      <?  
	  }
	  ?>
      
    <h3 class="blue title">都有谁支持过这个新发现：</h3>
    <ul id="userlist">
	<?
	  $sql="SELECT p.uid,m.username FROM renrenclone.postsuppert p, {$databasepre}.cdb_members m where p.uid=m.uid and postid={$id}";
	  $query=$db->query($sql);
	   while ($rs=$db->fetch_array($query)){
	      echo ("<li><a href=\"bbs/viewpro.php?uid=".$rs[uid]."\">".$rs['username']."</a></li>");
	   }
	?>
    </ul>
    <div class="clear"></div>
  </div>
  <!--左方内容结束-->
  <!--右方内容开始-->
  <div class="rightpart"> 
   <?php
   if($discuz_uid==0){
		
		echo ("<a href=\"bbs/logging.php?action=login\" id=\"reports\" class=\"button\" target=\"_blank\">");
	}else{
		echo ("<a href=\"addfound.php\" id=\"reports\" class=\"button\">");
	}
	?>
  <span>发布报道 <strong class="num">my reports</strong></span></a>
    <div class="center"><a href="#">把我的报道加入Blog</a></div>
    <dl id="newfound">
      <dt class="title">新发现分类 <span class="clear"></span> </dt>
      <dd>
        <ul>
          <li><a href="classnews.php?posttype=2" target="_parent">现场目击</a></li>
          <li><a href="classnews.php?posttype=4" target="_parent">读报新闻</a></li>
          <li><a href="classnews.php?posttype=3" target="_parent">时尚导购</a></li>
          <li><a href="classnews.php?posttype=5" target="_parent">书影点评</a></li>
          <li><a href="classnews.php?posttype=1" target="_parent">每日抢新</a></li>
        </ul>
        <span class="clear"></span>
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
	  </form>
        <span class="clear"></span> </dd>
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
