<?
$bypassgeturl=array("start");
$geturl="?";
$a = array($_REQUEST['start']);//print_r($a);die;

foreach($a as $key=>$val)
{
 if(in_array($key,$bypassgeturl)) continue;
 else $geturl.="$key=$val&";
}
$prev=$start-$perpage;
if($prev<0)
$prev=0;

?>
<table  class='paging'>
<tr>
<td align='left'>
<? if($start==0){?>
<span class='thispage'>&laquo;</span>
<? }else{?>
<a class="nt" href="<?=$_SERVER[PHP_SELF].$geturl."start=0".$search_url?>">&nbsp;&laquo;</a>
<?}?>
<? if($start==0){?>
<span class='thispage'>Prev</span>
<? }else{ ?>
<a href="<?=$_SERVER[PHP_SELF].$geturl."start=$prev".$search_url?>">&nbsp;Prev </a>
<?}?>

</td>
<td>
<?
if($start!=''){
$s=$start;
$k=$s/$perpage; 
if($k==0)
$k=1;
}
else
$k=1;
$l=$k+10;
  for($disp=1,$loop=0;$loop<=$totrec-1;$loop+=$perpage,$disp++)
  {
  if($k<$l&&$k==$disp){
    if($start==$loop)
    echo "<span class='thispage'>$disp</span>";
    else
	echo "<a href='$_SERVER[PHP_SELF]".$geturl."start=$loop".$search_url."'>&nbsp;$disp </a>";
	$k++;
	$pp=$loop;
	}
  }
 // $next1=$pp+$perpage;
 $next=$start+$perpage;
  if($next>$totrec-1) $next=$loop-$perpage;
  
?>
</td>
<td  align='right' nowrap>
<?php if($next>$start){?>
<a href="<?=$_SERVER[PHP_SELF].$geturl."start=".$next.$search_url?>">&nbsp;Next </a>
<?php }else{?>
<span class='thispages'>Next</span>
<?php }?>
<?php if($loop-$perpage>$start){?>
<a class="nt" href="<?=$_SERVER[PHP_SELF].$geturl."start=".($loop-$perpage).$search_url?>">&nbsp;&raquo; </a></td>
<?php }else{?>
<span class='thispage'>&raquo;</span></td>
<?php }?>
</tr>
</table>