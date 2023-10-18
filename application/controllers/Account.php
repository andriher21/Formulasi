<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        // $this->auth->restrict_module();
        $this->load->model('Dashboard_model', 'dashboard');
    }

    public function index()
    {
        $data['sess'] = $this->db->get_where('sys_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'User Manager';
        $data['nav_url'] = '';

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('account', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $id = $this->input->post('id');
        $data = array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        );

        $this->db->where('user_id', $id);
        $this->db->update('sys_user', $data);
        $uri = $_SERVER['HTTP_REFERER'];
        redirect($uri);
    }
}
