<?php

class User_Model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function hasUser($username=null){
        $query = $this->db->get_where('users', array('username' => $username));
        return $query->num_rows() > 0 ? true: false;
    }
    public function checkUser($username=null, $pwd=null){
        $query = $this->db->get_where('users', array('username' => $username));
        if($this->db->count_all_results() > 0){
            if($pwd == $query->row_array()['password']){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    public function viewUsers(){
        $query = $this->db->get('users');
        return $query->row_array();
    }
    public function addUser($username, $pwd, $email){
        return $this->db->insert('users', array('username'=> $username, 'password'=>$pwd, 'email'=>$email));
    }
    public function cx_shuffle($str){
        $str_rev = strrev($str) ; //Reverse the string.
        $str_shift = str_rot13($str_rev); //Do rot13 shift on the string.
        return $str_shift;
    }
    public function cx_unshuffle($str){
        $str_shift = str_rot13($str) ; //Do rot13 shift on the string.
        $str_rev = strrev($str_shift); //Reverse the string.
        return $str_rev;
    }


}