<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReportTrash extends CI_Controller
{
public function __construct()
    {
        parent::__construct();
        //Do your magic here
        // $this->auth->restrict_module();
        // $this->load->model('Saptoscale_model', 'sap');
    }
    public function daily($start=null,$end=null)
    { if($this->session->userdata('username')){
        $data['sess'] = $this->db->get_where('sys_user', ['username' => $this->session->userdata('username')])->row_array();

        $data['title'] = 'Report Trash';
        $data['nav_url'] = 'ADMIN_TRASH';

        if ($start == null && $end == null) {
            $start = date('Y-m-d');
            $end = date('Y-m-d');
        }
        $data['start'] = date('d M Y',strtotime($start));
        $data['end'] = date('d M Y',strtotime($end));
        $data['report'] = $this->trash->getdata($start,$end);
        $data['content_scripts'][] = 'assets/js/Trash/index.js';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('reporttrash/index', $data);
        $this->load->view('templates/footer');}
        else{
            redirect('auth');
        }
    }
    public function delete()
    {
        $id = $this->input->post('id');
        $delete = $this->trash->deleteData($id);
        echo $delete;
        die();
    }
}