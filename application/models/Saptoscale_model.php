<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Saptoscale_model extends CI_Model
{   
    public function getdata($active_data)
    {
        $this->db->select('*');
        $this->db->from('saptoscale');
        $this->db->where('fdate',$active_data);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getwhere($id)
    {
        $this->db->select('*');
        $this->db->from('saptoscale');
        $this->db->where('sap_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function updateData($id, $data)
    {
        $this->db->where('sap_id', $id);
        $this->db->update('saptoscale', $data);
    }
    public function insertData($data)
    {
        $this->db->insert('saptoscale', $data);
    }
    public function deleteData($ids)
    {
        $delete = true;
        if ($ids != null) {
            if (is_array($ids)) {
                $ids = $ids;
                $this->db->where_in('sap_id', $ids);
                $delete = $this->db->delete('saptoscale');
            }
        }

        return $delete;
    }
    public function getrempah($shift,$date)
    {
        $this->db->select('saptoscale.*','master_material.materialkonversi');
        $this->db->from('saptoscale');
        $this->db->join('master_material','saptoscale.matnr = master_material.materialno','inner');
        $this->db->where('master_material.materialjenis','1');
        $this->db->where('saptoscale.shinfo',$shift);
        $this->db->where('saptoscale.fdate',$date);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getporempah($shift,$date)
    {
        $this->db->select('saptoscale.aufnr,saptoscale.flvdesc');
        $this->db->from('saptoscale');
        $this->db->join('master_material','saptoscale.matnr = master_material.materialno','inner');
        $this->db->where('master_material.materialjenis','1');
        $this->db->where('saptoscale.shinfo',$shift);
        $this->db->where('saptoscale.fdate',$date);
        $this->db->group_by('saptoscale.aufnr');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getmaterialrempah($aufnr)
    {
        $this->db->select('saptoscale.*,master_material.materialkonversi');
        $this->db->from('saptoscale');
        $this->db->join('master_material','saptoscale.matnr = master_material.materialno','inner');
        $this->db->where('master_material.materialjenis','1');
        $this->db->where('saptoscale.aufnr',$aufnr);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getaddictive($shift,$date)
    {
        $this->db->select('saptoscale.*,master_material.materialkonversi');
        $this->db->from('saptoscale');
        $this->db->join('master_material','saptoscale.matnr = master_material.materialno','inner');
        $this->db->where('master_material.materialjenis','2');
        $this->db->where('saptoscale.shinfo',$shift);
        $this->db->where('saptoscale.fdate',$date);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getpoaddictive($shift,$date)
    {
        $this->db->select('saptoscale.aufnr,saptoscale.flvdesc');
        $this->db->from('saptoscale');
        $this->db->join('master_material','saptoscale.matnr = master_material.materialno','inner');
        $this->db->where('master_material.materialjenis','2');
        $this->db->where('saptoscale.shinfo',$shift);
        $this->db->where('saptoscale.fdate',$date);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getmaterialaddictive($aufnr)
    {
        $this->db->select('saptoscale.*,master_material.materialkonversi');
        $this->db->from('saptoscale');
        $this->db->join('master_material','saptoscale.matnr = master_material.materialno','inner');
        $this->db->where('master_material.materialjenis','2');
        $this->db->where('saptoscale.aufnr',$aufnr);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getflavor($shift,$date)
    {
        $this->db->select('saptoscale.*');
        $this->db->from('saptoscale');
        $this->db->join('master_material','saptoscale.matnr = master_material.materialno','inner');
        $this->db->where('master_material.materialjenis','3');
        $this->db->where('saptoscale.shinfo',$shift);
        $this->db->where('saptoscale.fdate',$date);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getpoflavor($shift,$date)
    {
        $this->db->select('saptoscale.aufnr,saptoscale.flvdesc');
        $this->db->from('saptoscale');
        $this->db->join('master_material','saptoscale.matnr = master_material.materialno','inner');
        $this->db->where('master_material.materialjenis','3');
        $this->db->where('saptoscale.shinfo',$shift);
        $this->db->where('saptoscale.fdate',$date);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getmaterialflavor($aufnr)
    {
        $this->db->select('saptoscale.*,master_material.materialkonversi');
        $this->db->from('saptoscale');
        $this->db->join('master_material','saptoscale.matnr = master_material.materialno','inner');
        $this->db->where('master_material.materialjenis','3');
        $this->db->where('saptoscale.aufnr',$aufnr);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getPO(){
        $this->db->select('saptoscale.aufnr');
        $this->db->from('saptoscale');
        $this->db->join('master_material','saptoscale.matnr = master_material.materialno','inner');
        $this->db->where('master_material.materialjenis','4');
        $this->db->where('fdate BETWEEN "2021-01-01" AND "2023-07-19"');
        $this->db->group_by('saptoscale.aufnr');
        $query = $this->db->get();
        return $query->result_array(); 
    }
   
    public function getMaterial(){
        $this->db->select(' saptoscale.matnr');
        $this->db->from('saptoscale');
        $this->db->join('master_material','saptoscale.matnr = master_material.materialno','inner');
        $this->db->where('master_material.materialjenis','4');
        $this->db->where('fdate BETWEEN "2021-01-01" AND "2023-07-19"');
        $this->db->group_by('saptoscale.matnr');
        $query = $this->db->get();
        return $query->result_array(); 
    }
    public function autofill($aufnr,$matnr){
        $this->db->select('werks,flvid, flvdesc,fgbatch,matdesc,nop');
        $this->db->from('saptoscale');
        $this->db->where('saptoscale.aufnr',$aufnr);
        $this->db->where('saptoscale.matnr',$matnr);
        $query = $this->db->get();
        return $query->result_array(); 
    }
}