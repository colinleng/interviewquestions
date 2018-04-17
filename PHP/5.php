<?php


function quickSort($arr)
{
    $len = count($arr);
    if($len < 1)
    {
        return $arr;
    }

    $tmp = $arr[0];
    $min = $max = array();

    for($i = 1; $i < $len ; $i ++){
        if($tmp > $arr[$i]){
            $max[] = $arr[$i];
        }else{
            $min[] = $arr[$i];
        }
    }

    $max = quickSort($max);
    $min = quickSort($min);
    array_push($min,$tmp);
    return array_merge($min,$max);
}


function insertSort($arr)
{
    for($i = 1 ; $i < count($arr) ; $i ++){
        $tmp = $arr[$i];
        for($j = $i -1 ; $i >= 0 ; $j --){
            if($tmp < $arr[$j]){
                $arr[$i] = $arr[$j + 1];
                $arr[$j] = $tmp;
            }
        }
    }

    return $arr;

}

function selectSort($arr)
{
    $len = count($arr);
    for($i = 0; $i < count($arr) ; $i ++){
        $min = 0 ;
        for($j = $i + 1; $j  < $len ; $j ++){
            if($arr[$min] > $arr[$j]){
                $min = $j;
            }

            if($min != $i){
                $tmp = $arr[$min];
                $arr[$min] = $arr[$i];
                $arr[$i] = $tmp;
            }
        }
    }

    return $arr;
}

function make_seed()
{
    list($usec, $sec) = explode(' ', microtime());
    return (float) $sec + ((float) $usec * 100000);
}
mt_srand(make_seed());

for($i = 0 ; $i < 100000 ; $i ++){
    $arr[] = mt_rand();
}

$list = quickSort($arr);
print_r($list);
?>