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
        $this->load->helper('form');
        $this->load->library('form_validation');
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

        if ($resultado_verificao) {
            echo json_encode(array(
                'status' => 'success',
                'mensagem' => 'Usuario ja cadastrado com esse e-mail'
            ));
            return;
        }

        //insere o registro no banco de dados
        $resultado_insercao = $this->RegisterModel->inserir_registro($nome, $email, $telefone, $senha);

        if ($resultado_insercao) {
            echo json_encode(array(
                'status' => 'success',
                'mensagem' => 'Registro criado com sucesso na controller',
                'redirect' => base_url('login')
            ));
        } else {
            echo json_encode(array(
                'status' => 'não foi possivel criar o registro mestre'
            ));
        }
    }

    public function carregar_registro($id) {
        // Carrega o registro do banco de dados
        $register = $this->RegisterModel->getRegisters($id);
    
        // Verifica se o registro existe
        if (!$register) {
            // Registro não encontrado
            print_r(!$register);
            show_error("Registro não encontrado");
            // ou redireciona para a página inicial
            // redirect('Home/index');
        }
    
        // Carrega a view de atualização e passa os dados do registro como parâmetro
        $data['register'] = $register;
        $this->load->view('updateRegisters', $data);
    }

    public function atualizar_registro($id)
    {
        // Carrega o registro do banco de dados
        $register = $this->RegisterModel->getRegisters($id);
        // Verifica se o registro existe
        if (!$register) {
            // Registro não encontrado
            show_error("Registro não encontrado");
            // ou redireciona para a página inicial
            // redirect('Home/index');
        }

        // Obtém os dados do formulário
        $data = array(
            'nome' => $this->input->post('nome'),
            'email' => $this->input->post('email'),
            'telefone' => $this->input->post('telefone'),
            'senha' => $this->input->post('senha')
        );

        // Verifica se os dados do formulário são válidos
        if (!$data) {
            
            // Se os dados do formulário não forem válidos, envia uma resposta em formato JSON com um campo 'success' igual a false
            $response = array('success' => false, 'message' => 'Dados inválidos');
            echo json_encode($response);
            return;
        }
        var_dump($data);
        // Atualiza o registro no banco de dados
        $this->RegisterModel->atualizar_registro($id, $data);

        // Envia uma resposta em formato JSON com um campo 'success' igual a true
        $response = array('success' => true, 'message' => 'Registro atualizado com sucesso');
        echo json_encode($response);
    }
}
