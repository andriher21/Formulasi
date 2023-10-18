<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        // $this->auth->restrict_module();
        $this->load->model('System_model', 'system');
    }

    public function index()
    {
        $data['sess'] = $this->db->get_where('sys_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'User Manager';
        $data['nav_url'] = 'ADMIN_USER';
        $data['content_scripts'][] = 'assets/js/systems/users/index.js';


        $data['users'] = $this->system->getUsr();
        $data['roles'] = $this->system->getRole();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('system/users/index', $data);
        $this->load->view('templates/footer');
    }

    public function insert()
    {
        $data = array(
            'fullname' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'role_id' => $this->input->post('role'),
        );
        $insert = $this->db->insert('sys_user', $data);
        $uri = $_SERVER['HTTP_REFERER'];
        redirect($uri);
    }

    public function edit()
    {
        if ($this->input->post('password') == null) {
            $data = array(
                'fullname' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'role_id' => $this->input->post('role'),
            );
        } else {
            $data = array(
                'fullname' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'role_id' => $this->input->post('role'),
            );
        }

        $id = $this->input->post('id');
        $this->db->where('user_id', $id);
        $insert = $this->db->update('sys_user', $data);
        $uri = $_SERVER['HTTP_REFERER'];
        redirect($uri);
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $delete = $this->system->delete($id);
        echo $delete;
        die();
    }
}
