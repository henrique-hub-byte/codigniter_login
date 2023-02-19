<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class UsuarioModel extends CI_Model {

    public function verificar_usuario($email,$senha)
    {
        $this->db->where('email', $email);
        $this->db->where('semja', md5($senha));
        $resultado = $this->db->get('usuarios')->result();
        if($resultado){
            return true;
        } else {
            return false;
        }
    }
}
