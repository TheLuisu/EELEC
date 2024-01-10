<?php
class PrincipalModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }
    public function getProducto($id_producto){
        $sql = "SELECT p.*, c.categorias FROM productos p INNER JOIN categorias c ON p.id_categoria = c.id WHERE p.id = $id_producto";
        return $this->select($sql);
    }

    //Paginacion
    public function getProductos($desde, $porPagina){
        $sql ="SELECT * FROM productos LIMIT $desde, $porPagina";
        return $this->selectAll($sql);
    }

    //Total Productos
    public function getTotalProductos(){
        $sql = "SELECT COUNT(*) AS total FROM productos";
        return $this->select($sql);
    }

    //Productos por categoria
    public function getProductoCat($id_categoria, $desde, $porPagina){
        $sql = "SELECT * FROM productos WHERE id_categoria = $id_categoria LIMIT $desde, $porPagina";
        return $this->selectAll($sql);
    }

    //Total Productos Categorias
    public function getTotalProductosCat($id_categoria){
        $sql = "SELECT COUNT(*) AS total FROM productos WHERE id_categoria = $id_categoria";
        return $this->select($sql);
    }

    //Productos relacionados aleatorios
    public function getAleatorios($id_categoria, $id_producto){
        $sql = "SELECT * FROM productos WHERE id_categoria = $id_categoria AND id != $id_producto ORDER BY RAND() LIMIT 8";
        return $this->selectAll($sql);
    }

    //Busqueda de productos
    public function getBusqueda($valor){
        $sql = "SELECT * FROM productos WHERE nombre_product LIKE '%". $valor . "%' OR descripcion_product LIKE '%". $valor . "%' LIMIT 20";
        return $this->selectAll($sql);
    }
}
?>