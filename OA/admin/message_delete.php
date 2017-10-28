<?php 
header("content-type:text/html;charset=uft-8");
$mid=$_GET['message_id'];

$link=mysql_connect('localhost','root','qwe2721080');
mysql_select_db('library',$link) or die(mysql_error());
mysql_query('set names utf8');
$sql="delete from guestmessage where id=".$mid;
$qry=mysql_query($sql);
//print_r($qry);
if($qry){
	
	echo"删除成功";
}else{
	echo "删除失败".die(mysql_errno());
}

?>