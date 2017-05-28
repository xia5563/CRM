<?php

class Customer_model extends Common_model
{
    public function __construct()
    {
        parent::__construct();
    }

    public $tablename = 'customers';

    public function viewRecentCustomers($field, $days)
    {
        $query = $this->db->where('DATEDIFF(CURDATE(),' . $field . ') < ' . $days)->get($this->tablename);
        return $query;
    }

    public function addCustomer($customer_name, $email, $mobile_phone = null, $py_enquiry_date = null,
                                $pte_enquiry_date = null, $rpl_enquiry_date = null)
    {
        $this->db->insert($this->tablename, array('customer_name' => $customer_name, 'email' => $email,
            'mobile_phone' => $mobile_phone, 'py_enquiry_date' => $py_enquiry_date,
            'pte_enquiry_date' => $pte_enquiry_date, 'rpl_enquiry_date' => $rpl_enquiry_date));
        return $this->db->affected_rows();
    }

    public function updateCustomer($field, $keyword, $customer_name, $email, $mobile_phone,
                                   $py_enquiry_date, $pte_enquiry_date, $rpl_enquiry_date)
    {
        $this->db->where($field, $keyword)->update($this->tablename,
            array('customer_name' => $customer_name, 'email' => $email, 'mobile_phone' => $mobile_phone,
                'py_enquiry_date' => $py_enquiry_date, 'pte_enquiry_date' => $pte_enquiry_date,
                'rpl_enquiry_date' => $rpl_enquiry_date));
        return $this->db->affected_rows();
    }
}
