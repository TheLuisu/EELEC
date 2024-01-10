<?php
class ProductosModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }

    public function getProductos($estado){
        $sql = "SELECT * FROM productos WHERE estado = $estado";
        return $this->selectAll($sql);
    }
    public function getCategorias(){
        $sql = "SELECT * FROM categorias WHERE estado = 1";
        return $this->selectAll($sql);
    }

    public function registrar($nombre, $descripcion, $precio, $cantidad, $imagen_product, $categoria){
        $sql = "INSERT INTO productos (nombre_product, descripcion_product, precio_product, cantidad_product, imagen_product, id_categoria) VALUES (?,?,?,?,?,?)";
        $array = array($nombre, $descripcion, $precio, $cantidad, $imagen_product, $categoria);
        return $this->insertar($sql, $array);
    }

    public function eliminar($idProd){
        $sql = "UPDATE productos SET estado = ? WHERE id = ?";
        $array = array(0, $idProd);
        return $this->save($sql, $array);
    }

    public function getProducto($idProd){
        $sql = "SELECT * FROM productos WHERE id = $idProd";
        return $this->select($sql);
    }

    public function modificar($nombre, $descripcion, $precio, $cantidad, $imagen_product, $categoria, $id){
        $sql = "UPDATE productos SET nombre_product = ?, descripcion_product = ?, precio_product = ?, cantidad_product = ?, imagen_product = ?, id_categoria = ? WHERE id = ?"; 
        $array = array($nombre, $descripcion, $precio, $cantidad, $imagen_product, $categoria, $id);
        return $this->save($sql, $array);
    }
}
?>