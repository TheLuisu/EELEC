<?php
class Usuarios extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        $data['title'] = 'usuarios';
        $this->views->getView('admin/usuarios', "index", $data);
    }

    public function listar()
    {
        $data = $this->model->getUsuarios(1);
        for ($i=0; $i < count($data); $i++) { 
            $data[$i]['accion'] = '<div class="d-flex">
                <button type="button" class="btn btn-primary" onclick="editarUser('.$data[$i]['id'].')"><i class="fas fa-edit"></i></button>
                <button type="button" class="btn btn-danger" onclick="eliminarUser('.$data[$i]['id'].')"><i class="fas fa-trash"></i></button>
            </div>';
        }
        echo json_encode($data);
        die();
    }

    public function registrar()
    {
        if(isset($_POST['nombre'])){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $password = $_POST['password'];
            $id = $_POST['id'];
            $hash = password_hash($password, PASSWORD_DEFAULT);
            if(empty($_POST['nombre']) || empty($_POST['apellido'])){
                $respuesta = array('msg' => 'El correo no existe', 'icono' => 'warning');
            } else{
                if(empty($id)){
                    $result = $this->model->verificarCorreo($correo);
                    if(empty($result)){
                        $data = $this->model->registrar($nombre, $apellido, $correo, $hash);
                        if($data > 0){
                            $respuesta = array('msg' => 'Usuario registrado con exito', 'icono' => 'success');
                        } else {
                            $respuesta = array('msg' => 'Error al registrar usuario', 'icono' => 'error');
                        }
                    } else {
                        $respuesta = array('msg' => 'Ya existe una cuenta con ese correo :(', 'icono' => 'warning');
                    }
                } else{
                    $data = $this->model->modificar($nombre, $apellido, $correo, $id, $password);
                    if($data == 1){
                        $respuesta = array('msg' => 'Usuario modificado con exito', 'icono' => 'success');
                    } else {
                        $respuesta = array('msg' => 'Error al modificar usuario', 'icono' => 'error');
                    }
                }
            }
            echo json_encode($respuesta);
        }
        die();
    }

    public function delete($idUser){
        if(is_numeric($idUser)){
            $data = $this->model->eliminar($idUser);
            if($data == 1){
                $respuesta = array('msg' => 'Usuario dado de baja', 'icono' => 'success');
            } else {
                $respuesta = array('msg' => 'Error al eliminar el usuario', 'icono' => 'error');
            }
        } else {
            $respuesta = array('msg' => 'Error Fatal :(', 'icono' => 'error');
        }
        echo json_encode($respuesta);
        die();
    }

    public function editar($idUser){
        if(is_numeric($idUser)){
            $data = $this->model->getUsuario($idUser);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        //     if($data == 1){
        //         $respuesta = array('msg' => 'Usuario dado de baja', 'icono' => 'success');
        //     } else {
        //         $respuesta = array('msg' => 'Error al eliminar el usuario', 'icono' => 'error');
        //     }
        // } else {
        //     $respuesta = array('msg' => 'Error Fatal :(', 'icono' => 'error');
        }
        die();
    }
}
?>