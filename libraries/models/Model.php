<?php

namespace Models;


require_once('libraries/database.php');

class Model{
    //c'est seulement une pour moi et mes filles
    protected $pdo;
    protected $table;
    public function __construct()
    {
        $this->pdo = getPdo();
    }
    public function find(int $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
        $item = $query->fetch();
        return $item;
    }
    public function delete(int $id_art)
    {        
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id_art]);
    }
    public function findTous()
    {
        $resultats = $this->pdo->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
        $articles = $resultats->fetchAll();
        return $articles;
    }
}
?>