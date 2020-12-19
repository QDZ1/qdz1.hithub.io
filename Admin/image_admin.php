<?php
require '../config.php';
if(!isset($config)){exit('未检测到配置文件，无法运行程序');}
if($config['Install'] == false){exit('检测到程序未安装请<a href="../Install/install.php">点我安装</a>');}
require './login_test.php';
require '../Mysql/link.php';
require '../Mysql/op.php';
$id=isset($_GET['id']) && is_numeric($_GET['id'])?$_GET['id']:null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>图片托管-管理图片</title>
    <script>
        function del(id){
            window.location.replace('./delete.php?id=' + id['id']);
        }
    </script>
    <style>
        #box {
            margin: 0 auto;
            text-align: center;
        }
        img {
            width: 210px;
            border: #557576 solid 4px;
            border-radius: 10px;
            margin-top: 20px;
        }
        .button {
            width: 220px;
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
<body>
    <div id="box">
        <?php if(img($link,$id)['name'] == null){echo '<div class="false">图片不存在</div>'; mysqli_close($link); exit;} ?>
        <img src="<?php  echo '../File/'.img($link,$id)['name']; mysqli_close($link); ?>" alt="图片加载失败" />
        <div><input type="button" class="button" value="删除图片" id="<?php echo $id; ?>" onclick="del(this)" /></div>
    </div>
</body>
</html>