<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Scaletosap_model extends CI_Model
{   
    public function getdata($active_data)
    {
        $this->db->select("scale_id,aufnr,flvname,matidfg, matnr,matdesc,date,
        COUNT(if(stsgoreng='2',stsgoreng,null)) AS stsgoreng  ,COUNT( if(stpoact='2',stpoact,null)) as stpoact
         ,count(stsgoreng) as countgoreng, count(stpoact) as countpoact");
        $this->db->from('scaletosap');
        $this->db->where('date',$active_data);
        $this->db->group_by('aufnr');
        $this->db->group_by('matnr');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getdatawhere($po,$matnr,$date)
    {
        $this->db->select('*');
        $this->db->from('scaletosap');
        $this->db->where('matnr',$matnr);
        $this->db->where('aufnr',$po);
        $this->db->where('date',$date);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getdatasammery($start,$end)
    {
        $this->db->select('scale_id,aufnr,flvname,matidfg, matnr,matdesc,DATE, SUM(actweight) AS actweight');
        $this->db->from('scaletosap');
        $this->db->where("date BETWEEN '$start' AND '$end'");
        $this->db->group_by('matidfg');
        $this->db->group_by('matnr');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getdatasammery2($start,$end)
    {
        $this->db->select('scale_id, matnr,matdesc,DATE, SUM(actweight) AS actweight');
        $this->db->from('scaletosap');
        $this->db->where("date BETWEEN '$start' AND '$end'");
        $this->db->group_by('matnr');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getrows($start,$end)
    {
        $this->db->select('matdesc');
        $this->db->from('scaletosap');
        $this->db->where("date BETWEEN '$start' AND '$end'");
        $this->db->group_by('matnr');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function updateData($id, $data)
    {
        $this->db->where('scale_id', $id);
        $this->db->update('scaletosap', $data);
    }
    public function updateStgoreng($aufnr,$paketid,$data)
    {
        $this->db->where('aufnr', $aufnr);
        $this->db->where('paketid', $paketid);
        $this->db->update('scaletosap', $data);
    }
    public function insertData($data)
    {
        $this->db->insert('scaletosap', $data);
    }
    public function cekdata($po,$matnr){
        $this->db->select('count(paketid) as count');
        $this->db->from('scaletosap');
        $this->db->where('aufnr',$po);
        $this->db->where('matnr',$matnr);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function deleteData($ids)
    {
        $delete = true;
        if ($ids != null) {
            if (is_array($ids)) {
                $ids = $ids;
                $this->db->where_in('scale_id', $ids);
                $delete = $this->db->delete('scaletosap');
            }
        }

        return $delete;
    }
    public function deletePaket($ids, $poload, $paketload)
    {
        $query= $this->db->query("CALL DeletePaket('".$poload."','".$paketload."','".$ids."')");

        return $query;
    }

}