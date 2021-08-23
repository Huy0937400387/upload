<?php
if(!file_exists("images/"))
{
    mkdir("images/");
}
if(!file_exists("images/multiple/"))
{
    mkdir("images/multiple/");
}
if(!file_exists("images/single/"))
{
    mkdir("images/single/");
}
// upload hình 1 
if($_FILES["image1"]["name"] != "")
{
    $path_single_1 =  "images/single/" . basename($_FILES["image1"]["name"]);
    move_uploaded_file($_FILES["image1"]["tmp_name"], $path_single_1);
}
// upload hình 2 
if($_FILES["image2"]["name"] != "")
{
    $path_single_2 =  "images/single/" . basename($_FILES["image2"]["name"]);
    move_uploaded_file($_FILES["image2"]["tmp_name"], $path_single_2);
}
// upload file
if($_FILES["file"]["name"] != "")
{
    $path_single_file =  "images/single/" . basename($_FILES["file"]["name"]);
    move_uploaded_file($_FILES["file"]["tmp_name"], $path_single_file);
}
//=============== UP NHIỀU ===================
$input1_count       =  $_POST['input1_count']; // input1_count của object inputCountFiles khi khởi tạo
for($i=0; $i < $input1_count; $i++)
{   
    $fileExist  = $_FILES['image_more'.$i];
    if($fileExist["name"] != "")
    {
        $path_single_file =  "images/multiple/" . basename($fileExist["name"]);
        move_uploaded_file($fileExist["tmp_name"], $path_single_file);
    }
}
header('Location: images.php');
exit;