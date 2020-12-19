<?php
require '../config.php';
if(!isset($config)){exit('未检测到配置文件，无法运行程序');}
if($config['Install'] == false){exit('检测到程序未安装请<a href="../Install/install.php">点我安装</a>');}
$type='login'; require 'login_test.php';
if(isset($_POST['admin']) && isset($_POST['password'])){
    if($config['Admin'] == $_POST['admin'] && $config['Pwd'] == $_POST['password']){
        setcookie('Admin',$_POST['admin'],time()+86400*7);
        setcookie('Pwd',$_POST['password'],time()+86400*7);
        echo '<script>alert("登录成功"); window.location.replace("index.php"); </script>';
    }else{
        echo '<script>alert("登录失败，账号或密码错误"); window.location.replace("login.php"); </script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>图片托管-登录</title>
    <style>
        html{
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        body{
            width: 100%;
            height: 100%;
            font-family: 'Open Sans',sans-serif;
            margin: 0;
            background-color: #005f91;
        }
        #login{
            position: absolute;
            top: 50%;
            left:50%;
            margin: -150px 0 0 -150px;
            width: 300px;
            height: 300px;
        }
        #login h1{
            color: #fff;
            text-shadow:0 0 5px;
            letter-spacing: 1px;
            text-align: center;
        }
        h1{
            font-size: 2em;
            margin: 0.67em 0;
        }
        input{
            width: 278px;
            height: 18px;
            margin-bottom: 10px;
            outline: none;
            padding: 10px;
            font-size: 13px;
            color: #fff;
            text-shadow:1px 1px 1px;
            border-top: 1px solid #312E3D;
            border-left: 1px solid #312E3D;
            border-right: 1px solid #312E3D;
            border-bottom: 1px solid #56536A;
            border-radius: 4px;
            background-color: #2D2D3F;
        }
        .but{
            width: 300px;
            min-height: 20px;
            display: block;
            background-color: #4a77d4;
            border: 1px solid #3762bc;
            color: #fff;
            padding: 9px 14px;
            font-size: 15px;
            line-height: normal;
            border-radius: 5px;
            margin: 0;
            outline:none;
        }
    </style>
</head>
<body>
<div id="login">
    <h1>Login</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" placeholder="后台账号" name="admin" id="admin" />
        <input type="password" placeholder="后台密码" name="password" id="password" />
        <button class="but" type="submit">登录</button>
    </form>
</div>
</body>
</html>