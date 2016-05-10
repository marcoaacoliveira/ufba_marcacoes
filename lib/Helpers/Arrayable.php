<?php
namespace Helper;

trait Arrayable
{
    /**
     * Transforma um objeto em um array associativo
     * @return mixed
     */
    public function toArray()
    {
        return get_object_vars($this);
    }
}