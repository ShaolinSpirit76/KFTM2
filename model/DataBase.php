<?php
//fichier obligatoire qui sera appelé à plusieurs endroits
class DB{
    protected $db;
    public function __construct(){
        $this->db = new PDO ('mysql:host=localhost;dbname=ThieuLam;charset=utf8', 'pdo','pdo');
       
    }
}