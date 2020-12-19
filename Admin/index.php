<?php
require '../config.php';
if(!isset($config)){exit('未检测到配置文件，无法运行程序');}
if($config['Install'] == false){exit('检测到程序未安装请<a href="../Install/install.php">点我安装</a>');}
require './login_test.php';
require '../Mysql/link.php';
require '../Mysql/op.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>图片托管-管理中心</title>
    <script>
        function image(but) {
            let id = but['id'];
            let imgurl= './image_admin.php?id=' + id;
            window.location.href=imgurl;
        }
    </script>
    <style>
        * {
            padding:0;
            margin:0;
        }
        body {
            background-color: #F8F8F8;
        }
        #top {
            width: 100%;
            background-color: #1e90ff;
            text-align: center;
            padding-top: 50px;
            padding-bottom: 50px;
        }
        .tit {
            color: #fff;
            font-size: 25px;
            text-shadow:black 3px 3px 3px;
        }
        .con {
            color: #fff;
            font-size: 18px;
            padding-top: 10px;
            font-family: Times,serif;
        }
        #imgbox {
            max-width: 93%;
            text-align: center;
            margin: 0 auto;
        }
        .imgcon {
            margin: 8px 0 8px 0;
            width: 100%;
            background-color: #fff;
            box-shadow:0 0 2px #B0B0B0;
            text-align: left;
            border-radius: 3px;
            padding: 10px 0 10px 0;
        }
        .title {
            margin: 0 10px 0 10px;
            font-weight: bold;
            font-size: 14px;
        }
        .time {
            font-size: 11px;
            margin: 0 10px 0 10px;
            color: #C0C0C0;
        }
        .url {
            font-size: 11px;
            margin: 5px 10px 0 10px;
            color: #C0C0C0;
        }
        .bubox {
            padding: 0 10px 0 10px;
        }
        .button {
            width: 100%;
            height: 32px;
            background: #2a78c9;
            color: #fff;
            border: none;
            outline:none;
            cursor: pointer;
            margin-top: 5px;
            border-radius: 3px;
        }
        .button:hover {
            background-color: #2e55dc;
        }
        .up {
            width: 220px;
            height: 38px;
            background: #4484c6;
            color: #fff;
            border: none;
            outline:none;
            cursor: pointer;
            margin-top: 10px;
            border-radius: 3px;
        }
        .up:hover {
            background-color: #415fc1;
        }
    </style>
</head>
<body>

<div id="top">
    <h1 class="tit">图片托管-管理</h1>
    <div class="con">便利-免费的图床接口调用服务平台</div>
    <button class="up" onclick="window.location.href='./upload.php'">上传图片</button>
</div>
    <?php
    foreach(look($link) as $list){
        echo '
    <div id="imgbox">
        <div class="imgcon">
            <p class="title">图片ID:'.$list['id'].'</p>
            <p class="url">图片链接:http://'.$_SERVER['SERVER_NAME'].'/img.php?id='.$list['id'].'</p>
            <p class="time">上传时间:'.$list['time'].'</p>
            <div class="bubox"><input type="button" class="button" value="管理图片" id="'.$list['id'].'" onclick="image(this)" /></div>
        </div>
    </div>
    ';
    }
    mysqli_free_result($list);
    mysqli_close($link);
    ?>

</body>
</html>