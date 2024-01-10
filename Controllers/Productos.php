<?php
class Productos extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        $data['title'] = 'productos';
        $data['categorias'] = $this->model->getCategorias();
        $this->views->getView('admin/productos', "index", $data);
    }

    public function listar()
    {
        $data = $this->model->getProductos(1);
        for ($i=0; $i < count($data); $i++) { 
            $data[$i]['imagen_product'] = '<img class="img-thumbnail" src="'.BASE_URL.$data[$i]['imagen_product'].'" alt="'.$data[$i]['nombre_product'].'" width="100">';
            $data[$i]['accion'] = '<div class="align-items-center">
                <button type="button" class="btn btn-primary" onclick="editarProductos('.$data[$i]['id'].')"><i class="fas fa-edit"></i></button>
                <button type="button" class="btn btn-danger" onclick="eliminarProductos('.$data[$i]['id'].')"><i class="fas fa-trash"></i></button>
            </div>';
        }
        echo json_encode($data);
        die();
    }

    public function registrar()
    {
        if(isset($_POST['nombre']) && isset($_POST['precio'])){
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $cantidad = $_POST['cantidad'];
            $descripcion = $_POST['descripcion'];
            $categoria = $_POST['categoria'];
            $imagen_product = $_FILES['imagen_product'];
            $tmp_name = $imagen_product['tmp_name'];
            $ruta = 'assets/img/productos/';
            $id = $_POST['id'];
            $nombreImg = date('YmdHis');
            if(empty($nombre) || empty($precio) || empty($cantidad)){
                $respuesta = array('msg' => 'Todos los datos son requeridos', 'icono' => 'warning');
            } else{
                if (!empty($imagen_product['name'])) {
                    $destino = $ruta . $nombreImg . '.jpg';
                } else if(!empty($_POST['imagen_actual']) && empty($imagen_product['name'])){
                    $destino = $_POST['imagen_actual'];
                } else {
                    $destino = $ruta . 'default.png';
                }
                if(empty($id)){
                    $data = $this->model->registrar($nombre, $descripcion, $precio, $cantidad, $destino, $categoria);
                    if($data > 0){
                        if(!empty($imagen_product['name'])){
                            move_uploaded_file($tmp_name, $destino);
                        }
                        $respuesta = array('msg' => 'Producto registrado con exito', 'icono' => 'success');
                    } else {
                        $respuesta = array('msg' => 'Error al registrar producto', 'icono' => 'error');
                    }
                } else{
                    $data = $this->model->modificar($nombre, $descripcion, $precio, $cantidad, $destino, $categoria, $id);
                    if($data == 1){
                        if(!empty($imagen_product['name'])){
                            move_uploaded_file($tmp_name, $destino);
                        }
                        $respuesta = array('msg' => 'Producto modificado con exito', 'icono' => 'success');
                    } else {
                        $respuesta = array('msg' => 'Error al modificar el producto', 'icono' => 'error');
                    }
                }
            }
            echo json_encode($respuesta);
        }
        die();
    }

    public function delete($idProd){
        if(is_numeric($idProd)){
            $data = $this->model->eliminar($idProd);
            if($data == 1){
                $respuesta = array('msg' => 'Producto dado de baja', 'icono' => 'success');
            } else {
                $respuesta = array('msg' => 'Error al eliminar el producto', 'icono' => 'error');
            }
        } else {
            $respuesta = array('msg' => 'Error Fatal :(', 'icono' => 'error');
        }
        echo json_encode($respuesta);
        die();
    }

    public function editar($idProd){
        if(is_numeric($idProd)){
            $data = $this->model->getProducto($idProd);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
?>