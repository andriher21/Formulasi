<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Material_model extends CI_Model
{   
    public function getdata()
    {
        $this->db->select('*');
        $this->db->from('master_material');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function updateData($id, $data)
    {
        $this->db->where('materialid', $id);
        $this->db->update('master_material', $data);
    }
    public function insertData($data)
    {
        $this->db->insert('master_material', $data);
    }
    public function deleteData($ids)
    {
        $delete = true;
        if ($ids != null) {
            if (is_array($ids)) {
                $ids = $ids;
                $this->db->where_in('materialid', $ids);
                $delete = $this->db->delete('master_material');
            }
        }

        return $delete;
    }}