<?php
defined('BASEPATH' or exit('No direct script access allowed'));

class RegisterModel extends CI_Model
{
    public function inserir_registro($nome, $email, $telefone, $senha)
    {
        $this->db->select('*');
        $this->db->from('register');
        $this->db->where('email', $email);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $data = array(
                'status' => 'error',
                'mensagem' => 'Usuário já cadastrado com esse e-mail'
            );
            return json_encode($data);
        } else {
            $dados_login = array(
                'email' => $email,
                'senha' => md5($senha)
            );

            $this->db->insert('login', $dados_login);

            $id_login = $this->db->insert_id();

            $dados = array(
                'nome' => $nome,
                'email' => $email,
                'telefone' => $telefone,
                'senha' => md5($senha),
                'login_id' => $id_login
            );

            $this->db->insert('register', $dados);

            if ($this->db->affected_rows() > 0) {
                $data = array(
                    'status' => 'success',
                    'mensagem' => 'Usuário cadastrado com sucesso'
                );
                return json_encode($data);
            } else {
                $data = array(
                    'status' => 'error',
                    'mensagem' => 'Falha ao cadastrar usuário'
                );
                return json_encode($data);
            }
        }
    }

    public function verificar_registro($email)
    {
        $this->db->select('*');
        $this->db->from('register');
        $this->db->where('email', $email);

        $query = $this->db->get();

        return $query->num_rows() > 0;
    }

    public function getRegisters()
    {
        $query = $this->db->get('register');

        return $query->result();
    }

    public function atualizar_registro($id, $dados)
    {
        $this->db->trans_start(); // Inicia a transação

        $this->db->set('nome', $dados['nome']);
        $this->db->set('email', $dados['email']);
        $this->db->set('telefone', $dados['telefone']);
        $this->db->where('id', $id);
        $this->db->update('register');

        $this->db->set('register_id', $id);
        $this->db->where('register_id', $id);
        $this->db->update('login');
        
        $this->db->trans_complete(); // Finaliza a transação

        return $this->db->trans_status(); // Retorna true ou false
    }
}
