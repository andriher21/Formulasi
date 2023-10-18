<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReportSummary extends CI_Controller
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

        $data['title'] = 'Report Summary';
        $data['nav_url'] = 'ADMIN_SUMMARY';

        if ($start == null && $end == null) {
            $start = date('Y-m-01');
            $end = date('Y-m-d');
        }
        $data['start'] = date('d M Y',strtotime($start));
        $data['end'] = date('d M Y',strtotime($end));
        $data['report'] = $this->scale->getdatasammery($start,$end);
        $data['report2'] = $this->scale->getdatasammery2($start,$end);
        // $data['row'] = $this->scale->getrows($start,$end);
        $data['content_scripts'][] = 'assets/js/Summary/index.js';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('reportsummary/index', $data);
        $this->load->view('templates/footer');}
        else{
            redirect('auth');
        }
    }
    public function printReportSummary( $start = null, $end = null)
    {
        $data['start'] = date('d M Y',strtotime($start));
        $data['end'] = date('d M Y',strtotime($end));
        $data['report'] = $this->scale->getdatasammery($start,$end);
        $data['report2'] = $this->scale->getdatasammery2($start,$end);

        $this->load->view('reportsummary/print_report', $data);
    }
    public function exportCsv($start = null, $end = null)
    {
       
        $data['start'] = date('d M Y',strtotime($start));
        $data['end'] = date('d M Y',strtotime($end));
        $report = $this->scale->getdatasammery($start,$end);
        $report2 = $this->scale->getdatasammery2($start,$end);

        // $data = $this->users->getReportDaily($role_id, $date, $shift);

        $list = [];
        $list[] = [];
        $list[] = ['DATE', ': ' . date('d M Y',strtotime($start)).'-'.date('d M Y',strtotime($end)).''];
        $list[] = ['Weight Finish Good'];
        $header = ['No','FG Name', 'Material Name', 'Weight'];
        $list[] = $header;

        foreach ($report as $key => $d) {

            $row = [
                ($key + 1),
                $d['flvname'],
                $d['matdesc'],
                $d['actweight'],
            ];

            $list[] = $row;
        }
        $list[] = [];
        $list[] = [];
        $list[] = ['Weight Material'];
        $header = ['No','Material Name','Weight'];
        $list[] = $header;
        foreach ($report2 as $key => $d) {

            $row = [
                ($key + 1),
                $d['matdesc'],
                $d['actweight'],
            ];

            $list[] = $row;
        }
        $f = fopen('php://memory', 'w');

        foreach ($list as $fields) {
            fputcsv($f, $fields, ";");
        }

        // reset the file pointer to the start of the file
        fseek($f, 0);

        // tell the browser it's going to be a csv file
        header('Content-Type: application/csv');
        // tell the browser we want to save it instead of displaying it
        header('Content-Disposition: attachment; filename="' . $start .'-'.$end.'  Report.csv";');
        // make php send the generated csv lines to the browser
        fpassthru($f);
        fclose($f);
    }
    public function delete()
    {
        $id = $this->input->post('id');
        $delete = $this->trash->deleteData($id);
        echo $delete;
        die();
    }
}