<?php
echo '
                              <div class="pgn">
   ';
$next= $page + 1;
$prev= $page - 1;
$name221 = str_replace('*','',$s['name']);
$name221 = str_replace(' ','-',$name221);
$uuurlprev = "http://m.funwap.org/Category/$id";
$uunewurlprev = $uuurlprev . "/$name221";
if ($prev>"0"){echo '<a class="page" href="'.$uunewurlprev.'/'.$prev.'.html"><img src="http://m.funwap.org/ext/prevs.png"></a>';}
$asd= $page - 1;
$asd2= $page + 4; if ($pages2>1){
if($asd<$all && $asd>0 && $page>4 ) 
if ($page>"1"){echo '';}
else{echo '<a class="page" href="'.$uunewurlprev.'/1.html">1</a> ';}
for($i=$asd; $i<$asd2;$i++){if($i<$all && $i>0){if ($i > $pages2 )  break;
if ($page==$i) echo '                           <!-- Wapking :: Pagination --><span class="page"><b>'.$i.'</b></span> ';
else echo '
<a class="page" href="'.$uunewurlprev.'/'.$i.'.html">'.$i.'</a> ';}}
if ($i <= $pages2){if($asd2<$all)if ($page<$pages2){echo '';}
else{echo '<a class="page" href="'.$uunewurlprev.'/'.$pages2.'.html">'.$pages2.'</a>';}}
$namenext = str_replace('*','',$s['name']);
$namenext = str_replace(' ','-',$namenext);
$uuurlnext = "http://m.funwap.org/Category/$id";
$uunewurlnext = $uuurlnext . "/$namenext";
if ($page<$pages2 && $page>0){
echo '<a class="page" href="'.$uunewurlnext.'/'.$next.'.html"><img src="http://m.funwap.org/ext/nexts.png"></a>';}
echo '<br>
Page('.$page.'/'.$pages2.')

';
echo '
<!-- Wapking :: Jump To Page -->
<form action="" method="post">
Jump to Page 
<input class="enter" name="page" type="text" maxlength="4" size="2" value="">
&nbsp;<input class="buttom" type="submit" value="Go&raquo;">
</form>
</div>';}
?>