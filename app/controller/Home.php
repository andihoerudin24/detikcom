<?php

class Home extends Controller
{
    protected $models = 'Transaksi_model';

    public function index()
    {
        $data = $this->model($this->models)->getTransaction();
        $response = array(
            'status' => 1,
            'message' => 'Success',
            'data' => $data
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function addTransaction()
    {
        if ($this->model($this->models)->add($_POST) > 0) {
            $lastdata=$this->model($this->models)->lastdata();
            $response = array(
                'status' => 1,
                'message' => 'Success',
                'data' =>$lastdata
                
            );
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $response = array(
                'status' => FALSE,
                'message' => 'GAGAL INSERT TRANSACTION MASUKAN DATA SEPERTI CONTOH DI POSTMAN  YANG SUDAH DI BUAT'
                
            );
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }


    public function GetStatusTransaksi($references_id = null, $merchant_id = null)
    {
        if (!empty($references_id) && !empty($merchant_id)) {
            $data = $this->model($this->models)->getStatusTransaski($references_id, $merchant_id);
            $response = array(
                'status' => 1,
                'message' => 'Success',
                'data' => $data
            );
            header('Content-Type: application/json');
            echo json_encode($response);
        }else {
            $response = array(
                'status' => FALSE,
                'message' => 'references_id and merchant_id NOT FOUND',
            );
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }

    public function updatetransaction()
    {
        if ($this->model($this->models)->update($_POST) > 0) {
            $lastdata=$this->model($this->models)->lastupdate($_POST);
            $response = array(
                'status' => 1,
                'message' => 'Success',
                'data' =>$lastdata
                
            );
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $response = array(
                'status' => FALSE,
                'message' => 'GAGAL UPDATE TRANSACTION MASUKAN DATA SEPERTI CONTOH DI POSTMAN  YANG SUDAH DI BUAT'
                
            );
            header('Content-Type: application/json');
            echo json_encode($response);
        }      
    }
}
