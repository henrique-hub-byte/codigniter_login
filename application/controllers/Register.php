<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
 public function index()
 {
    $this->load->view('register');
 }

 public function __construct()
 {
    parent::__construct();
    $this->load->database();
    $this->load->helper('url');
    $this->load->model('RegisterModel');
 }

 public function registrar()
 {
    $nome = $this->input->post('nome');
    $email = $this->input->post('email');
    $telefone = $this->input->post('telefone');
    $senha = $this->input->post('senha');

    //verifica se já existe o registro no banco
    $resultado_verificao = $this->RegisterModel->verificar_registro($email);

    
    if($resultado_verificao) {
        echo json_encode(array(
            'status' => 'success',
            'mensagem' => 'Usuario ja cadastrado com esse e-mail'
        ));
        return;
    }

    //insere o registro no banco de dados
    $resultado_insercao = $this->RegisterModel->inserir_registro($nome,$email,$telefone, $senha);

    if($resultado_insercao){
        echo json_encode(array(
            'status' => 'success',
            'mensagem' => 'Registro criado com sucesso na controller'
        ));
    } else {
        echo json_encode(array(
            'status' => 'não foi possivel criar o registro mestre'
        ));
    }

 }
}


?>