<?php
/**
 *
 */
$number = 1111101110110111;
$dw = ['','十','百','千'];
$bdw = ['','万','亿','兆'];
$chars = [0=>"零",1=>"壹",2=>"贰",3=>"叁",4=>"肆",5=>"伍",6=>"陆",7=>"柒",8=>"捌",9=>"玖"];
$qnumber = str_split(strrev($number),4);
$string = [];
foreach ($qnumber as $k => $v) {
    $item = str_split($v,1);
    $status = true;
    $items = [];
    foreach ($item as $key => $value) {
        $char = '';
        if($value > 0){
            $char = $chars[$value].$dw[$key];
            if($status){
                $char = $char . $bdw[$k];
                $status = false;
            }
            $items[$key] = $char;
        }else{
            if(($key == 2 || $key == 1) && $item[0] > 0){
                $items[$key] = $chars[0];
            }
        }
    }
    krsort($items);
    if($k > 0 && $qnumber[$k-1][3] == 0 && $qnumber[$k-1] > 0){
        array_push($items, $chars[0]);
    }
    $string[] = implode('', $items);
}
krsort($string);
echo $number.'<br/>';
echo implode('', $string);
?>