<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReportTrash_Model extends CI_Model
{
    public function getdata($start,$end)
    {
        $this->db->select('*');
        $this->db->from('trash');
        $this->db->where("date BETWEEN '$start' AND '$end'");
        $query = $this->db->get();
        return $query->result_array();
    }
    public function deleteData($ids)
    {
        $delete = true;
        if ($ids != null) {
                $this->db->where_in('trash_id', $ids);
                $delete = $this->db->delete('trash');
            
        }

        return $delete;
    }

}