<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sesion extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('entrar_model');
    }
    public function index()
    {
        if($this->session->userdata('logueado')){
            if($this->session->userdata('tipo')=='a'){
                $this->bienvenido();
            }else{
                $this->admin();
            }
        }else{
            $this->load->view('encabezado');
            $this->load->view('index');
        }

    }

    public function login()
    {
        if ($this->input->post()) {
            $matricula = $this->input->post('usuario',TRUE);
            $nip = $this->input->post('contrasena',TRUE);
            $tipo = $this->input->post('tipo',TRUE);
            if($tipo=='a'){
                $usuario = $this->entrar_model->usuario_nip($matricula, $nip);
                if ($usuario) {
                    $usuario_data = array(
                        'no_control' => $usuario->no_control,
                        'nombre_alumno' => $usuario->nombre_alumno,
                        'semestre' => $usuario->semestre,
                        'carrera' => $usuario->carrera,
                        'tipo' => $tipo,
                        'logueado' => TRUE
                    );
                    $this->session->set_userdata($usuario_data);
                    redirect('sesion/bienvenido');
                } else {
                    $this->index();
                }
            }elseif($tipo=='p'){
                $usuario = $this->entrar_model->admin_usuario($matricula, $nip);
                if ($usuario) {
                    $usuario_data = array(
                        'nombre_personal' => $usuario->nombre_personal,
                        'departamento' => $usuario->departamento,
                        'tipo' => $tipo,
                        'logueado' => TRUE
                    );
                    $this->session->set_userdata($usuario_data);
                    redirect('sesion/admin');
                } else {
                    $this->index();
                }
            }
        } else {
            $this->index();
        }
    }

    public  function admin(){
        if($this->session->userdata('tipo')=='a'){
            $this->bienvenido();
        }else{
            $InformacionPersonal['nombre_personal'] = $this->session->userdata('nombre_personal');
            $InformacionPersonal['departamento'] = $this->session->userdata('departamento');
            $this->load->view('admin/encabezado');
            $this->load->view('admin/bienvenido',$InformacionPersonal);
        }
    }

    public function actividades(){
        if($this->session->userdata('logueado')){
            if($this->session->userdata('tipo')=='p'){
                $InformacionPersonal['nombre_personal'] = $this->session->userdata('nombre_personal');
                $InformacionPersonal['departamento'] = $this->session->userdata('departamento');
                $InformacionPersonal['usuarios'] = $this->entrar_model->usuarios();
                $this->load->view('admin/encabezado');
                $this->load->view('admin/actividades',$InformacionPersonal);
            }else{
                $this->cerrar_sesion();
            }
        }else{
            redirect('sesion/index');
        }
    }

    public function bienvenido()
    {
        if($this->session->userdata('logueado')){
            if($this->session->userdata('tipo')=='p'){
                $this->admin();
            }else{
            $InformacionAlumno['nombreAlumno'] = $this->session->userdata('nombre_alumno');
            $InformacionAlumno['matricula'] = $this->session->userdata('no_control');
            $InformacionAlumno['semestre'] = $this->session->userdata('semestre');
            $InformacionAlumno['carrera'] = $this->session->userdata('carrera');
            $InformacionAlumno['tipo'] = $this->session->userdata('tipo');
            $this->load->view('inicio/encabezado');
            $this->load->view('inicio/bienvenido',$InformacionAlumno);
            }
        }else{
            redirect('sesion/index');
        }
    }

    public function modulo(){
        if($this->session->userdata('logueado')){
            if($this->session->userdata('tipo')=='p'){
                $this->admin();
            }else {
                $InformacionAlumno['nombreAlumno'] = $this->session->userdata('nombre_alumno');
                $InformacionAlumno['matricula'] = $this->session->userdata('no_control');
                $InformacionAlumno['semestre'] = $this->session->userdata('semestre');
                $InformacionAlumno['carrera'] = $this->session->userdata('carrera');
                $InformacionAlumno['tipo'] = $this->session->userdata('tipo');
                $matricula = $InformacionAlumno['matricula'];
                $InformacionAlumno['actividades'] = $this->entrar_model->obtener_actividades();
                $InformacionAlumno['consulta_estatus'] = $this->entrar_model->traer_actividades($matricula);
                $InformacionAlumno['nombre_actividad'] = $this->entrar_model->traer_actividad_nombre($matricula);
                $this->load->view('inicio/encabezado');
                $this->load->view('inicio/modulo',$InformacionAlumno);
            }
        }else{
            redirect('sesion/index');
        }
    }

    public function cerrar_sesion() {
        $usuario_data = array(
            'logueado' => FALSE
        );
        $this->session->set_userdata($usuario_data);
        redirect('sesion/index');
    }

}
