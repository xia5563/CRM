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

    public function view_customer($k){
        view_one($this,'customer_model',$k,'customer');
    }
    public function view_recent_customer($field=null,$text=null, $days=null){
        $text = strtolower(cx_decodeURL($text));
        $recent_customers = $this->customer_model->viewRecentCustomers($field,$days);
        $data['customers'] = $recent_customers->result_array();
        $data['num_rows'] =  $recent_customers->num_rows();
        $data['title_message'] = "Search customers for $text within $days ".
            ($days > 1? 'days':'day') . ", {$data['num_rows']} found.";
        $this->load->view('pages/customer/view_all', $data);
    }
    public function view_all_customers(){
        view_all($this,"customer_model",'customer');
    }
    public function search_customer($field,$text,$keyword=null){
        cx_search($this,'customer_model','customer',$field,$text,$keyword);
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
                        "The customer with the email \"$email\" already exist");
                }else{
                    $num_addedd_rows = $this->customer_model->addCustomer($customer_name,$email,$mobile_phone,$py_enquiry_date,
                        $pte_enquiry_date,$rpl_enquiry_date);
                    if($num_addedd_rows>0){
                        show_message($this,
                            'successful',
                            'Adding new customer is successful.',
                            "Customer/view_customer/$email",
                            "Double check",
                            'Customer/add_customer',
                            'Add another'
                            );
                    }else{
                        show_message($this,
                            'failed',
                            'Adding new customer failed',
                            'Customer/add_customer',
                            'Add again');
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
    public function update_customer($email=null){
        if(is_form_posted()){
            $in_customer_name = $this->input->post('customer_name');
            $old_email = $this->input->post('old_email');
            $in_email = $this->input->post('email');
            $in_mobile_phone = $this->input->post('mobile_phone');
            $in_py_enquiry_date = $this->input->post('py_enquiry_date');
            $in_pte_enquiry_date = $this->input->post('pte_enquiry_date');
            $in_rpl_enquiry_date = $this->input->post('rpl_enquiry_date');
            if(isValid(array($in_customer_name,$in_email))){
                if(($in_email != $old_email) && $this->customer_model->doesExist($this->pk,$in_email)){
                    show_message($this,
                        'failed',
                        "The customer with the email \"$in_email\" already exists, click the \"View that customer\" to know more.",
                        "Customer/update_customer/$old_email",
                        'Back to update',
                        "Customer/view_customer/$in_email",
                        "View that customer");
                }else{
                    $num_updated_rows = $this->customer_model->updateCustomer($this->pk,$old_email,$in_customer_name,$in_email,
                        $in_mobile_phone,$in_py_enquiry_date,$in_pte_enquiry_date,$in_rpl_enquiry_date);
                    if($num_updated_rows >= 0){
                        show_message($this,
                            'successful',
                            'Updating customer is successful',
                            "Customer/view_customer/$in_email",
                            'Double check'
                        );
                    }else{
                        show_message($this,
                            "failed",
                            "The update has failed");
                    }
                }

            }else{
                show_message_invalid_input($this);
            }
        }else{
            $query = $this->customer_model->fetch($this->pk, $email);
            if($query->num_rows() == 0){
                show_message_no_result_found($this);
            }else{
                $data['title_message'] = "Update details for customer with the email \"$email\"";
                $data['customer'] = $query->row_array();
                $this->load->view('pages/customer/update',$data);
            }
        }
    }

    public function delete_customer($email){
        delete_one($this,'customer_model',$email);
    }


}
