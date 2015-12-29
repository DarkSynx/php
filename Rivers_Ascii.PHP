<?php

    function rivencodec($ch,$a=0) {
        while((@$b = $ch[$a++])) { $ch[$a-1] = chr(255-ord($b)); }
        return $ch;
    }
       
   
$zz = rivencodec("abcdefghijklmn");
echo 'encode: ',$zz,'<br/>',PHP_EOL;

$yy = rivencodec($zz);
echo 'decode: ',$yy,'<br/>',PHP_EOL;

?>
