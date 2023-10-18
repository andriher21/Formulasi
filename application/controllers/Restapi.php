<?php
defined('BASEPATH') OR exit('No direct script access allowed');


use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RESTController.php';
require APPPATH . 'libraries/Format.php';

class RestApi extends RESTController
{   public function __construct()
    {   header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();
        //Do your magic here
        // $this->auth->restrict_module();
       
    }
    public function porempah_get(){
        $shift = $this->get('shift');
        $date = $this->get('date');
        if($shift != NULL && $date != null){
            $data = $this->sap->getporempah($shift,$date);
            if($data != null ){
                $this->response($data, RESTController::HTTP_OK);
            }
            else{
                $this->response([(object)[]], RESTController::HTTP_NOT_FOUND);
            }
        }
        else{
            $this->response([ (object)[]], RESTController::HTTP_NOT_FOUND);
        }
    }
    public function materialrempah_get(){
        $aufnr = $this->get('aufnr');
        if($aufnr != NULL) {
            $data = $this->sap->getmaterialrempah($aufnr);
            if($data != null ){
                $this->response($data, RESTController::HTTP_OK);
            }
            else{
                $this->response([(object)[]], RESTController::HTTP_NOT_FOUND);
            }
        }
        else{
            $this->response([ (object)[]], RESTController::HTTP_NOT_FOUND);
        }
    }
    public function poaddictive_get(){
        $shift = $this->get('shift');
        $date = $this->get('date');
        if($shift != NULL && $date != null){
            $data = $this->sap->getpoaddictive($shift,$date);
            if($data != null ){
                $this->response($data, RESTController::HTTP_OK);
            }
            else{
                $this->response([], RESTController::HTTP_NOT_FOUND);
            }
        }
        else{
            $this->response([], RESTController::HTTP_NOT_FOUND);
        }
    }
    public function materialaddictive_get(){
        $aufnr = $this->get('aufnr');
        if($aufnr != NULL) {
            $data = $this->sap->getmaterialaddictive($aufnr);
            if($data != null ){
                $this->response($data, RESTController::HTTP_OK);
            }
            else{
                $this->response([(object)[]], RESTController::HTTP_NOT_FOUND);
            }
        }
        else{
            $this->response([ (object)[]], RESTController::HTTP_NOT_FOUND);
        }
    }
    public function poflavor_get(){
        $shift = $this->get('shift');
        $date = $this->get('date');
        if($shift != NULL && $date != null){
            $data = $this->sap->getpoflavor($shift,$date);
            if($data != null ){
                $this->response($data, RESTController::HTTP_OK);
            }
            else{
                $this->response([(object)[]], RESTController::HTTP_NOT_FOUND);
            }
        }
        else{
            $this->response([ (object)[]], RESTController::HTTP_NOT_FOUND);
        }
    }
    public function materialflavor_get(){
        $aufnr = $this->get('aufnr');
        if($aufnr != NULL) {
            $data = $this->sap->getmaterialflavor($aufnr);
            if($data != null ){
                $this->response($data, RESTController::HTTP_OK);
            }
            else{
                $this->response([(object)[]], RESTController::HTTP_NOT_FOUND);
            }
        }
        else{
            $this->response([ (object)[]], RESTController::HTTP_NOT_FOUND);
        }
    }
    public function cekdata_get(){
        $po = $this->get('aufnr');
        $matnr = $this->get('matnr');
        if($po != NULL && $matnr != null){
            $data = $this->scale->cekdata($po,$matnr);
            if($data != null ){
                $this->response($data, RESTController::HTTP_OK);
            }
            else{
                $this->response([(object)[]], RESTController::HTTP_NOT_FOUND);
            }
        }
        else{
            $this->response([ (object)[]], RESTController::HTTP_NOT_FOUND);
        }
    }
    public function scale_post(){
      
        $data = array(
            'aufnr' => $this->post('aufnr'),
            'werks' => $this->post('werks'),
            'matnr' => $this->post('matnr'),
            'matdesc' => $this->post('matdesc'),
            'paketid' => $this->post('paketid'),
            'actweight' => $this->post('actweight'),
            'matlotno' => $this->post('matlotno'),
            'tstamp' => date("Y-m-d H:i:s"),
            'matidfg' => $this->post('flvid'),
            'fgbatch' => $this->post('fgbatch'),
            'flvname' => $this->post('flvdesc'),
            'date' => date('Y-m-d'),);
            $add=$this->scale->insertData($data);
            if($add==null ){
                $this->response([
                    'status'=> 1,
                    'message'=>'berhasil disimpan'
                ], RESTController::HTTP_CREATED); 
            }
            else 
            {
                $this->response([
                    'status'=> 2,
                    'message' => 'data tidak berhasil disimpan'
                ], RESTController::HTTP_BAD_REQUEST);
            }
        

    }

}