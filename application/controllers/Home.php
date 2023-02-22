<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('RegisterModel');
    }

    public function index()
    {
        $data['registers'] = $this->RegisterModel->getRegisters();
        $this->load->view('home', $data);
    }

    public function lista_registros()
    {
        $registers = $this->RegisterModel->getRegisters();
        header('Content-Type: application/json');
        echo json_encode($registers);
    }
}
