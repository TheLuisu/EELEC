<?php
class Categorias extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        $data['title'] = 'categorias';
        $this->views->getView('admin/categorias', "index", $data);
    }

    public function listar()
    {
        $data = $this->model->getCategorias(1);
        for ($i=0; $i < count($data); $i++) { 
            $data[$i]['imagen_categorias'] = '<img class="img-thumbnail" src="'.BASE_URL.$data[$i]['imagen_categorias'].'" alt="'.$data[$i]['categorias'].'" width="100">';
            $data[$i]['accion'] = '<div class="align-items-center">
                <button type="button" class="btn btn-primary" onclick="editarCategorias('.$data[$i]['id'].')"><i class="fas fa-edit"></i></button>
                <button type="button" class="btn btn-danger" onclick="eliminarCategorias('.$data[$i]['id'].')"><i class="fas fa-trash"></i></button>
            </div>';
        }
        echo json_encode($data);
        die();
    }

    public function registrar()
    {
        if(isset($_POST['categoria'])){
            $categoria = $_POST['categoria'];
            $imagen_categorias = $_FILES['imagen_categorias'];
            $tmp_name = $imagen_categorias['tmp_name'];
            $ruta = 'assets/img/categorias/';
            $id = $_POST['id'];
            $nombreImg = date('YmdHis');
            if(empty($_POST['categoria'])){
                $respuesta = array('msg' => 'Todos los datos son requeridos', 'icono' => 'warning');
            } else{
                if (!empty($imagen_categorias['name'])) {
                    $destino = $ruta . $nombreImg . '.jpg';
                } else if(!empty($_POST['imagen_actual']) && empty($imagen_categorias['name'])){
                    $destino = $_POST['imagen_actual'];
                } else {
                    $destino = $ruta . 'default.png';
                }
                if(empty($id)){
                    $result = $this->model->verificarCategoria($categoria);
                    if(empty($result)){
                        $data = $this->model->registrar($categoria, $destino);
                        if($data > 0){
                            if(!empty($imagen_categorias['name'])){
                                move_uploaded_file($tmp_name, $destino);
                            }
                            $respuesta = array('msg' => 'Categoria registrada con exito', 'icono' => 'success');
                        } else {
                            $respuesta = array('msg' => 'Error al registrar categoria', 'icono' => 'error');
                        }
                    } else {
                        $respuesta = array('msg' => 'Ya existe una categoria parecida:(', 'icono' => 'warning');
                    }
                } else{
                    $data = $this->model->modificar($categoria, $destino, $id);
                    if($data == 1){
                        if(!empty($imagen_categorias['name'])){
                            move_uploaded_file($tmp_name, $destino);
                        }
                        $respuesta = array('msg' => 'Categoria modificada con exito', 'icono' => 'success');
                    } else {
                        $respuesta = array('msg' => 'Error al modificar categoria', 'icono' => 'error');
                    }
                }
            }
            echo json_encode($respuesta);
        }
        die();
    }

    public function delete($idCat){
        if(is_numeric($idCat)){
            $data = $this->model->eliminar($idCat);
            if($data == 1){
                $respuesta = array('msg' => 'Categoria dada de baja', 'icono' => 'success');
            } else {
                $respuesta = array('msg' => 'Error al eliminar la categoria', 'icono' => 'error');
            }
        } else {
            $respuesta = array('msg' => 'Error Fatal :(', 'icono' => 'error');
        }
        echo json_encode($respuesta);
        die();
    }

    public function editar($idCat){
        if(is_numeric($idCat)){
            $data = $this->model->getCategoria($idCat);
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