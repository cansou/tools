<?php
/**
 * Created by PhpStorm.
 * User: guoyexuan
 * Date: 2019/5/29
 * Time: 下午2:46
 */



include_once "./pb/BaseRequest.php";
include_once "./pb/GetLoginQRCodeRequest.php";
include_once "./pb/GetLoginQRCodeRequest.php";
include_once "../bin/requests.php";

$baseRequest = array(
    'baseRequst' => array(
        'sessionKey'   => 'k2J7XS4cIALnU6Ru',
        'uin'           => 0,
        'devicelId'     => '\301\004\313P\234\303\371 I\261\241\234<O\242r',
        'clientVersion' => '369558056',
        'osType'        => 'iPad iPhone OS9.3.3',
        'scene'         => 0
    ),
    'aes' => array(
        'len'   =>16,
        'key'   =>"k2J7XS4cIALnU6Ru"
    ),
    'opcode'         =>0,
    'extDevLoginType'=>0
);





$start = new GetLoginQRCodeRequest();

$baseRequest = new BaseRequest();
$baseRequest->setSessionKey('hQvyCVmcLt98WBUf');
$baseRequest->setUin(0);
$baseRequest->setDevicelId('c_\027\016].7_\237\324\010\306Ke,\013');
$baseRequest->setClientVersion('369558056');
$baseRequest->setOsType('iPad iPhone OS9.3.3');
$baseRequest->setScene(0);

$start->setOpcode(0);
$start->setExtDevLoginType(0);


//print_r($baseRequest->getSessionKey());


#$start->setBaseRequest($baseRequest);

$start->setBaseRequest($baseRequest);
print_r($start->dump());


/*
$url = 'hkshort.weixin.qq.com/cgi-bin/micromsg-bin/getloginqrcode';
$send_data = $start->SerializeToString();
$res = requests::post($url,$send_data,null,false,false,null);

echo "Buffer 长度:".strlen($res).PHP_EOL;
print_r($res);
*/

MakeHead(1,2,3,true,false);
function MakeHead($cgi,$nLenProtobuf,$encodetypr = 7,$iscookie = true,$isuin=false)
{
    $version = 369658059;

    #$header = 0;
    #$header .= bin2hex('\xbf');
    #$header .= bin2hex('\x02');

    #echo $header.PHP_EOL;return;

    $header  = '\xbf';

    $header .= '\x02';

    var_dump(dechex(127));

    print_r(bin2hexToAscii((0x7 << 4) + 0xf));
    return ;
    if($iscookie)
    {
        $header .= bin2hexToAscii((0x7 << 4) + 0xf);
    }
    else
    {
        $header .= dechex((0x7 << 4));
    }

    echo $header.PHP_EOL;
}

function DecToHex($field)
{
    $field=bin2hex($field);
    $field=chunk_split($field,2,"\\x");
    $field= "\\x" . substr($field,0,-2);
    return $field;
}

function strtohex($string) {
    if (!empty($string)) {
        $output = null;
        $count = strlen($string);
        for ($i = 0; $i < $count; $i++) {
            $output .= dechex(ord($string[$i]));
        }
        return $output;
    }
}

function bin2hexToAscii($string)
{
    /*
    $tmp = str_split($string);

    foreach($tmp as $key=>$val)
    {
        $tmp[$key] = "\\x".bin2hex($val);
    }
    return $tmp;
    */

    if(!empty($string))
    {
        $res = "\\x".dechex($string);
    }

    return $res;
}
