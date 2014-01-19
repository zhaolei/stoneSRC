<?php
include 'function.php';

//$strGetUrl = 'http://order.xiaomi.com/site/login?ac=1';
//$data = array('a'=>'fffffffff', 'f'=>'ssssssssssss');
$data = array();
$data['user'] = 'zhaolei254@vip.qq.com';
$data['pwd'] = 'ab0000ab';
$data['auto'] = 'true';
$data['sid'] = 'eshop';
$data['_json'] = 'true';

//$url = 'http://127.0.0.1/';
$url = 'https://www.account.xiaomi.com/pass/serviceLoginAuth2';
$arr = getLoginParameter();
$ccookies = implode('; ', $arr[0]['Set-Cookie']);
$data['_sign'] = $arr[1]['sign'];
$data['callback'] = $arr[1]['callback'];


$arrP = array();
//$arrP['User-Agent'] = 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.63 Safari/537.31';
$arrP['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';

//$ccookies = 'xm_www_sid=6dlveu3jhfcup2dmfcbingk5c4; path=/;deviceId=wb_94e5dd80-9d6a-4b04-b9fd-5756c9b1c6d2; domain=account.xiaomi.com; path=/; expires=Fri, 06-Feb-2082 16;uLocale=zh_CN; path=/; expires=Mon, 03-Feb-2014 12;JSESSIONID=aaa9hvA_h30SR7coaKQou; path=/';
$arrP['Cookie'] = 'mstz=||1660367267.4; mstuid=1389963474276_1621; xmuuid=XMGUEST-FAE29A70-7F76-11E3-8486-4946DDE9C341; __utma=219621008.2023239670.1389963475.1389963475.1389963475.1; __utmb=219621008.4.10.1389963475; __utmc=219621008; __utmz=219621008.1389963475.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); xm_user_www_num=0;'.$ccookies;




$strHd = '';
foreach($arrP as $k=>$w) {
    $strHd .="{$k}: {$w}\r\n";
}

$rarr = httpPost($url, $data, $strHd);


print_r($rarr);

