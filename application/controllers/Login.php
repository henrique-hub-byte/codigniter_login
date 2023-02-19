<?php 
defined('BASEPATH' OR exit('No direct script access allowed'));

class Login extends CI_Controller {
    
    public function index()
	{
		$this->load->view('login');
	}

    public function logar()
    {
        $this->load->model('UsuarioModel');
        $email = $this->input->post('email');
        $senha = $this->input->post('senha');
        $resultado = $this->UsuarioModel->verificar_usuario($email, $senha);
        if($resultado){
            echo json_encode(array('status' => 'success', 'mensagem' => 'Usuário autenticado com sucesso'));
        }else {
            echo json_encode(array('status' => 'error', 'mensagem' => 'Usuário ou senha inválidos'));
        }
    }
}
?>