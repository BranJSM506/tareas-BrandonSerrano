<?php
require_once '../src/db/Database.php';

class Usuarios {

    private $db;

    public function __construct(){
        $this->db = new Database();
    }


    public function getAll(){

        $consulta = $this->db->connect()->query("
            SELECT * FROM usuarios
        ");
        return $consulta->fetchAll();
    }

    public function getById($id){
        $consulta = $this->db->connect()->prepare(
            " SELECT * FROM usuarios WHERE id = ?");

        $consulta->execute(params: [$id]);
        return $consulta->fetch();
    }
}