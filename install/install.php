<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <title>图片托管-安装</title>
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
<?php
require '../config.php';
if(!isset($config)){exit('未检测到配置文件，无法运行程序');}
if($config['Install'] == true){exit('程序已经安装过，无需重新安装');}
require '../Mysql/link.php';

$link -> query("DROP TABLE Image");
$sql="CREATE TABLE IF NOT EXISTS `Image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_bin NOT NULL,
  `time` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1000 ;";

if($link -> query($sql)){
    mysqli_close($link);
    $config=file_get_contents('../config.php');
    $newconfig=str_replace("'Install' => false,","'Install' => true,",$config);
    file_put_contents('../config.php',$newconfig);
    exit('<div class="true">安装成功</div>');
}else{
    mysqli_close($link);
    exit('<div class="false">安装失败，请检查配置文件</div>');
}