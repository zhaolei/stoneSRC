<?php
$f = file_get_contents('1');

$r = preg_match_all("/var (.*?)=(.*?)\n/", $f, $s);

$param = array();
$arrK = array('sign', 'callback');
foreach($s[1] as $k=>$w) {
    $w = trim($w);
    if(in_array($w,$arrK)) {
        //echo $w."\r\n";
        $sk = trim($s[2][$k]);
        $sk = substr($sk, 20);
        $cc = strlen($sk);
        $sk = substr($sk, 0 , $cc - 3);
        $param[$w] = $sk;
    }
}
print_r($param);

#print_r($s);
