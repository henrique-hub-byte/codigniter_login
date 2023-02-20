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
        $this->load->model('UsuarioModel');
    }

    public function logar()
    {
        $email = $this->input->post('email');
        $senha = $this->input->post('senha');

        /* $dados = array(
           // 'idusuario' => 4,
            'email' => $email,
            'senha' => md5($senha)
        ); */

        // Verifica se o usuário existe no banco de dados
        $resultado_verificacao = $this->UsuarioModel->verificar_usuario($email, $senha);

        if ($resultado_verificacao) {
            echo json_encode(array('status' => 'success', 'mensagem' => 'Usuario autenticado com sucesso'));
            return;
        }

        // Insere o usuário no banco de dados
        $resultado_insercao = $this->UsuarioModel->inserir_usuario($email, $senha);

        if ($resultado_insercao) {
            echo json_encode(array('status' => 'success', 'mensagem' => 'Usuario criado com sucesso dentro da controller'));
        } else {
            echo json_encode(array('status' => 'error', 'mensagem' => 'Não foi possível criar o usuario mestre'));
        }
    }
}
