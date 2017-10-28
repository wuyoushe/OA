<?php
//print_r($_POST);
//echo $_SERVER;
//echo $_SERVER['HTTP_HOST']."<br>"; #localhost

//获取网页地址
//echo $_SERVER['PHP_SELF']."<br>"; #/blog/testurl.php

//获取网址参数
//echo $_SERVER["QUERY_STRING"]."<br>"; #id=5

//获取用户代理
//echo $_SERVER['HTTP_REFERER']."<br>";
if($_REQUEST['username']==qwe&&$_REQUEST['userpwd']==qwe){
	//header("Location show.php" );
	header ( "Location: index.php" );
	
}else{
	echo "请重新输入";
	header("Location login.html" );
	
	
}
?>