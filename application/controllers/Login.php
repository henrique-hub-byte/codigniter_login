<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function index()
    {

        $this->load->view('login');
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('LoginModel');
    }

    public function logar()
    {
        $email = $this->input->post('email');
        $senha = $this->input->post('senha');

        // Verifica se o usuário existe no banco de dados
        $resultado_verificacao = $this->LoginModel->verificar_usuario($email, $senha);

        $retorno = json_decode($resultado_verificacao, true);

        if ($retorno['status'] == 'success') {
            $mensagem = $retorno['mensagem'];
            $url_redirecionamento = base_url('home');
            $retorno = array('status' => 'success', 'mensagem' => $mensagem, 'redirect_url' => $url_redirecionamento);
        } else {
            $mensagem = $retorno['mensagem'];
            $retorno = array('status' => 'error', 'mensagem' => $mensagem);
        }
    
        header('Content-Type: application/json');
        echo json_encode($retorno);
    }
}
