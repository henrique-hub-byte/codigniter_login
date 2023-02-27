<?php
defined('BASEPATH' or exit('No direct script access allowed'));

class LoginModel extends CI_Model
{

    public function inserir_usuario($email, $senha)
    {
        $dados = array(
            'email' => $email,
            'senha' => md5($senha)
        );
        
        $this->db->insert('login', $dados);

        return $this->db->affected_rows() > 0;
    }

    public function verificar_usuario($email, $senha)
    {
        
        $this->db->select('*');
        $this->db->from('login');
        $this->db->join('register', 'login.id = register.id');
        $this->db->where('login.email', $email);
        $this->db->where('login.senha', md5($senha));
        $query = $this->db->get();
        if($query->num_rows() == 1){
            $usuario = $query->row();
            $data = array(
                'status' => 'success',
                'mensagem' => 'usuario autenticado com sucesso',
                'usuario' => $usuario
            );
            
            return json_encode($data);
            
        } else if($query->num_rows() == 0) {
            $data = array(
                'status' => 'error',
                'mensagem' => 'Usuário ou senha inválidos'
            );
            return json_encode($data);
    
        }
        else {
            $data = array(
                'status' => 'error',
                'mensagem' => 'Ocorreu um erro ao verificar o usuário'
            );

            return json_encode($data); 
        }
    }
}
