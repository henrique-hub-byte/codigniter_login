<?php
defined('BASEPATH' or exit('No direct script access allowed'));

class UsuarioModel extends CI_Model
{

    public function inserir_usuario($email, $senha)
    {
        $dados = array(
            'email' => $email,
            'senha' => md5($senha)
        );
        
        $this->db->insert('usuario', $dados);

        return $this->db->affected_rows() > 0;
    }

    public function verificar_usuario($email, $senha)
    {
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('email', $email);
        $this->db->where('senha', md5($senha));
        $query = $this->db->get();
        if($query->num_rows() == 1){
            $usuario = $query->row();
            $data = array(
                'status' => 'success',
                'mensgem' => 'usuario autenticado com sucesso',
                'usuario' => $usuario
            );
            
            return json_encode($data);
            
        } else {
            $data = array(
                'status' => 'error',
                'mensagem' => 'Usuario ou senha inválidos'
            );

            return json_encode($data); 
        }
    }
}
