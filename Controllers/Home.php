<?php
class Home extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        $data['perfil'] = 'no';
        $data['title'] = 'Inicio';
        $data['categorias']=$this->model->getCategorias();
        $data['nuevosProductos']=$this->model->getNuevosProductos();
        $this->views->getView('home', "index", $data);
    }
}
?>