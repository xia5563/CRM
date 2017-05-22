<?php
class Customer extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('customer_model');
        $this->load->helper(array('form','url','cx_functions'));
        $this->load->library('session');
        auth_employee();
    }
    public function view_customers($category=null, $days=null){
        $recent_customers = $this->customer_model->viewCustomers($category,$days);
        $data['customers'] = $recent_customers->result_array();
        $data['num_rows'] = $num_rows = $recent_customers->num_rows();
        $data['title_message'] =$this->get_message($days,$num_rows,"");
        $this->load->view('pages/customer/view', $data);
    }
    public function search_customers($field,$keywords=null,$text=null){
        $keywords = cx_decodeURL($keywords);
        $text = cx_decodeURL($text);
        $result = $this->customer_model->getCustomers($field,$keywords);
        var_dump($keywords);
        if(empty($result)){
            show_message($this,
                "failed",
                "No result found",
                "Employee/employee_login",
                "Back to overview");
        }else{
            $text = strtolower(urldecode($text));
            $data['num_rows'] = $result->num_rows();
            $data['title_message'] = "Search $text for $keywords: {$data['num_rows']}   found.";
            $data['customers'] = $result->result_array();
            $this->load->view('pages/customer/view', $data);
        }
    }
    public function add_customer(){
        $this->load->view('pages/customer/add');
    }
    public function update_customer(){
        $this->load->view('pages/customer/update');
    }

    protected function get_message($days, $num_rows, $title_message){
        if(isset($days)){
            $days_message = ($days > 1)? " days" : " day" ;
            if($num_rows==0){
                $title_message = "No result found.";
            } else if ($num_rows==1){
                $title_message= "Show recent customers within " . $days . $days_message ." (" . $num_rows ." result found).";
            } else if ($num_rows > 1){
                $title_message  = "Show recent customers within " . $days . $days_message ." (" . $num_rows ." results found).";
            }
        }else{
            $title_message  = "Show all customers (" . $num_rows . " results found)." ;
        }

        return $title_message;
    }
}
