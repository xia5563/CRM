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

function show_message($obj,$msg_type, $msg_content,$msg_btn_one=null, $msg_btn_one_text=null, $msg_btn_two=null, $msg_btn_two_text=null){
    $data['msg_type'] = $msg_type;
    $data['msg_content'] = $msg_content;
    $data['msg_btn_one'] = $msg_btn_one;
    $data['msg_btn_one_text'] = $msg_btn_one_text;
    $data['msg_btn_two'] = $msg_btn_two;
    $data['msg_btn_two_text'] = $msg_btn_two_text;
    $obj->load->view("templates/message_page", $data);
}
function is_form_posted(){
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}
function has_employee_loggedin(){
    return isset($_SESSION['username']);
}
function auth_employee(){
    if(!has_employee_loggedin() &&
        (current_url() != site_url('Employee')) &&
        (current_url() != site_url('Employee/employee_login'))){

        redirect(site_url('Employee'));
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
function cx_decodeURL($str){
    return  preg_replace('/~/', ' ', $str);
}


