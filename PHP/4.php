<?php
//手机号
$tel = "15901510000";
$t = preg_match("/1[358]{1}[0-9]{9}/", $tel);
var_dump($t);

//邮箱
$mail = '1@1.1';
$t = preg_match("/[a-zA-z0-9\-_\.]+@[a-zA-z0-9]+\.[a-zA-z0-9]+/", $mail);
var_dump($t);

//后缀名
$url = "http://img.cmlove.cc/a/php/t.jpg";
$hz1 = substr($url , strrpos($url,'.'));
var_dump($hz1);
$tmp = array_pop(@explode('/', $url));
$hz2 = substr($tmp, strpos($tmp,'.'));
var_dump($hz2);
preg_match_all("/(\.(\w+)\?)|(\.(\w+)$)/", $url, $matches);
$hz3 = $matches[0][0];
var_dump($hz3);exit;
// $hz2 =
// preg_match_all("", subject, matches)


$tel = '15901510000';
$t = preg_match('/1[3578]{1}[0-9]{9}/',$tel);
var_dump($t);

$mail = 'colin@cmlove.cc';
$t = preg_match('/[a-zA-Z0-9_\-\.]+@[0-9a-zA-Z]+\.[a-zA-Z0-9]+/',$mail);
var_dump($t);
?>