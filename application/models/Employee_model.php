<?php
class Employee_model extends CI_Model{
    public $tablename = 'employees';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('cx_functions'));
    }
    public function getEmployee($username) {
        if(isValid($username)){
            $query = $this->db->where('username', $username)->get($this->tablename);
            if($query->num_rows() > 0){
                return $query->row_array();
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    public function hasEmployee($username=null){
        $result = $this->getEmployee($username);
        return empty($result) ? false: true;
    }
    public function countEmployee(){
        return $this->db->count_all_results($this->tablename);
    }
    public function checkEmployee($username, $pwd){
        if(  isValid(array($username, $pwd)) ) {
            $query = $this->db->get_where($this->tablename, array('username' => $username));
            $result = $query->row_array();
            if ($query->num_rows() > 0) {
                if ($pwd == $result['password']) {
                    return $result;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function viewAllEmployees(){
        $query = $this->db->get($this->tablename);
        return $query->result_array();
    }
    public function addEmployee($username, $pwd, $email,$privilege){
        if(isValid(array($username, $pwd,$privilege))){
            return $this->db->insert($this->tablename, array('username'=> $username, 'password'=>$pwd, 'email'=>$email, 'employee_privilege'=> $privilege));
        }else{
            return false;
        }
    }
    public function deleteEmployee($username){
        if(isValid(array($username))){
            $this->db->where('username', $username)->delete($this->tablename);
            return $this->db->affected_rows();
        }else{
            return -1;
        }
    }
    public function updateEmployee($username,$pwd,$email,$privilege){
        if(isValid(array($username,$pwd,$privilege))){
            $this->db->where('username', $username)->update($this->tablename, array('password'=>$pwd,'email'=>$email,'employee_privilege'=>$privilege));
            return $this->db->affected_rows();
        }else{
            return -1;
        }
    }

    


}