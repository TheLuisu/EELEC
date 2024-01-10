<?php
class UsuariosModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuarios($estado){
        $sql = "SELECT id, nombres, apellidos, correo, perfil FROM usuarios WHERE estado = $estado";
        return $this->selectAll($sql);
    }

    public function registrar($nombre, $apellido, $correo, $password){
        $sql = "INSERT INTO usuarios (nombres, apellidos, correo, password) VALUES (?,?,?,?)";
        $array = array($nombre, $apellido, $correo, $password);
        return $this->insertar($sql, $array);
    }

    public function verificarCorreo($correo){
        $sql = "SELECT correo FROM usuarios WHERE correo = '$correo' AND estado = 1";
        return $this->select($sql);
    }

    public function eliminar($idUser){
        $sql = "UPDATE usuarios SET estado = ? WHERE id = ?";
        $array = array(0, $idUser);
        return $this->save($sql, $array);
    }

    public function getUsuario($idUser){
        $sql = "SELECT id, nombres, apellidos, correo FROM usuarios WHERE id = $idUser";
        return $this->select($sql);
    }

    public function modificar($nombre, $apellido, $correo, $id, $password){
        $sql = "UPDATE usuarios SET nombres = ?, apellidos = ?, correo = ?, password = ? WHERE id = ?"; 
        $array = array($nombre, $apellido, $correo, $id, $password);
        return $this->save($sql, $array);
    }
}
?>