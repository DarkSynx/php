<?php
//
// Variable Ascii Crypt Key simple
// By Synnus - 2015
// ---
// array vak32_encode ( string $string , string $key, string 'show' or null )
// array[0] is encod string , array[1] is gen key decode
// ---
// string vak32_decode ( string $string , string $key)

function vak32_encode($ch_o,$vcp,$show=null) {
    $vco = array();
    $b = strlen($vcp);
    for($a=0; $a<$b ; $a++) {
        $vco[] = ord($vcp[$a]);
    }
   
   
    $ch_c = null;
    $vcx = array();
    $ch_vt = 0;
    foreach($vco as $k => $v) {
        $rd = rand(0,$v);
        $vcx[$k] = $rd ;
        $ch_vt += $rd;
    }

    $sl = strlen($ch_o);
    $a=-1;
    $vcw = array_merge($vco,$vcx);
    shuffle($vcw);
    reset($vcw);
    while($sl > ++$a) {
        $vcz = ((next($vcw)) ? current($vcw): reset($vcw));
        $gv = intval(ord($ch_o[$a]) + $vcz);
        if($gv > 255) { $gv = ($gv - 255); }
        $ch_cx = chr($gv);
        $ch_c .= $ch_cx;
        //echo $ch_o[$a]," <- ",$ch_cx,' : ',$gv,' #> ', $vcz ,PHP_EOL;
    }
   
$blk32 = null;
$blk32f = 'VAK32===========================#'.PHP_EOL;
foreach($vcw as $l) {
     $blk32 .= ((strlen($k = strtoupper(dechex($l))) == 1 ) ? '0'.$k : $k);
     if(strlen($blk32) == 32) {
        $blk32f .= $blk32.'#'.PHP_EOL;
        $blk32="";
     }
    
}
$blk32f .= $blk32.'#';
if($show=='show') { echo PHP_EOL,$ch_c,PHP_EOL,PHP_EOL,$blk32f,PHP_EOL,print_r($vcw); }
return array($ch_c,$blk32f);
}

function vak32_decode($ch_c,$vcw) {
   
$genk = str_ireplace(array('VAK32',"=",'#',PHP_EOL,' '),null,$vcw);
$glk = strlen($genk);
$gnkey = array();
for($a=0; $a<$glk; $a+=2) {
    $hxm = substr($genk,$a,2);
    $gnkey[] = hexdec($hxm);
}
    //print_r($gnkey);
    $vcw = $gnkey;
   
$sd = strlen($ch_c);
$ch_cz = null;
$a=-1;
reset($vcw);
while($sd > ++$a) {
    $vcz = ((next($vcw)) ? current($vcw): reset($vcw));
    $gv = intval(ord($ch_c[$a]) - $vcz);
    if($gv > 255) { $gv = ($gv - 255); }
    elseif($gv < 0) { $gv = (255 + $gv); }
    $ch_cy = chr($gv);
    $ch_cz .= $ch_cy;
    //echo $ch_c[$a]," <- ",$ch_cy,' : ',$gv,' #> ', $vcz ,PHP_EOL;
}

return $ch_cz;
}

$my_string = "hellow world foo bar";
$key_encod = "foobar!1234";

$genx = vak32_encode($my_string,$key_encod);

echo PHP_EOL . PHP_EOL;

echo ' my string  : ' , $my_string,PHP_EOL;
echo ' key encode : ' , $key_encod,PHP_EOL . PHP_EOL;

echo ' string encode : ' , $genx[0],PHP_EOL;
echo ' key for decode : ' ,PHP_EOL, $genx[1],PHP_EOL . PHP_EOL;

echo PHP_EOL,"------------------",PHP_EOL . PHP_EOL;

$decode = vak32_decode($genx[0],$genx[1]);

echo ' String decode : ' ,$decode , PHP_EOL;



/*
** test **

my string  : hellow world foo bar
key encode : foobar!1234

string encode : iÿüêðÁO¬áä─pÅÏîÐTöØô
key for decode :
VAK32===========================#
6F0133151C613E2F333112580C6F721D#
6234323C2166#

------------------

String decode : hellow world foo bar
*/

?>
