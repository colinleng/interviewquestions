<?php
function dd($d1,$d2)
{
    $t1 = strtotime($d1);
    $t2 = strtotime($d2);
    $t = 0 ;
    $max = max($t1,$t2);
    $min = min($t1,$t2);

    $t = $max - $min;

    $d = floor($t/24*60*60);
    $m = floor(($t-$d*24*60*60)/3600);
    $s = $t - $d*24*60*60 - $m*3600;

    echo $d.'-'.$m.'-'.$s;
}

dt('2017-01-01','2017-04-04');
?>