<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('saptoscale/daily');
        }

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Regio | Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {

            //validasi suskses
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $user = $this->db->query("SELECT * FROM sys_user  WHERE username =  '$username' AND password= '$password'")->row_array();

        if ($user != null) {
            $data = [
                'username' => $user['username'],
                'role_id' => $user['role_id'],
                'userid' => $user['id']

            ];
            $this->session->set_userdata($data);
             redirect('saptoscale/daily');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Wrong Password!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('userid');
        

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            &nbsp;&nbsp;&nbsp;&nbsp;Logged Out.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>'
        );
        redirect('auth');
    }
}
