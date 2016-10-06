<?php

function slug($par){
    $find		= array("Ü","ü","Ç","ç","-","İ","Ş","ş","Ğ","ğ","I","ı","Ö","ö");
    $replace	= array("u","u","c","c"," ","i","s","s","g","g","i","i","o","o");
    $ret		= strtolower(str_replace($find,$replace,$par));
//    $ret		= preg_replace("@[^A-Za-z0-9\-_]@i", ' ', $ret); // orijinali
    $ret		= preg_replace("@[^A-Za-z0-9\-]@i", ' ', $ret);
    $ret		= trim(preg_replace("/\s+/"," ",$ret));
    $ret		= str_replace(" ","-",$ret);
    return $ret;
}

function getGUID(){
    if (function_exists('com_create_guid')){
        return com_create_guid();
    }
    else {
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = chr(123)// "{"
            .substr($charid, 0, 8).$hyphen
            .substr($charid, 8, 4).$hyphen
            .substr($charid,12, 4).$hyphen
            .substr($charid,16, 4).$hyphen
            .substr($charid,20,12)
            .chr(125);// "}"
        return $uuid;
    }
}

