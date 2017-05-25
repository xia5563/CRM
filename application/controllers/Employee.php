<?php
class Employee extends CI_Controller{
    public $pk; //Primary key

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('employee_model','customer_model'));
        $this->load->helper(array('form','url','cx_functions' ));
        $this->load->library('session');
        auth_employee();
        $this->pk='employee_name';
    }

    public function index(){
        if(has_employee_loggedin()){
            $this->employee_login();
        }else{
            $this->load->view('pages/employee_login');
        }
    }
    public function employee_logout(){
        unset($_SESSION['employee_name'], $_SESSION['email'], $_SESSION['privilege']);
        $this->load->view('pages/employee_login');
    }
    public function employee_login(){
        $data['count_employees'] = $this->employee_model->countTable();
        $data['count_customers'] = $this->customer_model->countTable();

        if(is_form_posted()){
            $in_employee_name = $this->input->post('employee_name');
            $in_pwd = $this->input->post('password');
            $verified_employee = $this->employee_model->verifyEmployee($this->pk,$in_employee_name, $in_pwd);
            if($verified_employee){
                $employee = $verified_employee->row_array();
                $_SESSION['employee_name'] = $data['employee_name'] = $employee['employee_name'];
                $_SESSION['email'] = $data['email'] = $employee['email'];
                $_SESSION['privilege'] = $data['privilege'] = $employee['privilege'];
                $this->load->view('pages/overview', $data);
            }else{
                show_message($this,
                    "failed",
                    "The user name or password is wrong, try again",
                    "Employee",
                    "Back");
            }
        }else{
            auth_employee();
            $this->load->view('pages/overview',$data);
        }
    }
    public function view_employee($keywords){
        if(isValid(array($keywords))){
            $keywords = urldecode($keywords);
            $query = $this->employee_model->fetch($this->pk,$keywords);
            if($query->num_rows()>0){
                $data['num_rows'] = $query->num_rows();
                $data['title_message'] = "Show detail information for employee: \"$keywords\" ";
                $data['employee'] = $query->row_array();
                $this->load->view('pages/employee/view',$data);
            }else{
                show_message_no_result_found($this);
            }
        }else{
            show_message_invalid_input($this);
        }
    }
    public function view_all_employees(){
        $result = $this->employee_model->fetchAll();
        $data['num_rows'] = $result->num_rows();
        $data['title_message'] = "Show all employees (" . $data['num_rows'] . " found).";
        $data['employees'] = $result->result_array();
        $this->load->view('pages/employee/view_all', $data);
    }
    public function search_employee($field, $text, $keywords=null){
        $text = strtolower(cx_decodeURL($text));
        $keywords = cx_decodeURL($keywords);
        if (isValid(array($keywords))) {
            $result = $this->employee_model->searchTable($field, $keywords);
            if ($result->num_rows() == 0) {
                $data['num_rows'] = 0;
            } else {
                $data['num_rows'] = $result->num_rows();
            }
            $data['title_message'] = "Search $text for \"$keywords\"  :  {$data['num_rows']}   found.";
            $data['employees'] = $result->result_array();
            $this->load->view('pages/employee/view_all', $data);
        }else{
            show_message_invalid_input($this);
        }
    }
    public function add_employee(){
        if(is_form_posted()){
            $in_employee_name = $this->input->post('employee_name');
            $in_pwd = $this->input->post('password');
            $in_email = $this->input->post('email');
            $in_privilege = $this->input->post('privilege');
            if (isValid(array($in_employee_name,$in_pwd,$in_privilege))) {
                if ($this->employee_model->doesExist($this->pk, $in_employee_name)) {
                    show_message($this,
                        "failed",
                        "The employee already exist.",
                        "Employee/add_employee",
                        "Back");
                } else {
                    $num_added_rows = $this->employee_model->addEmployee($in_employee_name, $in_pwd,
                        $in_email, $in_privilege);
                    if ($num_added_rows > 0) {
                        show_message($this,
                            "successful",
                            "New employee has been added successful.",
                            "Employee/employee_login",
                            "Back to overview",
                            "Employee/view_employee/$in_employee_name",
                            "Double check",
                            "Employee/add_employee",
                            "Add another"
                        );
                    } else {
                        show_message($this,
                            "failed",
                            "Adding new employee failed",
                            "Employee/employee_login",
                            "Back to overview");
                    }
                }

            } else {
                show_message_invalid_input($this);
            }

        }else{
            auth_employee();
            $this->load->view('pages/employee/add');
        }
    }
    public function update_employee($employee_name=null){
        if(is_form_posted()){
            $in_employee_name = $this->input->post('employee_name');
            $in_pwd = $this->input->post('password');
            $in_email = $this->input->post('email');
            $in_privilege = $this->input->post('privilege');
            if(isValid(array($in_employee_name,$in_pwd,$in_privilege))){
                $num_updated_rows = $this->employee_model->updateEmployee($this->pk,$in_employee_name,$in_pwd,
                    $in_email,$in_privilege);
                var_dump($num_updated_rows);
                if($num_updated_rows > 0){
                    show_message($this,
                        "successful",
                        "New employee has been added successful.",
                        "Employee/employee_login",
                        "Back to overview",
                        "Employee/view_employee/$in_employee_name",
                        "Double check"
                        );
                }else{
                    show_message($this,
                        "failed",
                        "The update has failed",
                        "Employee/employee_login",
                        "Back to overview");
                }
            }else{
                show_message_invalid_input($this);
            }

        }else{
            $employee_name = urldecode($employee_name);
            $result = $this->employee_model->fetch($this->pk,$employee_name);
            if($result->num_rows()==0){
                show_message($this,
                    "failed",
                    "The employee name is wrong or does not exist." ,
                    "Employee/employee_login",
                    "Back to overview");
            }else{
                $data['employee'] = $result->row_array();
                $this->load->view('pages/employee/update', $data);
            }
        }
    }
    public function delete_employee($employee_name){
        if(isValid(array($employee_name))){
            $employee_name = urldecode($employee_name);
            $num_deleted_rows = $this->employee_model->deleteOne($this->pk,$employee_name);
            if($num_deleted_rows > 0){
                show_message($this,
                    "successful",
                    "Delete successful.",
                    "employee/employee_login",
                    "Back to overview");
            }else{
                show_message($this,
                    "failed",
                    "Failed to delete",
                    "employee/employee_login",
                    "Back to overview");
            }
        }else{
            show_message_invalid_input($this);
        }
    }

}
