<?php 
$link=mysql_connect('localhost','root','qwe2721080');
mysql_select_db('library',$link) or die(mysql_error());
mysql_query('set names utf8');
$sql="select * from guestmessage";
$qry=mysql_query($sql);
//print_r($qry);



?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="留言板后台管理" />
        <meta name="keywords" content="留言板,后台管理" />

        <title>留言板后台管理</title>

        <link type="text/css" href="../css/guest.css" rel="stylesheet" />

        <style type="text/css">
            .huifu_neirong { 
                border-bottom: 1px dotted #ffb7dd;
                border-left: 1px dotted #ffb7dd;
                border-top-style:none ;
                width: 100%;
                color:rgb(51,51,51);
                font-style:italic;
            }
            .huifu_neirong span {font-size:14px; color:gray;font-style:normal;font-weight:bold;}
            .huifu_time {width:100%; color:rgb(51,51,51);font-style:italic;border-bottom:1px dotted #ffb7dd;}
        </style>

    </head>
    <body>
        <h1>办公留言系统</h1>
        <div id="whatever">
            <ul class="tabbarlevel1" id="tabpage1"> 
                <li class="selected"><a href="admin_index.php">留言管理</a></li>
                <li><a href="admin_setting.php">系统设置</a></li>
                <li><a href="admin_changepass.php">修改密码</a></li>
                <li><a href="index.php">退出管理</a></li> 
            </ul>
        </div>
        <div class="hackbox">

            <script type="text/javascript">
                function checkall(obj) {
                    len = document.myform.elements.length;
                    var i;
                    for (i=0; i < len; i++) {
                        if (document.myform.elements[i].name=='del[]') {
                            document.myform.elements[i].checked=document.myform.selectall.checked;
                        }
                    }
                    if(obj.checked) {
                        document.myform.selectedinverse.checked = false ;
                    }
                }
                function reverse(obj) {
                    len = document.myform.elements.length;
                    var i;
                    for (i=0; i<len; i++) {
                        if (document.myform.elements[i].name=='del[]') {
                            document.myform.elements[i].click();
                        }
                    }
                    if(obj.checked) {
                        document.myform.selectall.checked = false ;
                    }
                }
            </script>
            
            <form action="delete.php" method="post" name="myform">
                <input type="button" name="selectedinverse" onclick="reverse(this);" id="un_select_all" value="反选" />
                <input name="submit" type="submit" value="删除选中项" />
                <div class="default_top_centercontent">
                    <table cellpadding="3" style="width: 100%">
                        <tr>
                            <th class="default_top_centercontent1 dtc1">
                                <input type="checkbox" name="selectall" onclick="checkall(this);" id="select_all"></th>
                            <th class="default_top_centercontent1 dtc3" >留言标题</th>
                            <th class="default_top_centercontent1 dtc4" >留言内容</th>
                            <th class="default_top_centercontent1 dtc5" >留言时间</th>
                            <th class="default_top_centercontent1 dtc2">操作</th>
                        </tr>
                         <?php 
                         while($rzt=mysql_fetch_assoc($qry)){
                         ?>
                        <tr>
                            <td  class="default_top_centercontent1 dtc1" >
                                <input name="del[]" type="checkbox" value="1" />
                            </td>

                            <td class="default_top_centercontent1 dtc3" >
                              <?php echo $rzt['title']; ?>
                            </td>
                            <td class="default_top_centercontent1 dtc4" >
                             <?php echo $rzt['content']; ?>
                            </td>
                            <td  class="default_top_centercontent1 dtc5" >
                               <?php echo $rzt['add_time']; ?>
                            </td>
                            <td  class="default_top_centercontent1 dtc2" >
                                <a href="message_delete.php?message_id=<?php echo $rzt['id']; ?>">删除</a>&nbsp;<a href="#">修改</a>
                            </td>
                        </tr>
                        <?php 
                        $sqla="select * from guestback where message_id=".$rzt['id'];
                        $qrya=mysql_query($sqla);
                        $i=1;
                        while($rzta=mysql_fetch_assoc($qrya)){
                        
                        ?>
                        <tr>
                            <td colspan="2" class="huifu"></td>
                            <td colspan="2" class="huifu_neirong"><span><?php echo $i; ?>回复：</span><?php echo $rzta['back_content']; ?></td>
                            <td class="huifu_time"><?php echo $rzta['back_time']; ?></td>
                        </tr>
                      
                        
                        <?php 
                        $i++;
                         }
                         }
                        ?>
                        
                        
                    </table>
                </div>
            </form>
        </div>
    </body>
</html>