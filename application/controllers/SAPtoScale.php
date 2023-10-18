<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SAPtoScale extends CI_Controller
{
public function __construct()
    {
        parent::__construct();
        //Do your magic here
        // $this->auth->restrict_module();
        // $this->load->model('Saptoscale_model', 'sap');
    }
    public function daily($active_date=null)
    { if($this->session->userdata('username')){
        $data['sess'] = $this->db->get_where('sys_user', ['username' => $this->session->userdata('username')])->row_array();

        $data['title'] = 'SAP to Scale';
        $data['nav_url'] = 'ADMIN_SAPTOSCALE';

        // $role_id = '6';

        $today = getActiveDate();
        if ($active_date == null) {
            $active_date = $today;
        }
        $data['dates'] = $active_date;
        $data['active_date'] = date('d M Y',strtotime($active_date));
        $data['prev_date_uri'] = site_url('saptoscale/daily/') . date('Y-m-d', strtotime($active_date . '-1 DAY'));
        $data['next_date_uri'] = site_url('saptoscale/daily/') . date('Y-m-d', strtotime($active_date . '+1 DAY'));
        $data['sap'] = $this->sap->getdata($active_date);
        $data['content_scripts'][] = 'assets/js/SAP/index.js';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('SAPtoScale/index', $data);
        $this->load->view('templates/footer');}
        else{
            redirect('auth');
        }
    }

    public function selectwhere(){
        $id = $this->input->post('id');
        $data = $this->sap->getWhere($id);
        echo json_encode($data);
        return;
    }
    public function add()
    {
        $data = array(
            'aufnr' => $this->input->post('aufnr'),
            'werks' => $this->input->post('werks'),
            'flvid'=> $this->input->post('flvid'),
            'flvdesc'=> $this->input->post('flvdesc'),
            'group' => $this->input->post('group'),
            'fgbatch'=> $this->input->post('fgbatch'),
            'frymch'=> $this->input->post('frymch'),
            'shinfo'=> $this->input->post('shinfo'),
            'fdate'=> date('Y-m-d'),
            'wosts'=> $this->input->post('wosts'),
            'nob'=> $this->input->post('nob'),
            'pff'=> $this->input->post('pff'),
            'nop'=> $this->input->post('nop'),
            'matnr'=> $this->input->post('matnr'),
            'matdesc'=> $this->input->post('matdesc'),
            'tweight'=> $this->input->post('tweight'),
            'twqty'=> $this->input->post('twqty'),
            'tperpaket'=> $this->input->post('tperpaket'),
            'stssend'=> $this->input->post('stssend'),
            'tstamp'=> date("Y-m-d H:i:s"),);

        $this->sap->insertdata($data);
        $uri = $_SERVER['HTTP_REFERER'];
        redirect($uri);
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $data = array(
            'alertdescript' => $this->input->post('desc')
        );

        $this->master->updatealert($id, $data);

        $uri = $_SERVER['HTTP_REFERER'];
        redirect($uri);
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $delete = $this->sap->deleteData($id);
        echo $delete;
        die();
    }
}