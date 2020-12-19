<?php
require './config.php';
if(!isset($config)){exit('未检测到配置文件，无法运行程序');}
if($config['Install'] == false){exit('检测到程序未安装请<a href="./Install/install.php">点我安装</a>');}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <title>图片托管-上传</title>

    <style>
        body {
            background-image: url("Image/BackGround.jpg");
            background-repeat: repeat;
            background-size: 100%;
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
    <div id="box">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" class="file" name="file" id="file" /><br />
            <input type="submit" name="submit" class="but" value="上传图片" />
        </form>
    </div>
    <div id="box">
        <div class="tip">提示:<br /></div>
        <div class="content">只能上传PNG|JPG|BMP|GIF格式图片</div>
        <div class="content">只能上传小于10M大小的图片</div>
        <div class="content">上传完成后复制链接即可下载</div>
    </div>
</body>
</html>