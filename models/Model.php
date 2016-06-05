<?php
require '../lib/Helpers/Arrayable.php';

class Model
{
    use \Helper\Arrayable;
    protected $connection;
    protected $table;

    public function __construct($array = [])
    {
        if ($array != []) {
            foreach ($array as $key => $value) {
                $this->$key = $value;
            }
        }
        $this->table = strtolower(get_class($this));
        $this->connection = \Database\Connection::getInstance();
    }

    //METODOS PUBLIC
    public function create()
    {
        $sql = "INSERT INTO `{$this->table}`( ";
        $fields = $this->getFields();
        $vars = $this->cleanArray($this->toArray());
        $questions = array();
        foreach ($vars as $key => $query) {
            $questions[$key] = ":$key";
        }
        $fields = implode(', ', $fields);
        $questions = implode(', ', $questions);
        $sql .= $fields . ") VALUES (";
        $sql .= $questions . ") ";
        $sth = $this->connection->prepare($sql);
        foreach ($vars as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        return array($sth->execute(), $this->connection->lastInsertId());
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
     * Procura todas as linhas
     * @return array
     */
    public function findAll()
    {
        $sth = $this->connection->prepare("SELECT * FROM {$this->table}");
        $sth->execute();
        return $sth->fetchAll(\PDO::FETCH_CLASS, get_class($this));
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
     * Persiste no banco de dados o objeto
     */
    public function save()
    {
        if (!(isset($this->id) && !empty($this->id))) {
            $result = $this->create();
            $this->id = $result[1];
            return $result;
        } else {
            return $this->update();
        }
    }

    /**
     * Atualiza a persistencia do objeto no banco de dados
     * @return array
     */
    public function update()
    {
        $vars = $this->cleanArray($this->toArray());
        $sql = "UPDATE `{$this->table}` SET ";
        $queries = $vars;
        foreach ($queries as $key => $query) {
            $queries[$key] = "`$key` = :$key";
        }
        $sql .= implode(", ", $queries);
        $sql .= " WHERE `id` = :id";
        $sth = $this->connection->prepare($sql);
        foreach ($vars as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        return array($sth->execute(), null);
    }

    //METODOS PROTECTED
    protected function cleanArray($array)
    {
        unset($array["table"]);
        unset($array["connection"]);
        unset($array["id"]);
        unset($array["observers"]);
        $array = $this->removeRelatedValues($array);
        return $array;
    }

    protected function getFields()
    {
        $array = $this->cleanArray($this->toArray());
        return array_keys($array);
    }

    /**
     * Clean the array removing all the related values.
     * @param $array
     * @return array
     */
    protected function removeRelatedValues($array)
    {
        return array_filter($array, function ($value) {
            return !is_array($value);
        });
    }

}