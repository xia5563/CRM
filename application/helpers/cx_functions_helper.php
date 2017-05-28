<?php
//This is where global functions are.
//Author: Chao Xia.
//The following are global functions. They are valid for all controllers and models.
//If you wanna something just for all models, see the Common_model.

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
    show_message($obj,'failed','Please make sure your input is correct');
}
function show_message_no_result_found($obj){
    show_message($obj,'failed','No result found');
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

function view_one($obj, $model, $k, $element){
    if(isValid(array($k))){
        $query = $obj->$model->fetch($obj->pk,$k);
        if($query->num_rows()>0){
            $data['num_rows'] = $query->num_rows();
            $data['title_message'] = "Show detail information for $element: \"$k\" ";
            $data[$element] = $query->row_array();
            $obj->load->view("pages/$element/view", $data);
        }else{
            show_message_no_result_found($obj);
        }
    }else{
        show_message_invalid_input($obj);
    }
}
function view_all($obj,$model,$element){
    $dataset = $obj->$model->fetchAll();
    $data['num_rows'] = $dataset->num_rows();
    $data['title_message'] = "Show all {$element}s, {$data['num_rows']} found.";
    $data[$element.'s'] = $dataset->result_array();
    $obj->load->view("pages/$element/view_all", $data);
}
function cx_search($obj,$model,$element,$field,$text,$keyword){
    $text = strtolower(cx_decodeURL($text));
    $keyword = cx_decodeURL($keyword);
    if(isValid(array($keyword))){
        $query = $obj->$model->searchTable($field,$keyword);
        if($query->num_rows()==0){
            $data['num_rows'] = 0;
        }else{
            $data['num_rows'] = $query->num_rows();
        }
        $data['title_message'] = "Search $text for \"$keyword\"  :  {$data['num_rows']}   found.";
        $data[$element.'s'] = $query->result_array();
        $obj->load->view("pages/$element/view_all", $data);
    }else{
        show_message_invalid_input($obj);
    }
}
function delete_one($obj,$model,$k){
    if (isValid(array($k))) {
        $num_deleted_rows = $obj->$model->deleteOne($obj->pk, $k);
        if ($num_deleted_rows > 0) {
            show_message($obj,
                "successful",
                "Delete successful."
                );
        } else {
            show_message($obj,
                "failed",
                "Failed to delete");
        }
    } else {
        show_message_invalid_input($obj);
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


