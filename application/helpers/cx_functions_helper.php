<?php
//This is where global functions are.
//Author: Chao Xia.

function isValid($arr){
    if(isset($arr)){
        $arrLength = count($arr);
        $result = true;
        for($i=0; $i < $arrLength; $i++){
            if(isset($arr[$i])){
                $element = $arr[$i];
                $element = trim($element);
                $result = $result && strlen($element) > 0;
            }else{
                return false;
            }
        }
        return $result;

    }else{
        return false;
    }
}

function cx_shuffle($str){
    $str_rev = strrev($str) ; //Reverse the string.
    $str_shift = str_rot13($str_rev); //Do rot13 shift on the string.
    return $str_shift;
}
function cx_unshuffle($str){
    $str_shift = str_rot13($str) ; //Do rot13 shift on the string.
    $str_rev = strrev($str_shift); //Reverse the string.
    return $str_rev;
}

