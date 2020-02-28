<!DOCTYPE html>
<html>
<head>
    <title>生成json文件</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://apps.bdimg.com/libs/jquerymobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <script src="https://apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>

</head>
<body>

<?php

$dir =  dirname(__FILE__);
//扫描文件夹
$file = scandir($dir);
//显示
$picture_type= array("png", "jepg", "jpg");
$content=array(

);
$web_url="http://localhost";
$base_url=$web_url."/appfile/";
$content[]=array(
        "content_id"=>1,
        "title"=>" ",
        "img_url"=>$base_url."rock.jpg",
         "article_content"=>" "
);
$content[]=array(
    "content_id"=>2,
    "title"=>" ",
    "img_url"=>$base_url."rock.jpg",
    "article_content"=>" "
);





//foreach ($file as $v) {
//    $file_extension=pathinfo($v,PATHINFO_EXTENSION);
//    if(in_array($file_extension, $picture_type)){
//       "<a href=".$v." target='_blank' >".$v."</a><br><br>";
//        $content[]=array("title"=>" ","img_url"=>$base_url.$v,"article_content"=>" ");
//
//    }
//    // code...
//}

$json_data=json_encode($content);

//本地localhost
if(file_exists('json.js'))
{
    //"当前目录中，文件存在"，追加
    $myfile = fopen("json.js", "w") or die("Unable to open file!");
    fwrite($myfile, $json_data);
    //记得关闭流
    fclose($myfile);
    echo "写入成功";
}
else
{
    //"当前目录中，文件不存在",新写入
    $myfile = fopen("json.js", "w") or die("Unable to open file!");
    fwrite($myfile, $json_data);
    //记得关闭流
    fclose($myfile);
    echo "写入成功";
}



//网络数据github
if(file_exists('api_1.js'))
{
    //"当前目录中，文件存在"，追加
    $myfile = fopen("api_1.js", "w") or die("Unable to open file!");
    $json_data=str_replace("http","https",$json_data);
    $json_data=str_replace("localhost","picassogithub.github.io",$json_data);
    fwrite($myfile, $json_data);
    //记得关闭流
    fclose($myfile);

}
else
{
    //"当前目录中，文件不存在",新写入
    $myfile = fopen("api_1.js", "w") or die("Unable to open file!");
    $json_data=str_replace("http","https",$json_data);
    $json_data=str_replace("localhost","picassogithub.github.io",$json_data);
    fwrite($myfile, $json_data);
    //记得关闭流
    fclose($myfile);

}


?>
</body>
</html>