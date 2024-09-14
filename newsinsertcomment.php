<?php
 Require_once 'bbs/include/common.php';
 $name=isset($_POST['checkbox'])? $_POST['city']."网友":$_POST['user'];
 $sql="insert into renrenclone.comment
 	   (articleid,user,content) values 
 	    ('" .$_POST[articleid]. "','".$name."','".$_POST[content]."')" ;
 if ($db->query($sql)){
   //echo "insert sucess! <br>";
}
 else{
   echo ("insert failed");
  }    
  $db->close();
  
  
  header("Location:newscontent.php?id=".$_POST[articleid]);
  ?> 
