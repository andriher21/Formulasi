<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Scaletosap extends CI_Controller
{
public function __construct()
    {
        parent::__construct();
        //Do your magic here
        // $this->auth->restrict_module();
        // $this->load->model('Scaletosap_model', 'scale');
    }
    public function daily($active_date=null)
    { if($this->session->userdata('username')){
        $data['sess'] = $this->db->get_where('sys_user', ['username' => $this->session->userdata('username')])->row_array();

        $data['title'] = 'Scale to SAP';
        $data['nav_url'] = 'ADMIN_SCALETOSAP';

        // $role_id = '6';

        $today = getActiveDate();
        if ($active_date == null) {
            $active_date = $today;
        }
        $data['dates'] = $active_date;
        $data['active_date'] = date('d M Y',strtotime($active_date));
        $data['prev_date_uri'] = site_url('scaletosap/daily/') . date('Y-m-d', strtotime($active_date . '-1 DAY'));
        $data['next_date_uri'] = site_url('scaletosap/daily/') . date('Y-m-d', strtotime($active_date . '+1 DAY'));
        $data['scale'] = $this->scale->getdata($active_date);
        $data['po']= $this->sap->getPO();
        $data['material']= $this->sap->getMaterial();
        $data['content_scripts'][] = 'assets/js/Scale/index.js';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Scaletosap/index', $data);
        $this->load->view('templates/footer');}
        else{
            redirect('auth');
        }
    }
    public function detail($po,$matnr, $active_date){
        if($this->session->userdata('username')){
            $data['sess'] = $this->db->get_where('sys_user', ['username' => $this->session->userdata('username')])->row_array();
    
            $data['title'] = 'Detail Data';
            $data['nav_url'] = 'ADMIN_SCALETOSAP';
            $data['dates'] = $active_date;
            $data['active_date'] = date('d M Y',strtotime($active_date));
            $data['scale'] = $this->scale->getdatawhere($po,$matnr,$active_date);
            $data['content_scripts'][] = 'assets/js/Scale/detail.js';
    
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('Scaletosap/detail', $data);
            $this->load->view('templates/footer');}
            else{
                redirect('auth');
            }
        
    }
    public function add()
    {       
        if($this->input->post('wnumact')==null){
        $data = array(
            'aufnr' => $this->input->post('aufnr'),
            'werks' => $this->input->post('werks'),
            'matnr' => $this->input->post('matnr'),
            'matdesc' => $this->input->post('matdesc'),
            'paketid' => $this->input->post('paketid'),
            'actweight' => $this->input->post('actweight'),
            'matlotno' => $this->input->post('matlotno'),
            'stsgoreng' => $this->input->post('stsgoreng'),
            'tstamp' => date("Y-m-d H:i:s"),
            'matidfg' => $this->input->post('matidfg'),
            'fgbatch' => $this->input->post('fgbatch'),
            'flvname' => $this->input->post('flvname'),
            'date' => date('Y-m-d'),);
            $this->scale->insertdata($data);
            }
            else{
                $aufnr = $this->input->post('aufnr');
                $paketid = $this->input->post('paketid');
                $d = $d = array(
                    'wnumact' => $this->input->post('wnumact')
                );
                $data = array(
                    'aufnr' => $this->input->post('aufnr'),
                    'werks' => $this->input->post('werks'),
                    'matnr' => $this->input->post('matnr'),
                    'matdesc' => $this->input->post('matdesc'),
                    'paketid' => $this->input->post('paketid'),
                    'actweight' => $this->input->post('actweight'),
                    'matlotno' => $this->input->post('matlotno'),
                    'stsgoreng' => $this->input->post('stsgoreng'),
                    'tstamp' => date("Y-m-d H:i:s"),
                    'matidfg' => $this->input->post('matidfg'),
                    'fgbatch' => $this->input->post('fgbatch'),
                    'flvname' => $this->input->post('flvname'),
                    'date' => date('Y-m-d'),
                    'wnumact'=> $this->input->post('wnumact')
                );  
                $this->scale->insertdata($data);
                $this->scale->updateStgoreng($aufnr,$paketid,$d);
            }
        
        if ($this->input->post('stsgoreng') == '2'){
            $d = array(
                'stsgoreng' => '2'
            );
            $aufnr = $this->input->post('aufnr');
            $paketid = $this->input->post('paketid');
            $this->scale->updateStgoreng($aufnr,$paketid,$d);
        }
        $uri = $_SERVER['HTTP_REFERER'];
        redirect($uri);
    }
    public function editlot()
    {
        $id = $this->input->post('id');
        $data = array(
            'matlotno' => $this->input->post('matlot'),
        );

        $this->scale->updatedata($id, $data);
        

        $uri = $_SERVER['HTTP_REFERER'];
        redirect($uri);
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $data = array(
            'aufnr' => $this->input->post('aufnr'),
            'werks' => $this->input->post('werks'),
            'matnr' => $this->input->post('matnr'),
            'matdesc' => $this->input->post('matdesc'),
            'paketid' => $this->input->post('paketid'),
            'actweight' => $this->input->post('actweight'),
            'matlotno' => $this->input->post('matlotno'),
            'stsgoreng' => $this->input->post('stsgoreng'),
            'tstamp' => date("Y-m-d H:i:s"),
            'matidfg' => $this->input->post('matidfg'),
            'fgbatch' => $this->input->post('fgbatch'),
            'flvname' => $this->input->post('flvname'),
        );

        $this->scale->updatedata($id, $data);
        

        $uri = $_SERVER['HTTP_REFERER'];
        redirect($uri);
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $delete = $this->scale->deleteData($id);
        echo $delete;
        die();
    }
    public function activepaket()
    {
        $data = $this->active->getData();
        $d = json_encode($data);    
        echo $d;
        return;
    }
    public function finish(){
         $data = $this->input->post('data');
        for ($i = 0; $i < count($data); $i++) {
            $deleteactive = $this->active->deleteData($data[$i]['active_id']);
            echo $data[$i]['active_id'];
        }
        // echo $deleteactive;
        die();
    }
    public function autofill(){
        $aufnr = $this->input->post('aufnr');
        $matnr = $this->input->post('matnr');
        $data = $this->sap->autofill($aufnr,$matnr);
         $d =json_encode($data);
        echo $d;
         return;
    }
    public function loadpaket()
    {
        $data = $this->proses->getData();
        $d = json_encode($data);    
        echo $d;
        return;
    }
    public function deletepaket(){
         $data = $this->input->post('data');
        for ($i = 0; $i < count($data); $i++) {
            $deleteactive = $this->scale->deletePaket($data[$i]['id'],$data[$i]['poload'],$data[$i]['paketload']);
            // echo $data[$i]['active_id'];
        }
        // echo $deleteactive;
        die();
    }
}