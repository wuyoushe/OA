<?php


$method=$_POST['f_method'];
$method_v=$_POST['f_method_v'];
$title=$_POST['f_title'];
$content=$_POST['f_content'];

$conn=mysql_connect("localhost","root","qwe2721080");
mysql_query("set names utf8",$conn) or die(mysql_error());
//选择数据库
mysql_select_db("library",$conn) or die(mysql_error());
$query="insert into guestmessage values
(null,'$method','$method_v','$title','$content',now())";
//echo $query;
$qry=mysql_query($query);
if($qry){
	echo "留言成功" ;
}else{
	echo "留言失败".die(mysql_error());
}


?>
