<?php
class Principal extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
    }

    //Vista de Acerca De
    public function about()
    {
        $data['perfil'] = 'no';
        $data['title'] = 'Acerda De';
        $this->views->getView('principal', "about", $data);
    }

    //Vista de Tienda
    public function shop($page)
    {
        $data['perfil'] = 'no';
        $pagina = (empty($page)) ? 1 : $page ;
        $porPagina = 9;
        $desde = ($pagina - 1) * $porPagina;
        $data['title'] = 'Tienda';
        $data['productos'] = $this->model->getProductos($desde, $porPagina);
        $data['pagina'] = $pagina;
        $total = $this->model->getTotalProductos();
        $data['total'] = ceil($total['total'] / $porPagina);
        $this->views->getView('principal', "shop", $data);
    }

    //Vista de Detalles De Productos
    public function details($id_producto)
    {
        $data['perfil'] = 'no';
        $data['producto'] = $this->model->getProducto($id_producto);
        $id_categoria = $data['producto']['id_categoria'];
        $data['relacionados'] = $this->model->getAleatorios($id_categoria, $data['producto']['id']);
        $data['title'] = $data['producto']['nombre_product'];
        $this->views->getView('principal', "details", $data);
    }

    //Vista de Categorias
    public function categorias($datos)
    {
        $data['perfil'] = 'no';
        $id_categoria = 1;
        $page = 1;
        $array = explode(',', $datos);
        if(isset($array[0])){
            if(!empty($array[0])){
                $id_categoria = $array[0];
            }
        }
        if(isset($array[1])){
            if(!empty($array[1])){
                $page = $array[1];
            }
        }
        $pagina = (empty($page)) ? 1 : $page ;
        $porPagina = 3;
        $desde = ($pagina - 1) * $porPagina;

        $data['pagina'] = $pagina;
        $total = $this->model->getTotalProductosCat($id_categoria);
        $data['total'] = ceil($total['total'] / $porPagina);

        $data['productos'] = $this->model->getProductoCat($id_categoria, $desde, $porPagina);
        $data['title'] = 'Categorias';
        $data['id_categoria'] = $id_categoria;
        $this->views->getView('principal', "categorias", $data);
    }

    //Vista de Contacto
    public function contact($id_producto)
    {
        $data['perfil'] = 'no';
        $data['title'] = 'Contacto';
        $this->views->getView('principal', "contact", $data);
    }

    //Vista de lista de deseos
    public function deseo()
    {
        $data['perfil'] = 'si';
        $data['title'] = 'Tu lista de deseos';
        $this->views->getView('principal', "deseo", $data);
    }

    //Obtener productos de lista de carrito
    public function listaProductos(){
        $datos = file_get_contents('php://input');
        $json = json_decode($datos, true);
        $array['productos'] = array();
        $total = 0.00;
        if(!empty($json)){
            foreach ($json as $producto){
                $result = $this->model->getProducto($producto['idProducto']);
                $data['id'] = $result['id'];
                $data['nombre'] = $result['nombre_product'];
                $data['precio'] = $result['precio_product'];
                $data['cantidad'] = $producto['cantidad'];
                $data['imagen'] = $result['imagen_product'];
                $subTotal = $result['precio_product'] * $producto['cantidad'];
                $data['subTotal'] = number_format($subTotal, 2);
                array_push($array['productos'], $data);
                $total += $subTotal;
            }
        }
        $array['total'] = number_format($total, 2);
        $array['totalPaypal'] = number_format($total, 2, '.', '');
        $array['moneda'] = MONEDA;
        echo json_encode($array, JSON_UNESCAPED_UNICODE);
        die();
    }

    //Busqueda de productos
    public function busqueda($valor){
        $data = $this->model->getBusqueda($valor);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
}
?>