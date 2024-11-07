<?php
require_once '../src/db/Database.php';

class Roles {

    private $db;

    public function __construct(){
        $this->db = new Database();
    }


    public function getAll(){

        $consulta = $this->db->connect()->query("
            SELECT * FROM Roles
        ");
        return $consulta->fetchAll();
    }

    public function getById($id){
        $consulta = $this->db->connect()->prepare(
            " SELECT * FROM Roles WHERE id = ?");

        $consulta->execute(params: [$id]);
        return $consulta->fetch();
    }
}
