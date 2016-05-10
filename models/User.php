<?php

class User extends Model
{
    public function save()
    {
        $this->securePassword();
        return parent::save();
    }

    public function verifyPassword($pass){
        return $this->password==md5($pass);
    }


    private function securePassword()
    {
        $this->password = md5($this->password);
    }
}