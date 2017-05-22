<?php
class Customer_model extends CI_Model{
    public $tablename = 'customers';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('cx_functions'));
    }
    public function countCustomers(){
        return $this->db->count_all_results($this->tablename);
    }
    public function viewCustomers($category, $days){
        if(isValid(array($category))){
            $query = $this->db->where('DATEDIFF(CURDATE(),'. $category .') < '. $days)->get($this->tablename);
            return   $query;
        }else{
            return  $this->db->get($this->tablename);
        }
    }
    public function getCustomers($field,$keywords=null){
        if(isValid(array($field,$keywords))){
            $query = $this->db->like($field, $keywords)->get($this->tablename);
            return $query;
        }else{
            return null;
        }
    }
}
