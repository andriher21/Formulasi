<?php
defined('BASEPATH') or exit('No direct script access allowed');

class System_model extends CI_Model
{
    public function getData()
    {
        $this->db->select('*');
        $this->db->from('att_log');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getErr()
    {
        $this->db->select('*');
        $this->db->from('sys_err');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getUsr()
    {
        $this->db->select('sys_user.*, sys_roles.name');
        $this->db->from('sys_user');
        $this->db->join('sys_roles', 'sys_roles.roles_id = sys_user.role_id');
        // $this->db->where_not_in('sys_users.role_id', '1');
        $this->db->where('sys_user.username !=', NULL);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getRole()
    {
        $this->db->select('*');
        $this->db->from('sys_roles');

        $query = $this->db->get()->result_array();
        return $query;
    }

    public function delete($ids)
    {
        $delete = true;
        if ($ids != null) {
            if (is_array($ids)) {
                $ids = $ids;
                $this->db->where_in('id', $ids);
                $delete = $this->db->delete('sys_users');
            }
        }

        return $delete;
    }

    public function getGateStatus(){
        $this->db->select('*');
        $this->db->from('gate_status');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getAttLog($start, $end)
    {
        $this->db->select('*');
        $this->db->from('att_log');
        $this->db->where('date_format(scan_date, "%Y-%m-%d") >=', $start);
        $this->db->where('date_format(scan_date, "%Y-%m-%d") <=', $end);
        $query = $this->db->get()->result_array();
        return $query;
    }
}
