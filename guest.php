<?php 
list($msec,$sec)=explode(chr(32),microtime());
$HeadTime=$sec+$msec;
include '../moduls/ini.php';
session_name ('SID') ;
session_start() ;
include '../moduls/fun.php';
include '../moduls/connect.php';
include '../moduls/header.php';
//------------------------------------------------------------------------------------------
$error = 0;
if(empty($_SESSION['autorise'])) $error = 1;
if($_SESSION['autorise']!= $setup['password']) $error = 1;
if(empty($_SESSION['ipu'])) $error = 1;
if($_SESSION['ipu']!=clean($ip)) $error = 1;
if($error==1) die($setup['hackmess']);
//------------------------------------------------------------------------------------------
//



require_once "config.php";
echo '<link rel = "StyleSheet" type = "text / css" href = "../ style.css">';
$ rand = rand (111,999);
echo '
<div class = "menu"> <strong> Order table </strong> </div>
<div class = "a">
What do you want to see in the download center? <br> Write to the admin! <br>
</form> </div> <div class = "a"> ';
echo '<div class = "i_bar_t"> <a href="add.php"> Write </a> </div>';
echo '<div class = "i_bar_t"> <a href="alldel.php"> Clear order table! </a> </div> <div class = "i_bar_t"> <a href="alldelbans.php"> Unban everyone! </a> </div> </div> ';
if(empty($_GET['start'])) { $start=0; } 
 else { $start=$_GET['start']; } 
if(!ctype_digit($start)) { $start=0; } 
$q="SELECT count(*) FROM guest"; 
$total=mysql_query($q); 
$num=5; $num=(int)$num;  
$q="SELECT * FROM guest ORDER BY id DESC LIMIT $start,$num"; 
$soob=mysql_query($q); $count=mysql_result($total,0); 
if($count<1) 
 { echo '<font color="red">No messages!<br> </font><br>'; } 
 else  echo '</div>';
while($v=mysql_fetch_array($soob)) { $id=trim($v['id']); 
$id=(int)$id; 
$name=trim($v['name']); 
$url=trim($v['url']); 
$mail=trim($v['mail']); 
$msg=trim($v['msg']); 
$ua=trim($v['ua']); 
$ip=trim($v['ip']); 
$dt=trim($v['dt']); 
$ otvet = trim ($ v ['otvet']);
      echo '<div class = "title_bord"> <div class = "t_block">'. $ name. ' | '. $ dt.' ';
      if ($ mail! = "") {echo "<br> e-mail: $ mail <br>"; }
      echo '</div> <div class = "a">'. $ msg. '<br> <font color = "696969">'. $ ua. ','. $ ip. '</font>';
if ($ otvet! = "no") {echo "</div> <div class = \" a \ "> <font color = \" red \ "> ADMIN'S ANSWER: $ otvet </font>"; }
  
echo "</div> <div class = \" a \ "> <a href=\"delpost.php?id=$id&amp;start=$start&amp;\"> del </a> <a href = \" edit.php? id = $ id & amp; start = $ start & amp; \ "> edit </a> <a href=\"edit.php?id=$id&amp;start=$start&amp;\"> response </a> <a href=\"ban.php?id=$id&amp;start=$start&amp;\"> ban </a> <a href = \ "unban.php? id = $ id & amp; start = $ start & amp; \" > unbanned </a> <br> ";
$ ban = mysql_query ("SELECT` id` FROM `bans`;");
while ($ bans = mysql_fetch_array ($ ban)) {$ idban = $ bans [0];
if ($ id == $ idban) {echo '<font color = "red"> The user is in the ban! </font> <br>'; }}
echo '</div> </div>';
 }
echo "<div class = \" title_bord \ "> <div class = \" a \ "> <center>";
      if ($ start! = 0)
      {echo '<a href="table.php?start='.($start-$num).'"> Back </a>'; }
      else {echo 'Back'; } echo '| ';
      if ($ count> $ start + $ num)
      {echo '<a href="table.php?start='.($start+$num).'"> Next </a> <br>'; }
      else {echo 'Next <br>'; }
      echo "</center> </div>";
print '<div class = "a"> <div class = "i_bar_t"> <a href="../apanel.php"> Admin </a> </div> </div>';
echo '<div class = "a">
<div class = "i_bar_t"> <a href="index.php"> Downloads </a> </div>
<div class = "i_bar_t"> <a href="'.$setup ['site_url'> ].'"> Home </a> </div> ';
echo '</div>';
if ($ setup ['online'] == 1) echo '<div class = "menu"> Online: <strong>'.$all_online [0 ].'</strong> </div>';
echo '<div class = "title">';
include 'moduls / foot.php';
echo '</div> </div>';
?>
