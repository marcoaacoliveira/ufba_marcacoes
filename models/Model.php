<?php
require '../lib/Arrayable.php';
class Model
{
    use \Helper\Arrayable;
    protected $table;
    protected $connection;

    public function __construct()
    {
        $this->table = strtolower(get_class($this) . 's');
        $this->connection = \Database\Connection::getInstance();
    }

    /**
     * Procura uma linha por $id
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $sth = $this->connection->prepare("SELECT * FROM {$this->table} WHERE id= ?");
        $sth->execute(array($id));
        return $sth->fetchObject(get_class($this));
    }

    /**
     * Procurar um campo especifico na tabela desejada
     * @param $field
     * @param $value
     * @return mixed
     */
    public function findBy($field, $value)
    {
        $sth = $this->connection->prepare("SELECT * FROM {$this->table} WHERE {$field} = ?");
        $sth->execute(array($value));
        return $sth->fetchObject(get_class($this));
    }

    /**
     * Procura todas as linhas
     * @return array
     */
    public function findAll()
    {
        $sth = $this->connection->prepare("SELECT * FROM {$this->table}");
        $sth->execute();
        return $sth->fetchAll(\PDO::FETCH_CLASS, get_class($this));
    }


}