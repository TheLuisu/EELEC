<?php
class AdminModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }

    //Lista las categorias de la base de datos
    public function getUsuario($correo){
        $sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
        return $this->select($sql);
    }

    //Lista los procesos en el apartado reportes
    public function getTotales($proceso){
        $sql = "SELECT COUNT(*) AS total FROM pedidos WHERE proceso = '$proceso'";
        return $this->select($sql);
    }

    //Lista las categorias de la base de datos
    public function getProductos(){
        $sql = "SELECT COUNT(*) AS total FROM productos WHERE estado = 1";
        return $this->select($sql);
    }

    public function productosMinimos(){
        $sql = "SELECT * FROM productos WHERE cantidad_product < 15 AND estado = 1 ORDER BY cantidad_product ASC LIMIT 5";
        return $this->selectAll($sql);
    }
    
    public function topProductos(){
        $sql = "SELECT producto, SUM(cantidad) AS total FROM detalle_pedidos GROUP BY id_producto ORDER BY total DESC LIMIT 5";
        return $this->selectAll($sql);
    }
}
?>