<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getData($role_id)
    {
        if ($role_id == '6') {
            $this->db->select('sys_user.*, sys_departements.name');
            $this->db->from('sys_users');
            $this->db->join('sys_departements', 'sys_departements.id = sys_users.departement_id', 'left');
            $this->db->where('sys_users.role_id', $role_id);
            $this->db->where_not_in('sys_users.departement_id', '8');
            $query = $this->db->get();
            return $query->result_array();
        } else if ($role_id == '7') {
            $this->db->select('sys_users.*, sys_departements.name');
            $this->db->from('sys_users');
            $this->db->join('sys_departements', 'sys_departements.id = sys_users.departement_id', 'left');
            $this->db->where('sys_users.role_id', $role_id);
            $this->db->where_not_in('sys_users.departement_id', '8');
            $query = $this->db->get();
            return $query->result_array();
        } else if ($role_id == '8') {
            $sql = "SELECT u.*, c.card_number
                    FROM sys_users u
                    LEFT JOIN sys_cards c ON u.pid = c.pid
                    WHERE 1=1 AND u.role_id = 8
                    ORDER BY u.id ASC";
            $result = $this->db->query($sql)->result_array();
            return $result;
        }
    }

    public function getDept()
    {
        $this->db->select('id, name');
        $this->db->from('sys_departements');
        // $this->db->where_not_in('id', '8');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getSch()
    {
        $this->db->select('sys_sch_users.*, sys_departements.id, sys_departements.name, sys_users.departement_id, sys_users.pid, sys_users.nama');
        $this->db->from('sys_sch_users');
        $this->db->join('sys_users', 'sys_sch_users.nik = sys_users.pid', 'left');
        $this->db->join('sys_departements', 'sys_users.departement_id = sys_departements.id', 'left');
        $this->db->where_not_in('sys_departements.id', '8');
        $this->db->group_by('sys_sch_users.nik');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insertData($data)
    {
        $this->db->insert('sys_users', $data);
    }

    public function insertDept($data)
    {
        $insert = array(
            'name' => $data,
            'mdb' => '1',
            'mdd' => date("Y-m-d h:i:s")
        );

        $this->db->insert('sys_departements', $insert);
    }

    public function updateDept($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('sys_departements', $data);
    }

    public function deleteDept($ids)
    {
        $delete = true;
        if ($ids != null) {
            if (is_array($ids)) {
                $ids = $ids;
                $this->db->where_in('id', $ids);
                $delete = $this->db->delete('sys_departements');
            }
        }
        return $delete;
    }

    public function updateUsr($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('sys_users', $data);
    }

    public function updateUsrAccu($id, $data)
    {
        $this->db->where('user_id', $id);
        $this->db->update('sys_data_accu', $data);
    }

    public function deleteUsr($ids)
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

    public function getCard()
    {
        $this->db->select('*');
        $this->db->from('sys_cards');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function unset($id)
    {
        $this->db->set('pid', NULL);
        $this->db->where('id', $id);
        $this->db->update('sys_users');
    }
    public function updateCard($id, $pid, $expired)
    {
        $this->db->set('pid', $pid);
        $this->db->set('expired', $expired);
        $this->db->where('id', $id);
        $this->db->update('sys_users');
    }
}
