<?php

function httpPost($url, $data, $hder)
{
    $data_url = http_build_query ($data);
    $data_len = strlen($data_url);

    $header = array ('http'=>array('method'=>'POST',
                                   'header'=>"{$hder}Connection: close\r\nContent-Length: $data_len\r\n",
                                   'content'=>$data_url)
                    );
    $stream = stream_context_create($header);

    $content = file_get_contents($url, false, $stream);
    $headers = $http_response_header;

    return array($content, $headers);
}

function buildHeader($arrHeader) {
    $strHeader = '';
    foreach($arrHeader as $arrRow) {
        $strHeader .= $arrRow[0].': '.$arrRow[1]."\r\n";
    }

    return $strHeader;
}

function getLoginParameter() {
    $strGetUrl = 'http://order.xiaomi.com/site/login?ac=1';
    $tmp = file_get_contents($strGetUrl);
    
    if(empty($http_response_header)) {
        return false; 
    }
    
    $arrParamer = array();
    foreach($http_response_header as $strValue) {
        $arrE = explode(':', $strValue);
        if(!empty($arrE[1])) {
            $arrParamer[$arrE[0]][] = trim($arrE[1]); 
        }
    }

    //$f = file_get_contents('1');

    $r = preg_match_all("/var (.*?)=(.*?)\n/", $tmp, $s);

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

    return array($arrParamer, $param);
}

