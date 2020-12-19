<?php
if(!isset($config)){exit;}
$link=new mysqli('localhost',$config['Mysql_User'],$config['Mysql_Pwd'],$config['Mysql_db'],3306);
if($link -> connect_error){exit('数据库连接失败:'.mysqli_connect_error().'<br />解决方案:编辑根目录的config.php文件，配置数据库账号密码以及其他信息即可');}
$link -> set_charset('utf8');