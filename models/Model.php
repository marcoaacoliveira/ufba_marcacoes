<?php

class Model
{
    protected $table;
    protected $connection;
    /**
     * Procura uma linha por $id
     * @param $id
     * @return mixed
     */
    public function __construct()
    {
        $this->table = strtolower(get_class($this).'s');
        $this->connection = \Database\Connection::getInstance();
    }

    public function find($id){
        $sth = $this->connection->prepare("SELECT * FROM {$this->table} WHERE id=?");
        $sth->execute(array($id));
        return $sth->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Procura todas as linhas
     * @param $table
     * @return array
     */
    public function findAll() {
        $sth = $this->connection->prepare("SELECT * FROM {$this->table}");
        $sth->execute();
        return $sth->fetchAll(\PDO::FETCH_CLASS, get_class($this));
    }


}