<?php

class Home extends Controller
{
    protected $models = 'Transaksi_model';

    public function index()
    {
        $data = $this->model($this->models)->getTransaction();
        $response=array(
            'status' => 1,
            'message' =>'Success',
            'data' => $data
         );
        header('Content-Type: application/json');
        echo json_encode($response);

    }
}
