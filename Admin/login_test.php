<?php
if(!isset($config)){exit;}
if($config['Install'] == false){exit('检测到程序未安装请<a href="../Install/install.php">点我安装</a>');}
$admin=isset($_COOKIE['Admin'])?$_COOKIE['Admin']:null;
$pwd=isset($_COOKIE['Pwd'])?$_COOKIE['Pwd']:null;
$type=isset($type)?$type:null;

if($type == 'login'){
    if($admin == $config['Admin'] && $pwd == $config['Pwd']){
        echo '<script>alert("您已登录"); window.location.replace("./index.php"); </script>';
        exit;
    }
}else{
    if($admin != $config['Admin'] || $pwd != $config['Pwd']){
        echo '<script>alert("请先登录"); window.location.replace("./login.php"); </script>';
        exit;
    }
}