<?php
class Pedidos extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        $data['title'] = 'pedidos';
        $this->views->getView('admin/pedidos', "index", $data);
    }

    public function listarPedidos()
    {
        $data = $this->model->getPedidos(1);
        for ($i=0; $i < count($data); $i++) {          
            $data[$i]['accion'] = '<div class="align-items-center">
                <button type="button" class="btn btn-success" onclick="verPedido('.$data[$i]['id'].')"><i class="fas fa-eye"></i></button>
                <button type="button" class="btn btn-info" onclick="cambiarProceso('.$data[$i]['id'].', 2)"><i class="fas fa-check-circle"></i></button>
            </div>';
        }
        echo json_encode($data);
        die();
    }

    public function listarProceso()
    {
        $data = $this->model->getPedidos(2);
        for ($i=0; $i < count($data); $i++) {          
            $data[$i]['accion'] = '<div class="align-items-center">
                <button type="button" class="btn btn-success" onclick="verPedido('.$data[$i]['id'].')"><i class="fas fa-eye"></i></button>
                <button type="button" class="btn btn-info" onclick="cambiarProceso('.$data[$i]['id'].', 3)"><i class="fas fa-check-circle"></i></button>
            </div>';
        }
        echo json_encode($data);
        die();
    }

    public function listarFinalizados()
    {
        $data = $this->model->getPedidos(3);
        for ($i=0; $i < count($data); $i++) {          
            $data[$i]['accion'] = '<div class="align-items-center">
                <button type="button" class="btn btn-success" onclick="verPedido('.$data[$i]['id'].')"><i class="fas fa-eye"></i></button>
            </div>';
        }
        echo json_encode($data);
        die();
    }

    public function update($datos){
        $array = explode(',', $datos);
        $idPedido = $array[0];
        $proceso = $array[1];
        if(is_numeric($idPedido)){
            $data = $this->model->actualizarEstado($proceso, $idPedido);
            if($data == 1){
                $respuesta = array('msg' => 'Pedido actualizado con exito', 'icono' => 'success');
            } else {
                $respuesta = array('msg' => 'Error al actualizar el pedido', 'icono' => 'error');
            }
            echo json_encode($respuesta);
        }
        die();
    }

    
}
?>