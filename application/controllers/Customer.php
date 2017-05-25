<?php
class Customer extends CI_Controller{
    public $pk; //Primary key

    public function __construct()
    {
        parent::__construct();
        $this->load->model('customer_model');
        $this->load->helper(array('form','url','cx_functions'));
        $this->load->library('session');
        auth_employee();
        $this->pk = 'email';
    }

    public function view_customer($k1){
        if(isValid(array($k1))){
            $customer = $this->customer_model->fetch($this->pk,$k1);
            if($customer->num_rows()>0){
                $data['num_rows'] = $customer->num_rows();
                $data['title_message'] = "Show detail information for customer: \"$k1\" ";
                $data['customer'] = $customer->row_array();
                $this->load->view('pages/customer/view', $data);
            }else{
                show_message_no_result_found($this);
            }
        }else{
            show_message_invalid_input($this);
        }
    }
    public function view_recent_customer($field=null,$text=null, $days=null){
        $text = strtolower(cx_decodeURL($text));
        $recent_customers = $this->customer_model->viewCustomers($field,$days);
        $data['customers'] = $recent_customers->result_array();
        $data['num_rows'] =  $recent_customers->num_rows();
        $data['title_message'] = "Search customers for $text within $days ".
            ($days > 1? 'days':'day') . ", {$data['num_rows']} found.";
        $this->load->view('pages/customer/view_all', $data);
    }
    public function view_all_customers(){
        $customers = $this->customer_model->fetchAll();
        $data['customers'] = $customers->result_array();
        $data['num_rows'] = $customers->num_rows();
        $data['title_message'] = "Show all customers, {$data['num_rows']} found.";
        $this->load->view('pages/customer/view_all', $data);
    }
    public function search_customer($field,$text,$keywords=null){
        //See "cx_functions_helper" for the details of the decoding.
        $text = strtolower(cx_decodeURL($text));
        $keywords = cx_decodeURL($keywords);
        if(isValid(array($keywords))){
            $result = $this->customer_model->searchTable($field,$keywords);
            if($result->num_rows()==0){
                $data['num_rows'] = 0;
            }else{
                $data['num_rows'] = $result->num_rows();
            }
            $data['title_message'] = "Search $text for \"$keywords\"  :  {$data['num_rows']}   found.";
            $data['customers'] = $result->result_array();
            $this->load->view('pages/customer/view_all', $data);
        }else{
            show_message($this,
                "failed",
                "Please make sure your input is correct.",
                "Employee/employee_login",
                "Back to overview");
        }

    }
    public function add_customer(){
        if(is_form_posted()){
            $customer_name = $this->input->post('customer_name');
            $email = $this->input->post('email');
            $mobile_phone = $this->input->post('mobile_phone');
            $py_enquiry_date = $this->input->post('py_enquiry_date');
            $pte_enquiry_date = $this->input->post('pte_enquiry_date');
            $rpl_enquiry_date = $this->input->post('rpl_enquiry_date');
            if(isValid(array($customer_name,$email))){
                if($this->customer_model->doesExist($this->pk,$email)){
                    show_message($this,
                        'failed',
                        "The customer with the email \"$email\" already exist",
                        'Employee/employee_login',
                        'Back to overview');
                }else{
                    $num_addedd_rows = $this->customer_model->addCustomer($customer_name,$email,$mobile_phone,$py_enquiry_date,
                        $pte_enquiry_date,$rpl_enquiry_date);
                    if($num_addedd_rows>0){
                        show_message($this,
                            'successful',
                            'Adding new customer is successful.',
                            'Customer/add_customer',
                            'Add another',
                            'Employee/employee_login',
                            'Back to overview');
                    }else{
                        show_message($this,
                            'failed',
                            'Adding new customer failed',
                            'Employee/employee_login',
                            'Back to overview');
                    }
                }

            }else{
                show_message_invalid_input($this);
            }
        }else{
            auth_employee();
            $this->load->view('pages/customer/add');
        }
    }
    public function update_customer(){
        $this->load->view('pages/customer/update');
    }


}
