<?php

print_r($_POST);
$back_content=$_POST['f_back_content'];
$message_id=$_POST['f_message_id'];
$link=mysql_connect("localhost","root","qwe2721080");
mysql_query("set names utf8",$link) or die(mysql_error());
mysql_select_db("library",$link) or die(mysql_error());
$sql="insert into guestback values(null,'$back_content',now(),'$message_id')";
$qry=mysql_query($sql);
if($qry){
	echo "回复成功";
}else{die(mysql_error());
}

?>