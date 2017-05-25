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

function show_message($obj,$msg_type,$msg_content,$msg_btn1=null,$msg_btn1_text=null,$msg_btn2=null,$msg_btn2_text=null,$msg_btn3=null,$msg_btn3_text=null){
    $data['msg_type'] = $msg_type;
    $data['msg_content'] = $msg_content;
    $data['msg_btn1'] = $msg_btn1;
    $data['msg_btn1_text'] = $msg_btn1_text;
    $data['msg_btn2'] = $msg_btn2;
    $data['msg_btn2_text'] = $msg_btn2_text;
    $data['msg_btn3'] = $msg_btn3;
    $data['msg_btn3_text'] = $msg_btn3_text;
    $obj->load->view("templates/message_page", $data);
}
function show_message_invalid_input($obj){
    show_message($obj,'failed','Please make sure your input is correct',
        'Employee/employee_login', 'Back to overview');
}
function show_message_no_result_found($obj){
    show_message($obj,'failed','No result found',
        'Employee/employee_login','Back to overview');
}
function is_form_posted(){
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}
function has_employee_loggedin(){
    return isset($_SESSION['employee_name']);
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
//    This decodes the url, which is encoded by javascript.
    return  preg_replace('/~/', ' ', $str);
}
function cx_array_encodeURL($arr,$f1,$f2){
    for($len = count($arr),$i=0; $i<$len;$i++){
        $arr[$i]["cx_$f1"] = urlencode($arr[$i][$f1]);
        $arr[$i]["cx_$f2"] = urlencode($arr[$i][$f2])  ;
    }
    return $arr;
}


