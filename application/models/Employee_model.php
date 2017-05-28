<?php

class Employee_model extends Common_model
{
    public function __construct()
    {
        parent::__construct();
    }

    public $tablename = 'employees';

    public function verifyEmployee($field, $keywords, $pwd)
    {
        $query = $this->fetch($field, $keywords);
        if ($query->num_rows() == 0) {
            return false;
        } else {
            if ($query->row_array()['password'] == $pwd) {
                return $query;
            } else {
                return false;
            }
        }
    }

    public function addEmployee($employee_name, $pwd, $email, $privilege)
    {
        $this->db->insert($this->tablename, array('employee_name' => $employee_name, 'password' => $pwd,
            'email' => $email, 'privilege' => $privilege));
        return $this->db->affected_rows();
    }

    public function updateEmployee($field,$keyword, $employee_name, $pwd, $email, $privilege)
    {
        $this->db->where($field, $keyword)->update($this->tablename,
            array('employee_name'=>$employee_name,'password' => $pwd, 'email' => $email, 'privilege' => $privilege));
        return $this->db->affected_rows();
    }


}