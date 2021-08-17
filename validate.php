<?php 

$alert               = "";
$inputFileName       = $_POST['inputFileName'];
$allowExtensionEXT   = $_POST['ext'];
$allowExtensionMIME  = $_POST['mime'];
$alertExtension      = $_POST['alertExtension'];
$alertMaxsize        = $_POST['alertMaxsize'];
$maxSize             = $_POST['maxSize'];
$finfo               = new \finfo(FILEINFO_MIME_TYPE);
$detectSize          = $_FILES[$inputFileName]['size'] / 1048576; // chuyển đổi byte thành mb 
$convertSize         = round($_FILES[$inputFileName]['size']/1024); // chuyền thành KB
$alertSize           = "";
if( $convertSize > 1024 )
{
    $alertSize       = round($detectSize) ."MB" ;
}else
{
    $alertSize       = round($convertSize) ."KB" ;
}
//  $allowExtension là array key, value
$arrAllowExt         = [];
foreach ($allowExtensionEXT as $key => $value) {
    $arrAllowExt =  array_merge($arrAllowExt,[$value => $allowExtensionMIME[$key]]); 
}
if (false === array_search($finfo->file($_FILES[$inputFileName]['tmp_name']),$arrAllowExt, true)) {
    $alert           = $alertExtension;
    echo json_encode(["type" => "error","alert_mess"=> $alert, "size" =>  $detectSize, "ext"=> $finfo->file($_FILES[$inputFileName]['tmp_name'])]);
    die;
}
if ($detectSize > $maxSize) { //10 MB (size is also in bytes)
    $alert           = $alertMaxsize;
    echo json_encode(["type" => "error","alert_mess"=> $alert, "size" => $detectSize , "ext"=> $finfo->file($_FILES[$inputFileName]['tmp_name'])]);
    die;
}
echo json_encode(["type" => "success","alert_mess"=> $alert, "size" => $alertSize , "ext"=> $finfo->file($_FILES[$inputFileName]['tmp_name'])]);