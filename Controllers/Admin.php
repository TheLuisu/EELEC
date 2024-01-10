<?php
class Admin extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        $data['title'] = 'Acceso al Sistema';
        $this->views->getView('admin', "login", $data);
    }

    public function validar(){
        if(isset($_POST['inputEmail']) && isset($_POST['inputPassword'])){
            if(empty($_POST['inputEmail']) || empty($_POST['inputPassword'])){
                $respuesta = array('msg' => 'Todos los campos son requeridos', 'icono' => 'warning');
            } else {
                $data = $this->model->getUsuario($_POST['inputEmail']);
                if(empty($data)){
                    $respuesta = array('msg' => 'El correo no existe', 'icono' => 'warning');
                } else {
                    if(password_verify($_POST['inputPassword'], $data['password'])){
                        $_SESSION['inputEmail'] = $data['correo'];
                        $_SESSION['nombre_usuario'] = $data['nombres'];
                        $respuesta = array('msg' => 'Inicio de sesión correcto', 'icono' => 'success');
                    } else {
                        $respuesta = array('msg' => 'La contraseña es incorrecta', 'icono' => 'warning');
                    }
                }
            }
        } else {
            $respuesta = array('msg' => 'Error desconocido', 'icono' => 'error');
        }
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function home(){
        $data['title'] = 'Panel Administrativo';
        $data['pendientes'] = $this->model->getTotales(1);
        $data['procesos'] = $this->model->getTotales(2);
        $data['finalizados'] = $this->model->getTotales(3);
        $data['productos'] = $this->model->getProductos();
        $this->views->getView('admin/administracion', "index", $data);
    }

    public function salir(){
        session_destroy();
        header('Location: ' . BASE_URL);
    }
    public function productosMinimos(){
        $data = $this->model->productosMinimos();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function topProductos(){
        $data = $this->model->topProductos();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
}
?>