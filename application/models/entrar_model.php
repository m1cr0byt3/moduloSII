<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class entrar_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    public function usuario_nip($matricula, $nip){
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('no_control', $matricula);
        $this->db->where('nip', $nip);
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }

    public function admin_usuario($usuario,$password){
        $this->db->select('*');
        $this->db->from('personal');
        $this->db->where('nombre_personal', $usuario);
        $this->db->where('password', $password);
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }

    public function obtener_actividades(){
        $query = $this->db->get('actividades');
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return false;
    }

    public function traer_actividades($matricula){
        $this->db->select('SUM(estatus) As Total');
        $this->db->from('actividades_liberadas_usuarios');
        $this->db->join('actividades', 'actividades_id_actividad = id_actividad');
        $this->db->where('usuarios_no_control',$matricula);
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }

    public function traer_actividad_nombre($matricula){
        $this->db->select('nombre_actividad');
        $this->db->from('actividades_liberadas_usuarios');
        $this->db->join('actividades', 'actividades_id_actividad = id_actividad');
        $this->db->where('estatus!=','0');
        $this->db->where('usuarios_no_control',$matricula);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return false;
    }
    public function usuarios(){
        $this->db->select('*');
        $this->db->from('usuarios');
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return false;
    }
}
?>