<?php
namespace Helper;

trait Arrayable
{
    public function toArray()
    {
        return get_object_vars($this);
    }
}