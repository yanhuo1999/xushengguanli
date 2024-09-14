<?
session_start();
require_once('bbs/include/common.php');
//$cityid=isset($_COOKIE['cityid'])?$_COOKIE['cityid']:1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-cn" lang="zh-cn">
<head>
<meta http-equiv="pragma" content="no-cache" />
<!--缓存信息-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="utf-8"/>
<!--编码信息-->
<meta name="robots" content="all" />
<meta name="author" content="TwinsenLiang" />
<!--机器人爬虫-->
<meta name="Copyright" content="伙伴网版权所有©2006" />
<meta name="Description" content="伙伴网——您最忠实的伙伴门户" />
<meta name="Keywords" content="伙伴网,同城,都市,房屋出租,本地新闻,地图" />
<title>伙伴网</title>
</head>
<body>
<?
$owner = $discuz_uid;
$title = $_POST['title'];
$content = $_POST['contenteditor'];
$typeid = $_POST['posttype'];
$keyword = $_POST['keyword'];
$summary = $_POST['contenteditor'];
$pos2 = 0;
$pos1=strpos($summary,"<");
while(!($pos1===false)){
	$pos2= strpos($summary,">");
	if($pos2){
		$summary = substr($summary,0,$pos1).substr($summary,$pos2+1);
	}
	else{
		$summary = substr($summary,0,$pos1);
	}
	$pos1=strpos($summary,"<");
}
$summary = mb_strcut($summary,0,200,'gb2312');
$title = addslashes($title);
$summary = addslashes($summary);
$content = addslashes($content);
$sql = "insert into renrenclone.post(title,content,typeid,keyword,cityid,postdate,visited,owner,summary) 
values('".$title."','".$content."',".$typeid.",'".$keyword."',".$cityid.",'".date('Y-m-d H:i:s',time())."',0,".$owner.",'".$summary."')";
$query=$db->query($sql);
//echo $sql
if($db->affected_rows($query)>0)
{
	header("Location: "."classnews.php");
}
else
{
	echo "insert error";
	echo "<br/>".$sql;
}
?>
</body>
</html>
