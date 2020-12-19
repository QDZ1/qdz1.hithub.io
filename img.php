<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <title>图片托管-查看</title>
    <style>
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
require './config.php';
if(!isset($config)){exit('未检测到配置文件，无法运行程序');}
if($config['Install'] == false){exit('检测到程序未安装请<a href="./Install/install.php">点我安装</a>');}
require './Mysql/link.php';
require './Mysql/op.php';
$id=isset($_GET['id']) && is_numeric($_GET['id'])?$_GET['id']:null;
if($id == null){exit('<div class="false">ID参数错误</div>');}
$imgname=img($link,$id);
if(file_exists('./File/'.$imgname['name']) && $imgname['name'] != null){
    $url='./File/'.$imgname['name'];
    header("Location: $url");
}else{
    echo '<div class="false">图片不存在</div>';
}
mysqli_free_result($imgname);
mysqli_close($link);
exit;