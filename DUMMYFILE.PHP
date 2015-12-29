<?php

/*
Write Dummy File 4GB in Php 32bits (X86)
if you want write more GB File (>4GB), use Php(X64) .
this file is created in 0.0041329860687256 second

CreatFileDummy('data_test.txt',4294967296);
*/


FUNCTION CreatFileDummy($file_name,$size) {   
// 32bits 4 294 967 296 bytes MAX Size
    $f = fopen($file_name, 'wb');
    if($size >= 1000000000)  {
        $z = ($size / 1000000000);       
        if (is_float($z))  {
            $z = round($z,0);
            fseek($f, ( $size - ($z * 1000000000) -1 ), SEEK_END);
            fwrite($f, "\0");
        }       
        while(--$z > -1) {
            fseek($f, 999999999, SEEK_END);
            fwrite($f, "\0");
        }
    }
    else {
        fseek($f, $size - 1, SEEK_END);
        fwrite($f, "\0");
    }
    fclose($f);

Return true;
}
