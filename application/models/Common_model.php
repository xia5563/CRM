<?php
//The following are common functions for all models.

class Common_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('cx_functions'));
    }

    public $tablename;

    public function countTable()
    {
        return $this->db->count_all_results($this->tablename);
    }

    public function searchTable($field, $keywords)
    {
        return $this->db->like($field, $keywords)->get($this->tablename);
    }

    public function fetch($field, $keywords)
    {
        return $this->db->where($field, $keywords)->get($this->tablename);
    }

    public function fetchW2F($field1, $keyword1, $field2, $keyword2)
    {
        return $this->db->where($field1, $keyword1)->where($field2, $keyword2)->get($this->tablename);
    }

    public function fetchAll()
    {
        return $this->db->get($this->tablename);
    }

    public function doesExist($field, $keywords)
    {
        $query = $this->fetch($field, $keywords);
        return $query->num_rows() > 0 ? true : false;
    }

    public function doesExistW2F($f1,$k1,$f2,$k2)
    {
        $query = $this->fetchW2F($f1,$k1,$f2,$k2);
        return $query->num_rows() > 0 ? true : false;
    }

    public function deleteOne($field,$keywords)
    {
//        Make sure using the primary key to delete and $keywords is not null, otherwise many records may be deleted.
        $this->db->where($field, $keywords)->delete($this->tablename);
        return $this->db->affected_rows();
    }
}
