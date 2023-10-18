<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loadpaket_model extends CI_Model
{
    public function getdata()
    {
        $this->db->select('*');
        $this->db->from('paketload');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function deleteData($ids)
    {
        $delete = true;
        if ($ids != null) {
                $this->db->where_in('active_id', $ids);
                $delete = $this->db->delete('paketload');
            
        }

        return $delete;
    }

}