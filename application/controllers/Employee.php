<?php

class Employee extends CI_Controller
{
    public $pk; //Primary key

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('employee_model', 'customer_model'));
        $this->load->helper(array('form', 'url', 'cx_functions'));
        $this->load->library('session');
        auth_employee();
        $this->pk = 'employee_name';
    }

    public function index()
    {
        if (has_employee_loggedin()) {
            $this->employee_login();
        } else {
            $this->load->view('pages/employee_login');
        }
    }

    public function employee_logout()
    {
        unset($_SESSION['employee_name'], $_SESSION['email'], $_SESSION['privilege']);
        $this->load->view('pages/employee_login');
    }

    public function employee_login()
    {
        $data['count_employees'] = $this->employee_model->countTable();
        $data['count_customers'] = $this->customer_model->countTable();

        if (is_form_posted()) {
            $in_employee_name = $this->input->post('employee_name');
            $in_pwd = $this->input->post('password');
            $verified_employee = $this->employee_model->verifyEmployee($this->pk, $in_employee_name, $in_pwd);
            if ($verified_employee) {
                $employee = $verified_employee->row_array();
                $_SESSION['employee_name'] = $data['employee_name'] = $employee['employee_name'];
                $_SESSION['email'] = $data['email'] = $employee['email'];
                $_SESSION['privilege'] = $data['privilege'] = $employee['privilege'];
                $this->load->view('pages/overview', $data);
            } else {
                show_message($this,
                    "failed",
                    "The user name or password is wrong, try again",
                    "Employee",
                    "Back");
            }
        } else {
            auth_employee();
            $this->load->view('pages/overview', $data);
        }
    }

    public function view_employee($k)
    {
        $k = urldecode($k);
        view_one($this, 'employee_model', $k, 'employee');
    }

    public function view_all_employees()
    {
        view_all($this, "employee_model", 'employee');
    }

    public function search_employee($field, $text, $keyword = null)
    {
        cx_search($this, 'employee_model', 'employee', $field, $text, $keyword);
    }

    public function add_employee()
    {
        if (is_form_posted()) {
            $in_employee_name = $this->input->post('employee_name');
            $in_pwd = $this->input->post('password');
            $in_email = $this->input->post('email');
            $in_privilege = $this->input->post('privilege');
            if (isValid(array($in_employee_name, $in_pwd, $in_privilege))) {
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
                            "New employee has been added successfully.",
                            "Employee/view_employee/$in_employee_name",
                            "Double check",
                            "Employee/add_employee",
                            "Add another"
                        );
                    } else {
                        show_message($this,
                            "failed",
                            "Adding new employee failed",
                            "Employee/add_employee",
                            "Add again");
                    }
                }

            } else {
                show_message_invalid_input($this);
            }

        } else {
            auth_employee();
            $this->load->view('pages/employee/add');
        }
    }

    public function update_employee($employee_name=null)
    {
        if (is_form_posted()) {
            $old_employee_name = $this->input->post('old_employee_name');
            $in_employee_name = $this->input->post('employee_name');
            $in_pwd = $this->input->post('password');
            $in_email = $this->input->post('email');
            $in_privilege = $this->input->post('privilege');
            if (isValid(array($in_employee_name, $in_pwd, $in_privilege))) {
                if (($in_employee_name != $old_employee_name) && $this->employee_model->doesExist($this->pk, $in_employee_name)) {
                    show_message($this,
                        'failed',
                        "The employee \"$in_employee_name\" already exists, click the \"View that employee\" to know more.",
                        "Employee/update_employee/$old_employee_name",
                        'Back to update',
                        "Employee/view_employee/$in_employee_name",
                        'View that employee'
                    );
                } else {
                    $num_updated_rows = $this->employee_model->updateEmployee($this->pk, $old_employee_name,
                        $in_employee_name, $in_pwd, $in_email, $in_privilege);
                    if ($num_updated_rows >= 0) {
                        show_message($this,
                            "successful",
                            "New employee has been added successful.",
                            "Employee/view_employee/$in_employee_name",
                            "Double check"
                        );
                    } else {
                        show_message($this,
                            "failed",
                            "The update has failed");
                    }
                }


            } else {
                show_message_invalid_input($this);
            }

        } else {
            $employee_name = urldecode($employee_name);
            $query = $this->employee_model->fetch($this->pk, $employee_name);
            if ($query->num_rows() == 0) {
                show_message_no_result_found($this);
            } else {
                $data['title_message'] = "Update details for \"$employee_name\"";
                $data['employee'] = $query->row_array();
                $this->load->view('pages/employee/update', $data);
            }
        }
    }

    public function delete_employee($employee_name)
    {
        $employee_name = urldecode($employee_name);
        delete_one($this,'employee_model',$employee_name);
    }

}
