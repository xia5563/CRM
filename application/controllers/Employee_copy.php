<?php
//class Employee extends CI_Controller{
//    public function __construct()
//    {
//        parent::__construct();
//        $this->load->model(array('employee_model','customer_model'));
//        $this->load->helper(array('form','url','cx_functions' ));
//        $this->load->library('session');
//    }
//    public function index(){
//        if(isset($_SESSION['username'])){
//            $this->employee_login();
//        }else{
//            $this->load->view('pages/employee_login' );
//        }
//    }
//    public function employee_logout(){
//        unset($_SESSION['username'], $_SESSION['email'], $_SESSION['employee_privilege']);
//        $this->load->view('pages/employee_login');
//    }
//    public function employee_login(){
//        $data['count_employees'] = $this->employee_model->countEmployees();
//        $data['count_customers'] = $this->customer_model->countCustomers();
//
//        if(is_form_posted()){
//            $username_from_input = $this->input->post('username');
//            $pwd_from_input = $this->input->post('password');
//            $user_in_db = $this->employee_model->checkEmployee($username_from_input, $pwd_from_input);
//            if($user_in_db){
//                $_SESSION['username'] = $data['username'] = $user_in_db['username'];
//                $_SESSION['email'] = $data['email'] = $user_in_db['email'];
//                $_SESSION['employee_privilege'] = $data['employee_privilege'] = $user_in_db['employee_privilege'];
//                $this->load->view('pages/overview', $data);
//            }else{
//                show_message($this,
//                    "failed",
//                    "The user name or password is wrong, try again",
//                    "Employee",
//                    "Back");
//            }
//        }else{
//            has_overview($this,'pages/overview', $data);
//        }
//
//    }
//    public function view_all_employees(){
//        $data['employees'] = $this->employee_model->viewAllEmployees();
//        $this->load->view('pages/employee/view_all', $data);
//    }
//    public function add_employee(){
//        if(is_form_posted()){
//            $username_from_input = $this->input->post('username');
//            $pwd_from_input = $this->input->post('password');
//            $email_from_input = $this->input->post('email');
//            $privilege_from_input = $this->input->post('privilege');
//
//            if($this->employee_model->hasEmployee($username_from_input)){
//                show_message($this,
//                    "failed",
//                    "The employee already exist.",
//                    "Employee/add_employee",
//                    "Back");
//            }else{
//                $addUser = $this->employee_model->addEmployee($username_from_input,$pwd_from_input,$email_from_input, $privilege_from_input);
//                if($addUser){
//                    show_message($this,
//                        "successful",
//                        "New employee has been added successful.",
//                        "Employee/add_employee",
//                        "Add another",
//                        "Employee/employee_login",
//                        "Back to overview");
//                }else{
//                    show_message($this,
//                        "failed",
//                        "Adding new employee failed, please make sure your input is correct",
//                        "Employee/add_employee",
//                        "Back");
//                }
//            }
//        }else{
//            has_overview($this,'pages/employee/add');
//        }
//    }
//    public function update_employee($username=null){
//        if(is_form_posted()){
//            $usernanme_from_input = $this->input->post('username');
//            $pwd_from_input = $this->input->post('password');
//            $email_from_input = $this->input->post('email');
//            $privilege = $this->input->post('privilege');
//            $num_updated_rows = $this->employee_model->updateEmployee($usernanme_from_input,$pwd_from_input,$email_from_input,$privilege);
//            if($num_updated_rows > 0){
//                show_message($this,
//                    "successful",
//                    "The update is successful",
//                    "Employee/employee_login",
//                    "Back to overview");
//            }else{
//                show_message($this,
//                    "failed",
//                    "The update has failed",
//                    "Employee/employee_login",
//                    "Back to overview");
//            }
//        }else{
//            $result = $this->employee_model->getEmployee(urldecode($username));
//            if(empty($result)){
//                show_message($this,
//                    "failed",
//                    "The employee name is wrong or does not exist." ,
//                    "Employee/employee_login",
//                    "Back to overview");
//            }else{
//                $data['employee'] = $result;
//                $this->load->view('pages/employee/update', $data);
//            }
//        }
//    }
//    public function delete_employee($username){
//        $num_deleted_rows = $this->employee_model->deleteEmployee($username);
//        if($num_deleted_rows > 0){
//            show_message($this,
//                "successful",
//                "Delete successful.",
//                "Employee/view_all_employees",
//                "Back to view all");
//        }else{
//            show_message($this,
//                "failed",
//                "Failed to delete",
//                "Employee/view_all_employees",
//                "Back to view all");
//        }
//    }
//
//}
