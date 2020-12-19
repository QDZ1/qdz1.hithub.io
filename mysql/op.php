<?php
if(!isset($config)){exit;}

function put($link,$name,$time){
    //insert into 插入数据
    $sql="insert into Image(name,time) values ('$name','$time')";
    return $link -> query($sql);
}

function look($link){
    //select 查询数据
    $sql="select * from Image order by id desc";
    return $link -> query($sql);
}

function img($link,$id){
    //select 获取图片
    $sql="select * from Image where id='$id'";
    return mysqli_fetch_assoc($link -> query($sql));
}

function del($link,$id){
    //delete 删除图片
    $sql="delete from Image where id='$id'";
    $name=mysqli_fetch_assoc($link -> query("select * from Image where id='$id'"));
    return $link -> query($sql) && unlink('../File/'.$name["name"]);
}
