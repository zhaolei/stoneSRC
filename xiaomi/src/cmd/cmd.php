<?php
include 'function.php';

//$strGetUrl = 'http://order.xiaomi.com/site/login?ac=1';
$data = array('a'=>'fffffffff', 'f'=>'ssssssssssss');
$url = 'http://127.0.0.1/';
$arrP = array();
$arrP['User-Agent'] = 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.63 Safari/537.31';
$arrP['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';

$arr = getLoginParameter();

print_r($arr);

