<?
	Require_once 'bbs/include/common.php';
	$id = $_GET['id'];
	$sql = "insert into renrenclone.postsuppert values(".$id.",".$discuz_uid.",'')";
	try{
		$query=$db->query($sql);
	}
	catch(Exception $e){
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>