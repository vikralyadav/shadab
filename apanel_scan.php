<?php

@set_time_limit(99999);
ignore_user_abort(1);

list($msec,$sec)=explode(chr(32),microtime());
$HeadTime=$sec+$msec;
include 'moduls/ini.php';
session_name('SID') ;
session_start() ;
include 'moduls/fun.php';
include 'moduls/connect.php';
//
$error = false;

if($_SESSION['autorise'] != $setup['password']){
$error = true;
}

if($_SESSION['ipu'] != clean($ip)){
$error = true;
}

if($error){
die($setup['hackmess']);
}
//
$currtime = time();
$addfolder = $addfiles = $addfilesbad = 0;

$reses = mysql_query('SELECT `id`,`path` FROM `files`;');
while($arr = mysql_fetch_row($reses)){
$array_path[$arr[0]] = $arr[1];
}

function scaner($path)
{
static $f_arr;

chmod($path,0777);

$arr = glob($path.'/*');

foreach($arr as $vv){

if(is_dir($vv)){
$f_arr[] = $vv.'/';
scaner($vv);
}
else{
if(basename($vv)=='folder.png'){
continue;
}
else{
$f_arr[] = $vv;
}
}
}

return $f_arr;
}

$file_array = scaner($setup['path']);

$upltime = time();
foreach($file_array as $value){
if(!in_array($value,$array_path))
{
//$upltime = filectime($value);
$pathinfo = pathinfo($value);
$name = str_replace('.'.$pathinfo['extension'],'',basename($value));
$infolder = dirname($value).'/';
$size = filesize($value);



if(is_dir($value) AND preg_match('|([а-яА-Я]+)|',$name)==False){
if(strpos($name , '!') !== false){
$name = trans($name);
}
else{
$name = trans2($name);
}
mysql_query("INSERT INTO `files` (`path`, `name`, `infolder`, `timeupload`, `loads`, `yes` ) VALUES ('$value', '*".$name."', '$infolder', '9999999999', '9999999999', '9999');");
$addfolder++;
}
elseif(preg_match('|([а-яА-Я]+)|',$name)==False){
if(strpos($name , '!') !== false){
$name = trans($name);
}
else{
$name = trans2($name);
}
mysql_query("INSERT INTO `files` (`path`, `name`, `infolder`, `size` , `timeupload`) VALUES ('$value', '$name', '$infolder' , '$size' , '$upltime');");
$addfiles++;
}
else $addfilesbad++;
}
}


include 'moduls/header.php';
echo '<div class="menu">Database successfully updated!</div><div class="row">Added folders: '.$addfolder.' <br>';
echo'Upload file: '.$addfiles.'<br>'; 
if ($addfilesbad>0) echo 'Not Added:'.$addfilesbad.'<br>';
list($msec,$sec)=explode(chr(32),microtime());
print '</div><div class="a"><a href="apanel.php">Admin</a></div>';
?>