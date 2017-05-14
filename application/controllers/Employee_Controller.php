<?php
class Employee_Controller extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('employee_model');
        $this->load->helper(array('form','url','cx_functions' ));
        $this->load->library('session');
    }
    public function index(){
        if(isset($_SESSION['username'])){
            $this->employee_login();
        }else{
            $this->load->view('pages/employee_login' );
        }
    }
    public function employee_logout(){
        unset($_SESSION['username'], $_SESSION['email'], $_SESSION['employee_status']);
        $this->load->view('pages/employee_login');
    }
    public function employee_login(){
        $data['count_employee'] = $this->employee_model->countEmployee();

        if($this->is_form_posted()){
            $username_from_input = $this->input->post('username');
            $pwd_from_input = $this->input->post('password');
            $user_in_db = $this->employee_model->checkEmployee($username_from_input, $pwd_from_input);
            if($user_in_db){
                $_SESSION['username'] = $data['username'] = $user_in_db['username'];
                $_SESSION['email'] = $data['email'] = $user_in_db['email'];
                $_SESSION['employee_privilege'] = $data['employee_privilege'] = $user_in_db['employee_privilege'];
                $this->load->view('pages/employee_loggedin', $data);
            }else{
                $this->show_message("failed",
                    "The user name or password is wrong, try again",
                    "Employee_Controller",
                    "Back");
            }
        }else{
            $this->has_employee_loggedin('pages/employee_loggedin', $data);
        }

    }
    public function view_all_employees(){
        $data['employees'] = $this->employee_model->viewAllEmployees();
        $this->load->view('pages/show_employees', $data);
    }
    public function add_employee(){
        if($this->is_form_posted()){
            $username_from_input = $this->input->post('username');
            $pwd_from_input = $this->input->post('password');
            $email_from_input = $this->input->post('email');
            $privilege_from_input = $this->input->post('privilege');

            if($this->employee_model->hasEmployee($username_from_input)){
                $this->show_message("failed",
                    "The employee already exist.",
                    "Employee_Controller/add_employee",
                    "Back");
            }else{
                $addUser = $this->employee_model->addEmployee($username_from_input,$pwd_from_input,$email_from_input, $privilege_from_input);
                if($addUser){
                    $this->show_message("successful",
                        "New employee has been added successful.",
                        "Employee_Controller/add_employee",
                        "Add another",
                        "Employee_Controller/employee_login",
                        "Back to overview");
                }else{
                    $this->show_message("failed",
                        "Adding new employee failed, please make sure your input is correct",
                        "Employee_Controller/add_employee",
                        "Back");
                }
            }
        }else{
            $this->has_employee_loggedin('pages/add_employee');
        }
    }
    public function update_employee($username=null){
        if($this->is_form_posted()){
            $usernanme_from_input = $this->input->post('username');
            $pwd_from_input = $this->input->post('password');
            $email_from_input = $this->input->post('email');
            $privilege = $this->input->post('privilege');
            var_dump($usernanme_from_input);
            $num_updated_rows = $this->employee_model->updateEmployee($usernanme_from_input,$pwd_from_input,$email_from_input,$privilege);
            if($num_updated_rows > 0){
                $this->show_message("successful",
                    "The update is successful",
                    "Employee_Controller/employee_login",
                    "Back to overview");
            }else{
                $this->show_message("failed",
                    "The update has failed",
                    "Employee_Controller/employee_login",
                    "Back to overview");
            }
        }else{
            $result = $this->employee_model->getEmployee(urldecode($username));
            if(empty($result)){
                $this->show_message("failed",
                    "The employee name is wrong or does not exist." ,
                    "Employee_Controller/employee_login",
                    "Back to overview");
            }else{
                $data['employee'] = $result;
                $this->load->view('pages/update_employee', $data);
            }
        }
    }
    public function delete_employee($username){
        $num_deleted_rows = $this->employee_model->deleteEmployee($username);
        if($num_deleted_rows > 0){
            $this->show_message("successful",
                "Delete successful.",
                "Employee_Controller/view_all_employees",
                "Back to view all");
        }else{
            $this->show_message("failed",
                "Failed to delete",
                "Employee_Controller/view_all_employees",
                "Back to view all");
        }
    }


    protected function is_form_posted(){
        return $this->input->server('REQUEST_METHOD') == 'POST';
    }
    protected function has_employee_loggedin($page_one,$data=null, $page_two='pages/employee_login'){
        if(isset($_SESSION['username'])){
            $this->load->view($page_one, $data);
        }else{
            $this->load->view($page_two);
        }
    }
    protected function show_message($msg_type, $msg_content,$msg_btn_one=null, $msg_btn_one_text=null, $msg_btn_two=null, $msg_btn_two_text=null){
        $data['msg_type'] = $msg_type;
        $data['msg_content'] = $msg_content;
        $data['msg_btn_one'] = $msg_btn_one;
        $data['msg_btn_one_text'] = $msg_btn_one_text;
        $data['msg_btn_two'] = $msg_btn_two;
        $data['msg_btn_two_text'] = $msg_btn_two_text;
        $this->load->view("templates/message_page", $data);
    }


}
