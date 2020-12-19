<?php
require '../config.php';
if(!isset($config)){exit('未检测到配置文件，无法运行程序');}
if($config['Install'] == false){exit('检测到程序未安装请<a href="../Install/install.php">点我安装</a>');}
require './login_test.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>图片托管-上传图片</title>
    <style>
        body {
            background-color: #F8F8F8;
            padding:0;
            margin:0;
        }
        #top {
            width: 100%;
            background-color: #1e90ff;
            text-align: center;
            padding-top: 10px;
            padding-bottom: 20px;
        }
        .tit {
            color: #fff;
            font-size: 25px;
            text-shadow:black 3px 3px 3px;
        }
        .con {
            color: #fff;
            font-size: 18px;
            padding-top: 0;
            font-family: Times, serif;
            margin-top: -5px;
        }
        #boxs {
            margin: 10px;
        }
        #box {
            max-width: 512px;
            background: #00ced1;
            height: 180px;
            margin: 15px auto;
            box-shadow:0 0 5px #8fbc8f;
            opacity:0.7;
            border-radius: 5px;
            text-align: center;
            padding-top: 15px;
        }
        .file {
            background-color: #0066FF;
            height: 23px;
            color: #fff;
            width: 80%;
            padding: 12px 15px;
            border-radius: 5px;
            outline:none;
            margin-top: 40px;
        }
        .but {
            background-color: #7fffd4;
            color: #f0ffff;
            width: 60%;
            height: 40px;
            border: none;
            box-shadow:0 15px 10px -15px #00ced1;
            font-size: 16px;
            font-style: normal;
            font-weight: 700;
            border-radius: 5px;
            outline:none;
            margin-top: 10px;
        }
        .tip {
            color: #00008b;
            font-size: 16px;
            font-weight: 700;
            text-align: left;
            margin-left: 20px;
        }
        .content {
            color: #ffffff;
            font-size: 12px;
            text-align: left;
            margin-left: 20px;
        }
    </style>
</head>
<body>

<div id="top">
    <h1 class="tit">图片托管-上传</h1>
    <div class="con">便利-免费的图床接口调用服务平台</div>
</div>
<div id="boxs">
    <div id="box">
        <form action="uploads.php" method="post" enctype="multipart/form-data">
            <input type="file" class="file" name="file" id="file" /><br />
            <input type="submit" name="submit" class="but" value="上传图片" />
        </form>
    </div>
    <div id="box">
        <div class="tip">提示:<br /></div>
        <div class="content">只能上传PNG|JPG|BMP|GIF格式图片</div>
        <div class="content">后台上传文件大小没有任何限制</div>
        <div class="content">上传完成后复制链接即可下载</div>
    </div>
</div>
</body>
</html>