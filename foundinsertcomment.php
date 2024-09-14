<?
Require_once 'bbs/include/common.php';
 $sql="insert into renrenclone.postcomment
 	   (postid,userid,content,postdate) values 
 	    ('" .$_POST[postid]. "','".$discuz_uid."','".$_POST[content]."','".date('Y-m-d',time())."')" ;
		echo $sql;
 if ($db->query($sql)){
   //echo "insert sucess! <br>";
}
 else{
   //echo ("insert failed");
  }    
  $db->close();
  header("Location:found.php?id=".$_POST[postid]);
  ?> 
