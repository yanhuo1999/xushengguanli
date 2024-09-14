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
<link href="style/miniad.css" rel="stylesheet" type="text/css" />
<SCRIPT src="includes/validate.js" type=text/javascript></SCRIPT>
<SCRIPT type=text/javascript>
	function checkform(me){
		var errormsg="";		
		var strinside  = me.hid.value;
		var nodelist = strinside.split(";");		
		try{
			for (j=1;j<nodelist.length;j++)			
			{
				var nodeinfo = nodelist[j].split(",");
				if (nodeinfo[1]==1)
				{					
					var obj=document.getElementsByName(nodeinfo[0]);
					if (!obj){obj=document.getElementById(nodeinfo[0]);}					
				//	if (!obj) obj=document.GetElementById(nodeinfo[0]);
				//	var bool=checknull(document.GetElementByName("me.详细地址"+nodeinfo[0]));
					if (nodeinfo[3]==1)
					{
						var bool=checknull(obj);
					}else if(nodeinfo[3]==2)
					{						
						var bool=checkradionull(obj);						
					}					
					if(bool==true)
					{
						alert(nodeinfo[0]+"不能为空!");
						return false;
					}
				}
			}
		}
		catch(e){
			alert(e.message);
		return false;
		}
		
		if(checknull(me.title)){
			alert("标题不能为空!");
			return false;
		}
		if(checknull(me.content)){
			alert("内容不能为空!");
			return false;
		}
		if(checknull(me.contact)){
			alert("联系方式不能为空!");
			return false;
		}	
//		if(checkradionull(me.posttype)){
//			alert("类型不能为空!");
//			return false;
//		}
		errormsg=checklength(me.title,5,35);
		if(errormsg!=""){
			alert("标题"+errormsg);
			return false;
		}
		errormsg=checklength(me.content,10,300);
		if(errormsg!=""){
			alert("内容"+errormsg);
			return false;
		}
		return true;
	}
function closepopup(){
	parent.closepopup();
}
</SCRIPT>
</head>

<body>
<dl id="reg-input">
  <dt><a href="javascript:closepopup();"><img src="images/close_bt.gif" alt="关闭" width="15" height="15" /></a> <span class="clear"></span> </dt>
  <dd>
  	<center>
    <form action="ad/insertad.php" method="post" enctype="multipart/form-data" name="AddMiniAD" id="form1" onsubmit="return checkform(this);">
      <h4>您的告示将发布在<?php echo $_POST['location']; ?>地区的  <?php echo $_POST['first'].'>>'.$_POST['second']; ?>中</h4>
	  <table class="contentTable">
	  	<tr>
			<td class="righttd"><span class="red">*</span>告示标题：</td>
			<td class="lefttd"><input name="title" type="text" size="40" /></td>
	  	</tr>
		<tr>
			<td class="righttd"><span class="red">*</span>联系方式：</td>
			<td class="lefttd"><input name="contact" type="text" size="40" /></td>
		</tr>
		<?PHP
			$custominfo="";
			//get typeid
			$query="SELECT * FROM renrenclone.advertisetype where typename='".$_POST['second']."'";
			$result = $db->query($query);
			$rowid=$db->fetch_array($result);
			//get custom sockcode
			$query="select * from renrenclone.advertisecolumn where typeid='".$rowid['typeid']."'";
			$result = $db->query($query);
			while ($row=$db->fetch_array($result)){
				$custominfo=$custominfo.";".$row['columncode'].",".$row['Not Null'].",".$row['Length'].",".$row['type'];	
				echo $row['sockcode'];
			}
			$query="SELECT * FROM renrenclone.city  where name='".$_POST['location']."'";
			//echo $query;
			$result = $db->query($query);
			$row=$db->fetch_array($result);
			if ($row['id']==""){
				$cityid=1;
			}else{
				$cityid=$row['id'];
			}
		?>
		<tr>
			<td class="righttd">&nbsp;上传图片：</td>
			<td class="lefttd"><input type="file" name="file" id="file"/></td>
		</tr>		
		<tr>
			<td class="righttd">&nbsp;选择分类：</td>
			<td class="lefttd">
			<select name="first" onchange="setcity()">
          		<option value=<?php echo "'".$_POST['first']."'"; ?>  ><?php echo $_POST['first']; ?> </option>
      		</select>
			<select name="second">
				<option value='<?php echo $_POST['second']; ?>'><?php echo $_POST['second'];?></option>
	        </select>
			</td>
		</tr>
		<tr>
			<td class="righttd"><span class="red">*</span>告示内容：</td>
			<td class="lefttd"><textarea name="content" cols="80" rows="6"></textarea></td>
		</tr>
	  </table>
	  <input type="hidden" name="userid" value="<?php echo $_POST['USER']; ?>" />
      <input type="hidden" name="typeid"  value="<?php echo $rowid['typeid']; ?>"/>
	  <input type="hidden" name="cityid"  value="<?php echo $cityid; ?>"/>
      <input type="hidden" name="hid"   value="<?php echo $custominfo; ?>"/>
	  <input type="image" name="imageField" src="images/public_bt.gif"/>&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/reset_bt.gif" name="resetimg" />	  
</form>
</center>
  </dd>
</dl>
</body>
</html>
