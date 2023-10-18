<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Material extends CI_Controller
{
public function __construct()
    {
        parent::__construct();
        //Do your magic here
        // $this->auth->restrict_module();
    
    }
    public function index()
    { if($this->session->userdata('username')){
        $data['sess'] = $this->db->get_where('sys_user', ['username' => $this->session->userdata('username')])->row_array();

        $data['title'] = 'Material';
        $data['nav_url'] = 'ADMIN_MATERIAL';

        // $data['user'] = $this->users->getData($role_id);
        $data['material'] = $this->material->getdata();
        $data['content_scripts'][] = 'assets/js/material/index.js';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('material/index', $data);
        $this->load->view('templates/footer');}
        else{
            redirect('auth');
        }
    }
    public function add()
    {
        $data = array(
            'materialno' => $this->input->post('materialno'),
            'materialname' => $this->input->post('materialname'),
            'materialjenis' => $this->input->post('materialjenis'),
            'materialkonversi' => $this->input->post('materialkonversi'),
            'materialsttimbang' => $this->input->post('materialsttimbang'),
        );

        $this->material->insertData($data);
        $uri = $_SERVER['HTTP_REFERER'];
        redirect($uri);
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $data = array(
            'materialno' => $this->input->post('materialno'),
            'materialname' => $this->input->post('materialname'),
            'materialjenis' => $this->input->post('materialjenis'),
            'materialkonversi' => $this->input->post('materialkonversi'),
            'materialsttimbang' => $this->input->post('materialsttimbang'),
        );

        $this->material->updateData($id, $data);

        $uri = $_SERVER['HTTP_REFERER'];
        redirect($uri);
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $delete = $this->material->deleteData($id);
        echo $delete;
        die();
    }   
     public function readCSV()
    {
        $path = 'uploads/';

        $config['upload_path'] = $path;
        $config['allowed_types'] = 'csv';
        $config['max_size']  = '2048';
        $config['overwrite'] = true;
        $config['file_name'] = 'file';

        $this->load->library('upload', $config);
        if ($this->upload->do_upload("file")) {
            $data = array('upload_data' => $this->upload->data());

            $filename = $data['upload_data']['file_name'];

            $path = $path . '/' . $filename;
            $file = fopen($path, "r");
            $delimiter = detectCSVFileDelimiter($path);
            $products = array();
            while (!feof($file)) {
                $products[] = fgetcsv($file, 0, $delimiter);
            }

            // arrange data
            $header = array('no','name','jenis','status','konversi');
            $row = 0;
            $data = [];
            foreach ($products as $key => $product) {
                foreach ($header as $key => $head) {
                    if (isset($product[$key]) && $product[$key] != 'N0' && $product[$key] != 'NAME'&&$product[$key] != 'JENIS'
                    &&$product[$key] != 'STATUS' &&$product[$key] != 'KONVERSI'&& $product[$key] != 'No.' 
                    && $product[$key] != 'No' && $product[$key] != 'Name'&& $product[$key] != 'Jenis'
                    &&$product[$key] != 'Status' &&$product[$key] != 'Konversi'
                    && trim($product[$key]) != '') {
                        $data[$row][$head] = $product[$key];
                    }
                }
                $row++;
            }
            fclose($file);
            unlink($path);

            echo json_encode(array_values($data));
            return;
            // $this->session->set_userdata('import-material', $data);
            
        } else {
            echo [
                'error' => $this->upload->display_errors()
            ];
        }
    }
    public function doImport()
    {
        $material = $this->input->post('data');

        $data = array();
        for ($i = 0; $i < count($material); $i++) {
        if($material[$i]['materialjenis']=='Rempah'){
            $jenis='1';
        }
        elseif($material[$i]['materialjenis']=='Additive'){
            $jenis='2';
        }
        elseif($material[$i]['materialjenis']=='Flavor'){
            $jenis='3';
        }
        elseif($material[$i]['materialjenis']=='Olein'){
            $jenis='4';
        }
        if($material[$i]['materialsttimbang'] =='Ditimbang'){
            $status='0';
        }
        elseif($material[$i]['materialsttimbang']=='Tidak Ditimbang'){
            $status='1';
        }
        
        
            $data[] = array(
                'materialno' => $material[$i]['materialno'],
                'materialname' => $material[$i]['materialname'],
                'materialjenis' => $jenis,
                'materialkonversi' => $material[$i]['materialkonversi'],
                'materialsttimbang' => $status,
            );
        }

        $save = $this->db->insert_batch('master_material', $data);
        echo $save;
        die();
    }
}