<?php
class CategoriasModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }

    public function getCategorias($estado){
        $sql = "SELECT * FROM categorias WHERE estado = $estado";
        return $this->selectAll($sql);
    }

    public function registrar($categoria, $imagen_categorias){
        $sql = "INSERT INTO categorias (categorias, imagen_categorias) VALUES (?,?)";
        $array = array($categoria, $imagen_categorias);
        return $this->insertar($sql, $array);
    }

    public function verificarCategoria($categoria){
        $sql = "SELECT categorias FROM categorias WHERE categorias = '$categoria' AND estado = 1";
        return $this->select($sql);
    }

    public function eliminar($idCat){
        $sql = "UPDATE categorias SET estado = ? WHERE id = ?";
        $array = array(0, $idCat);
        return $this->save($sql, $array);
    }

    public function getCategoria($idCat){
        $sql = "SELECT * FROM categorias WHERE id = $idCat";
        return $this->select($sql);
    }

    public function modificar($categoria, $imagen_categorias, $id){
        $sql = "UPDATE categorias SET categorias = ?, imagen_categorias = ? WHERE id = ?"; 
        $array = array($categoria, $imagen_categorias, $id);
        return $this->save($sql, $array);
    }
}
?>