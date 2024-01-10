<?php
class HomeModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }

    //Lista las categorias de la base de datos
    public function getCategorias(){
        $sql = "SELECT * FROM categorias LIMIT 6";
        return $this->selectAll($sql);
    }

    public function getNuevosProductos(){
        $sql = "SELECT * FROM productos ORDER BY id ASC LIMIT 6";
        return $this->selectAll($sql);
    }
}
?>