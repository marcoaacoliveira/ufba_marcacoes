<?php

class Model
{
    protected $table;
    /**
     * Procura uma linha por $id
     * @param $id
     * @return mixed
     */
    public function __construct()
    {
        $this->table = strtolower(get_class($this).'s');
    }

    public function find($id){
        $conn= \Database\Connection::getInstance();
        $sth = $conn->prepare("SELECT * FROM {$this->table} WHERE id=?");
        unset($conn);
        $sth->execute(array($id));
        return $sth->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Procura todas as linhas
     * @param $table
     * @return array
     */
    public function findAll() {
        $conn= \Database\Connection::getInstance();
        $sth = $conn->prepare("SELECT * FROM {$this->table}");
        unset($conn);
        $sth->execute();
        return $sth->fetchAll(\PDO::FETCH_CLASS, get_class($this));
    }


}