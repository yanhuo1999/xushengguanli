<?php
Require_once 'bbs/include/common.inc.php';
//session_start();
if(!$discuz_uid){
	header("Location:includes/error.htm");
}
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
<script type="text/javascript" src="includes/validate.js"></script>
<script type="text/javascript" src="js/external.js"></script>
<script type="text/javascript" src="js/swfobject.js"></script>
<script type="text/javascript" src="js/niftycube.js"></script>
<script type="text/javascript">
// <![CDATA[
window.onload=function(){
	Nifty("div#topmenu","transparent");
	Nifty("div#aboutinfo","transparent");
}
function closeaboutinfo(){
	var obj=document.getElementById('aboutinfo');
	obj.style.display='none';
}
function cate_desc(str)
{
	var obj = document.getElementById("category_desc");
	if(str=="") str="分类说明: 暂缺";
	else{
		if(str!=" "){
			str= "分类说明: "+str;
		}
	}
	obj.innerHTML = str;
}
// ]]>
</script>
<script type="text/javascript" src="includes/FCKeditor/fckeditor.js"></script>
<?php
	require_once('header.php');
?>
<div class="clear"></div>
<!--主体内容开始-->
<form id="typechange" method="post" action="classnews.php">
	<input type="hidden" id="poststype" value="1"/>
</form>
<div class="main">
  <!--左方内容开始-->
  <div class="leftpart">
    <dl id="content">
		<dt><a>发布新发现</a></dt>
		<dd>
			<form id="form2" name="form2" method="post" action="insertfound.php" enctype="multipart/form-data">
			<h4>新报道标题：(长度5-35字)</h4>
			<input name="title" type="text" class="leftshift" size="58" /><br /><br />
			<h4>内容：(长度10-3000字)</h4>
			<input type="text" name="content" id="content" style="display:none"/>
			<?			
			include("includes/fckeditor.php") ;
			$sBasePath = $_SERVER['PHP_SELF'] ;
			$sBasePath = "includes/FCKeditor/" ;
			$oFCKeditor = new FCKeditor('contenteditor') ;
			$oFCKeditor->BasePath	= $sBasePath ;
			$oFCKeditor->ToolbarSet = "Basic";
			$oFCKeditor->Height	= 300 ;
			$oFCKeditor->Value		= '' ;
			$oFCKeditor->Create() ;
			?>
			<br />
			<h4>关键字：(关键字是你喜欢的分类方式。使用空格分隔每个关键字，最多5个，例如“发现 探索 未来”)</h4>
			<input name="keyword" type="text" class="leftshift" size="58" value="<? echo $cityname?>" />
			<br /><br />
			<h4>请选择分类：</h4>
			<?
			$i=1;
			$sql = "SELECT id,name,description FROM renrenclone.posttype";
			$query = $db->query($sql);
			while($rs = $db->fetch_array($query)){
			echo "<input type=\"radio\" name=\"posttype\" id=\"posttype".$i."\" value=".$rs["id"]." onclick=\"javascript:cate_desc('".$rs["description"]."')\"/>";
			echo "<label for=\"posttype".$i."\" title=\"".$rs["description"]."\"><span class=\"nomal\">".$rs["name"]."</span></label>";
			$i+=1;
			}
			?>
			<div class="errorInfoBox2" id="category_desc"></div>
			<center>			  
			  <a href="javascript:submitform();"><img src="images/post_btn.gif" style="border:none"/></a>
			  &nbsp;&nbsp;&nbsp;<a href="javascript:resetform();"><img src="images/reset_btn.gif" style="border:none"/></a>
			</center>
			</form>
		<dd>
	</dl>
    <div class="clear"></div>
  </div>
  <!--左方内容结束-->
  <!--右方内容开始-->
  <div class="rightpart"> 
    <dl id="act">
      <dt class="title">公告 <span class="clear"></span> </dt>
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
    <dl id="newfound">
      <dt class="title">新发现分类 <span class="clear"></span> </dt>
      <dd>
        <ul>
          <li><a href="classnews.php?posttype=2" target="_parent">现场目击</a></li>
          <li><a href="classnews.php?posttype=4" target="_parent">读报新闻</a></li>
          <li><a href="classnews.php?posttype=3" target="_parent">时尚导购</a></li>
          <li><a href="classnews.php?posttype=5" target="_parent">书影点评</a></li>
          <li><a href="classnews.php?posttype=1" target="_parent">每日抢新</a></li>
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
	  </form>
	  <span class="clear"></span>
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
<script type="text/javascript">
function resetform(){
	form2.reset();
	var oEditor = FCKeditorAPI.GetInstance('contenteditor');
	oEditor.SetHTML('');
	cate_desc(' ');
}
function submitform(){	
	var oEditor = FCKeditorAPI.GetInstance('contenteditor');			
	form2.content.value=oEditor.GetXHTML( true );			
	//var oDOM = oEditor.EditorDocument ;
	//oEditor.EditorDocument.body.innerHTML;
	//oEditor.SetHTML('');
	if(checkform(form2)==true){
		//alert("check ok");
		form2.submit();
	}
}
function checkform(me){
	var errormsg="";
	if(checknull(me.title)){
		alert("标题不能为空!");
		return false;
	}
	if(checknull(me.content)){
		alert("内容不能为空!");
		return false;
	}
	if(checknull(me.keyword)){
		alert("关键字不能为空!");
		return false;
	}	
	if(checkradionull(me.posttype)){
		alert("类型不能为空!");
		return false;
	}
	errormsg=checklength(me.title,5,35);
	if(errormsg!=""){
		alert("标题"+errormsg);
		return false;
	}
	errormsg=checklength(me.content,10,6000);
	if(errormsg!=""){
		alert("内容"+errormsg);
		return false;
	}
	return true;
}
</script>
</body>
</html>