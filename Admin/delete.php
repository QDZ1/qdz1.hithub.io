<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <title>图片托管-删除</title>
    <style>
        .true {
            max-width: 300px;
            display: block;
            background-color: #00FF00;
            border: 1px solid #00FF33;
            color: #fff;
            padding: 10px 15px;
            font-size: 16px;
            line-height: normal;
            border-radius: 10px;
            font-weight: 700;
            text-align: center;
            margin: 0 auto;
        }
        .false {
            max-width: 300px;
            display: block;
            background-color: #ff0066;
            border: 1px solid #ff0026;
            color: #fff;
            padding: 10px 15px;
            font-size: 16px;
            line-height: normal;
            border-radius: 10px;
            font-weight: 700;
            text-align: center;
            margin: 0 auto;
        }
    </style>
</head>
</html>
<?php
require '../config.php';
if(!isset($config)){exit('未检测到配置文件，无法运行程序');}
if($config['Install'] == false){exit('检测到程序未安装请<a href="../Install/install.php">点我安装</a>');}
require './login_test.php';
require '../Mysql/link.php';
require '../Mysql/op.php';
$id=isset($_GET['id']) && is_numeric($_GET['id'])?$_GET['id']:null;
if($id == null){echo '<div class="false">ID参数错误</div>';}
if(del($link,$id)){echo '<div class="true">删除成功</div>';}else{echo '<div class="false">删除失败，图片不存在或其他</div>';}
mysqli_close($link);
exit;