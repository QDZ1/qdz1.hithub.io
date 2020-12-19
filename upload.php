    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <title>图片托管-上传</title>
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
            .url {
                font-size: 12px;
                letter-spacing: -1px;
                font-weight: normal;
                margin-top: 2px;
            }
        </style>

    <?php
    require './config.php';
    if(!isset($config)){exit('<div id="box"><div class="false">未检测到配置文件，无法运行程序。</div></div>');}
    if($config['Install'] == false){exit('检测到程序未安装请<a href="./Install/install.php">点我安装</a>');}
    if($config['Test'] == false){exit('<div id="box"><div class="false">后台已经关闭此功能!</div></div>');}
    if(!isset($_FILES["file"])){exit('<div id="box"><div class="false">走捷径是不对的哦!</div></div>');}
    require './Mysql/link.php';
    require './Mysql/op.php';

    switch($_FILES["file"]["error"]){
        case 1:
            exit('<div id="box"><div class="false">上传的图片的大小超过了ini.php内选项限制的值。</div></div>');
        case 2:
            exit('<div id="box"><div class="false">上传图片的大小超过了MAX_FILE_SIZE选项指定的值。</div></div>');
        case 3:
            exit('<div id="box"><div class="false">图片只有部分被上传，请重试。</div></div>');
        case 4:
            exit('<div id="box"><div class="false">没有图片被上传。</div></div>');
        case 6:
            exit('<div id="box"><div class="false">找不到上传目录。</div></div>');
        case 7:
            exit('<div id="box"><div class="false">上传图片失败，请重试。</div></div>');
    }

    $form=pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION); //获取文件格式
    $forms= [
        'png',
        'jpg',
        'bmp',
        'gif',
        'PNG',
        'JPG',
        'BMP',
        'GIF'
    ]; //允许的后缀
    if(!in_array($form,$forms)){exit('<div id="box"><div class="false">该文件格式不允许上传</div></div>');}
    if($_FILES['file']['size'] > $config['MaxSize'] * 1024 * 1024){exit('<div id="box"><div class="false">图片超出了最大允许范围'.$config['MaxSize'].'M</div></div>');}

    $filename=substr(md5(mt_rand()),10).'.'.$form;
    while(file_exists('./File/'.$filename)){
        $filename=substr(md5(mt_rand()),10).'.'.$form;
    }
    $upload=move_uploaded_file($_FILES['file']['tmp_name'] , './File/'.$filename);
    if($upload && file_exists('./File/'.$filename) && put($link,$filename,date('Y-m-d H:s'))){
        $id= mysqli_insert_id($link);
        mysqli_close($link);
        exit('<div class="true"><div>上传成功</div>'.'<div class="url">链接:http://'.$_SERVER['SERVER_NAME'].'/img.php?id='. $id .'<div>'.'</div>');
    }else{
        mysqli_close($link);
        if(file_exists('./File/'.$filename)){
            unlink('./File/'.$filename);
        }
        exit('<div class="false">上传失败，请重试</div>');
    }